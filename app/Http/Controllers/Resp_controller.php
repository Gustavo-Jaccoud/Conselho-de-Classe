<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resposta;
use App\Models\config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;


class Resp_controller extends Controller
{
        public function index(Request $request)
        {
            $query = DB::table('respostas')
                ->select(
                    'respostas.id_resp',
                    'turmas.nome_turma',
                    'professores.nome_prof',
                    'respostas.ano',
                    'respostas.unidade',
                    'respostas.resp_1',
                    'respostas.resp_2',
                    'respostas.resp_3',
                    'respostas.resp_4',
                    'respostas.resp_5',
                    'respostas.created_at'
                )
                ->join('matriculas', 'respostas.id_mat', '=', 'matriculas.id_mat')
                ->join('turmas', 'matriculas.id_turma', '=', 'turmas.id_turma')
                ->join('professores', 'matriculas.id_prof', '=', 'professores.id_prof')
                ->orderBy('respostas.id_resp', 'desc');
    
            if ($request->filled('nome_turma')) {
                $query->where('turmas.nome_turma', 'like', '%' . $request->input('nome_turma') . '%');
            }
    
            if ($request->filled('nome_prof')) {
                $query->where('professores.nome_prof', 'like', '%' . $request->input('nome_prof') . '%');
            }
            if ($request->filled('unidade')) {
                $query->where('respostas.unidade', 'like', '%' . $request->input('unidade') . '%');
            }
    
            if ($request->filled('ano')) {
                $query->where('respostas.ano', 'like', '%' . $request->input('ano') . '%');
            }
    
            $respostas = $query->get();
    
            $mediaRespostas = [];
            $mediaTotal = 0;
    
            foreach (range(1, 5) as $i) {
                $mediaRespostas['media_resp_' . $i] = $respostas->avg('resp_' . $i);
                $mediaTotal += $mediaRespostas['media_resp_' . $i];
            }
    
            $mediaTotal /= 5;
    
            return view('resposta.index', compact('respostas', 'mediaRespostas', 'mediaTotal'));
        }
        public function config(){
            $unidade=config::where('id',1)->value('value');
            $ano=config::where('id',2)->value('value');
            return view('resposta.config',compact('unidade', 'ano'));
        }
        
    
        public function store(Request $request)
        {
            $unidade =[
                'value'=>$request->unidade,
            ];
            $ano =[
                'value'=>$request->ano,
            ];
            config::where('id',1)->update($unidade);
            config::where('id',2)->update($ano);
        
        
            return redirect()->route('resposta-config')->with('success', 'Variáveis globais atualizadas com sucesso.');
        }
    }
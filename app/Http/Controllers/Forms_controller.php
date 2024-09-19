<?php

namespace App\Http\Controllers;

use App\Models\turma;
use App\Models\professore;
use App\Models\matricula;
use App\Models\resposta;
use App\Models\config;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class Forms_controller extends Controller
{
    // função home -- envia as turmas para o select 
    public function Avaliar()
    {
        $turmas = turma::all();
        return view('avaliar', ['turmas' => $turmas]);
    }

    // função store -- recebe o id da turma e procura o primeiro professor
    public function store(Request $request)
    {
        $t = $request->turmas;
        $ano = config::where('id', 2)->value('value');
        //$professor= professore::where('id','>',0)->orderBy('id')->first();
        $matricula = matricula::where('id_turma', '=', $t)->where('id_prof', '>', 0)->where('ano', '=', $ano)->orderBy('id_mat')->value('id_mat');
        $professor = matricula::where('id_mat', '=', $matricula)->value('id_prof');
        $unidade = config::where('id', 1)->value('value');
        return view('form-prof')->with(['turma' => $t, 'professor' => $professor, 'matricula' => $matricula, 'unidade' => $unidade, 'ano' => $ano]);
    }

    public function NomeProf($id)
    {
        $professor = professore::where('id_prof', '=', $id)->value('nome_prof');
        return $professor;
    }

    public function NomeTurma($id)
    {
        $turma = turma::where('id_turma', '=', $id)->value('nome_turma');
        //$professor = professore::find($id)->value('professor_nome');
        return $turma;
    }

    public function cadresp(Request $request)
    {
        $regras = [
            'pergunta_1' => 'required',
            'pergunta_2' => 'required',
            'pergunta_3' => 'required',
            'pergunta_4' => 'required',
            'pergunta_5' => 'required',
        ];
    
        // Define mensagens de erro personalizadas (opcional)
        $mensagens = [
            'required' => 'Marque todos os campo.',
        ];
    
        // Realiza a validação dos dados do formulário
        $validator = Validator::make($request->all(), $regras, $mensagens);
    
        // Verifica se a validação falhou
        if ($validator->fails()) {
            $ano = config::where('id', 2)->value('value');
            $unidade = config::where('id', 1)->value('value');
            $matricula = $request->matricula;
            $t = Matricula::where('id_mat', $matricula)->value('id_turma');
            $professor = Matricula::where('id_mat', $matricula)->value('id_prof');
            return view('form-prof')->with([
                'turma' => $t,
                'professor' => $professor,
                'matricula' => $matricula,
                'unidade' => $unidade,
                'ano' => $ano,
                'mensagens' => $validator->errors()->all(), // Obtém todas as mensagens de erro
            ]);
        }

        resposta::create([
            'id_mat' => $request->matricula,
            'ano' => $request->ano,
            'unidade' => $request->unidade,
            'resp_1' => $request->pergunta_1,
            'resp_2' => $request->pergunta_2,
            'resp_3' => $request->pergunta_3,
            'resp_4' => $request->pergunta_4,
            'resp_5' => $request->pergunta_5
        ]);
        $ano = config::where('id', 2)->value('value');
        $turma = $request->turma;
        $p = $request->professor;
        $matricula = matricula::where('id_turma', '=', $turma)->where('id_prof', '>', $p)->where('ano', '=', $ano)->orderBy('id_mat')->value('id_mat');
        $unidade = config::where('id', 1)->value('value');
        $professor = matricula::where('id_mat', '=', $matricula)->value('id_prof');

        if (isset($professor)) {
            return view('form-prof')->with(['turma' => $turma, 'professor' => $professor, 'matricula' => $matricula, 'unidade' => $unidade, 'ano' => $ano]);
        } else {
            return redirect()->route('Home');
        }
    }
    public function cadresp2(Request $request)
    {
        $regras = [
            'pergunta_1' => 'required',
            'pergunta_2' => 'required',
            'pergunta_3' => 'required',
            'pergunta_4' => 'required',
            'pergunta_5' => 'required',
        ];
    
        // Define mensagens de erro personalizadas (opcional)
        $mensagens = [
            'required' => 'Marque todos os campo.',
        ];
    
        // Realiza a validação dos dados do formulário
        $validator = Validator::make($request->all(), $regras, $mensagens);
    
        // Verifica se a validação falhou
        if ($validator->fails()) {
            $ano = config::where('id', 2)->value('value');
            $unidade = config::where('id', 1)->value('value');
            $matricula = $request->matricula;
            $t = Matricula::where('id_mat', $matricula)->value('id_turma');
            $professor = Matricula::where('id_mat', $matricula)->value('id_prof');
            return view('form-prof')->with([
                'turma' => $t,
                'professor' => $professor,
                'matricula' => $matricula,
                'unidade' => $unidade,
                'ano' => $ano,
                'mensagens' => $validator->errors()->all(), // Obtém todas as mensagens de erro
            ]);
        }
        $turma = $request->turma;
        $p = $request->professor;
        $ano = config::where('id', 2)->value('value');
        //$professor= professore::where('id','>',$t)->orderBy('id')->value('id');
        $matricula = matricula::where('id_turma', '=', $turma)->where('id_prof', '>', $p)->where('ano', '>', $ano)->orderBy('id_mat')->value('id_mat');
        $unidade = config::where('id', 1)->value('value');
        $professor = matricula::where('id_mat', '=', $matricula)->value('id_prof');

        $s = matricula::orderBy('id_mat')->value('id_prof');
        if ((int)$p === $s) {
            resposta::create([
                'id_mat' => $request->matricula,
                'ano' => $request->ano,
                'unidade' => $request->unidade,
                'resp_1' => $request->pergunta_1,
                'resp_2' => $request->pergunta_2,
                'resp_3' => $request->pergunta_3,
                'resp_4' => $request->pergunta_4,
                'resp_5' => $request->pergunta_5
            ]);
            if (isset($professor)) {
                return view('form-prof')->with(['turma' => $turma, 'professor' => $professor, 'matricula' => $matricula, 'unidade' => $unidade, 'ano' => $ano]);
            }
        }
        if (isset($professor)) {

            resposta::create([
                'id_mat' => $request->matricula,
                'ano' => $request->ano,
                'unidade' => $request->unidade,
                'resp_1' => $request->pergunta_1,
                'resp_2' => $request->pergunta_2,
                'resp_3' => $request->pergunta_3,
                'resp_4' => $request->pergunta_4,
                'resp_5' => $request->pergunta_5
            ]);
            return view('form-prof')->with(['turma' => $turma, 'professor' => $professor, 'matricula' => $matricula, 'unidade' => $unidade, 'ano' => $ano]);
        } else {
            return redirect()->route('Home');
        }
    }
}

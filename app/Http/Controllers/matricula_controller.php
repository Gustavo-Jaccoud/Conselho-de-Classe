<?php

namespace App\Http\Controllers;

use App\Models\turma;
use App\Models\professore;
use App\Models\disciplina;
use App\Models\matricula;
use App\Models\config;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Matricula_controller extends Controller
{
    public function index(Request $request)
    {
      $query = DB::table('matriculas')
    ->select(
        'matriculas.id_mat',
        'matriculas.ano',
        'turmas.id_turma',
        'professores.id_prof',
        'disciplinas.id_disciplina',
        'turmas.nome_turma',
        'professores.nome_prof',
        'disciplinas.nome_disciplina',
        'matriculas.updated_at'
    )
    ->join('turmas', 'matriculas.id_turma', '=', 'turmas.id_turma')
    ->leftJoin('professores', 'matriculas.id_prof', '=', 'professores.id_prof')
    ->join('disciplinas', 'matriculas.id_disciplina', '=', 'disciplinas.id_disciplina')
    ->orderByDesc('matriculas.ano');

if ($request->filled('nome_turma')) {
    $query->where('turmas.nome_turma', 'like', '%' . $request->input('nome_turma') . '%');
}

if ($request->filled('nome_prof')) {
    $query->where(function ($query) use ($request) {
        $query->where('professores.nome_prof', 'like', '%' . $request->input('nome_prof') . '%')
            ->orWhereNull('professores.id_prof'); // Inclui matrículas com professores nulos
    });
}

if ($request->filled('ano')) {
    $query->whereYear('matriculas.created_at', $request->input('ano'));
}

$matriculas = $query->get();

        return view('matricula.index', ['matriculas' => $matriculas]);
    }
    public function create()
    {
        $turmas = turma::all();
        $professores = professore::all();
        $disciplinas = disciplina::all();

        return view('matricula.create', ['turmas' => $turmas, 'professores' => $professores, 'disciplinas' => $disciplinas]);
    }
    public function store(Request $request)
    {
        matricula::create($request->all());
        return redirect()->route('matricula-index');
    }

    public function edit($id)
    {
        $turmas = turma::all();
        $professores = professore::all();
        $disciplinas = disciplina::all();
        $ano = matricula::where('id_mat', $id)->value('ano');
        $matriculas = matricula::where('id_mat', $id)->first();

        if (!empty($turmas)) {
            return view('matricula.edit', ['turmas' => $turmas, 'professores' => $professores, 'matriculas' => $matriculas, 'disciplinas' => $disciplinas, 'ano' => $ano]);
        } else {
            return redirect()->route('matricula-index');
        }
    }
    public function update(Request $request, $id)
    {
        $data = [
            'ano' => $request->ano,
            'id_turma' => $request->id_turma,
            'id_prof' => $request->id_prof,
            'id_disciplina' => $request->id_disciplina,
        ];
        matricula::where('id_mat', $id)->update($data);
        return redirect()->route('matricula-index');
    }
    public function destroy($id)
    {
        try {
            // Tente excluir o registro
            matricula::where('id_mat',$id)->delete();
            return redirect()->route('matricula-index');
        } catch (\Illuminate\Database\QueryException $e) {
            // Se ocorrer um erro de chave estrangeira
            return redirect()->back()->with('error', 'Não é possível excluir este registro porque está associado a outros registros.');
        }
    }

    public function duplicar()
{
    
    $matriculas = Matricula::where('ano', 2023)->get();
    $ano=2024;

    

    foreach ($matriculas as $matricula) {
        matricula::create(['ano'=>$ano,'id_turma'=>$matricula->id_turma,'id_prof'=>null,'id_disciplina'=>$matricula->id_disciplina]);
        
    }

    return redirect()->route('matricula-index'); 
}
}

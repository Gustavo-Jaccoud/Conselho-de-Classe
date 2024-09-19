<?php

namespace App\Http\Controllers;

use App\Models\turma;
use Illuminate\Http\Request;

class Turma_controller extends Controller
{
    public function index(Request $request)
{
    $query = Turma::query(); // Comece com o construtor de consulta Eloquent

    if ($request->filled('nome_turma')) {
        $query->where('nome_turma', 'like', '%' . $request->input('nome_turma') . '%');
    }

    if ($request->filled('codigo_turma')) {
        $query->where('codigo_turma', 'like', '%' . $request->input('codigo_turma') . '%');
    }

    $turmas = $query->get(); // Execute a consulta e obtenha os resultados

    return view('turma.index', ['turmas' => $turmas]);
}

    public function create()
    {
        return view('turma.create');
    }
    public function store(Request $request)
    {
        turma::create($request->all());
        return redirect()->route('turma-index');
    }
    public function edit($id)
    {
        $turmas = turma::where('id_turma', $id)->first();
        if (!empty($turmas)) {
            return view('turma.edit', ['turmas' => $turmas]);
        } else {
            return redirect()->route('turma-index');
        }
    }
    public function update(Request $request, $id)
    {
        $data = [
            'nome_turma' => $request->nome_turma,
            'codigo_turma' => $request->codigo_turma,
        ];
        turma::where('id_turma', $id)->update($data);
        return redirect()->route('turma-index');
    }
    public function destroy($id)
    {
        try {
            // Tente excluir o registro
            turma::where('id_turma',$id)->delete();
            return redirect()->route('turma-index');
        } catch (\Illuminate\Database\QueryException $e) {
            // Se ocorrer um erro de chave estrangeira
            return redirect()->back()->with('error', 'Não é possível excluir este registro porque está associado a outros registros.');
        }
        
    }
}

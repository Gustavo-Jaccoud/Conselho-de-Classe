<?php

namespace App\Http\Controllers;

use App\Models\disciplina;
use Illuminate\Http\Request;

class disciplina_controller extends Controller
{
    public function index(Request $request){
        $query = disciplina::query(); // Comece com o construtor de consulta Eloquent

    if ($request->filled('nome_disciplina')) {
        $query->where('nome_disciplina', 'like', '%' . $request->input('nome_disciplina') . '%');
    }
    $disciplinas = $query->get(); // Execute a consulta e obtenha os resultados
        return view('disciplina.index',['disciplinas'=> $disciplinas]);
    }
    public function create(){
        return view('disciplina.create');
    }
    public function store(Request $request){
        disciplina::create($request->all());
        return redirect()->route('disciplina-index');
    }
    public function edit($id){
        $disciplinas=disciplina::where('id_disciplina',$id)->first();
        if(!empty($disciplinas)){
            return view('disciplina.edit',['disciplinas'=> $disciplinas]);
        }
        else{
            return redirect()->route('disciplina-index');
        }
    }
    public function update(Request $request,$id){
        $data =[
            'nome_disciplina'=>$request->nome_disciplina,
        ];
        disciplina::where('id_disciplina',$id)->update($data);
        return redirect()->route('disciplina-index');
    }
    public function destroy($id)
    {
        try {
            // Tente excluir o registro
            disciplina::where('id_disciplina',$id)->delete();
            return redirect()->route('disciplina-index');
        } catch (\Illuminate\Database\QueryException $e) {
            // Se ocorrer um erro de chave estrangeira
            return redirect()->back()->with('error', 'Não é possível excluir este registro porque está associado a outros registros.');
        }
    }
}

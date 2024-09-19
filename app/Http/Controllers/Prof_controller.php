<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\professore;

class Prof_controller extends Controller
{
    public function index(Request $request)
        {
            $query = Professore::query(); // Comece com o construtor de consulta Eloquent
        
            if ($request->filled('nome_prof')) {
                $query->where('nome_prof', 'like', '%' . $request->input('nome_prof') . '%');
            }
        
            if ($request->filled('SIAP')) {
                $query->where('SIAP', 'like', '%' . $request->input('SIAP') . '%');
            }
        
            $professores = $query->get(); // Execute a consulta e obtenha os resultados
        
        return view('prof.index',['professores'=> $professores]);
    }
    public function create(){
        return view('prof.create');
    }
    public function store(Request $request){
        professore::create($request->all());
        return redirect()->route('prof-index');
    }
    public function edit($id){
        $professores=professore::where('id_prof',$id)->first();
        if(!empty($professores)){
            return view('prof.edit',['professores'=> $professores]);
        }
        else{
            return redirect()->route('prof-index');
        }
    }
    public function update(Request $request,$id){
        $data =[
            'nome_prof'=>$request->nome_prof,
            'SIAP'=>$request->SIAP,
        ];
        professore::where('id_prof',$id)->update($data);
        return redirect()->route('prof-index');
    }
    public function destroy($id)
    {
        try {
            // Tente excluir o registro
            professore::where('id_prof',$id)->delete();
            return redirect()->route('prof-index');
        } catch (\Illuminate\Database\QueryException $e) {
            // Se ocorrer um erro de chave estrangeira
            return redirect()->back()->with('error', 'Não é possível excluir este registro porque está associado a outros registros.');
        }
    }
}

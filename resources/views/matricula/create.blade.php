@extends('layout.navbar')
@section('content')
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('css/forms.css') }}" rel="stylesheet" >
</head>
<h1>Adicionar matricula</h1>
<div class="voltar">
    <a href="{{ url('/matricula') }}"><img src="{{URL::asset('/img/voltar.png')}}" style="width: 40px; height:40px; margin: 15px 0 0 15px;"></a>
  </div>
<form action="{{route('matricula-store')}}" method="post">
@csrf

<h4>Qual o Ano</h4>
<input type="text" name="ano" placeholder="Digite o Ano...">
<h4>Selecione a Turma</h4>
<select id="id_turma" name="id_turma">
    @foreach($turmas as $turma)
    <option value={{$turma->id_turma}}>{{$turma->nome_turma}}</option>
    @endforeach
</select>
<br><br>
<h4>Selecione o Professor</h4>
<select id="id_prof" name="id_prof">
    @foreach($professores as $professore)
    <option value={{$professore->id_prof}}>{{$professore->nome_prof}}</option>
    @endforeach
</select>
<br><br>
<h4>Selecione a Disciplina</h4>
<select id="id_disciplina" name="id_disciplina">
    @foreach($disciplinas as $disciplina)
    <option value={{$disciplina->id_disciplina}}>{{$disciplina->nome_disciplina}}</option>
    @endforeach
</select>
<br><br>
<input type="submit" name="submit">
</form>

@endsection
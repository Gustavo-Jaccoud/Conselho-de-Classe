@extends('layout.navbar')
@section('content')
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('css/forms.css') }}" rel="stylesheet" >
</head>
<h1>Editar matricula</h1>
<div class="voltar">
    <a href="{{ url('/matricula') }}"><img src="{{URL::asset('/img/voltar.png')}}" style="width: 40px; height:40px; margin: 15px 0 0 15px;"></a>
  </div>
<form action="{{ route('matricula-update', ['id' => $matriculas->id_mat]) }} " method="post">
@csrf
@method('PUT')
<h4>Atualizar Ano:</h4>
<input type="text" name="ano" value={{$ano}}>
<h4>Selecione a Turma:</h4>
<select id="id_turma" name="id_turma">
    @foreach($turmas as $turma)
        <option value="{{ $turma->id_turma }}"{{ (int)$matriculas->id_turma === (int)$turma->id_turma ? ' selected' : '' }}>{{ $turma->nome_turma }}</option>
    @endforeach
</select>

<h4>Selecione o Professor:</h4>
<select id="id_prof" name="id_prof">
    @foreach($professores as $professore)
    <option value="{{ $professore->id_prof }}"{{ (int)$matriculas->id_prof === (int)$professore->id_prof ? ' selected' : '' }}>{{ $professore->nome_prof }}</option>
    @endforeach
</select>

<h4>Selecione o Disciplina:</h4>
<select id="id_disciplina" name="id_disciplina">
    @foreach($disciplinas as $disciplina)
    <option value="{{ $disciplina->id_disciplina }}"{{ (int)$matriculas->id_disciplina === (int)$disciplina->id_disciplina ? ' selected' : '' }}>{{ $disciplina->nome_disciplina }}</option>
    @endforeach
</select>
<input type="submit" value="Atualizar">
</form>

@endsection
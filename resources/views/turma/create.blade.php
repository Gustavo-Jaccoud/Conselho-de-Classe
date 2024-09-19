@extends('layout.navbar')
@section('content')
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('css/forms.css') }}" rel="stylesheet" >
</head>
<h1>Adicionar turma</h1>
<div class="voltar">
    <a href="{{ url('/turma') }}"><img src="{{URL::asset('/img/voltar.png')}}" style="width: 40px; height:40px; margin: 15px 0 0 15px;"></a>
  </div>
<form action="{{route('turma-store')}}" method="post">

@csrf
<h4>Nome da turma:</h4>
<input type="text" name="nome_turma" placeholder="Digite o nome...">
<br><br>
<h4>Código da turma</h4>
<input type="text" name="codigo_turma" placeholder="Digite o código...">
<br><br>
<input type="submit" value="Enviar">
</form>

@endsection
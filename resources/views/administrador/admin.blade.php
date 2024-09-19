@extends('layout.navbar')
@section('content')
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" >
</head>
<body>

<h1>Dashboard</h1>

<ul class="Dashboard">
    <li><a href="{{ route('prof-index') }}">Página de Professores <img src="{{ asset('img/professores.png') }}"> </a></li>
    <li><a href="{{ route('turma-index') }}">Página de Turmas <img src="{{ asset('img/turmas.png') }}"> </a></li>
    <li><a href="{{ route('disciplina-index') }}">Página de Disciplinas <img src="{{ asset('img/disciplinas.png') }}"> </a></li>
    <li><a href="{{ route('matricula-index') }}">Página de Matrículas <img src="{{ asset('img/matriculas.png') }}"> </a></li>
    <li><a href="{{ route('resposta-index') }}">Página de Respostas <img src="{{ asset('img/respostas.png') }}"> </a></li>
    <li><a href="{{ route('register') }}">Página de Cadastro <img src="{{ asset('img/cadastrar.png') }}"> </a></li>
</ul>

</body>

@endsection


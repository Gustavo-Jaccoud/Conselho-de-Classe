@extends('layout.navbar')
@section('content')
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('css/forms.css') }}" rel="stylesheet" >
</head>
<h1>Adicionar disciplina</h1>
<div class="voltar">
    <a href="{{ url('/disciplina') }}"><img src="{{URL::asset('/img/voltar.png')}}" style="width: 40px; height:40px; margin: 15px 0 0 15px;"></a>
  </div>
<form action="{{route('disciplina-store')}}" method="post">

@csrf
<h4>Nome da disciplina:</h4>
<input type="text" name="nome_disciplina" placeholder="Digite a disciplina...">
<br><br>
<input type="submit" name="submit">
</form>

@endsection
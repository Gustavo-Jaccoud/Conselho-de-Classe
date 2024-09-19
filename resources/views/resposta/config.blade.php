@extends('layout.navbar')
@section('content')
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('css/forms.css') }}" rel="stylesheet" >
</head>
<h1>Configurar Respostas</h1>
<div class="voltar">
    <a href="{{ url('/resposta') }}"><img src="{{URL::asset('/img/voltar.png')}}" style="width: 40px; height:40px; margin: 15px 0 0 15px;"></a>
  </div>
<form action="{{route('resposta-store')}}" method="post">

@csrf
<h4>Atualizar Unidade:</h4>
<input type="text" name="unidade" value={{$unidade}}>
<br><br>
<h4>Atualizar Ano:</h4>
<input type="text" name="ano" value={{$ano}}>
<br><br>
<input type="submit" name="submit">
</form>
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

@endsection
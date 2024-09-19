@extends('layout.navbar')
@section('content')
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('css/forms.css') }}" rel="stylesheet" >
</head>
<h1>Adicionar Professor</h1>
<div class="voltar">
    <a href="{{ url('/prof') }}"><img src="{{URL::asset('/img/voltar.png')}}" style="width: 40px; height:40px; margin: 15px 0 0 15px;"></a>
  </div>
<form action="{{route('prof-store')}}" method="post">
@csrf
<h4>Nome Professor:</h4>
<input type="text" name="nome_prof" placeholder="Digite o nome...">
<br><br>
<h4>SIAP do Professor:</h4>
<input type="text" name="SIAP" placeholder="Digite o SIAP...">
<br><br>
<input type="submit" name="submit">
</form>

@endsection
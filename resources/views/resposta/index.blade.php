@extends('layout.navbar')
@section('content')
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('css/tabela.css') }}" rel="stylesheet" >
  <link href="{{ asset('css/busca.css') }}" rel="stylesheet" >
</head>

<h1>Respostas</h1>
<div class="voltar">
    <a href="{{ url('/administrador') }}"><img src="{{URL::asset('/img/voltar.png')}}" style="width: 40px; height:40px; margin: 15px 0 0 15px;"></a>
  </div>
<form method="GET" action="{{ route('resposta-index') }}">
    <input class="size4" type="text" name="nome_turma" placeholder="Nome da Turma">
    <input class="size4" type="text" name="nome_prof" placeholder="Nome do Professor">
    <input class="size4" type="text" name="unidade" placeholder="Unidade">
    <input class="size4" type="text" name="ano" placeholder="Ano">
    <button type="submit">Buscar</button>
</form>
<div class="media-section">
<a href="/resposta/config"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
  <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
  <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
</svg></a>
    <p>Média Total: {{ number_format($mediaTotal, 2) }}</p>
</div>

<table>
  <tr>
    <th>Dia da Resposta</th>
    <th>Nome Prof</th>
    <th>Nome Turma</th>
    <th>Ano</th>
    <th>Unidade</th>
    <th>Resp_1</th>
    <th>Resp_2</th>
    <th>Resp_3</th>
    <th>Resp_4</th>
    <th>Resp_5</th>
   
  </tr>
  @foreach($respostas as $resposta)
  <tr>
    <td>{{$resposta->created_at}}</td>
    <td>{{$resposta->nome_prof}}</td>
    <td>{{$resposta->nome_turma}}</td>
    <td>{{$resposta->ano}}</td>
    <td>{{$resposta->unidade}}</td>
    <td>{{$resposta->resp_1}}</td>
    <td>{{$resposta->resp_2}}</td>
    <td>{{$resposta->resp_3}}</td>
    <td>{{$resposta->resp_4}}</td>
    <td>{{$resposta->resp_5}}</td>
    
  </tr>
  @endforeach
  <tr>
    <th colspan="5">Médias individual respotas</th>
    <th>{{ number_format($mediaRespostas['media_resp_1'], 2) }}</th>
    <th>{{ number_format($mediaRespostas['media_resp_2'], 2) }}</th>
    <th>{{ number_format($mediaRespostas['media_resp_3'], 2) }}</th>
    <th>{{ number_format($mediaRespostas['media_resp_4'], 2) }}</th>
    <th>{{ number_format($mediaRespostas['media_resp_5'], 2) }}</th>
  </tr>
</table>

<!-- Exibir média total (fora da tabela) -->


@endsection

@extends('layout.navbar')
@section('content')
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('css/forms.css') }}" rel="stylesheet" >
</head>
<body>
<form action="{{route('turmas-store')}}" method="post">
  @csrf
<h1>Qual sua turma?</h1>
    <select id="turmas" name="turmas">
    @foreach($turmas as $turma)
    <option value={{$turma->id_turma}}>{{$turma->nome_turma}}</option>
    @endforeach
    </select>
    <input type="submit" name="submit">
</form>
@include('layout.footer')
@endsection




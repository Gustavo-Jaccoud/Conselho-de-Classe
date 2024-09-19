@extends('layout.navbar')
@section('content')

<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
</head>
<form class="forms"action="{{route('cadresp')}}" method="post">
    @csrf
    <h4>Turma: {{app('App\Http\Controllers\Forms_controller')->NomeTurma($turma)}}</h4>
    <h4>Professor: {{app('App\Http\Controllers\Forms_controller')->NomeProf($professor)}}</h4>
    <br>
    <h4>1- Capacidade do(a) professor(a) de elaborar um planejamento sólido e bem estruturado, demonstrando, também, receptividade às opiniões e sugestões dos alunos.</h4>
    <input type="hidden" name="professor" value={{$professor}}>
    <input type="hidden" name="turma" value={{$turma}}>
    <input type="hidden" name="matricula" value={{$matricula}}>
    <input type="hidden" name="unidade" value={{$unidade}}>
    <input type="hidden" name="ano" value={{$ano}}>
    <input type="radio" name="pergunta_1" id="pergunta1_ruim" value="0">
    <label class="margem" for="pergunta1_ruim">Ruim</label>

    <input type="radio" name="pergunta_1" id="pergunta1_regular" value="0.5">
    <label for="pergunta1_regular">Regular</label>

    <input type="radio" name="pergunta_1" id="pergunta1_neutro" value="1">
    <label for="pergunta1_neutro">Neutro</label>

    <input type="radio" name="pergunta_1" id="pergunta1_bom" value="1.5">
    <label for="pergunta1_bom">Bom</label>

    <input type="radio" name="pergunta_1" id="pergunta1_muito_bom" value="2">
    <label for="pergunta1_muito_bom">Muito bom</label>
    <br>
    <br>
    <h4>2- Capacidade do(a) professor(a) em empregar uma linguagem apropriada, clara e compreensível para ministrar as aulas.</h4>
    <input type="radio" name="pergunta_2" id="pergunta2_ruim" value="0">
    <label class="margem" for="pergunta2_ruim">Ruim</label>

    <input type="radio" name="pergunta_2" id="pergunta2_regular" value="0.5">
    <label for="pergunta2_regular">Regular</label>

    <input type="radio" name="pergunta_2" id="pergunta2_neutro" value="1">
    <label for="pergunta2_neutro">Neutro</label>

    <input type="radio" name="pergunta_2" id="pergunta2_bom" value="1.5">
    <label for="pergunta2_bom">Bom</label>

    <input type="radio" name="pergunta_2" id="pergunta2_muito_bom" value="2">
    <label for="pergunta2_muito_bom">Muito bom</label>
    <br>
    <br>
    <h4>3- Envolvimento do(a) professor(a) no desempenho da turma, oferecendo auxílio e ouvindo e esclarecendo as dúvidas dos alunos.</h3>
        <input type="radio" name="pergunta_3" id="pergunta3_ruim" value="0">
        <label class="margem" for="pergunta3_ruim">Ruim</label>

        <input type="radio" name="pergunta_3" id="pergunta3_regular" value="0.5">
        <label for="pergunta3_regular">Regular</label>

        <input type="radio" name="pergunta_3" id="pergunta3_neutro" value="1">
        <label for="pergunta3_neutro">Neutro</label>

        <input type="radio" name="pergunta_3" id="pergunta3_bom" value="1.5">
        <label for="pergunta3_bom">Bom</label>

        <input type="radio" name="pergunta_3" id="pergunta3_muito_bom" value="2">
        <label for="pergunta3_muito_bom">Muito bom</label>
        <br>
        <br>
        <h4>4- Disponibilidade do(a) professor(a) para atender o aluno extraclasse.</h4>
        <input type="radio" name="pergunta_4" id="pergunta4_ruim" value="0">
        <label class="margem" for="pergunta4_ruim">Ruim</label>

        <input type="radio" name="pergunta_4" id="pergunta4_regular" value="0.5">
        <label for="pergunta4_regular">Regular</label>

        <input type="radio" name="pergunta_4" id="pergunta4_neutro" value="1">
        <label for="pergunta4_neutro">Neutro</label>

        <input type="radio" name="pergunta_4" id="pergunta4_bom" value="1.5">
        <label for="pergunta4_bom">Bom</label>

        <input type="radio" name="pergunta_4" id="pergunta4_muito_bom" value="2">
        <label for="pergunta4_muito_bom">Muito bom</label>
        <br>
        <br>
        <h4>5- As atividades e avaliações aplicadas pelo(a) professor(a) contribuem na compreensão e fixação do conteúdo ministrado.</h4>
        <input type="radio" name="pergunta_5" id="pergunta5_ruim" value="0">
        <label class="margem" for="pergunta5_ruim">Ruim</label>

        <input type="radio" name="pergunta_5" id="pergunta5_regular" value="0.5">
        <label for="pergunta5_regular">Regular</label>

        <input type="radio" name="pergunta_5" id="pergunta5_neutro" value="1">
        <label for="pergunta5_neutro">Neutro</label>

        <input type="radio" name="pergunta_5" id="pergunta5_bom" value="1.5">
        <label for="pergunta5_bom">Bom</label>

        <input type="radio" name="pergunta_5" id="pergunta5_muito_bom" value="2">
        <label for="pergunta5_muito_bom">Muito bom</label>
        <br>
        @if (isset($mensagens) && count($mensagens) > 0)
    
                    @foreach ($mensagens as $mensagem)
                        <br>
                        <p class='error'>{{ $mensagem }}</p>
                        @break
                    @endforeach
        @endif
        <br>
        <input type="submit" name="submit">
</form>

@endsection
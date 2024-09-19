@extends('layout.navbar')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sobre</title>
    <link rel="stylesheet" href="{{ asset('css/desenvolvedores.css')}}">
</head>

<body>
   
    <section>
        <h1>Conheça os desenvolvedores!</h1>
        <br>
        <div class="container">
            <label class="nome">Gustavo Cauã Jaccoud Ferreira</label>
            <div class="texto">
                <p class="_sobre">Discente ingressado no ano de 2019 no Curso de Informática.</p>
                <p class="contato">Contato: 20191180016@ifba.edu.br</p>
            </div>
        </div>

        <div class="container">
            <label class="nome">Samuel Anjos dos Santos</label>
            <div class="texto">
                <p class="_sobre">Discente ingressada no ano de 2019 no Curso de Informática.</p>
                <p class="contato">Contato: 20191180069@ifba.edu.br</p>
            </div>
        </div>

        <div class="container">
            <label class="nome">Monck Charles Albuquerque</label>
            <div class="texto">
                <p class="_sobre">Vigente Docente do Curso de Informática no IFBA-Campus Seabra e Orientador deste projeto.</p>
                <p class="contato">Contato: monckcna@gmail.com</p>
            </div>
        </div>
        
    </section>
</body>
@include('layout.footer')
@endsection
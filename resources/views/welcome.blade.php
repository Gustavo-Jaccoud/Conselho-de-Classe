@extends('layout.navbar')
@section('content')
<head>
  <meta charset="UTF-8">
  <link href="{{ asset('css/tela-inicial.css') }}" rel="stylesheet" >

</head>
<body>
<div class="showcase-area">
 <div class="container">
     <div class="left">
         <div class="title">
             <h1>Conselho de classe</h1>
             <h2>IFBA - Campus Seabra</h2>
         </div>
         <p class="text">O Conselho de Classe do Instituto Federal de Educação Ciência e Tecnologia da Bahia 
              previsto na Organização Didática, constitui a instância responsável pelo acompanhamento
              do processo pedagógico e pela avaliação do desempenho escolardas turmas da Educação
              Profissional Técnica de Nível Médio, nas formas integrada, concomitante e subsequente. 
              Tem funções consultiva e deliberativa pertinentes ao acompanhamento 
              do processo de ensino e aprendizagem, sendo instância de deliberação, avaliação, reflexão,
              discussão, decisão, ação e revisão da prática educativa.
         </p>
         <i> Fonte: Capítulo X - Normas Acadêmicas da Educação Profissional Técnica de Nível Médio do IFBA.</i>
     </div>
     <div class="right ">
         <img src="{{ asset('img/Online__lesson__11.svg') }}" alt="" class="person">
    </div>
 </div>
  </div>

@include('layout.footer')
@endsection




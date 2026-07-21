@extends('layout.site')

@section('content')

<!-- Corpo -->
  

    <!-- inicio banner -->
    @include('site.home.banner')
    <!-- fim banner -->

    <!-- inicio Bem vindo -->
    @include('site.home.bemvindo')
    <!-- fim bem vindo -->

    <!-- Destaque-inicio -->
    @include('site.home.destaque')
    <!-- destaque fim -->

    <!-- Cardápio inicio -->
    @include('site.home.cardapio')
    <!-- Cardápio fim -->

    <!-- Inicio equipe -->
    @include('site.home.equipe')
    <!-- equipe fim -->

    <!-- Eventos inicio -->
    @include('site.home.eventos')
    <!-- eventos fim -->

    <!-- Galeria inicio -->
    @include('site.home.galeria')
    <!-- Galeria fim -->

    <!-- Depoimentos inicio -->
    @include('site.home.depoimentos')
    <!-- Depoimentos Fim -->


<!-- FIM Corpo -->

    
@endsection
@extends('layout.site')

@section('content')

    <!-- INÍCIO BEM-VINDO -->
    @include('site.home.bemvindo')
    <!-- FIM BEM-VINDO -->

    <!-- INÍCIO EQUIPE -->
    @include('site.home.equipe')
    <!-- FIM EQUIPE -->

    <!-- INÍCIO DEPOIMENTOS -->
    @include('site.home.depoimentos')
    <!-- FIM DEPOIMENTOS -->

@endsection
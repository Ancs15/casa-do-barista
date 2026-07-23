@extends('layout.site')

@section('content')

<!-- INÍCIO DO BANNER -->
    @include('site.home.banner')
<!-- FIM DO BANNER -->

<!-- INÍCIO DO FORMULARIO -->
    @include('site.contato.form')
<!-- FIM DO FORMULÁRIO -->

<!-- INÍCIO DO MAPA -->
    @include('site.contato.mapa')
<!-- FIM DO MAPA -->

@endsection
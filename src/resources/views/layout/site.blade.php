<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- head -->
    @include('partials.head')

</head>
<body id="@yield('idBody')">
    
    <!-- inicio -->
    @include('partials.topo')

    <main>
        <!-- Area de conteúdo -->
        @yield('content')
    </main>

    <!-- footer -->
    @include('partials.rodape')

    <!-- scripts -->
    @include('partials.script')
</body>
</html>
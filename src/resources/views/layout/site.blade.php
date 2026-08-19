<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- head -->
    @include('partials.site.head')

</head>
<body id="@yield('idBody')">
    
    <!-- inicio -->
    @include('partials.site.topo')

    <main>
        <!-- Area de conteúdo -->
        @yield('content')
    </main>

    <!-- footer -->
    @include('partials.site.rodape')

    <!-- scripts -->
    @include('partials.site.script')
</body>
</html>
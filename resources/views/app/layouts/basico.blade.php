<!DOCTYPE html>
<html>
    <header>
        <meta charset="utf8" />
        <title>Super Gestão - @yield('titulo')</title>
        <link rel="stylesheet" href="{{asset('css/estilo_basico.css')}}" />
    </header>

    <body>
        @include('app.layouts._partials.topo')
        @yield('conteudo')
    </body>
</html>
<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filmes</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Filmes</h1>
        <a href="{{ route('logout')}}">Sair</a>
        @if (auth()->user()->admin)
        <a href="{{ route('create.filme') }}">Adicionar filmes</a>
        <a href="{{ route('create.cater') }}">Adicionar Categoria</a>
        @endif
    </header>

    <div class="container">
        @yield('content')
    </div>


</body>
</html>

@extends('includes.layout')

@section('content')
    <div class="film-filters">
        <form action="{{ route('filmes.index') }}" method="GET">
            <label for="ano">Filtrar por Ano:</label>
            <select name="ano" id="ano">
                <option value="">Todos</option>
                @foreach ($anos as $ano)
                    <option value="{{ $ano }}" {{ request('ano') == $ano ? 'selected' : '' }}>{{ $ano }}</option>
                @endforeach
            </select>
            <label for="categoria">Filtrar por Categoria:</label>
            <select name="categoria" id="categoria">
                <option value="">Todas</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>{{ $categoria->name }}</option>
                @endforeach
            </select>
            <button type="submit">Filtrar</button>
        </form>
    </div>
    <div class="film-gallery">
        @foreach ($filmes as $filme)
        <div class="film-card">
            <a href="{{ route('filmes.show', $filme->id) }}">

                    <img src="{{ asset('storage/' . $filme->imagem) }}" >
                    <p>{{ $filme->name }}</p>

            </a>
        @if (auth()->user()->admin)
            <div class="film-actions">
                <a href="#">Editar</a>
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este filme?')">Excluir</button>
                </form>

        </div>
        @endif
            </div>

        @endforeach
    </div>
@endsection

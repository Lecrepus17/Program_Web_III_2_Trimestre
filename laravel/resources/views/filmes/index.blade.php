@extends('includes.layout')

@section('content')
<form action="{{ route('filmes.index') }}" method="GET" class="filter-form-2">
    <div class="filter-group-2">
        <label for="ano">Filtrar por Ano:</label>
        <select name="ano" id="ano" class="filter-select-2">
            <option value="">Todos</option>
            @foreach ($anos as $ano)
                <option value="{{ $ano }}" {{ request('ano') == $ano ? 'selected' : '' }}>{{ $ano }}</option>
            @endforeach
        </select>
    </div>
    <div class="filter-group-2">
        <label for="categoria">Filtrar por Categoria:</label>
        <select name="categoria" id="categoria" class="filter-select-2">
            <option value="">Todas</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>{{ $categoria->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="filter-actions-2">
        <button type="submit" class="filter-button-2">Filtrar</button>
    </div>
</form>



<br>
    <div class="film-gallery">
        @foreach ($filmes as $filme)
        <div class="film-card">
            <a href="{{ route('filmes.show', $filme->id) }}">

                    <img src="{{ asset('storage/' . $filme->imagem) }}" >
                    <p>{{ $filme->name }}</p>

            </a>
        @if (auth()->user()->admin)
            <div class="film-actions">
                <a href="{{ route('edit.filme', $filme->id)}}">Editar</a>
                <a href="{{ route('cater.filme', $filme->id)}}">Categoria</a>
                <form action="{{ route('delete.filme', $filme->id) }}" method="POST">
                    @csrf
                    @method('GET')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este filme?')">Excluir</button>
                </form>

        </div>
        @endif
            </div>

        @endforeach
    </div>
@endsection

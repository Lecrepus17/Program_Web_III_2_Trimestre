@extends('includes.layout')

@section('content')

<a href="{{ route('create.filme') }}">Adicionar filmes</a>
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

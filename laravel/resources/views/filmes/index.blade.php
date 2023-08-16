@extends('includes.layout')

@section('content')

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

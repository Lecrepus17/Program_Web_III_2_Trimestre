@extends('includes.layout')

@section('content')
    <div class="film-gallery">
        @foreach ($filmes as $filme)
            <a href="{{ route('filmes.show', $filme->id) }}">
                <div class="film-card">
                    <img src="{{ asset('storage/' . $filme->imagem) }}" >
                    <p>{{ $filme->name }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection

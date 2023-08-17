@extends('includes.layout')

@section('content')
    <div class="film-card">
        <h2>{{ $filme->name }}</h2>
        <img src="{{ asset('storage/' . $filme->imagem) }}" alt="{{ $filme->name }}">
        <p>Sinopse: {{ $filme->sinopse }}</p>
        <p>Ano: {{ $filme->ano }}</p>
        <a href="{{$filme->link}}">link para o trailer no youtube</a>
        <!-- Adicione mais informações aqui -->
    </div>
@endsection

@extends('includes.layout')

@section('content')
    <div class="login-container">
        <form action="{{ url()->current() }}" method="post" class="login-form">
            @csrf
            <h2>Editar filme</h2>
            <input type="text" name="name" placeholder="Nome do filme" value="{{ old('name', $film->name ?? '') }}">
            <input type="text" name="sinopse" placeholder="Sinopse" value="{{ old('sinopse', $film->sinopse ?? '') }}">
            <input type="text" name="ano" placeholder="Ano">
            <input type="file" name="imagem" placeholder="Link da imagem">
            <input type="text" name="link" placeholder="Link do trailer">
            <input type="submit" value="Atualizar">
        </form>
    </div>
@endsection

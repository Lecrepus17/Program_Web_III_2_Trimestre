@extends('includes.layout')

@section('content')

<div class="login-container">
    <form action="{{ url()->current() }}" method="post" class="login-form">
        @csrf
        <h2>Adicionar filme</h2>
        <input type="text" name="name" placeholder="Nome do filme">
        <input type="text" name="sinopse" placeholder="Sinopse">
        <input type="text" name="ano" placeholder="Ano">
        <input type="file" name="imagem" placeholder="Link da imagem">
        <input type="text" name="link" placeholder="Link do trailer">
        <input type="submit" value="Adicionar">
    </form>
</div>
@endsection

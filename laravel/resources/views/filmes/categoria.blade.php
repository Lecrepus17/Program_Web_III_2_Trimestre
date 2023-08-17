@extends('includes.layout')

@section('content')

<div class="login-container">
    <form action="{{ url()->current() }}" method="post" class="login-form">
        @csrf
        <h2>Adicionar Categoria</h2>
        <input type="text" name="name" placeholder="Nome da categoria">
        <input type="submit" value="Adicionar">
    </form>
</div>
@endsection

@extends('includes.layout')

@section('content')
    <div class="user-edit">
        <h2>Editar Usuário</h2>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Nome:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
            <br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
            <br><br>
            <input type="submit" value="Salvar Alterações">
        </form>
    </div>
@endsection

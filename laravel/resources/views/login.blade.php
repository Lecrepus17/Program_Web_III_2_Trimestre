<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
</head>
<body>
@if (session('erro'))
    <div>{{ session('erro') }}</div>
@endif
<div class="login-container">

    <form action="{{ url()->current() }}" method="POST" class="login-form">
        @csrf
        <h1>Login</h1>
        <a href="{{ route('create.user') }}">Criar Conta</a>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
    </form>
</div>
</body>
</html>

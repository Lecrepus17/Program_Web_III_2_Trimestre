<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar usúario</title>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
</head>
<body>

<div class="login-container">

    <form action="{{ url()->current() }}" method="post" class="login-form">
        @csrf
        <h2>Adicionar usuários</h2>
        <a href="{{ route('login') }}">Logar</a>
        <input type="text" name="name" placeholder="Nome">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Senha">
        <input type="submit" value="Criar">
    </form>
</div>

</body>
</html>

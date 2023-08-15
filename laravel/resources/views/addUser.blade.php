<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add user</title>
</head>
<body>
        <h2>Adicionar usuários</h2>

    <form action="" method="post">

        @csrf
        <input type="text" name="name" placeholder="Nome">
        <br>
        <input type="text" name="email" placeholder="Email">
        <br>
        <input type="password" name="password" placeholder="Senha">
        <br>
        <input type="submit" value="Gravar">
    </form>
</body>
</html>

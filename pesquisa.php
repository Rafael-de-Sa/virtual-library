<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de usuários</title>
</head>

<body>
    <a href="todosusuarios.php">Listar todos os usuários</a>
    <form method="post" action="pesquisarusuario.php">
        <label for="usuario">Pesquisar: </label>
        <input type="text" name="usuario" id="usuario" placeholder="digite o nome do usuário">
        <input type="submit" value="Pesquisar">
    </form>
</body>

</html>
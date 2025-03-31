<?php
require_once("conexao.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($password === $password2) {
    //criptografar a sennha
    $password_hash = passwordCrypt($password);

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$name', '$email', '$password_hash')";
    if (mysqli_query($conn, $sql)) {
        echo "Usuário cadastrado com sucesso";
        header("refresh;5;url=index.php");
    }
} else {
    echo "As senhas não conferem";
    header("refresh;5;url=index.php");
}

function passwordCrypt($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

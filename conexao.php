<?php
//conexão banco de dados
$servidor = 'localhost';
$usuario = 'root';
$senha = "";
$baseDeDados = 'bd';


$conn = new mysqli($servidor, $usuario, $senha, $baseDeDados);
if ($conn->connect_error) {
    echo ("Falha na conexão");
}

//echo ("Conexão realizada com sucesso");
?>

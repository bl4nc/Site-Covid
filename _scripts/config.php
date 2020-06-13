<?php
$servidor = 'localhost';
$usuario = 'makete07_deve';
$senha = 'Make@2030';
$banco = 'makete07_corona_fsa';
// Conecta-se ao banco de dados MySQL
$mysqli = new mysqli($servidor, $usuario, $senha, $banco);
// Caso algo tenha dado errado, exibe uma mensagem de erro
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
?>
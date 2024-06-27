<?php
$host = "localhost:3306";
$user = "root";
$base = "bdAcademia";
$senha = "";

$con = mysqli_connect($host, $user, $senha, $base);

if (!$con) {
    die("Falha na Conexao: " . mysqli_connect_error());
}
?>
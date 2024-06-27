
<?php
session_start();
include 'verificar_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Index</title>
    <style type="text/css">
body {
    background-image: url(assets/agenda.png);
    background-position: center;
    background-repeat: no-repeat;
    padding-top: 696px;  
    width: 100%;
    height: 100%;
}

    </style>

</head>
<body>
<div id="sidebar-left">
    <ul>
        <li><a href="agenda.php">Index</a></li>
        <li><a href="consultar.php">Buscar Turma</a></li>
        <li><a href="listar.php">Listar Turmas</a></li>
        <li><a href="logout.php">Sair</a></li>
    </ul>
</div>

<div id="sidebar-right">
</div>
</body>
</html>
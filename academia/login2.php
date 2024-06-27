<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Se o usuário já está logado, redirecionar para agenda.php
if (isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] === true) {
    header("Location: agenda.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php
    if (isset($_GET['erro'])) {
        echo "<p style='color:red;'>Erro: " . htmlspecialchars($_GET['erro']) . "</p>";
    }
    if (isset($_GET['mensagem']) && $_GET['mensagem'] == 'logout_sucesso') {
        echo "<p style='color:green;'>Você saiu com sucesso.</p>";
    }
    ?>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="tipo">Tipo de Usuário:</label><br>
        <input type="radio" id="aluno" name="tipo" value="aluno" required>
        <label for="aluno">Aluno</label><br>
        <input type="radio" id="professor" name="tipo" value="professor" required>
        <label for="professor">Professor</label><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>

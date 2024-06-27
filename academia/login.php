<?php
session_start();
include 'conexao.php';

$email = $_POST['email'];
$password = $_POST['senha'];
$user_type = $_POST['tipo'];


if ($user_type == 'aluno') {
    $sql = "SELECT * FROM tbAluno WHERE email = '$email' AND senha = '$password'";
} else if ($user_type == 'professor') {
    $sql = "SELECT * FROM tbProfessor WHERE email = '$email' AND senha = '$password'";
}

$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_type'] = $user_type;
    $_SESSION['email'] = $user['email']; // Armazenando o e-mail na sessão
    $_SESSION["usuario_logado"] = true;
    
    
    if ($user_type == 'aluno') {
        if (isset($user['nome_aluno'])) {
            $_SESSION['nome'] = $user['nome_aluno'];
        }
    } else if ($user_type == 'professor') {
        if (isset($user['nome'])) {
            $_SESSION['nome'] = $user['nome'];
        }
    }

    // Redirecionar para o dashboard apropriado
    header("Location: parte.php");
    exit();
} else {
    header("Location: login2.php?erro=credenciais_incorretas");
    exit();
}

mysqli_close($con);
?>

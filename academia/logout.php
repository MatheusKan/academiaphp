<?php
session_start();
session_unset();
session_destroy();
header("Location: login2.php?mensagem=logout_sucesso");
exit();
?>

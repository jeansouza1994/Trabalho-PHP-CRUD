<?php
session_start();
if (! isset($_SESSION['autenticado'])) {
    echo '
    <script>
    window.location.href = "index.html";
    </script>
    ';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Bem-vindo ao sistema Web </h1>
    <p> Oi usuário admin</p>

    <a href="modulo_usuario/consulta.php"> Cadastro de usuarios </a>
</body>
</html>
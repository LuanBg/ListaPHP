<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogineSenha</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
$loginsalvo = "admin";
$senhasalva = "1234";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $login = htmlspecialchars($login, ENT_QUOTES, 'UTF-8');
    $senha = htmlspecialchars($senha, ENT_QUOTES, 'UTF-8');

    if ($login == $loginsalvo && $senha == $senhasalva) {
        echo "Bem-vindo!";
    } else {
        echo "Acesso negado!";
    }
} else {
    ?>
    <div class="wrapper">
        <form action="">
            <h1>Cadastro de Usuário</h1>
            <div class="input-box">
                <input type="login" placeholder="login" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Senha" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="btns">
            <button type="submit" class="btn1">Enviar</button>
            <button type="to-clean" class="btn2">Limpar</button>
            </div>
        </form>
    </div>
    <?php
}
?>


</body>
</html> 
 

 
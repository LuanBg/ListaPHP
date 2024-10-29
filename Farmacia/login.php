<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogineSenha</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to right, #a8e0ff, #c6f6d5);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.wrapper {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    width: 90%;
    max-width: 400px;
    text-align: center;
}
h1 {
    color: #ff6b6b;
    margin-bottom: 20px;
}
.input-box {
    margin: 15px 0;
}
.input-box input {
    width: 80%;
    padding: 12px;
    border: 2px solid #ff6b6b;
    border-radius: 5px;
    transition: border-color 0.3s;
}
.input-box input:focus {
    border-color: #ff3d3d;
    outline: none;
}
.btns {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}
button {
    background-color: #ff6b6b;
    color: white;
    border: none;
    padding: 12px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s, transform 0.2s;
    flex: 1;
    margin: 0 5px;
}
button:hover {
    background-color: #ff3d3d;
    transform: translateY(-2px);
}
.btn2 {
    background-color: #cccccc; 
}
.btn2:hover {
    background-color: #b3b3b3;
}
p {
    color: #333;
    margin-top: 15px;
}
    </style>
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
        <form action="cadastrar.php">
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
 

 
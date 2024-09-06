<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Idade</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h1>Informe a Idade</h1>
            <div class="input-box">
                <input type="number" name="idade" placeholder="idade" required>
            </div>
            <div class="btns">
                <button type="submit" class="btn1">Enviar</button>
                <button type="reset" class="btn2">Limpar</button>
            </div>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $idade = (int)$_POST['idade'];
            
            if ($idade >= 18) {
                echo "<p>Cadastro Permitido</p>";
            } else {
                echo "<p>Você não pode se cadastrar</p>";
            }
        }
        ?>
    </div>
</body>
</html>

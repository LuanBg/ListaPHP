<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #121212; 
            color: #ffffff; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .wrapper {
            background: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            width: 300px;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #e0e0e0; 
        }

        .input-box {
            margin-bottom: 15px;
        }

        .input-box input,
        .input-box select {
            width: 100%;
            padding: 10px;
            border: 1px solid #444; 
            border-radius: 4px;
            background: #2a2a2a; 
            color: #ffffff; 
        }

        .input-box label {
            display: block;
            margin-bottom: 5px;
            color: #e0e0e0; 
        }

        .btns {
            display: flex;
            justify-content: space-between;
        }

        .btn1, .btn2 {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn1 {
            background-color: #3e8e41;
            color: white;
        }

        .btn2 {
            background-color: #c62828; 
            color: white;
        }

        .btn1:hover {
            background-color: #357a3c; 
        }

        .btn2:hover {
            background-color: #b71c1c; 
        }

        .error {
            color: #c62828; 
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    
    <div class="wrapper">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Cadastro</h1>
            <div class="input-box">
                <input type="text" name="nome" placeholder="Nome completo" required>
            </div>
            <div class="input-box">
                <input type="date" name="data_nascimento" required>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="E-mail" required>
            </div>
            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha" required>
            </div>
            <div class="input-box">
                <input type="tel" name="telefone" placeholder="Telefone" required>
            </div>
            <div class="input-box">
                <input type="text" name="endereco" placeholder="Endereço" required>
            </div>
            <div class="input-box">
                <label>Sexo:</label><br>
                <select name="sexo" required>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
            </div>
            <div class="btns">
                <button type="submit" class="btn1">Cadastrar</button>
                <button type="reset" class="btn2">Limpar</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = trim($_POST['nome']);
            $data_nascimento = $_POST['data_nascimento'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $telefone = $_POST['telefone'];
            $endereco = $_POST['endereco'];
            $sexo = $_POST['sexo'];

            $emailValido = filter_var($email, FILTER_VALIDATE_EMAIL);
            $telefoneValido = preg_match('/^[0-9]+$/', $telefone);

            if (empty($nome)) {
                echo '<div class="error">O nome não pode estar vazio.</div>';
            } elseif (!$emailValido) {
                echo '<div class="error">Endereço de e-mail inválido.</div>';
            } elseif (!$telefoneValido) {
                echo '<div class="error">O número de telefone deve conter apenas dígitos.</div>';
            } elseif (!isAdulto($data_nascimento)) {
                echo '<div class="error">O paciente deve ser maior de idade.</div>';
            } else {
                header("Location: login.php");
                exit(); 
            }
        }


        function isAdulto($data_nascimento) {
            $data_nascimento = new DateTime($data_nascimento);
            $data_atual = new DateTime();
            $idade = $data_atual->diff($data_nascimento)->y;
            return $idade >= 18;
        }
        ?>
    </div>
    
</body>
</html>
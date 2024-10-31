<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #e0e0e0; 
        }

        .input-box {
            margin-bottom: 15px;
        }

        .input-box input {
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

        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            background-color: #3e8e41;
            color: white;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #357a3c; 
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Entre na sua conta</h2>
        <form method="POST" action="">
            <div class="input-box">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-box">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>
            </div>
            <button type="submit" class="btn">Entrar</button>
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcao = intval($_POST['opcao']);
    
    switch ($opcao) {
        case 1:
            echo "Seu saldo é R$ 1000,00.";
            break;
        case 2:
            echo "Depósito efetuado.";
            break;
        case 3:
            echo "Saque realizado.";
            break;
        case 4:
            echo "Saindo...";
            break;
        default:
            echo "Opção inválida.";
    }
}
?>

<form method="post">
    Escolha uma opção:<br>
    1 - Ver Saldo<br>
    2 - Depositar<br>
    3 - Sacar<br>
    4 - Sair<br>
    <input type="number" name="opcao" min="1" max="4" required>
    <input type="submit" value="Enviar">
</form>

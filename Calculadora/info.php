<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = floatval($_POST['num1']);
    $num2 = floatval($_POST['num2']);
    $operacao = $_POST['operacao'];
    
    switch ($operacao) {
        case '+':
            $resultado = $num1 + $num2;
            break;
        case '-':
            $resultado = $num1 - $num2;
            break;
        case '*':
            $resultado = $num1 * $num2;
            break;
        case '/':
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
            } else {
                $resultado = "Erro: Divisão por zero.";
            }
            break;
        default:
            $resultado = "Operação inválida.";
    }
    
    echo "Resultado: $resultado";
}
?>

<form method="post">
    Número 1: <input type="number" step="any" name="num1" required><br>
    Número 2: <input type="number" step="any" name="num2" required><br>
    Operação: 
    <select name="operacao">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br>
    <input type="submit" value="Calcular">
</form>

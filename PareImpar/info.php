<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = intval($_POST['numero']);
    
    if ($numero % 2 == 0) {
        echo "$numero é Par.";
    } else {
        echo "$numero é Ímpar.";
    }
}
?>

<form method="post">
    Número: <input type="number" name="numero" required>
    <input type="submit" value="Verificar">
</form>

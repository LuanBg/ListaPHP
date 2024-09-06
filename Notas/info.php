<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota = intval($_POST['nota']);
    
    switch ($nota) {
        case 10:
            echo "Classificação: A";
            break;
        case 9:
            echo "Classificação: B";
            break;
        case 8:
        case 7:
            echo "Classificação: C";
            break;
        case 6:
        case 5:
            echo "Classificação: D";
            break;
        default:
            echo "Classificação: F";
            break;
    }
}
?>

<form method="post">
    Nota (0-10): <input type="number" name="nota" min="0" max="10" required>
    <input type="submit" value="Enviar">
</form>

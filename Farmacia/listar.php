<?php

class Medicamento {
    public $nome;
    public $precoUnitario;
    public $quantidadeDisponivel;
    public $categorias;
    public $dataValidade;
}

$estoque = [];
$numMedicamentos = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
    $novoMedicamento = new Medicamento();
    
    $novoMedicamento->nome = $_POST['nome'];
    $novoMedicamento->precoUnitario = $_POST['precoUnitario'];
    $novoMedicamento->quantidadeDisponivel = $_POST['quantidadeDisponivel'];
    $novoMedicamento->categorias = explode(',', $_POST['categorias']);
    $novoMedicamento->dataValidade = $_POST['dataValidade'];

    $estoque[$numMedicamentos] = $novoMedicamento;
    $numMedicamentos++;
    echo "<script>alert('Medicamento cadastrado com sucesso!');</script>";
}

$medicamentoBuscado = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'buscar') {
    $nomeBuscado = trim($_POST['nomeBuscado']);
    
    foreach ($estoque as $medicamento) {
        if (strcasecmp($medicamento->nome, $nomeBuscado) == 0) {
            $medicamentoBuscado = $medicamento;
            break;
        }
    }
}

if (isset($_POST['ordenarPor'])) {
    $ordenarPor = $_POST['ordenarPor'];
    
    usort($estoque, function($a, $b) use ($ordenarPor) {
        switch ($ordenarPor) {
            case 'categoria':
                return strcmp(implode(',', $a->categorias), implode(',', $b->categorias));
            case 'nome':
                return strcmp($a->nome, $b->nome);
            case 'preco':
                return $a->precoUnitario <=> $b->precoUnitario;
        }
    });
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Medicamentos</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 20px;
    background: linear-gradient(to right, #a8e0ff, #c6f6d5);
    color: #333;
}
h1 {
    color: #ff6b6b;
    margin-bottom: 20px;
    text-align: center;
    font-size: 2.5em;
}
h2 {
    color: #333;
    margin-top: 30px;
    text-align: center;
    font-size: 2em;
}
form {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    margin: 20px auto;
    width: 90%;
    max-width: 500px;
    transition: transform 0.3s;
}
form:hover {
    transform: scale(1.02);
}
label {
    font-weight: bold;
    margin-top: 10px;
    display: block;
}
input[type="text"],
input[type="number"],
input[type="date"],
textarea {
    display: block;
    margin: 10px 0;
    padding: 12px;
    border: 2px solid #ff6b6b;
    border-radius: 5px;
    width: 100%;
    max-width: 400px;
    transition: border-color 0.3s;
}
input[type="text"]:focus,
input[type="number"]:focus,
input[type="date"]:focus,
textarea:focus {
    border-color: #ff3d3d;
    outline: none;
}
button {
    background-color: #ff6b6b;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s, transform 0.2s;
}
button:hover {
    background-color: #ff3d3d;
    transform: translateY(-2px);
}
ul {
    list-style-type: none;
    padding: 0;
    margin-top: 20px;
}
li {
    background: #ffffff;
    padding: 15px;
    margin: 10px 0;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}
li:hover {
    transform: translateY(-2px);
}

strong {
    display: inline-block;
    width: 150px; 
}
.error {
    color: #ff3d3d;
    margin: 15px 0;
    font-weight: bold;
    text-align: center;
}
    </style>
</head>
<body>
    <h1>Cadastro de Medicamentos</h1>
    
    <form method="POST">
        <input type="hidden" name="acao" value="cadastrar">
        <label for="nome">Nome do Medicamento:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="precoUnitario">Preço Unitário:</label>
        <input type="number" step="0.01" id="precoUnitario" name="precoUnitario" required>

        <label for="quantidadeDisponivel">Quantidade Disponível:</label>
        <input type="number" id="quantidadeDisponivel" name="quantidadeDisponivel" required>

        <label for="categorias">Categorias (separe por vírgula):</label>
        <textarea id="categorias" name="categorias" required></textarea>

        <label for="dataValidade">Data de Validade (YYYY-MM-DD):</label>
        <input type="date" id="dataValidade" name="dataValidade" required>

        <button type="submit">Cadastrar Medicamento</button>
    </form>

    <h2>Buscar Medicamento</h2>
    <form method="POST">
        <input type="hidden" name="acao" value="buscar">
        <label for="nomeBuscado">Nome do Medicamento:</label>
        <input type="text" id="nomeBuscado" name="nomeBuscado" required>
        <button type="submit">Buscar</button>
        <button type="submit"><a href="estoque.php">Olhar Estoque</a></button>
    </form>

    <h2>Ordenar Medicamentos</h2>
    <form method="POST">
        <input type="hidden" name="acao" value="ordenar">
        <label for="ordenarPor">Ordenar por:</label>
        <select id="ordenarPor" name="ordenarPor" required>
            <option value="categoria">Categoria</option>
            <option value="nome">Nome</option>
            <option value="preco">Preço</option>
        </select>
        <button type="submit">Ordenar</button>
    </form>

    <?php if ($medicamentoBuscado): ?>
        <h3>Medicamento Encontrado:</h3>
        <strong>Nome:</strong> <?= htmlspecialchars($medicamentoBuscado->nome) ?><br>
        <strong>Preço Unitário:</strong> R$<?= number_format($medicamentoBuscado->precoUnitario, 2, ',', '.') ?><br>
        <strong>Quantidade Disponível:</strong> <?= $medicamentoBuscado->quantidadeDisponivel ?><br>
        <strong>Categorias:</strong> <?= implode(', ', $medicamentoBuscado->categorias) ?><br>
        <strong>Data de Validade:</strong> <?= $medicamentoBuscado->dataValidade ?><br>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'buscar'): ?>
        <p>Nenhum medicamento encontrado com o nome "<?= htmlspecialchars($nomeBuscado) ?>".</p>
    <?php endif; ?>

    <h2>Medicamentos Cadastrados</h2>
    <?php if ($numMedicamentos > 0): ?>
        <ul>
            <?php foreach ($estoque as $medicamento): ?>
                <li>
                    <strong>Nome:</strong> <?= htmlspecialchars($medicamento->nome) ?><br>
                    <strong>Preço Unitário:</strong> R$<?= number_format($medicamento->precoUnitario, 2, ',', '.') ?><br>
                    <strong>Quantidade Disponível:</strong> <?= $medicamento->quantidadeDisponivel ?><br>
                    <strong>Categorias:</strong> <?= implode(', ', $medicamento->categorias) ?><br>
                    <strong>Data de Validade:</strong> <?= $medicamento->dataValidade ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum medicamento cadastrado.</p>
    <?php endif; ?>
</body>
</html>

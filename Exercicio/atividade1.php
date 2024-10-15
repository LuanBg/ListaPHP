<?php
function cadastrarProdutos() {
    $produtos = [];
    for ($i = 0; $i < 5; $i++) {
        $nome = readline("Digite o nome do produto: ");
        $preco = floatval(readline("Digite o preço do produto: R$ "));
        $produtos[] = ['nome' => $nome, 'preco' => $preco];
    }
    return $produtos;
}

function calcularPrecos($produtos) {
    $abaixo50 = 0;
    $entre50e100 = [];
    $somaAcima100 = 0;
    $contagemAcima100 = 0;

    foreach ($produtos as $produto) {
        if ($produto['preco'] < 50) {
            $abaixo50++;
        } elseif ($produto['preco'] >= 50 && $produto['preco'] <= 100) {
            $entre50e100[] = $produto['nome'];
        } elseif ($produto['preco'] > 100) {
            $somaAcima100 += $produto['preco'];
            $contagemAcima100++;
        }
    }

    $mediaAcima100 = $contagemAcima100 > 0 ? $somaAcima100 / $contagemAcima100 : 0;

    echo "Quantidade de produtos com preço inferior a R$50,00: $abaixo50\n";
    echo "Produtos com preço entre R$50,00 e R$100,00: " . implode(", ", $entre50e100) . "\n";
    echo "Média dos preços dos produtos com preço superior a R$100,00: R$ " . number_format($mediaAcima100, 2) . "\n";
}

function main() {
    $produtos = cadastrarProdutos();
    calcularPrecos($produtos);
}

main();
?>
<?php
function cadastrarNumeros() {
    $numeros = [];
    for ($i = 0; $i < 10; $i++) {
        $numero = intval(readline("Digite um número: "));
        $numeros[] = $numero;
    }
    return $numeros;
}

function analisarNumeros($numeros) {
    $negativos = 0;
    $positivos = 0;
    $pares = 0;
    $impares = 0;

    foreach ($numeros as $numero) {
        if ($numero < 0) {
            $negativos++;
        } elseif ($numero > 0) {
            $positivos++;
        }
        if ($numero % 2 == 0) {
            $pares++;
        } else {
            $impares++;
        }
    }

    echo "Quantidade de negativos: $negativos\n";
    echo "Quantidade de positivos: $positivos\n";
    echo "Quantidade de pares: $pares\n";
    echo "Quantidade de ímpares: $impares\n";
}

function main() {
    $numeros = cadastrarNumeros();
    analisarNumeros($numeros);
}

main();
?>
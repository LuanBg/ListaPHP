<?php
function cadastrarAlunos() {
    $alunos = [];
    for ($i = 0; $i < 10; $i++) {
        $nome = readline("Digite o nome do aluno: ");
        $nota = floatval(readline("Digite a nota do aluno: "));
        $alunos[] = ['nome' => $nome, 'nota' => $nota];
    }
    return $alunos;
}

function calcularMediaEMaior($alunos) {
    $totalNotas = 0;
    $maiorAluno = $alunos[0];

    foreach ($alunos as $aluno) {
        $totalNotas += $aluno['nota'];
        if ($aluno['nota'] > $maiorAluno['nota']) {
            $maiorAluno = $aluno;
        }
    }

    $media = $totalNotas / count($alunos);

    echo "Média de notas da classe: " . number_format($media, 2) . "\n";
    echo "Aluno com a maior nota: " . $maiorAluno['nome'] . " com nota " . number_format($maiorAluno['nota'], 2) . "\n";
}

function main() {
    $alunos = cadastrarAlunos();
    calcularMediaEMaior($alunos);
}

main();
?>
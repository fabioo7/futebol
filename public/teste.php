<?php

// Array de jogadores com nome e nível
$jogadores = [
    ['nome' => 'Jogador 1', 'nivel' => 1],
    ['nome' => 'Jogador 2', 'nivel' => 5],
    ['nome' => 'Jogador 3', 'nivel' => 3],
    ['nome' => 'Jogador 4', 'nivel' => 6],
    ['nome' => 'Jogador 5', 'nivel' => 1],
    ['nome' => 'Jogador 6', 'nivel' => 3],
    ['nome' => 'Jogador 7', 'nivel' => 6],
    ['nome' => 'Jogador 8', 'nivel' => 3],
    ['nome' => 'Jogador 9', 'nivel' => 1],
    ['nome' => 'Jogador 10', 'nivel' => 3],
    ['nome' => 'Jogador 11', 'nivel' => 3],
    ['nome' => 'Jogador 12', 'nivel' => 3],
];

// Inicializar os times
$time1 = [];
$time2 = [];

// Ordenar jogadores pelo nível (do menor para o maior)
usort($jogadores, function ($a, $b) {
    return $a['nivel'] - $b['nivel'];
});

// Distribuir jogadores entre os times de forma equilibrada
foreach ($jogadores as $jogador) {
    // Adicionar jogador ao time com menor somatório de níveis
    if (array_sum(array_column($time1, 'nivel')) <= array_sum(array_column($time2, 'nivel'))) {
print        $time1[] = $jogador;
    } else {
print        $time2[] = $jogador;
    }
}

// Exibir a formação dos times
echo "Time 1:\n";
foreach ($time1 as $jogador) {
    echo " - " . $jogador['nome'] . " (Nível " . $jogador['nivel'] . ")<br>";
}

echo "\nTime 2:\n";
foreach ($time2 as $jogador) {
    echo " - " . $jogador['nome'] . " (Nível " . $jogador['nivel'] . ")<br>";
}

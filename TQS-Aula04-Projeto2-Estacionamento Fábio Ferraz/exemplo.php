<?php

/**
 * exemplo.php — campo de experiências.
 *
 * Este ficheiro serve para experimentarem a classe Estacionamento à mão,
 * sem ser através dos testes. Corram-no no terminal com:
 *
 *     php exemplo.php
 *
 * Ao lado de cada linha está, em comentário, o valor que DEVERIA aparecer
 * se o código estivesse correto. Comparem com o que aparece no ecrã:
 * onde forem diferentes, é porque o código ainda tem um erro por corrigir.
 *
 * Estes valores são DIFERENTES dos que estão nos testes, de propósito,
 * para poderem explorar outros casos. Experimentem mudar os números!
 */

require_once __DIR__ . '/src/Estacionamento.php';

$parque = new Estacionamento();

echo "--- Clientes normais ---\n";

// 5 minutos: ainda dentro dos 15 grátis.
echo "5 min:    " . $parque->calcularPreco(5)   . "   (deveria ser 0)\n";

// 30 minutos: tira 15 grátis = 15 min a pagar = 1 hora começada = 1,50.
echo "30 min:   " . $parque->calcularPreco(30)  . "   (deveria ser 1.5)\n";

// 90 minutos: tira 15 = 75 min = 2 horas começadas = 3,00.
echo "90 min:   " . $parque->calcularPreco(90)  . "   (deveria ser 3)\n";

// 200 minutos: tira 15 = 185 min = 4 horas começadas = 6,00.
echo "200 min:  " . $parque->calcularPreco(200) . "   (deveria ser 6)\n";

echo "\n--- Clientes residentes (50% de desconto) ---\n";

// 45 min, residente: 1 hora = 1,50, com metade = 0,75.
echo "45 min:   " . $parque->calcularPreco(45, true)  . "   (deveria ser 0.75)\n";

// 90 min, residente: 3,00 com metade = 1,50.
echo "90 min:   " . $parque->calcularPreco(90, true)  . "   (deveria ser 1.5)\n";

echo "\n--- Casos especiais ---\n";

// Muito tempo: bate no máximo diário de 12,00 (residente leva metade = 6,00).
echo "500 min res: " . $parque->calcularPreco(500, true) . "   (deveria ser 6)\n";

// Tempo negativo: isto lança um erro de propósito.
// Tirem o // da linha seguinte para verem o que acontece.
// echo $parque->calcularPreco(-10);

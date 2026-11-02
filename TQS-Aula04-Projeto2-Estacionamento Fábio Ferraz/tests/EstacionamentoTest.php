<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Estacionamento.php';

/**
 * Testes do Estacionamento.
 *
 * Estes testes são o "juiz": dizem se o código está certo.
 * Na versão com erros, alguns destes testes FALHAM.
 */
class EstacionamentoTest extends TestCase
{
    private Estacionamento $parque;

    // Corre antes de CADA teste. Prepara um estacionamento novo.
    protected function setUp(): void
    {
        $this->parque = new Estacionamento();
    }

    // 10 minutos: dentro da cortesia (15 grátis). Paga 0.
    public function testDentroDaCortesiaNaoPaga(): void
    {
        $this->assertSame(0.0, $this->parque->calcularPreco(10));
    }

    // 15 minutos exatos: ainda é grátis (o limite é inclusive).
    public function testQuinzeMinutosAindaEGratis(): void
    {
        $this->assertSame(0.0, $this->parque->calcularPreco(15));
    }

    // 16 minutos: passou a cortesia. 1 minuto a pagar = 1 hora começada = 1,50.
    public function testUmMinutoAposCortesiaPagaUmaHora(): void
    {
        $this->assertSame(1.50, $this->parque->calcularPreco(16));
    }

    // 75 minutos: tira 15 grátis = 60 min a pagar = 1 hora = 1,50.
    public function testSetentaECincoMinutosPagaUmaHora(): void
    {
        $this->assertSame(1.50, $this->parque->calcularPreco(75));
    }

    // 76 minutos: tira 15 = 61 min = 2 horas começadas = 3,00.
    public function testSetentaESeisMinutosPagaDuasHoras(): void
    {
        $this->assertSame(3.00, $this->parque->calcularPreco(76));
    }

    // Muito tempo (ex.: 600 min): daria mais de 12, mas o máximo é 12.
    public function testNuncaPassaDoMaximoDiario(): void
    {
        $this->assertSame(12.00, $this->parque->calcularPreco(600));
    }

    // Residente, 16 minutos: 1,50 com 50% desconto = 0,75.
    public function testResidenteTemMetadeDoPreco(): void
    {
        $this->assertSame(0.75, $this->parque->calcularPreco(16, true));
    }

    // Tempo negativo: tem de dar erro.
    public function testTempoNegativoDaErro(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->parque->calcularPreco(-5);
    }
}

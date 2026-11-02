<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Carrinho.php';

/**
 * Testes do Carrinho.
 *
 * Estes testes são o "juiz": dizem se o código está certo ou errado.
 * Na versão com erros, alguns destes testes FALHAM. É esse o objetivo
 * do exercício: correr os testes, ver o que falha e corrigir o código.
 */
class CarrinhoTest extends TestCase
{
    public function testCarrinhoVazioTemTotalZero(): void
    {
        $carrinho = new Carrinho();
        $this->assertSame(0.0, $carrinho->total());
    }

    public function testTotalComUmArtigo(): void
    {
        $carrinho = new Carrinho();
        $carrinho->adicionar("Livro", 10.0, 2);
        // 10 x 2 = 20
        $this->assertSame(20.0, $carrinho->total());
    }

    public function testTotalComDoisArtigos(): void
    {
        $carrinho = new Carrinho();
        $carrinho->adicionar("Livro", 10.0, 2);
        $carrinho->adicionar("Caneta", 5.0, 3);
        // (10 x 2) + (5 x 3) = 20 + 15 = 35
        $this->assertSame(35.0, $carrinho->total());
    }

    public function testQuantidadeZeroNaoEpermitida(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $carrinho = new Carrinho();
        $carrinho->adicionar("Livro", 10.0, 0);
    }

    public function testPrecoZeroNaoEpermitido(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $carrinho = new Carrinho();
        $carrinho->adicionar("Livro", 0.0, 1);
    }
}

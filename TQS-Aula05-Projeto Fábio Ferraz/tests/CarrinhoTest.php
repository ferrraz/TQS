<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Carrinho.php';

/**
 * Testes da classe Carrinho.
 *
 * Aqui vais escrever os testes dos exercicios P5.1 e P5.2.
 * O primeiro teste ja esta feito, para servir de exemplo.
 * Segue sempre o padrao AAA (Arrange, Act, Assert) e nomes descritivos.
 */
class CarrinhoTest extends TestCase
{
    private Carrinho $carrinho;

    protected function setUp(): void
    {
        // Corre antes de cada teste: cada teste comeca com um carrinho novo.
        $this->carrinho = new Carrinho();
    }

    // ================================================================
    // P5.1  Primeiros testes  (exemplo ja feito + os teus testes)
    // ================================================================

    public function testTotalVazioEhZero(): void
    {
        // Arrange ja feito no setUp()
        $this->assertSame(0, $this->carrinho->total());      // Act + Assert
    }

    public function testCarrinhoEstaVazio(): void
    {
        $this->assertEmpty($this->carrinho->itens()); // Act + Assert
    }

    public function testTotalComTresArtigos(): void
    {
        $this->carrinho->adicionar('A', 10, 2);           // Arrange
        $this->carrinho->adicionar('B', 5, 1);
        $this->carrinho->adicionar('C', 15, 1);
        $this->assertSame(40, $this->carrinho->total());
    }

    public function testMostrarTotalArtigos(): void
    {
        $this->carrinho->adicionar("Livro", 10.0, 2);
        $this->carrinho->adicionar("Caneta", 10.0, 5);
        $this->carrinho->adicionar("Lapis", 10.0, 2);
        $this->assertSame(9, $this->carrinho->numeroDeArtigos());
    }

    public function testTotalComUmArtigo(): void
    {
        $this->carrinho->adicionar('A', 10, 2);
        $this->assertSame(20, $this->carrinho->total());
    }

    public function testTotalComDoisArtigos(): void
    {
        $this->carrinho->adicionar('A', 10, 2);
        $this->carrinho->adicionar('B', 5, 1);
        $this->assertSame(25, $this->carrinho->total());
    }

    public function testCarrinhoComArtigoNaoEstaVazio(): void
    {
        $this->carrinho->adicionar('A', 10, 1);
        $this->assertNotEmpty($this->carrinho->itens());
    }

    public function testQuantidadeZeroErro(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->carrinho->adicionar('A', 10, 0);
    }

    public function testQuantidadeMaiorQue20Erro(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->carrinho->adicionar('A', 10, 21);
    }

    public function testPrecoNegativoErro(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->carrinho->adicionar('A', -10, 2);
    }

    // TODO P5.1: escreve os testes em falta. Ideias:
    //   - total com um artigo (ex.: 'A', preco 10, qt 2  ->  20)
    //   - total com dois artigos
    //   - total com tres artigos
    //   - numero de artigos no carrinho
    //   - carrinho novo esta vazio / carrinho com artigo nao esta vazio
    //
    // Exemplo de como seria um teste (apaga este comentario quando o escreveres):
    //
    // public function testTotalComDoisArtigos(): void
    // {
    //     $this->carrinho->adicionar('A', 10, 2);           // Arrange
    //     $this->carrinho->adicionar('B', 5, 1);
    //     $this->assertSame(25, $this->carrinho->total());  // Act + Assert
    // }


    // ================================================================
    // P5.2  Testar excecoes
    // ================================================================

    // TODO P5.2: escreve testes que confirmem que o codigo lanca excecao quando deve.
    //   - quantidade zero lanca InvalidArgumentException
    //   - quantidade acima de 20 lanca excecao
    //   - preco negativo lanca excecao
    //   - usa expectExceptionMessage para verificar a mensagem em pelo menos um
    //
    // Lembra-te da ordem: primeiro expectException, SO DEPOIS a chamada que da erro.
    //
    // public function testQtZeroLevantaErro(): void
    // {
    //     $this->expectException(InvalidArgumentException::class);
    //     $this->carrinho->adicionar('A', 10, 0);
    // }
}

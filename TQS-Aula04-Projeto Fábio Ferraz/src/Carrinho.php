<?php

class Carrinho
{
    private array $itens = [];

    public function adicionar(string $nome, float $preco, int $quantidade): void
    {
        if ($preco <= 0) {
            throw new InvalidArgumentException("O preço tem de ser maior que zero.");
        }

        if ($quantidade > 20 || $quantidade < 1) {
            throw new InvalidArgumentException("A quantidade tem de estar entre 1 e 20.");
        }

        $this->itens[] = [$nome, $preco, $quantidade];
    }

    public function total(): float
    {
        if(empty($this->itens)){
            return 0;
        }else{
            $total = 0.0;
            foreach ($this->itens as [$nome, $preco, $quantidade]) {
                $total += $preco * $quantidade;
            }
            return $total;
        }
    }

    public function numeroDeArtigos(): int
    {
        return count($this->itens);
    }
}

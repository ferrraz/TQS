# Projeto da Aula 4 — Carrinho

Este é o projeto de base para o exercício P4.2.

A classe `Carrinho` (em `src/Carrinho.php`) tem **três erros escondidos**.
Os testes (em `tests/CarrinhoTest.php`) servem de juiz: alguns vão falhar.

## O que fazer

1. Instalar o PHPUnit (um ficheiro só):
   ```
   php -r "copy('https://phar.phpunit.de/phpunit-11.phar', 'phpunit');"
   php phpunit --version
   ```

2. Correr os testes e ver o que falha:
   ```
   php phpunit tests
   ```

3. Ler cada falha, perceber o que está errado no código e corrigir.

4. Voltar a correr os testes até ficarem todos verdes.

## Regras

- Não se mexe nos testes. Mexe-se só no código em `src/Carrinho.php`.
- O objetivo é deixar os cinco testes a passar.

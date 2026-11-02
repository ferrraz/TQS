# Projeto 2 — Estacionamento (exercício)

Um segundo projeto, um pouco mais complexo que o Carrinho. Calcula o preço
de um estacionamento com base no tempo, num tarifário com escalões, num
limite máximo diário e num desconto para residentes.

A classe `Estacionamento` (em `src/Estacionamento.php`) vem **comentada**,
com as regras de negócio explicadas no início do ficheiro. Mas tem
**erros escondidos**: alguns testes vão falhar.

## As regras de negócio

1. O tempo conta-se em minutos.
2. Os primeiros 15 minutos são grátis.
3. Depois, cada hora COMEÇADA custa 1,50 euros (ex.: 61 minutos já são 2 horas).
4. O valor máximo por dia é 12,00 euros.
5. Os residentes têm 50% de desconto no valor final.
6. O tempo não pode ser negativo (dá erro).

## Tarefa principal: encontrar e corrigir os erros

1. Instalar o PHPUnit (um ficheiro só):
   ```
   php -r "copy('https://phar.phpunit.de/phpunit-11.phar', 'phpunit');"
   php phpunit --version
   ```

2. Correr os testes e ver o que falha:
   ```
   php phpunit tests
   ```

3. Ler cada falha, perceber o que está errado em `src/Estacionamento.php`
   e corrigir. Repetir até os testes ficarem todos verdes.

Regra: não se mexe nos testes. Mexe-se só no código.

## Desafio extra: escrever 2 testes vossos

Depois de corrigirem os erros, acrescentem **2 testes novos** ao ficheiro
`tests/EstacionamentoTest.php`. Pensem em casos que ainda não estão testados.

Um teste segue sempre três passos: preparar, executar, verificar.

Exemplo de um teste que podem escrever:

```php
// Teste: 135 minutos. Tira 15 grátis = 120 min = 2 horas = 3,00 euros.
public function testDuasHorasCertas(): void
{
    $parque = new Estacionamento();              // preparar
    $preco = $parque->calcularPreco(135);        // executar
    $this->assertSame(3.00, $preco);             // verificar
}
```

Ideias para os vossos 2 testes:
- Um residente que fica muito tempo (ex.: 600 minutos). Quanto paga?
  (Primeiro o máximo de 12,00, depois metade: deve dar 6,00.)
- Exatamente 60 minutos a pagar (ex.: 75 minutos). É 1 hora ou 2?
- Um tempo mesmo no limite da cortesia (ex.: 15 vs. 16 minutos).

Confirmem sempre a conta à mão antes de escrever o resultado esperado.

## Experimentar à mão (ficheiro exemplo.php)

Além dos testes, o projeto traz um ficheiro `exemplo.php` para
experimentarem o código à vontade. Corram-no com:

```
php exemplo.php
```

Ele chama a classe com vários valores (diferentes dos testes) e mostra o
resultado no ecrã, com o valor correto ao lado em comentário. Onde os dois
forem diferentes, é um erro por corrigir. Mudem os números e explorem.

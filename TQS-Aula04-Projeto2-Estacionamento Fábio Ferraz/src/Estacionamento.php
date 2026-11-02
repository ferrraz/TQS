<?php

/**
 * Estacionamento — cálculo do preço a pagar.
 *
 * REGRAS DE NEGÓCIO
 * -----------------
 *  1. O tempo conta-se em minutos.
 *  2. Os primeiros 15 minutos são grátis.
 *  3. Depois, cada hora começada custa 1,50 euros.
 *  4. O valor máximo por dia é 12,00 euros.
 *  5. Os residentes têm 50% de desconto no valor final.
 *  6. O tempo não pode ser negativo.
 */
class Estacionamento
{
    private const MINUTOS_GRATIS = 15;
    private const PRECO_POR_HORA = 1.50;
    private const MAXIMO_DIARIO = 12.00;
    private const DESCONTO_RESIDENTE = 0.50;

    /**
     * Calcula o preço a pagar.
     *
     * @param int  $minutos    Tempo estacionado, em minutos.
     * @param bool $residente  True se o cliente for residente.
     * @return float           O valor a pagar, em euros.
     */
    public function calcularPreco(int $minutos, bool $residente = false): float
    {
        // O tempo não pode ser negativo.
        if ($minutos <= 0) {
            throw new InvalidArgumentException("O tempo não pode ser negativo.");
        }

        // Dentro do período de cortesia: não se paga nada.
        if ($minutos <= self::MINUTOS_GRATIS) {
            return 0.0;
        }

        // Minutos que contam para pagamento.
        $minutosAPagar = $minutos - self::MINUTOS_GRATIS;

        // Número de horas começadas.
        $horas = ceil($minutosAPagar / 60);

        // Preço base.
        $preco = $horas * self::PRECO_POR_HORA;

        // Nunca passar do máximo diário.
        if ($preco > self::MAXIMO_DIARIO) {
            $preco = self::MAXIMO_DIARIO;
        }

        // Desconto de residente.
        if ($residente) {
            $preco = $preco * self::DESCONTO_RESIDENTE;
        }

        return $preco;
    }
}

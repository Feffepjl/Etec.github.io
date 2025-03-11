<?php
class Calculadora
{
    public $valor1;
    public $valor2;
    public $operacao;
    public function __construct($valor1, $valor2, $operacao)
    {
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
        $this->operacao = $operacao;
    }
    public function Calcular()
    {
        switch ($this->operacao) {
            case '+':
                $resultado = $this->valor1 + $this->valor2;
                break;
            case '-':
                $resultado = $this->valor1 - $this->valor2;
                break;
            case '*':
                $resultado = $this->valor1 * $this->valor2;
                break;
            case '/':
                if ($valor2 == 0) {
                    $resultado = "ERRO";
                } else {
                    $resultado = $this->valor1 / $this->valor2;
                }
                break;
        }
        return $resultado;
    }
}

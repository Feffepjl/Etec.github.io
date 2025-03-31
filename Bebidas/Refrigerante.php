<?php

namespace Bebidas;
require_once "Bebida.php";
class Refrigerante extends Bebida {
    private bool $retornavel;

    public function mostrarBebida(){
        $nome = $this->getNome();
        $preco = $this->getPreco();
        $retornavel = $this->retornavel;

        echo "Nome: {$nome}, Preço: {$preco}, Retornável? {$retornavel}. </br>";
    }

    public function verificaPreco($preco) {
        if ($preco < 5) {echo "False";} else {echo "True";}
    }

    public function isRetornavel(): bool
    {
        return $this->retornavel;
    }

    public function setRetornavel(bool $retornavel): void
    {
        $this->retornavel = $retornavel;
    }



}
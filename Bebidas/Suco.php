<?php

namespace Bebidas;
require_once "Bebida.php";

class Suco extends Bebida {
    private String $Sabor;

    public function mostrarBebida(){
        $nome = $this->getNome();
        $preco = $this->getPreco();
        $sabor = $this->getSabor();
        echo "Nome: {$nome}, Preco: {$preco}, Sabor: {$sabor}. </br>";

    }

    public function verificaPreco($preco){
        if ($preco < 2.5) {echo "False";} else {echo "True";}
    }
    public function getSabor(): string
    {
        return $this->Sabor;
    }

    public function setSabor(string $Sabor): void
    {
        $this->Sabor = $Sabor;
    }

}
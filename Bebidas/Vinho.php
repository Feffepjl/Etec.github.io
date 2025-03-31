<?php

namespace Bebidas;
require_once "Bebida.php";
class Vinho extends Bebida {
    private int $safra;
    private String $tipo;

    public function getSafra(): int
    {
        return $this->safra;
    }

    public function setSafra(int $safra): void
    {
        $this->safra = $safra;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function mostraBebida(): void {
        $nome = $this->getNome();
        $preco = $this->getPreco();
        $safra = $this->getSafra();
        $tipo = $this->getTipo();
        echo "Nome: {$nome}, Preço: {$preco}, Safra: {$safra}, Tipo: {$tipo}. </br>";
    }
    public function verificaPreco($preco) {
//        return !($preco >= 25);
        if ($preco < 25) {
            echo "False";
        } else {
            echo "True ";
        }
    }
}
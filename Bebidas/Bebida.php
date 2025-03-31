<?php

namespace Bebidas;

abstract class Bebida {
    private String $nome;
    private float $preco;

    public function __construct() {
    }


    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }
    public function mostraBebida() {
    }
    public function verificaPreco(float $preco){
    }

}
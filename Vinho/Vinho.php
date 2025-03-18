<?php

class Vinho
{
    private $nome;
    private $tipo;
    private $preco;
    private $safra;

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    /**
     * @return mixed
     */
    public function getSafra()
    {
        return $this->safra;
    }

    /**
     * @param mixed $safra
     */
    public function setSafra($safra)
    {
        $this->safra = $safra;
    }

    public function mostrarVinho(){
        echo "Nome: " . $this->nome .  ", Tipo: " . $this->tipo .  ", Preco: " . $this->preco .  ", Safra: " . $this->safra . "\n";
    }
    public function verificarPreco($preco){
        if ($this->preco < 25){
            return "true\n";
        }  else {
            return "false\n";
        }
    }

}
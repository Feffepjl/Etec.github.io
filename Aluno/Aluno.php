<?php

class Aluno {
    private $matricula;
    private $nome;
    private $nota1;
    private $nota2;
    private $nota3;
    private $nota4;
    private $media;
    private $situacao;

//    public function __construct($matricula, $nome, $nota1, $nota2, $nota3, $nota4, $media) {
//        $this->matricula = $matricula;
//        $this->nome = $nome;
//        $this->nota1 = $nota1;
//        $this->nota2 = $nota2;
//        $this->nota3 = $nota3;
//        $this->nota4 = $nota4;
//        $this->media = $media;
//    }
    public function __construct() {

    }

    public function calcularMedia($nota1, $nota2, $nota3, $nota4) {
        $this->media = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
        return $this->media;
    }
    public function calcularSituacao() {
        if ($this->media >= 7) { $this->situacao = "Aprovado";}
        else if ($this->media >= 5) {$this->situacao = "Em recuperação";}
        else { $this->situacao = "Reprovado";}
    }
    public function apresentarSituacao() {
        $info = "Matrícula do aluno: {$this->getMatricula()}
        Nome do aluno: {$this->getNome()}
        Nota 1: {$this->getNota1()}
        Nota 2: {$this->getNota2()}
        Nota 3: {$this->getNota3()}
        Nota 4: {$this->getNota4()}
        Media: {$this->getMedia()}
        Situação: {$this->getSituacao()}";
        return $info;
    }
    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

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
    public function getNota1()
    {
        return $this->nota1;
    }

    /**
     * @param mixed $nota1
     */
    public function setNota1($nota1)
    {
        $this->nota1 = $nota1;
    }

    /**
     * @return mixed
     */
    public function getNota2()
    {
        return $this->nota2;
    }

    /**
     * @param mixed $nota2
     */
    public function setNota2($nota2)
    {
        $this->nota2 = $nota2;
    }

    /**
     * @return mixed
     */
    public function getNota3()
    {
        return $this->nota3;
    }

    /**
     * @param mixed $nota3
     */
    public function setNota3($nota3)
    {
        $this->nota3 = $nota3;
    }

    /**
     * @return mixed
     */
    public function getNota4()
    {
        return $this->nota4;
    }

    /**
     * @param mixed $nota4
     */
    public function setNota4($nota4)
    {
        $this->nota4 = $nota4;
    }

    /**
     * @return mixed
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param mixed $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * @return mixed
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * @param mixed $situacao
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }
}
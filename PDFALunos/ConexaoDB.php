<?php


require 'vendor/autoload.php';

class ConexaoDB extends \PDO
{
    public function __construct($host, $port, $dbname, $username, $password)
    {
        try {
            parent::__construct("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Erro de conexão com banco de dados: ' . $e->getMessage();
            exit;
        }
    }
}


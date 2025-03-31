<?php

use Bebidas\Refrigerante;
use Bebidas\Suco;
use Bebidas\Vinho;

require_once "Refrigerante.php";
require_once "Suco.php";
require_once "Vinho.php";

$vinho = new Vinho();
$suco = new Suco();
$refrigerante = new Refrigerante();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do vinho</title>
    <link rel="stylesheet" href="../Aluno/style.css">
</head>
<body>
<form action="" method="post">
    <div class="container">
        <label>
            <input type="text" name="nome" placeholder="Nome do Vinho:" value="<?= $_POST['nome'] ?? ''; ?>">
            <input type="number" name="valor" placeholder="Valor do vinho:" value="<?= $_POST['valor'] ?? ''; ?>">
            <input type="text" name="tipo" placeholder="Tipo do vinho:" value="<?= $_POST['tipo'] ?? ''; ?>">
            <input type="text" name="safra" placeholder="Safra:" value="<?= $_POST['safra'] ?? ''; ?>">
            <input type="submit" name="btnVerificar" value="Verificar">
        </label>
    </div>
</form>
<?php
if (isset($_POST['btnVerificar'])) {
    $vinho->setNome($_POST['nome']);
    $vinho->setPreco($_POST['valor']);
    $vinho->setTipo($_POST['tipo']);
    $vinho->setSafra($_POST['safra']);
}
?>
<div class="result">
    <h1>Informações do vinho</h1>
    <p><strong>Sobre o vinho: </strong><?= $vinho->mostraBebida()?></p>
    <p><strong>Preço maior que 25? </strong><?= $vinho->verificaPreco($vinho->getPreco());?></p>
</div>
</body>
</html>

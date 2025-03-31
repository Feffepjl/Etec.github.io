<?php

use Bebidas\Suco;

require_once "Suco.php";


$suco = new Suco();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Suco</title>
    <link rel="stylesheet" href="../Aluno/style.css">
</head>
<body>
<form action="" method="post">
    <div class="container">
        <label>
            <input type="text" name="nome" placeholder="Nome do suco:" value="<?= $_POST['nome'] ?? ''; ?>">
            <input type="number" name="valor" placeholder="Valor do suco:" value="<?= $_POST['valor'] ?? ''; ?>">
            <input type="text" name="sabor" placeholder="Sabor do suco:" value="<?= $_POST['sabor'] ?? ''; ?>">
            <input type="submit" name="btnVerificar" value="Verificar">
        </label>
    </div>
</form>
<?php
if (isset($_POST['btnVerificar'])) {
    $suco->setNome($_POST['nome']);
    $suco->setPreco($_POST['valor']);
    $suco->setSabor($_POST['sabor']);
}
?>
<div class="result">
    <h1>Informações do suco</h1>
    <p><strong>Sobre o suco: </strong><?= $suco->mostrarBebida()?></p>
    <p><strong>Preço maior que 2.5? </strong><?= $suco->verificaPreco($suco->getPreco());?></p>
</div>
</body>
</html>


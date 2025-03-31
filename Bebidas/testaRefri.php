<?php

use Bebidas\Refrigerante;

require_once "Refrigerante.php";

$refrigerante = new Refrigerante();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Refri</title>
    <link rel="stylesheet" href="../Aluno/style.css">
</head>
<body>
<form action="" method="post">
    <div class="container">
        <label>
            <input type="text" name="nome" placeholder="Nome do Refri:" value="<?= $_POST['nome'] ?? ''; ?>">
            <input type="number" name="valor" placeholder="Valor do Refri:" value="<?= $_POST['valor'] ?? ''; ?>">
            <input type="radio" name="retornavel" value="True"> Sim
            <input type="radio" name="retornavel" value="False"> Não
            <input type="submit" name="btnVerificar" value="Verificar">
        </label>
    </div>
</form>
<?php
if (isset($_POST['btnVerificar'])) {
    $refrigerante->setNome($_POST['nome']);
    $refrigerante->setPreco($_POST['valor']);
    $retornavel = $_POST['retornavel'] == 'True';
    $refrigerante->setRetornavel($retornavel);
}
?>
<div class="result">
    <h1>Informações do refri</h1>
    <p><strong>Sobre o Refri: </strong><?= $refrigerante->mostrarBebida()?></p>
    <p><strong>Preço maior que 5? </strong><?= $refrigerante->verificaPreco($refrigerante->getPreco());?></p>
</div>
</body>
</html>

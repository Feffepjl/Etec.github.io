<?php
require_once 'Vinho.php';
$vinho = new Vinho();
$vinho->setNome("Cabernet Sauvignon");
$vinho->setTipo("Tinto");
$vinho->setPreco(30);
$vinho->setSafra(2018);
$precoVinho = $vinho->getPreco();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Vinho</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            max-height: 300px;
            margin: auto;
        }
        h1 {
            text-align: center;
            color: #8B0000;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Informações do Vinho</h1>
    <?php
    echo $vinho->mostrarVinho()."\n";
    echo $vinho->verificarPreco($precoVinho)."\n";
    ?>
</div>

</body>
</html>
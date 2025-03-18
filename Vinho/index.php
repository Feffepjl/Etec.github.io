<?php
require_once 'Vinho.php';
$vinho = new Vinho();
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
    <form action="" method="post">
        <div class="container">
            <label>
                <input type="text" name="Nome" placeholder="Nome do vinho:">
                <input type="text" name="Tipo" placeholder="Tipo do vinho:">
                <input type="text" name="Preco" placeholder="Preço do vinho:">
                <input type="text" name="Safra" placeholder="Safra do vinho:">
                <input type="submit" name="btnVerificar">
            </label>
        </div>
    </form>
    <?php
    if(isset($_POST['btnVerificar'])) {
        $vinho->setNome($_POST['Nome']);
        $vinho->setTipo($_POST['Tipo']);
        $vinho->setPreco($_POST['Preco']);
        $vinho->setSafra($_POST['Safra']);
        $precoVinho = $vinho->getPreco();
    }
    ?>
    <div class="container">
        <h1>Informações do Vinho</h1>
        <?php
        if(isset($_POST['btnVerificar'])) {
            echo $vinho->mostrarVinho() . "\n";
            echo $vinho->verificarPreco($precoVinho) ? "Produto em oferta" : "Produto com preço normal";
        }
        ?>
    </div>

</body>
</html>
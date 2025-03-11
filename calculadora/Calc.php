

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
</head>
<body>
<h2>Calculadora</h2>
<form action="" method="POST">
    <input type="text" name="valor1" placeholder="Digite o primeiro número" required>
    <input type="text" name="valor2" placeholder="Digite o segundo número" required>
    <select name="operacao">
        <option value="+" name="+" id="+">+</option>
        <option value="-">-</option>
        <option value="*">X</option>
        <option value="/">/</option>
    </select>
    <button type="submit" name="btnVerificar" id="btnVeriicar">=</button>
    <br><br>
<?php
    include 'Calculadora.php';
    if (isset($_POST['btnVerificar'])) {
        $valor1 = $_POST['valor1'];
        $valor2 = $_POST['valor2'];
        $operacao = $_POST['operacao'];

        $calculadora = new Calculadora($valor1, $valor2, $operacao);
        $resultado = $calculadora->Calcular();

    }
?>
    <label>Resultado:</label>
    <h3><?= $resultado ?></h3>
</form>
</body>
</html>
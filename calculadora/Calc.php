<?php
    include 'calculadora/Calculadora.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $operacao = $_POST['operacao'];

    $calculadora = new Calculadora($valor1, $valor2, $operacao);
    echo $calculadora->Calcular();

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
</head>
<body>
<h2>Calculadora</h2>
<form action="calculadora/calc.php" method="POST">
    <input type="text" name="valor1" placeholder="Digite o primeiro número" required>
    <input type="text" name="valor2" placeholder="Digite o segundo número" required>
    <select name="operacao">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">X</option>
        <option value="/">/</option>
    </select>
    <button type="submit">=</button>
    <br><br>
    <label>Resultado:</label>
    <input type="text" value="<?= $resultado ?>" readonly>
</form>
</body>
</html>
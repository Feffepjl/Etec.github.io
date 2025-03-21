
<?php
require_once 'Aluno.php';
$aluno = new Aluno();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="" method="post">
    <div class="container">
        <label>
            <input type="text" name="matricula" placeholder="Matrícula do aluno:">
            <input type="text" name="nome" placeholder="Nome do aluno:">
            <input type="text" name="nota1" placeholder="Nota 1 do aluno:">
            <input type="text" name="nota2" placeholder="Nota 2 do aluno:">
            <input type="text" name="nota3" placeholder="Nota 3 do aluno:">
            <input type="text" name="nota4" placeholder="Nota 4 do aluno:">
            <input type="submit" name="btnVerificar" value="Verificar">
        </label>
    </div>
</form>
<?php
if(isset($_POST['btnVerificar'])) {
    $aluno->setMatricula($_POST['matricula']);
    $aluno->setNome($_POST['nome']);
    $aluno->setNota1($_POST['nota1']);
    $aluno->setNota2($_POST['nota2']);
    $aluno->setNota3($_POST['nota3']);
    $aluno->setNota4($_POST['nota4']);
    $mediaAluno = $aluno->calcularMedia($aluno->getNota1(), $aluno->getNota2(), $aluno->getNota3(), $aluno->getNota4());
    $aluno->calcularSituacao();
    $situacaoAluno = $aluno->apresentarSituacao();

}
?>
<div class="result">
    <h1>Informações do Aluno</h1>
    <p><strong>Matrícula:</strong> <?php echo $aluno->getMatricula(); ?></p>
    <p><strong>Nome:</strong> <?php echo $aluno->getNome(); ?></p>
    <p><strong>Média Final:</strong> <?php echo number_format($aluno->getMedia(), 2); ?></p>
    <p><strong>Situação</strong> <?php echo $aluno->getSituacao(); ?></p>
</div>

</body>
</html>

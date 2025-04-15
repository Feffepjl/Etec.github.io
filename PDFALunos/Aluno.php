<?php

use Mpdf\Mpdf;
use Mpdf\MpdfException;

class Aluno
{

    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function gerarRelatorio()
    {
        try {
            $query = "SELECT nome, email, curso, data_cadastro FROM aluno";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $html = '<h1>Escola - Lista de alunos</h1>
            <table>
            <tr>
                <th>Nome</th>
                <th>email</th>
                <th>curso</th>
                <th>Data de cadastro</th>
            </tr>';

            foreach ($alunos as $aluno) {
                $html .= '<tr>
                            <td>' . $aluno['nome'] . '</td>
                            <td>' . $aluno['email'] . '</td>
                            <td>' . $aluno['curso'] . '</td>
                            <td>' . $aluno['data_cadastro'] . '</td>
                        </tr>';
            }
            $html .= '</table>';
            $this->mpdf = new Mpdf();
            $this->mpdf->WriteHTML($html);
            $this->mpdf->Output();

        } catch (MpdfException $e) {
            echo 'Erro ao gerar PDF: ' . $e->getMessage();
        } catch (PDOException $e) {
            echo 'Erro ao consultar banco de dados: ' . $e->getMessage();
        }
    }
}
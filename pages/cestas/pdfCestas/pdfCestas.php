<?php
require_once '../../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

include "../../../connection/conexao.php";
$banco = new conexao();
$con = $banco->getConexao();

$consulta_cestas = "SELECT id_saidaEstoque, quantidade_saidaEstoque, DATE_FORMAT(data_saidaEstoque, '%d/%m/%Y') as dataSaida,  usuario.nome_usuario, responsavel_familia.nome_responsavel
FROM saidaEstoque INNER JOIN usuario on saidaEstoque.usuario_saidaEstoque = usuario.id_usuario INNER JOIN responsavel_familia on saidaEstoque.responsavel_saidaEstoque = responsavel_familia.id_responsavel;";


$result_cestas = $con->prepare($consulta_cestas);

$result_cestas->execute();

$dados = "<!DOCTYPE html>";
$dados .= "html lang-'pt-br'";
$dados .= "<head>";
$dados .= "<meta chartset 'UTF-8'>";
$dados .= "<style>
                body{
                    font-family: helvetica;
                }
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                    padding: 5px;
                }
            </style>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h1 style='text-align: center'>Relatório de Cestas Doadas</h1><br>";
$dados .= "<table style='text-align: center;margin: auto;'>
        <tr>
            <th>Quantidade</th>
            <th>Data de saída</th>
            <th>Usuário</th>
            <th>Responsável</th>
        </tr>";

while ($row_cestas = $result_cestas->fetch(PDO::FETCH_ASSOC)) {
    extract($row_cestas);
    $dados .= "<tr>
            <td> $quantidade_saidaEstoque </td>
            <td> $dataSaida </td>
            <td> $nome_usuario</td>
            <td> $nome_responsavel</td>
        </tr>";
}

$dompdf->loadHtml($dados);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("relatoriocestas.pdf", array("Attachment" => false));
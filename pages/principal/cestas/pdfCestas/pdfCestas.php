<?php
require_once '../../../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

include "../../../../connection/conexao.php";
$banco = new conexao();
$con = $banco->getConexao();

$consulta_cestas = "SELECT id_cestas, quantidade_cestas, recebimento_cestas FROM cestas";

$result_cestas = $con->prepare($consulta_cestas);

$result_cestas->execute();

$dados = "<!DOCTYPE html>";
$dados .= "html lang-'pt-br'";
$dados .= "<head>";
$dados .= "<meta chartset 'UTF-8'>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h1>Relatório de Cestas Doadas</h1><br>";

while($row_cestas = $result_cestas->fetch(PDO::FETCH_ASSOC)){
    extract($row_cestas);
    $dados .= "ID: $id_cestas<br>";
    $dados .= "Quantidade: $quantidade_cestas<br>";
    $dados .= "Data de Recebimento: $recebimento_cestas<br>";
    $dados .= "<hr>";
}

$dompdf->loadHtml($dados);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream("relatoriocestas.pdf", array("Attachment" => false));

        

?> 
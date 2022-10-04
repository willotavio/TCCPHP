<?php
require_once '../../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

include "../../../connection/conexao.php";
$banco = new conexao();
$con = $banco->getConexao();

$consulta_cestas = "SELECT cestas.quantidade_cestas, 
cestas.recebimento_cestas,cestas.usuario_cestas, 
usuario.nome_usuario FROM cestas INNER JOIN usuario 
ON cestas.usuario_cestas=usuario.id_usuario";


$result_cestas = $con->prepare($consulta_cestas);

$result_cestas->execute();

$dados = "<!DOCTYPE html>";
$dados .= "html lang-'pt-br'";
$dados .= "<head>";
$dados .= "<meta chartset 'UTF-8'>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h1 style='text-align: center'>Relatório de Cestas Doadas</h1><br>";

while ($row_cestas = $result_cestas->fetch(PDO::FETCH_ASSOC)) {
    extract($row_cestas);
    $dados .= "Quantidade: $quantidade_cestas<br>";
    $dados .= "Data de Recebimento: $recebimento_cestas<br>";
    $dados .= "Usuário: $nome_usuario<br>";
    $dados .= "<hr>";
}

$dompdf->loadHtml($dados);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("relatoriocestas.pdf", array("Attachment" => false));
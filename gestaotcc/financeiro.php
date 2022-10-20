
<?php
#apresentar o cabeçalho 
include "cabecalho.php";

echo "<h1>tipos de receitas";
echo "clique <a href='cad_tipodereceita.php'>Clique aqui</a> para novo tipo de receita.<br><br>";

# inicializar a variável  $campoordemdaconsulta
$campoordemdaconsulta="ID";

# verificar se o parâmetro $campoordemdaconsulta foi passado pelo método GET
if(isset($_GET["campoordemdaconsulta"])){
    # atribui á variavel $campoordemdaconsulta o valor de parámetro passado 
    $campoordemdaconsulta=$_GET["campoordemdacpnsulta"];

}

echo "<form action='lst_tipodereceita.php' method='GET'>";
echo "<label>ordenar por</label>";
echo "<select name='campoordemdaconsulta>";

if ($campoordemdaconsulta =='ID'){
 echo "<option value='ID' selected>ID</option>";
}else{ 
    echo "<option value='ID'>ID</option>";

}

if ($campoordemdaconsulta=='nome') {
    echo "<option value='nome' selected>nome</option>";
}else{
    echo "<option value='nome'>nome</option>";
        
}

echo "</select>";
echo "<input type='submit' name='botaoordemconsulta' value=atualizar>";
echo "</form>";

# define qual view será ultilizado na consulta 
$ComandoSelect='';
#se o comando ordem da consulta for igual a ID vai ser ultilizada a view criada ID "view_tipodereceitaID"
if ($campoordemdaconsulta=='ID'){
    $ComandoSelect="Select * From view_tipodereceita_nome;";
}
#se o campoordemdaconsulta for nome a variavel comandoSelect ela armazena a view_tipodereceitanome
if ($campoordemdaconsulta=='nome'){
    $ComandoSelect="Select * From view_tipodereceita_nome;";
# após esse pacote de comandos ser executado a variavel comandoSelect ela vai armazenar uma das duas opções "ou a consulta sendo ordenada pelo ID ou a consulta sendo ordenada pelo nome" 
}

#conectar banco de dados 
include "conectar_bancodedados.php";

#executar a consulta 
$resultadodaconsulta = myql_query ($ComandoSelect ) or print (myql_error());

#vereficar o número de linhas (registros) apresentado na consulta 
#"se o resultado da consulta for 0 se nenhuma linha se nenhum registro for apresentado, então a função mysql_num_rows ela verefica quantas linhas quantos registros foram apresentados na consulta" ," se o resultado se o numero de linhas apresentadas for 0 vai apenas apresentar 9não há registros) caso ao contrário no echo cria a tabela com três colunas  com alterações ID e nome"
if (myql_num_rows ($resultadodaconsulta)==0){
    echo"não há registros";
}else{
    echo "<tabela border='1'><tr><td>operações</td><td>ID</td><td>nome</td></tr>";
    while  ($linhadaconsulta = mysql_fetch_array($resultadodaconsulta)){
        $campoID=$linhadaconsulta["ID"];
        $camponome=$linhadaconsulta["nome"];
        echo "<tr>";
        echo "<td><a href='cad_tipodereceita.php?campoID=$campoID&camponome=camponome'><alterar</a> - ".
        "<a href='excluirtipodereceita.php?campoID=$campoID'>excluir</a>".
        "</td>";
        echo"<td>$campoID</td>";
        echo"<td>$camponome</td>";
        echo"</tr>";
    }
    echo"</table>";

}

echo "<br></br>";
echo "clique <a href='cad_tipodereceita.php> aqui</a> para NOVO tipo de receita.<br></br>";

?>





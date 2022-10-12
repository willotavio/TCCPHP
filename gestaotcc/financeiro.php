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
<?php

$Servidor  ="localhost";
$Usuario = "root";
$Senha   ="123";
// mysql_connect: função PHP que concta com o Servidor Mysql
$ServidorConectado=mysql_connect ($Servidor,$Usuario,$Senha) or die ('não foi possivel conectar com o Servidor Mysql');

$bancodedados = "financeiro";
//mysql_select_db: função PHP que acessa o banco de dado 
$ResultadoAcessarBD=mysql_select_db($bancodedados,$ServidorConectado);

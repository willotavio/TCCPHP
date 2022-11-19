<?php
session_start();
if ((!isset($_SESSION['nomeUsuario']) == true) and (!isset($_SESSION['tipoUsuario']) == true)) {
    unset($_SESSION['nomeUsuario']);
    unset($_SESSION['tipoUsuario']);
    header('location: ../../index.php');
} else {
    $logado = $_SESSION['idUsuario'];
    include_once('../../connection/conexao.php');
    $banco = new conexao();
    $con = $banco->getConexao();
    $sql = "select id_usuario, nome_usuario, tipo_usuario, email_usuario, imagem_usuario from usuario where id_usuario = '$logado'";
    $result = $con->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            $idUsuario = $row['id_usuario'];
            $emailUsuario = $row['email_usuario'];
            $imagemUsuario = $row['imagem_usuario'];
            $nomeUsuario = $row['nome_usuario'];
            $tipoUsuario = $row['tipo_usuario'];
        }
    }
}

$quantidadeEntrada = 5;
$paginaEntrada = (isset($_GET['paginaEntrada']))?(int)$_GET['paginaEntrada']:1;
$inicioEntrada = ($quantidadeEntrada * $paginaEntrada) - $quantidadeEntrada;

$quantidadeSaida = 5;
$paginaSaida = (isset($_GET['paginaSaida']))?(int)$_GET['paginaSaida']:1;
$inicioSaida = ($quantidadeSaida * $paginaSaida) - $quantidadeSaida;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../imgs/favicon.ico" type="image/x-icon">
    <title>Conta</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    <?php include '../../css/style.css';
    ?>
    </style>
</head>

<header>
    <nav class="navbar navbar-expand-lg headerNavBar">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home.php"><img src='../../imgs/logo2.png' width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navBarLinks" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="../responsavelFamilia/responsavelFamilia.php">Famílias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cestas/cestas.php">Cestas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../financeiro/financeiro.php">Financeiro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../funcionarios/funcionarios.php">Funcionários</a>
                    </li>
                </ul>

                <li class="nav-item dropdown dropDownMenu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo '<img src="data:../../imgs/conta;base64,' . base64_encode($imagemUsuario) . '" style="border-radius:50px;width: 40px; height: 40px;">' ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="conta.php">Ver perfil</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="../../crud/login/sair.php">Sair</a>
                        </li>
                    </ul>
                </li>

            </div>
        </div>
    </nav>
</header>

<body>

    <div class="modal fade" id="modalfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container modalHeaderColorCenter">
                        <h5 class="modal-title" id="exampleModalLongTitle">Editar
                            Foto</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../../crud/contaIMG/imagemControle.php" autocomplete="off"
                        enctype="multipart/form-data">
                        <div class="mt-3 mb-3">
                            <label for="foto" class="form-control" id="lblArquivoCriarConta">Escolha uma Foto
                                de Perfil</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success" name='botao' value='Alterar'>Alterar</button>
                    <button type="submit" class="btn btn-outline-danger" name='botao' value='Deletar'>Remover
                        Foto</button>
                    </form>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalConfigurações" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container modalHeaderColorCenter">
                        <h5 class="modal-title" id="exampleModalLongTitle">Alterar minhas informações</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <form action='../../crud/criarConta/editarConta.php' method='POST' autocomplete="off">

                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="number" name="id" required placeholder="ID"
                                value=<?php echo $idUsuario?> readonly>
                            <label class="labelCadastro">ID</label>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="text" name="nome" required placeholder="Nome"
                                value=<?php echo $nomeUsuario?>>
                            <label class="labelCadastro">Nome</label>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="email" name="email" required
                                placeholder="Email" value=<?php echo $emailUsuario?>>
                            <label class="labelCadastro">Email</label>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="text" name="tipo" required placeholder="Tipo"
                                value=<?php 
                                if($tipoUsuario == "A"){
                                    echo "Administrador";
                                }else if ($tipoUsuario == "F"){
                                    echo "Funcionário";
                                }
                            ?> readonly>
                            <label class="labelCadastro">Tipo</label>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                    <input type='submit' class='btn btn-outline-success' name='Atualizar' value='Atualizar'>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 ">
                <div class="container" id="containerConta">
                    <div class="card">
                        <?php echo '<img  class="card-img-top" src="data:../../imgs/conta;base64,' . base64_encode($imagemUsuario) . '" style="padding:10px; border-radius:50%">' ?>
                        <div class="card-body">
                            <div class="container" id="iconAccount">
                                <a data-bs-toggle="modal" data-bs-target="#modalfoto">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path fill-rule="evenodd"
                                            d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
                                    </svg>
                                </a>
                            </div>
                            <p class="card-text">
                                <?php echo "<p style='font-size:90%'><b>NOME: $nomeUsuario</b></p>" ?>
                                <?php echo "<p style='font-size:90%'><b>EMAIL: $emailUsuario</b></p>" ?>
                            </p>
                            <div class="container">
                                <?php if ($tipoUsuario == "F") {
                                    echo "<p style='color:blue; border: 2px solid blue; border-radius:10px; display: inline-block; padding:3px; font-size:0.8rem'>FUNCIONARIO</p>";
                                } else if ($tipoUsuario == "A") {
                                    echo "<p style='color:red; border: 2px solid red; border-radius:10px; display: inline-block; padding:3px; font-size:0.8rem'>ADMINISTRADOR</p>";
                                } else {
                                    echo "<p><b>ERRO</b></p>";
                                }
                                ?>
                            </div>
                            <div class="container containerAjustes">
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#modalConfigurações">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-gear" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                        <path
                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                    </svg> Ajustes
                                </button>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#modalfoto" id="fotoButton">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-camera-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path
                                            d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
                                    </svg> Alterar Foto
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h4 style="color:green; text-align:center">Entrada de Cestas</h4>
                <div class="overflow-auto">
                    <ul class="pagination justify-content-center navPaginacao">
                        <?php
            $con = mysqli_connect("localhost","root","","ong");
            $sqlTotal = "SELECT id_entradaEstoque FROM entradaEstoque WHERE usuario_entradaEstoque = $logado";
            $qrTotal = mysqli_query($con, $sqlTotal) or die( mysqli_error($con));
            $numTotal = mysqli_num_rows($qrTotal);
            $totalPaginaEntrada = ceil($numTotal/$quantidadeEntrada);
    
        ?>
                        <li class="page-item"><span class="page-link"><?php echo "Total: ".$numTotal ?></span></li>
                        <li class="page-item"><a class="page-link"
                                href="?menuop=entradaEstoque&paginaEntrada=1">Primeira página</a></li>
                        <?php

            if($paginaEntrada>3){
        ?>
                        <li class="page-item"><a class="page-link"
                                href="?menuop=entradaEstoque&paginaEntrada=<?php echo $paginaEntrada-1?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                </svg></a>
                        </li>
                        <?php
        }

            for($i=1;$i<=$totalPaginaEntrada;$i++){
            if($i>=($paginaEntrada-5) && $i <= ($paginaEntrada+5)){
                if($i==$paginaEntrada){
                    ?>
                        <li class="page-item"><span class="page-link active"><?php echo $i ?></span></li>
                        <?php
                }else{
                    ?>
                        <li class="page-item"><a class="page-link"
                                href="?menuop=entradaEstoque&paginaEntrada= <?php echo $i ?>"> <?php echo $i?> </a>
                        </li>
                        <?php
                }  
                }
            }

            if($paginaEntrada< ($totalPaginaEntrada-5)){
                ?>
                        <li class="page-item"><a class="page-link"
                                href="?menuop=entradaEstoque&paginaEntrada=<?php echo $paginaEntrada+1 ?>"> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg> </a>
                        </li>
                        <?php
                }
                ?>
                        <li class="page-item"><a class="page-link"
                                href="?menuop=entradaEstoque&paginaEntrada=<?php echo $totalPaginaEntrada ?>">Última
                                página</a></li>
                        <?php
                ?>
                    </ul>
                    <div class="column">
                        <div class="m-2 ">
                            <table class="table" style="color:green">
                                <thead>
                                    <th scope="col" style='text-align:center; width: 33%'>Quantidade</th>
                                    <th scope="col" style='text-align:center; width: 33%'>Data de Recebimento</th>
                                </thead>
                                <tbody>
                                    <?php 
                                        
                                        include_once ("../../connection/conexao.php");
                                        $sql= "SELECT id_entradaEstoque,quantidade_entradaEstoque, DATE_FORMAT(data_entradaEstoque, '%d/%m/%Y') as dataEntrada, usuario.nome_usuario
                                        FROM entradaEstoque LEFT JOIN usuario on entradaEstoque.usuario_entradaEstoque = usuario.id_usuario where id_usuario = $logado
                                        LIMIT $inicioEntrada, $quantidadeEntrada";
                                        $banco = new conexao();
                                        $con = $banco->getConexao();
                                        $result = $con->query($sql);
                                        while($row = $result->fetch()){
                                            ?>
                                    <tr>
                                        <td>
                                            <span
                                                id="quantidade<?php echo $row['id_entradaEstoque']; ?>"><?php echo $row['quantidade_entradaEstoque']; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                id="recebimento<?php echo $row['id_entradaEstoque']; ?>"><?php echo $row['dataEntrada']; ?>
                                            </span>
                                        </td>

                                    </tr>
                                    <?php
                                                }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="container tabelaRelatorio" style="margin-top:60px">
                    <h4 style="color:green; text-align:center">Saída de Cestas</h4>
                    <div class="overflow-auto">
                        <ul class="pagination justify-content-center navPaginacao">
                            <?php
            $con = mysqli_connect("localhost","root","","ong");
            $sqlTotal = "SELECT id_saidaEstoque FROM saidaEstoque WHERE usuario_saidaEstoque = $logado";
            $qrTotal = mysqli_query($con, $sqlTotal) or die( mysqli_error($con));
            $numTotal = mysqli_num_rows($qrTotal);
            $totalPaginaSaida = ceil($numTotal/$quantidadeSaida);
    
        ?>
                            <li class="page-item"><span class="page-link"><?php echo "Total: ".$numTotal ?></span></li>
                            <li class="page-item"><a class="page-link"
                                    href="?menuop=saidaEstoque&paginaSaida=1">Primeira página</a></li>
                            <?php

            if($paginaSaida>3){
        ?>
                            <li class="page-item"><a class="page-link"
                                    href="?menuop=SaidaEstoque&paginaSaida=<?php echo $paginaSaida-1?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                                    </svg></a>
                            </li>
                            <?php
        }

            for($i=1;$i<=$totalPaginaSaida;$i++){
            if($i>=($paginaSaida-5) && $i <= ($paginaSaida+5)){
                if($i==$paginaSaida){
                    ?>
                            <li class="page-item"><span class="page-link active"><?php echo $i ?></span></li>
                            <?php
                }else{
                    ?>
                            <li class="page-item"><a class="page-link"
                                    href="?menuop=saidaEstoque&paginaSaida= <?php echo $i ?>"> <?php echo $i?> </a>
                            </li>
                            <?php
                }  
                }
            }

            if($paginaEntrada< ($totalPaginaSaida-5)){
                ?>
                            <li class="page-item"><a class="page-link"
                                    href="?menuop=saidaEstoque&paginaSaida=<?php echo $paginaSaida+1 ?>"> <svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                    </svg> </a>
                            </li>
                            <?php
                }
                ?>
                            <li class="page-item"><a class="page-link"
                                    href="?menuop=saidaEstoque&paginaSaida=<?php echo $totalPaginaSaida ?>">Última
                                    página</a></li>
                            <?php
                ?>
                        </ul>
                        <div class="column">
                            <div class="m-2 ">
                                <table class="table" style="color:green">
                                    <thead>
                                        <th scope="col" style='text-align:center; width: 25%'>Quantidade</th>
                                        <th scope="col" style='text-align:center; width: 25%'>Data de Saída</th>
                                        <th scope="col" style='text-align:center; width: 25%'>Responsável</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            
                                            include_once ("../../connection/conexao.php");
                                            $sql= "SELECT saidaEstoque.id_saidaEstoque, saidaEstoque.quantidade_saidaEstoque, DATE_FORMAT(saidaEstoque.data_saidaEstoque, '%d/%m/%Y') as dataSaida,
                                            responsavel_familia.nome_responsavel FROM saidaEstoque LEFT JOIN usuario on saidaEstoque.usuario_saidaEstoque = usuario.id_usuario LEFT JOIN responsavel_familia on saidaEstoque.responsavel_saidaEstoque = responsavel_familia.id_responsavel where id_usuario = $logado
                                            LIMIT $inicioSaida, $quantidadeSaida";
                                            $banco = new conexao();
                                            $con = $banco->getConexao();
                                            $result = $con->query($sql);
                                            while($row = $result->fetch()){
                                                ?>
                                        <tr>
                                            <td>
                                                <span
                                                    id="quantidade<?php echo $row['id_saidaEstoque']; ?>"><?php echo $row['quantidade_saidaEstoque']; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span
                                                    id="recebimento<?php echo $row['id_saidaEstoque']; ?>"><?php echo $row['dataSaida']; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span id="recebimento<?php echo $row['id_saidaEstoque']; ?>">
                                                    <?php echo $row['nome_responsavel']; ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <div class="containerFooter">
        <?php include('../footer.php'); ?>
    </div>

</body>

</html>
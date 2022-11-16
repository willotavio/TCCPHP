<?php
    session_start();
    if((!isset($_SESSION['nomeUsuario']) == true) and (!isset($_SESSION['tipoUsuario']) == true))
    {
        unset($_SESSION['tipoUsuario']);
        unset($_SESSION['nomeUsuario']);
        header('location: ../../index.php');
    }else if ($_SESSION['tipoUsuario'] != 'A'){
        echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Você não possui acesso a essa página');
                window.location.href='cestas.php';
                </script>";
    }else{
        include_once ("../../connection/conexao.php");
        $banco = new conexao();
        $con = $banco->getConexao();
        $logado = $_SESSION['nomeUsuario'];
        $sql = "select imagem_usuario from usuario where nome_usuario = '$logado'";
        $result = $con->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $imagemUsuario = $row['imagem_usuario'];
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
    <title>Relatório Cestas</title>
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
                            <a class="dropdown-item" href="../conta/conta.php">Ver perfil</a>
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


<body style="background-color:whitesmoke">

    <div class="container">

        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
            onclick="window.open('pdfCestas/pdfCestas.php','_blank')"
            style="font-size: 1.2em; width: 200px; margin-bottom: 10px">Gerar Relatório
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                <path
                    d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                <path
                    d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
            </svg>
        </button>
        <h4 style="color:green; text-align:center">Entrada de Cestas</h4>
        <div class="overflow-auto">

            <ul class="pagination justify-content-center navPaginacao">
                <?php
            $con = mysqli_connect("localhost","root","","ong");
            $sqlTotal = "SELECT id_entradaEstoque FROM entradaEstoque";
            $qrTotal = mysqli_query($con, $sqlTotal) or die( mysqli_error($con));
            $numTotal = mysqli_num_rows($qrTotal);
            $totalPaginaEntrada = ceil($numTotal/$quantidadeEntrada);
    
        ?>
                <li class="page-item"><span class="page-link"><?php echo "Total: ".$numTotal ?></span></li>
                <li class="page-item"><a class="page-link" href="?menuop=entradaEstoque&paginaEntrada=1">Primeira
                        página</a></li>
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
                            <th scope="col" style='text-align:center; width: 25%'>Quantidade</th>
                            <th scope="col" style='text-align:center; width: 25%'>Data de Recebimento</th>
                            <th scope="col" style='text-align:center; width: 25%'>Nome</th>
                            <th scope="col" style='text-align:center; width: 25%'>Ações</th>
                        </thead>
                        <tbody>
                            <?php 
                                
                                include_once ("../../connection/conexao.php");
                                $sql= "SELECT id_entradaEstoque,quantidade_entradaEstoque, DATE_FORMAT(data_entradaEstoque, '%d/%m/%Y') as dataEntrada, usuario.nome_usuario
                                FROM entradaEstoque LEFT JOIN usuario on entradaEstoque.usuario_entradaEstoque = usuario.id_usuario
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
                                <td>
                                    <span id="recebimento<?php echo $row['id_entradaEstoque']; ?>">
                                        <?php 
                                            if($row['nome_usuario'] == ""){
                                                echo "Funcionário";
                                            }else{
                                                echo $row['nome_usuario']; 
                                            }
                                        ?>
                                    </span>
                                </td>
                                <td>
                                    <button class='btn btn-sm btn-outline-danger delete'
                                        value="<?php echo $row['id_entradaEstoque']; ?>">
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                            fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                            <path
                                                d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                            <path fill-rule='evenodd'
                                                d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                        </svg>
                                    </button>
                                    <button class='btn btn-sm btn-outline-info edit'
                                        value="<?php echo $row['id_entradaEstoque']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                        </svg>
                                    </button>
                                </td>

                            </tr>
                            <?php
                                    }
                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="container modalHeaderColorCenter">
                                <h5 class="modal-title" id="exampleModalLabel1">Apagar Responsável</h5>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <form action='../../crud/cestas/controlecestas.php' method='GET' autocomplete='off'>
                                    <div class='form-floating mb-3 mt-3'>
                                        <input class='form-control inputGeral' type='number' name='idCesta'
                                            placeholder='Id' id="idEntradaEstoque" readonly>
                                        <label class='labelCadastro'>ID</label>
                                    </div>
                                    <p>Realmente deseja excluir a entrada desta Cesta?
                                    </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                            <input type='submit' class='btn btn-outline-success' name='botao' value='Deletar'>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="container modalHeaderColorCenter">
                                <h5 class="modal-title" id="exampleModalLabel1">Editar Responsável</h5>
                            </div>
                        </div>
                        <div class="modal-body">
                            <span id="editarCestas"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container tabelaRelatorio">
        <h4 style="color:green; text-align:center">Saída de Cestas</h4>
        <ul class="pagination justify-content-center navPaginacao">
            <?php
            $con = mysqli_connect("localhost","root","","ong");
            $sqlTotal = "SELECT id_saidaEstoque FROM saidaEstoque";
            $qrTotal = mysqli_query($con, $sqlTotal) or die( mysqli_error($con));
            $numTotal = mysqli_num_rows($qrTotal);
            $totalPaginaSaida = ceil($numTotal/$quantidadeSaida);
    
        ?>
            <li class="page-item"><span class="page-link"><?php echo "Total: ".$numTotal ?></span></li>
            <li class="page-item"><a class="page-link" href="?menuop=saidaEstoque&paginaSaida=1">Primeira página</a>
            </li>
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
            <li class="page-item"><a class="page-link" href="?menuop=saidaEstoque&paginaSaida= <?php echo $i ?>">
                    <?php echo $i?> </a>
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
        <div class="overflow-auto">
            <div class="column">
                <div class="m-2 ">
                    <table class="table" style="color:green">
                        <thead>
                            <th scope="col" style='text-align:center; width: 25%'>Quantidade</th>
                            <th scope="col" style='text-align:center; width: 25%'>Data de Saída</th>
                            <th scope="col" style='text-align:center; width: 25%'>Usuario</th>
                            <th scope="col" style='text-align:center; width: 25%'>Responsável</th>
                        </thead>
                        <tbody>
                            <?php 
                                
                                include_once ("../../connection/conexao.php");
                                $sql= "SELECT saidaEstoque.id_saidaEstoque, saidaEstoque.quantidade_saidaEstoque, DATE_FORMAT(saidaEstoque.data_saidaEstoque, '%d/%m/%Y') as dataSaida, usuario.nome_usuario,
                                responsavel_familia.nome_responsavel FROM saidaEstoque LEFT JOIN usuario on saidaEstoque.usuario_saidaEstoque = usuario.id_usuario LEFT JOIN responsavel_familia on saidaEstoque.responsavel_saidaEstoque = responsavel_familia.id_responsavel
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
                                        <?php 
                                            if($row['nome_usuario'] == ""){
                                                echo "Funcionário";
                                            }else{
                                                echo $row['nome_usuario'];
                                            } 
                                        ?>
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




    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $(document).on("click", ".delete", function() {
            var id = $(this).val();
            $("#delete").modal("show");
            $("#idEntradaEstoque").val(id);
        });
        $(document).on("click", ".edit", function() {
            var id = $(this).val();
            var botao = 'Consulta';
            if (id != "") {
                var dados = {
                    id: id,
                };
                $.ajax({
                    type: "POST",
                    url: "../../crud/cestas/consultaEditCestas.php",
                    data: dados,
                    success: function(resultado) {
                        $("#editarCestas").html(resultado);
                        $("#edit").modal("show");
                    },
                });
            } else {
                alert("ERRO ID VAZIO");
            }
        });
    });
    </script>
    <div class="containerFooter">
        <?php include('../footer.php'); ?>
    </div>

</body>

</html>
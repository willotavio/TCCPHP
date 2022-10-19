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

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../imgs/favicon.ico" type="image/x-icon">
    <title>Cestas</title>
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
                        <a class="nav-link" href="../financeiro/financeiroProvisorio.php">Financeiro</a>
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
            onclick="window.location.href='pdfCestas/pdfCestas.php';"
            style="font-size: 1.2em; width: 200px; margin-bottom: 10px">Gerar Relatório
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
            </svg>
        </button>
        <h4 style="color:green; text-align:center">Entrada de Cestas</h4>
        <div class="overflow-auto">
            <div class="column">
                <div class="m-2 ">
                    <table class="table" style="color:green">
                        <thead>
                            <th scope="col" style='text-align:center; width: 33%'>Quantidade</th>
                            <th scope="col" style='text-align:center; width: 33%'>Data de Recebimento</th>
                            <th scope="col" style='text-align:center; width: 33%'>Nome</th>
                        </thead>
                        <tbody>
                            <?php 
                                
                                include_once ("../../connection/conexao.php");
                                $sql= "SELECT cestas.id_cestas, cestas.quantidade_cestas, cestas.recebimento_cestas, usuario.nome_usuario 
                                FROM cestas INNER JOIN usuario on cestas.usuario_cestas = usuario.id_usuario";
                                $banco = new conexao();
                                $con = $banco->getConexao();
                                $result = $con->query($sql);
                                while($row = $result->fetch()){
                                    ?>
                            <tr>
                                <td><span
                                        id="quantidade<?php echo $row['id_cestas']; ?>"><?php echo $row['quantidade_cestas']; ?></span>
                                </td>
                                <td><span
                                        id="recebimento<?php echo $row['id_cestas']; ?>"><?php echo $row['recebimento_cestas']; ?></span>
                                </td>
                                <td><span
                                        id="recebimento<?php echo $row['id_cestas']; ?>"><?php echo $row['nome_usuario']; ?></span>
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
    <div class="container" style="margin-top:60px">
        <h4 style="color:green; text-align:center">Saida de Cestas</h4>
        <div class="overflow-auto">
            <div class="column">
                <div class="m-2 ">
                    <table class="table" style="color:green">
                        <thead>
                            <th scope="col" style='text-align:center; width: 33%'>Quantidade</th>
                            <th scope="col" style='text-align:center; width: 33%'>Data de Saida</th>
                            <th scope="col" style='text-align:center; width: 33%'>Nome</th>
                        </thead>
                        <tbody>
                            <?php 
                                
                                include_once ("../../connection/conexao.php");
                                $sql= "SELECT saidaCestas.id_saidaCestas, saidaCestas.quantidade_saidaCestas, saidaCestas.data_saidaCestas, usuario.nome_usuario 
                                FROM saidaCestas INNER JOIN usuario on saidaCestas.usuario_saidaCestas = usuario.id_usuario";
                                $banco = new conexao();
                                $con = $banco->getConexao();
                                $result = $con->query($sql);
                                while($row = $result->fetch()){
                                    ?>
                            <tr>
                                <td><span
                                        id="quantidade<?php echo $row['id_saidaCestas']; ?>"><?php echo $row['quantidade_saidaCestas']; ?></span>
                                </td>
                                <td><span
                                        id="recebimento<?php echo $row['id_saidaCestas']; ?>"><?php echo $row['data_saidaCestas']; ?></span>
                                </td>
                                <td><span
                                        id="recebimento<?php echo $row['id_saidaCestas']; ?>"><?php echo $row['nome_usuario']; ?></span>
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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
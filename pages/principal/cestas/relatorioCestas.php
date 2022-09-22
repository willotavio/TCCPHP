<?php
    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('location: ../../../index.php');
    }else if ($_SESSION['tipo'] != 'A'){
          echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Você não possui acesso a essa página');
                window.location.href='cestas.php';
                </script>";
    }else{
        include_once ("../../../connection/conexao.php");
        $banco = new conexao();
        $con = $banco->getConexao();
        $logado = $_SESSION['usuario'];
        $sql = "select imagem_usuario from usuario where nome_usuario = '$logado'";
        $result = $con->query($sql);
        if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            $imagemU = $row['imagem_usuario'];
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
    <link rel="shortcut icon" href="../../../imgs/favicon.ico" type="image/x-icon">
    <title>Cestas</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    <?php include '../../style.css';
    ?>
    </style>
</head>

<header>
    <nav class="navbar navbar-expand-lg" style="background-color: white;position: fixed;z-index: 1000;width: 100%;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home.php"><img src='../../../imgs/logo2.png' width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="../responsavelFamilia/responsavelFamilia.php"
                            style="color:green">FAMILIAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cestas.php" style="color:green">CESTAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../../pages/principal/dashboard/dashboard.php"
                            style="color:green">FINANCEIRO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../funcionarios/funcionarios.php" style="color:green">FUNCIONÁRIOS</a>

                    </li>
                </ul>
                <li class="nav-item dropdown " style="list-style: none;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" style="color:green">
                        <?php echo '<img src="data:../../../imgs/conta;base64,' . base64_encode($imagemU) . '" style="border-radius:50px;width: 40px; height: 40px;">' ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../conta/conta.php" style="color:green">VER PERFIL</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../../../crud/login/sair.php" style="color:green">SAIR</a>
                        </li>


            </div>
        </div>
    </nav>
</header>

<body style="background-color:whitesmoke">

    <div class="container" style="margin-top:140px">
        <h4 style="color:green; text-align:center">Entrada de Cestas</h4>
        <div class="overflow-auto">
            <div class="column">
                <div class="m-2 ">
                    <table class="table" style="color:green">
                        <thead>
                            <th scope="col" style='text-align:center'>Quantidade</th>
                            <th scope="col" style='text-align:center'>Data de Recebimento</th>
                            <th scope="col" style='text-align:center'>Funcionario</th>
                        </thead>
                        <tbody>
                            <?php 
                                
                                include_once ("../../../connection/conexao.php");
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
                            <th scope="col" style='text-align:center'>Quantidade</th>
                            <th scope="col" style='text-align:center'>Data de Saida</th>
                            <th scope="col" style='text-align:center'>Funcionario</th>
                        </thead>
                        <tbody>
                            <?php 
                                
                                include_once ("../../../connection/conexao.php");
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
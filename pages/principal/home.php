<?php
    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('location: ../../index.php');
    }else{
        $logado = $_SESSION['usuario'];
        include_once('../../connection/conexao.php');
        $banco = new conexao();
        $con = $banco->getConexao();
        $contF = $con->query('select count(*) from responsavelFamilia')->fetchColumn(); 
        $contC = $con->query('select count(*) from cestas')->fetchColumn(); 
        
    }


?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    <?php include '../style.css';
    ?>
    </style>
</head>


<body>
<header>
    <nav class="navbar navbar-expand-lg" style=" background-color: white;">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><img src='../../imgs/logo2.png' width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="responsavelFamilia/responsavelFamilia.php" id="linkBar">FAMILIAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cestas/cestas.php" id="linkBar">CESTAS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color:green">
                            CONTA
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="conta/conta.php" id="linkBar">VER PERFIL</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../../login/sair.php" id="linkBar">SAIR</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>

    <div class="container-fluid" style="margin-top:20px">
        <?php
            echo"<p style='color:green; font-size:20px; text-align:start'>Bem vindo(a) <b>$logado</b> </p>";
                        ?></div>

    <div class="container" style="margin-top:25px">

        <div class="row">
            <div class="col-sm-4">

                <div class=" card" id="cardContainer">
                    <a href="responsavelFamilia/responsavelFamilia.php" style="text-decoration: none;">
                        <div class="container">
                            <img src="../../imgs/iconesCardHome/Familia.png" class="card-img-top" alt="Familia">
                        </div>
                        <div class="card-body">
                            <p class="card-text" id="textoCardHome"><b>Cadastre e Gerencie as
                                    Familias</b></p>

                        </div>
                    </a>
                </div>

            </div>

            <div class="col-sm-4">
                <div class="card " id="cardContainer">
                    <a href="cestas/cestas.php" style="text-decoration: none;">
                        <div class="container">
                            <img src="../../imgs/iconesCardHome/Cestas.png" class="card-img-top" alt="Cestas">
                        </div>
                        <div class="card-body">
                            <p class="card-text" id="textoCardHome"><b>Cadastre e Gerencie as Cestas</b></p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card" id="cardContainer">
                    <a href="conta/conta.php" style="text-decoration: none;">
                        <div class="container">
                            <img src="../../imgs/iconesCardHome/Conta.png" class="card-img-top" alt="Conta">
                        </div>
                        <div class="card-body">
                            <p class="card-text"><b id="textoCardHome">Configure a sua Conta</b></p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="container" id="containerInfoFam">
                <div class="jumbotron jumbotron-fluid">
                    <h1 class="display-4" style="color:green">Familias</h1>
                    <p class="lead">
                        <?php
                            echo"<p><b>Total de Familias Cadastradas: $contF</b></p>";
                        ?>
                    </p>
                    <hr class="my-4">
                    <p class="lead">
                        <a class="btn btn-success btn-lg" href="responsavelFamilia/responsavelFamilia.php" role="button">Ver Mais</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container" id="containerInfoFam">
                <div class="jumbotron jumbotron-fluid">
                    <h1 class="display-4" style="color:green">Cestas</h1>
                    <p class="lead">
                        <?php
                            echo"<p><b>Total de Cestas Cadastradas: $contC</b></p>";
                        ?>
                    </p>
                    <hr class="my-4">
                    <p class="lead">
                        <a class="btn btn-success btn-lg" href="cestas/cestas.php" role="button">Ver Mais</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid" style="padding:0; margin-top:6.3%;">
        <?php include('footer.php');?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>


</html>
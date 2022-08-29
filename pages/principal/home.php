<?php
    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('location: ../../indexlogin.php');
    }
    $logado = $_SESSION['usuario'];


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
    <script>
    $(function() {
        $("#header").load("header.php");
    });
    </script>
</head>


<body>
    <header id="header"></header>

    <div class="container-fluid" style="margin-top:20px">
        <?php
            echo"<p style='color:green; font-size:20px; text-align:start'>Bem vindo(a) <b>$logado</b> </p>";
                        ?></div>

    <div class="container" style="margin-top:25px">

        <div class="row">
            <div class="col-sm-4">

                <div class=" card" id="cardContainer">
                    <a href="indexpessoa.php" style="text-decoration: none;">
                        <div class="container">
                            <img src="../../imgs/iconesMenu/Familia.png" class="card-img-top" alt="Familia">
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
                    <a href="indexcestas.php" style="text-decoration: none;">
                        <div class="container">
                            <img src="../../imgs/iconesMenu/Cestas.png" class="card-img-top" alt="Cestas">
                        </div>
                        <div class="card-body">
                            <p class="card-text" id="textoCardHome"><b>Cadastre e Gerencie as Cestas</b></p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card" id="cardContainer">
                    <a href="indexconta.php" style="text-decoration: none;">
                        <div class="container">
                            <img src="../../imgs/iconesMenu/Conta.png" class="card-img-top" alt="Conta">
                        </div>
                        <div class="card-body">
                            <p class="card-text"><b id="textoCardHome">Configure a sua Conta</b></p>
                        </div>
                    </a>
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
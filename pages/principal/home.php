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
    <div class="container" id="containerHome">
        <div class="container-fluid">
            <div class="col">
                <div class="row" style="text-align:center">
                    <div><img src=" ../../imgs/Logo.png" alt="logo" class="img-fluid"></div>
                </div>
            </div>
        </div>

        <div class=" container" style=" border-radius:0 0 20px 20px;">
            <div class="col">
                <div class="row">
                    <p id="textoPrincipalHome">
                        <b>Bem-Vindo!
                            <br>
                            O que deseja acessar?
                        </b>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:25px">

        <div class="row">

            <div class="col-sm-4"">
                <div class=" card" style="width: 17rem; margin:auto;">
                <div class="container">
                    <img src="../../imgs/iconesMenu/Familia.png" class="card-img-top" alt="Familia">
                </div>
                <div class="card-body">
                    <p class="card-text" id="textoCardHome"><b>Cadastre e Gerencie as
                            Familias</b></p>
                    <button type="button" class="buttonH"
                        onclick="window.location.href='indexpessoa.php' ">Familias</button>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card" style="width: 17rem; margin:auto">
                <div class="container">
                    <img src="../../imgs/iconesMenu/Cestas.png" class="card-img-top" alt="Cestas">
                </div>
                <div class="card-body">
                    <p class="card-text" id="textoCardHome"><b>Cadastre e Gerencie as Cestas</b></p>
                    <button type="button" class="buttonH"
                        onclick="window.location.href='indexcestas.php'">Cestas</button>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card" style="width: 17rem; margin:auto">
                <div class="container">
                    <img src="../../imgs/iconesMenu/Conta.png" class="card-img-top" alt="Conta">
                </div>
                <div class="card-body">
                    <p class="card-text"><b id="textoCardHome">Configure a sua Conta</b></p>
                    <button type="button" class="buttonH"
                        onclick="window.location.href='indexconta.php'">Contas</button>
                </div>
            </div>
        </div>

    </div>

    </div>
    <div class="container-fluid" style="padding:0; margin-top:4%;">
        <?php include('footer.php');?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>


</html>
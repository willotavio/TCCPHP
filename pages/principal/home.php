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
    <script>
    $(function() {
        $("#header").load("header.php");
    });
    </script>
    <style>
    <?php include '../style.css';
    ?>
    </style>
    <style>
    .buttonH {
        margin-top: 20px;
        border: none;
        color: green;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
        border-radius: 10px;
        border-style: solid;
        border-color: green;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        transition-duration: 0.4s;
    }

    .buttonH:hover {
        background-color: green;
        color: white;
    }
    </style>
</head>


<body>
    <header id="header"></header>
    <div class="container"
        style="background-image: linear-gradient(to bottom right,yellow,green); margin-top:50px; border-radius:20px; border-style:solid; border-color:green; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
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
                    <p style="text-align:center; color:white; margin-top:5px; font-size:20px"><b>Bem-Vindo!
                            <br>O que deseja acessar?
                    </p></b>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom:10px">

        <div class="row" style="text-align:center">
            <div class="col">
                <div class="container"><button type="button" class="buttonH"
                        onclick="window.location.href='indexpessoa.php' ">Familias</button>
                </div>
            </div>
            <div class="col">
                <div class="container"><button type="button" class="buttonH"
                        onclick="window.location.href='indexcestas.php'">Cestas</button>
                </div>
            </div>
            <div class="col">
                <div class="container"> <button type="button" class="buttonH"
                        onclick="window.location.href='indexconta.php'">Contas</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="padding:0; margin-top:8%;">
        <?php include('footer.php');?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>


</html>
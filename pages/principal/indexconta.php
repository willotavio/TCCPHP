<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas</title>

    <!--NAV BAR-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <script>
    $(function() {
        $("#header").load("header.php");
    });
    </script>
    <!--NAV BAR-->

    <style>
    <?php include '../style.css';
    ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<header id="header"></header>

<body>
    <div class="container" id="containerConta">
        <div class="col">
            <h2 style="color:black;font-size:26px;text-align:center">Conta</h2>
            <div class="container">
                <div class="row" style="text-align:center">

                    <div class="col">
                        <img src="../../imgs/conta/fotoPerfil.png" style="border-radius:10px; text-align:center"
                            width="20%"></td>
                        <p style="color:black"><b>Login:</b> Administrador1<br></p>
                        <p style="color:black"><b>Email:</b> Administrador@gmail.com
                        </p>
                    </div>



                </div>
            </div>
        </div>
    </div>



    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>
<div class="container-fluid" style="padding:0; margin-top:7%;">
    <?php include('footer.php');?>
</div>

</html>
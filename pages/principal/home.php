<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <script>
    $(function() {
        $("#header").load("header.php");
    });
    </script>

    <style>
    <?php include '../style.css';
    ?>
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<header id="header"></header>

<body>

    <div class=caixa id="caixaHome">

        <img id='logo' src="../../imgs/Logo.png" alt="logo">

        <h2 id='subTitleHome'>Bem-Vindo!
            <br>O que deseja acessar?
        </h2>

        <table>
            <form action='indexpessoa.php'>
                <td>
                    <p><input type='submit' value="Cadastro"></p>
                </td>
            </form>

            <form action='indexcestas.php'>
                <td>
                    <p><input type='submit' value="Cestas"></p>
                </td>
            </form>

            <form action='indexconta.php'>
                <td>
                    <p><input type='submit' value="Conta"></p>
                </td>
            </form>

            </form>
        </table>




    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
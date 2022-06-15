<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoas</title>
 
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
    </script>
    <script> 
    $(function(){
    $("#header").load("header.php");
    });
    </script> 

    <style>
        <?php include 'style.css'; ?>
    </style>
</head>

<header id="header"></header>
<body>


<div class="caixa" id="caixaAvisos">

    <h1>AVISOS</h1>

    <table class='tableAvisos'>
        <td>
            <div class="aviso">
            </div>
        </td>

        <td>
            <div class="aviso">
            </div>
        </td>

        <td>
            <div class="aviso">
            </div>
        </td>
        
    </table>
    <table class='tableAvisos'>
        <td>
            <div class="aviso">
            </div>
        </td>

        <td>
            <div class="aviso">
            </div>
        </td>

        <td>
            <div class="aviso">
            </div>
        </td>
        
    </table>

    <form action='home.php'>
        <br><p><input type='submit' value="Voltar"></p>
    </form>

</div>

</body>
</html>
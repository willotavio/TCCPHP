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


<div class="caixa" id="caixaCestas">

    <h1>CADASTRO DE CESTAS</h1>

    <form method="POST">
            <table>
            <td>
            <div class="divFormulario">
            <input class='pessoa' type='text' name='tipo' required> 
            <label for="tipo" class='inputLabel'>Tipo</label>
            </div>

            <div class="divFormulario">
            <input class='pessoa' type='number' name='qnt' required> 
            <label for="qnt" class='inputLabel'>Quantidade de Produtos</label>
            </div>

            <div>
            <p><input type='submit' value="Cadastrar"></p>
            </div>
            </table>
        </form>

    <form action='home.php'>
        <p><input type='submit' value="Voltar"></p>
    </form>

</div>

</body>
</html>
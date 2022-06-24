<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        <?php include '../pages/style.css'; ?>
    </style>
</head>
<body style="background: url('../imgs/background2.jpg')fixed;">
    
    <div class="caixa" id="caixaLogin">

        <h1>Cadastrar Uma Nova Conta</h1>

        <form method="POST" action="" autocomplete="off">
            <table>
            <td>
            <div class="divFormulario">
            <input class='pessoa' type='text' name='nomeLoginC' required> 
            <label class='inputLabel'>Digite o seu Nome de Usuario</label>
            </div>

            <div class="divFormulario">
            <input class='pessoa' type='text' name='emailLoginC' required> 
            <label class='inputLabel'>Digite o Enmail</label>
            </div>

            <div class="divFormulario">
            <input class='pessoa' type='password' name='senhaLoginC' required> 
            <label class='inputLabel'>Senha</label>
            </div>

            <div class="divFormulario">
            <input class='pessoa' type='password' name='senhaLoginC' required> 
            <label class='inputLabel'>Repita a sua Senha</label>
            </div>
            <input class='inputLogin' type="submit" value="CadastrarConta">
            </td>
            </table>
            <button type="button" id="btnCadastrar" onclick="window.location.href='../indexlogin.php'" >Voltar</button>
        </form>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    <?php include 'pages/style.css';
    ?>
    </style>
</head>

<body style="background: url('imgs/background2.jpg')fixed;">

    <div class="caixa" id="caixaLogin">

        <h1>LOGIN</h1>

        <form method="POST" action="login/logar.php" autocomplete="off">
            <table>
                <td>
                    <div class="divFormulario">
                        <input class='pessoa' type='text' name='login' required>
                        <label for="senha" class='inputLabel'>Usuário</label>
                    </div>

                    <div class="divFormulario">
                        <input class='pessoa' type='password' name='senha' required>
                        <label for="senha" class='inputLabel'>Senha</label>
                    </div>
                    <div id="divFormularioLink">
                        <a href="pages/login/criarConta.php" class="formsLink">Cadastrar Conta</a>
                        <br>

                    </div>
                    <div id="divFormularioLink">
                        <a href="pages/login/esqueciSenha.php" class="formsLink">Esqueci Minha Senha<a>
                    </div>
                    <input class='inputLogin' type="submit" value="Logar">
                </td>
            </table>
        </form>
    </div>

</body>

</html>
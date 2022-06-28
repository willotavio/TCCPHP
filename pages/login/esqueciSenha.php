<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    <?php include '../style.css';
    ?>
    </style>
</head>

<body style="background: url('../../imgs/background2.jpg')fixed;">

    <div class="caixa" id="caixaLogin">

        <h1>Redefinir Uma Nova Senha</h1>

        <form method="GET" action="../../crud/criarConta/controleCriarConta.php" autocomplete="off">
            <table>
                <td>
                    <div class="divFormulario">
                        <input class='pessoa' type='text' name='cadastrarUEmail' required>
                        <label class='inputLabel'>Digite o Email</label>
                    </div>

                    <p><input type="submit" class="btn btn-success" name='botao' value='cadastrar'>
                    </p>
                </td>
            </table>
            <button type="button" id="btnCadastrar"
                onclick="window.location.href='../../indexlogin.php'">Voltar</button>
        </form>
    </div>

</body>

</html>


<!DOCTYPE html>
<html lang="en">

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

        <h1>Cadastrar Uma Nova Conta</h1>

        <form method="POST" action="" autocomplete="off">
            <table>
                <td>
                    <div class="divFormulario">
                        <input class='pessoa' type='text' name='cadastrarUUsuario' required>
                        <label class='inputLabel'>Digite o seu Nome de Usuario</label>
                    </div>

                    <div class="divFormulario">
                        <input class='pessoa' type='text' name='cadastrarUEmail' required>
                        <label class='inputLabel'>Digite o Email</label>
                    </div>

                    <div class="divFormulario">
                        <input class='pessoa' type='password' name='cadastrarUSenha' required>
                        <label class='inputLabel'>Senha</label>
                    </div>

                    <div class="divFormulario">
                        <input class='pessoa' type='password' name='cadastrarUCSenha' required>
                        <label class='inputLabel'>Repita a sua Senha</label>
                    </div>

                    <div class="divFormulario">
                        <label for="cadastrarUTipo">Digite o seu Cargo</label>
                        <select name="cars">
                            <option value="FUNCIONARIO">Funcionario</option>
                            <option value="ADMINISTRADOR">Administrador</option>
                        </select>
                    </div>

                    <input class='inputLogin' type="submit" value="CadastrarConta">
                </td>
            </table>
            <button type="button" id="btnCadastrar"
                onclick="window.location.href='../../indexlogin.php'">Voltar</button>
        </form>
    </div>

</body>

</html>
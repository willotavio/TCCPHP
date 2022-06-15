<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        <?php include 'style.css'; ?>
    </style>
</head>
<body>
    
    <div class="caixa" id="caixaLogin">

        <h1>LOGIN</h1>

        <form method="POST" action="logar.php" autocomplete="off">
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
            
            <input class='inputLogin' type="submit" value="Logar">
            </td>
            </table>
        </form>
    </div>

</body>
</html>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body style="background: url('imgs/background2.jpg')fixed;">

    <div class="container" style="margin-top:10%">
        <div class=" col-10 m-auto">
            <div class="row">
                <div class=" col-md-11 m-auto">
                    <div
                        style="background-color:white;border-radius:20px; padding-bottom:10px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-style: none none none solid; border-color: rgba(25,135,84,255); border-width: 12px;">
                        <div class="container mt-3">
                            <form method="POST" action="login/logar.php" autocomplete="off">
                                <h1 style="text-align:center; font-size:25px; padding:15px; color:rgba(25,135,84,255)">
                                    LOGIN</h1>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="email" name='nome_login' required
                                        placeholder="Digite o seu Email" name="Email">
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mt-3 mb-3">
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password"
                                        name='senha' required>
                                    <label for="senha">Senha</label>
                                </div>
                                <div class="container" style="margin:10px">
                                    <div style="text-align:right">
                                        <a href="pages/login/esqueciSenha.php"
                                            style="color: rgba(25,135,84,255);  text-decoration: none; ">Esqueci
                                            Minha
                                            Senha<a>
                                    </div>
                                </div>
                                <div class="row m-auto">
                                    <button type="submit" class="btn btn-success btn-lg btn-block"
                                        style="font-size:16px" value="Logar">Enviar</button>
                                </div>
                                <div class="container" style="margin:10px">
                                    <div style="text-align:center">
                                        <a href="pages/login/criarConta.php"
                                            style="color: rgba(25,135,84,255);  text-decoration: none;">Cadastrar
                                            Conta</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
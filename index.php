<?php

      if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['nomeUsuario'])){
            header("location: pages/home.php");
        }



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    <?php include 'css/style.css';
    ?>
    </style>

</head>

<body id="bodyIndex">

    <div style="margin-top: 10rem">

        <ul class="nav nav-pills white justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane"
                    type="button" role="tab" aria-controls="login-tab-pane" aria-selected="true">Login</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="recuperarSenha-tab" data-bs-toggle="tab"
                    data-bs-target="#recuperarSenha-tab-pane" type="button" role="tab"
                    aria-controls="recuperarSenha-tab-pane" aria-selected="false">Esqueci Minha
                    Senha</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab"
                tabindex="0">
                <div class="container m-auto mt-2" id="containerFormIndex">
                    <div class="row justify-content-start">
                        <div class="col-6 colunaFormularioIndex">
                            <form method="POST" action="" onSubmit="efetuarLogin();" id="formLogar">
                                <h2 class="h2Index">
                                    LOGIN</h2>
                                <div class="form-floating mb-3 mt-3  has-feedback">
                                    <input type="text" class="form-control" id="nomeUsuario" name='nomeUsuario' required
                                        placeholder="Usuario" autocomplete="username">
                                    <label>Usuario</label>

                                </div>
                                <div class="form-floating mt-3 mb-3 input-group">
                                    <input type="password" class="form-control" id="senhaUsuario" placeholder="Senha"
                                        name='senhaUsuario' autocomplete="current-password" required>
                                    <label>Senha</label>
                                    <span class="input-group-text" id="spanExibirSenha">
                                        <i onclick="eyeClick()" id="exibirSenha">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </i>
                                    </span>
                                </div>
                                <div class="row m-auto">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" value="Logar"
                                        name="submit">Entrar</button>
                                </div>
                                <div class="container" style="padding-top:1rem; text-align:center">
                                    <a href="criarConta.php" id="linkIndex">Cadastrar
                                        Conta</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="recuperarSenha-tab-pane" role="tabpanel" aria-labelledby="recuperarSenha-tab"
                tabindex="0">
                <div class="container m-auto mt-2" id="containerFormRecuperarSenha">
                    <div class="row justify-content-start">
                        <div class="col-6 colunaFormularioIndex">
                            <form method="POST" action='email.php' autocomplete="off">
                                <h2 class="h2Index">
                                    ESQUECI MINHA SENHA</h2>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="email" class="form-control" placeholder="Digite o seu Email" required
                                        name="recuperarEmail" id="emailRecuperacao">
                                    <label>Digite o seu Email</label>
                                </div>
                                <div class="row m-auto">
                                    <button type="submit" class="btn btn-success btn-lg btn-block"
                                        value="solicitar">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.1.js"
            integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>
        <script src="Js/login/efetuarLogin.js"></script>
        <script src="Js/login/exibirSenha.js"></script>
        <script src="Js/login/recuperarSenha.js"></script>
</body>

</html>
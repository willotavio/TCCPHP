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

<body style="background-image: url('imgs/homeT.png');">

    <div style="margin-top: 10rem">

        <ul class="nav nav-pills white justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane"
                    type="button" role="tab" aria-controls="login-tab-pane" aria-selected="true"
                    style="color: green">Login</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="recuperarSenha-tab" data-bs-toggle="tab"
                    data-bs-target="#recuperarSenha-tab-pane" type="button" role="tab"
                    aria-controls="recuperarSenha-tab-pane" aria-selected="false" style="color: green">Esqueci Minha
                    Senha</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab"
                tabindex="0">
                <div class="container" style="width: 50rem;">
                    <div class=" col-10 m-auto">
                        <div class="row">
                            <div class=" col-md-11 m-auto">
                                <div id="containerIndexLogin">
                                    <div class="container mt-3">

                                        <form method="POST" action="" onSubmit="efetuarLogin();" id="formLogar">
                                            <h2 class="h2Index">
                                                LOGIN</h2>
                                            <div class="form-floating mb-3 mt-3">
                                                <input type="text" class="form-control" id="nomeUsuario"
                                                    name='nomeUsuario' required placeholder="Usuario"
                                                    autocomplete="username">
                                                <label>Usuario</label>
                                            </div>
                                            <div class="form-floating mt-3 mb-3">
                                                <input type="password" class="form-control" id="senhaUsuario"
                                                    placeholder="Senha" name='senhaUsuario'
                                                    autocomplete="current-password" required>
                                                <label>Senha</label>
                                            </div>
                                            <div class="row m-auto">
                                                <button type="submit" class="btn btn-success btn-lg btn-block"
                                                    style="font-size:1rem" value="Logar" name="submit">Entrar</button>
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
                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="recuperarSenha-tab-pane" role="tabpanel" aria-labelledby="recuperarSenha-tab"
                tabindex="0">

                <div class="container" style="width: 50rem">
                    <div class=" col-10 m-auto">
                        <div class="row">
                            <div class=" col-md-11 m-auto">
                                <div id="containerEsqueciSenha">
                                    <div class="container mt-3">
                                        <form method="GET" onSubmit="recuperarSenha();" autocomplete="off">
                                            <h2 class="h2Index">
                                                ESQUECI MINHA SENHA</h2>
                                            <div class="form-floating mb-3 mt-3">
                                                <input type="email" class="form-control"
                                                    placeholder="Digite o seu Email" required name="cadastrarUEmail"
                                                    id="emailRecuperacao">
                                                <label>Digite o seu Email</label>
                                            </div>
                                            <div class="row m-auto">
                                                <button type="submit" class="btn btn-success btn-lg btn-block"
                                                    style="font-size:1rem" value="solicitar">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
        <script>
        function efetuarLogin() {
            var nomeUsuario = $("#nomeUsuario").val();
            var senhaUsuario = $("#senhaUsuario").val();
            if (senhaUsuario != "" && nomeUsuario != "") {
                $.ajax({
                    type: "POST",
                    url: "crud/login/logar.php",
                    data: $("#formLogar").serialize(),
                    success: function(resultado) {
                        if (resultado == 0) {
                            alert("Senha ou Usuário Incorretos");
                        } else if (resultado == 1) {
                            window.location.href = "pages/home.php";
                        } else {
                            alert("ERRO 'INICIAL' TENTE NOVAMENTE OU PEÇA AJUDA DOS ADMINISTRADORES");
                        }
                    }
                });
            } else {
                alert("ERRO 'SENHA/USUARIO' TENTE NOVAMENTE OU PEÇA AJUDA DOS ADMINISTRADORES");
            }
        }

        function recuperarSenha() {
            var email = $("#emailRecuperacao").val();
            alert("Foi enviado pra o Email: " + email + " um código para efetuar a recuperação da senha de sua conta");
        }
        </script>

</body>

</html>
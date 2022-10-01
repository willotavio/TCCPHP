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
    <?php include 'pages/style.css';
    ?>
    </style>

</head>

<body style="background-image: url('imgs/homeT.png');">

    <div style="margin-top: 10rem; text-align: center;">
        <ul class="nav nav-pills white justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"
                    style="color: green">Login</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"
                    style="color: green">Esqueci Minha Senha</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">

                <div class="container" style="width: 50rem;">
                    <div class=" col-10 m-auto">
                        <div class="row">
                            <div class=" col-md-11 m-auto">
                                <div id="containerIndexLogin">
                                    <div class="container mt-3">
                                        <form method="POST" action="crud/login/logar.php" autocomplete="off">
                                            <h2
                                                style="text-align:center; font-size:2rem; padding:1rem; color:rgba(25,135,84,255)">
                                                LOGIN</h2>
                                            <div class="form-floating mb-3 mt-3">
                                                <input type="text" class="form-control" id="nome_login"
                                                    name='nome_login' required placeholder="Usuario">
                                                <label>Usuario</label>
                                            </div>
                                            <div class="form-floating mt-3 mb-3">
                                                <input type="password" class="form-control" id="senha"
                                                    placeholder="Senha" name='senha' required>
                                                <label>Senha</label>
                                            </div>
                                            <div class="container" style="margin:10px">
                                            </div>
                                            <div class="row m-auto">
                                                <button type="submit" class="btn btn-success btn-lg btn-block"
                                                    style="font-size:1rem" value="Logar" name="submit">Entrar</button>
                                            </div>
                                            <div class="container" style="padding-top:1rem; text-align:center">
                                                <a href="pages/login/criarConta.php" class="linksIndexLogin">Cadastrar
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
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                <div class="container" style="width: 600px">
                    <div class=" col-10 m-auto">
                        <div class="row">
                            <div class=" col-md-11 m-auto">
                                <div id="containerEsqueciSenha">
                                    <div class="container mt-3">
                                        <form method="GET" action="../../crud/criarConta/controleCriarConta.php"
                                            autocomplete="off">
                                            <h1
                                                style="text-align:center; font-size:25px; padding:15px; color:rgba(25,135,84,255)">
                                                ESQUECI MINHA SENHA</h1>
                                            <div class="form-floating mb-3 mt-3">
                                                <input type="email" class="form-control"
                                                    placeholder="Digite o seu Usuario" required name="cadastrarUEmail"
                                                    id="email_recuperacao">
                                                <label>Digite o seu Email</label>
                                            </div>

                                            <div class="row m-auto">
                                                <button type="submit" class="btn btn-success btn-lg btn-block"
                                                    style="font-size:16px" value="cadastrar">Enviar</button>
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



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>

</body>

</html>
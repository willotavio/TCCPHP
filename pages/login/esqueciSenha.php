<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar uma Nova Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    <?php include '../style.css';
    ?>
    </style>
</head>

<body style="background: url('../../imgs/background2.jpg')fixed;">

    <div class="container" style="margin-top:10%">
        <div class=" col-10 m-auto">
            <div class="row">
                <div class=" col-md-11 m-auto">
                    <div id="containerEsqueciSenha">
                        <div class="container mt-3">
                            <form method="GET" action="../../crud/criarConta/controleCriarConta.php" autocomplete="off">
                                <h1 style="text-align:center; font-size:25px; padding:15px; color:rgba(25,135,84,255)">
                                    CRIAR UMA NOVA SENHA</h1>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="email" class="form-control" placeholder="Digite o seu Usuario" required
                                        name="cadastrarUEmail">
                                    <label>Digite o seu Email</label>
                                </div>

                                <div class="row m-auto">
                                    <button type="submit" class="btn btn-success btn-lg btn-block"
                                        style="font-size:16px" value="cadastrar">Cadastrar</button>
                                </div>
                                <div style="margin-top:5px">
                                    <div class="row m-auto">
                                        <button type="submit" class="btn btn-success btn-lg btn-block"
                                            style="font-size:16px"
                                            onclick="window.location.href='../../index.php'">Voltar</button>
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
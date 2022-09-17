<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../imgs/favicon.ico" type="image/x-icon">
    <title>Financeiro</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    <?php include '../../style.css';
    ?>
    </style>
</head>

<header>
    <nav class="navbar navbar-expand-lg" style="background-color: white;position: fixed;z-index: 1000;width: 100%;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home.php"><img src='../../../imgs/logo2.png' width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="../responsavelFamilia/responsavelFamilia.php"
                            style="color:green">FAMILIAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cestas/cestas.php" style="color:green">CESTAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php" style="color:green">FINACEIRO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../funcionarios/funcionarios.php" style="color:green">FUNCIONÁRIOS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color:green">
                            CONTA
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../conta/conta.php" style="color:green">VER PERFIL</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../../../crud/login/sair.php"
                                    style="color:green">SAIR</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>

<body>
    <div class="container" style="margin-top:90px">
        <div class="row">

            <div class="container">
                <h4>Saldo atual</h4>
                <h1>R$ 0.00</h1>
            </div>
            <div class="row">
                <div class="container">
                    <h5 style="text-align:center; margin-top:20px">Área Financeira</h5>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card" id="cardContainerD">
                                <img class="card-img-top" src="../../../imgs/iconesCardDash/lucro.png">
                                <hr>
                                <div class="card-body">
                                    <h5 class="card-title">Entradas</h5>
                                    <p class="card-text">Total R$: 140.20</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card" id="cardContainerD">
                                <img class="card-img-top" src="../../../imgs/iconesCardDash/despesa.png">
                                <hr>
                                <div class="card-body">
                                    <h5 class="card-title">Despesas</h5>
                                    <p class="card-text">Total R$: -240.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card" id="cardContainerD">
                                <img class="card-img-top" src="../../../imgs/iconesCardDash/docs.png">
                                <hr>
                                <div class="card-body">
                                    <h5 class="card-title">Exibir Relatorios</h5>
                                    <p class="card-text">Consulte a situação financeira</p>
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
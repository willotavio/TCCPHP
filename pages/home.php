<?php
session_start();
if ((!isset($_SESSION['nomeUsuario']) == true) and (!isset($_SESSION['tipoUsuario']) == true)) {

    unset($_SESSION['nomeUsuario']);
    unset($_SESSION['tipoUsuario']);
    header('location: ../index.php');

} else {

    $logado = $_SESSION['nomeUsuario'];
    include_once('../connection/conexao.php');
    $banco = new conexao();
    $con = $banco->getConexao();

    $totalResponsavel = $con->query('SELECT COUNT(*) FROM responsavel_familia')->fetchColumn();
    $totalCestasBanco = $con->query('SELECT COUNT(*) FROM cestas')->fetchColumn(); 

    $totalCestasEntradaBanco = $con->query('SELECT SUM(quantidade_cestas) FROM cestas')->fetchColumn(); 
    $totalCestasSaidaBanco = $con->query('SELECT SUM(quantidade_saidaCestas) FROM saidaCestas')->fetchColumn();
    if($totalCestasBanco != 0){
        $totalCestasReal = $totalCestasEntradaBanco - $totalCestasSaidaBanco;
    }else{
        $totalCestasReal = 0;
    }

    $sql = "select imagem_usuario from usuario where nome_usuario = '$logado'";
    $result = $con->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            $imagemUsuario = $row['imagem_usuario'];
        }
    }

}
?>

<!doctype html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/favicon.ico" type="image/x-icon">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    <?php include '../css/style.css';
    ?>
    </style>

</head>

<header style="margin-bottom: 100px;">
    <nav class="navbar navbar-expand-lg headerNavBar">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><img src='../imgs/logo2.png' width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navBarLinks">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="responsavelFamilia/responsavelFamilia.php">FAMILIAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cestas/cestas.php">CESTAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="financeiro/financeiroProvisorio.php">FINANCEIRO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="funcionarios/funcionarios.php">FUNCIONÁRIOS</a>
                    </li>
                </ul>

                <li class="nav-item dropdown dropDownMenu" style="list-style: none;">
                    <a class="nav-link dropdown-toggle espcialLinksHeader" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo '<img src="data:../imgs/conta;base64,' . base64_encode($imagemUsuario) . '" style="border-radius:50px;width: 40px; height: 40px;">' ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item espcialLinksHeader" href="conta/conta.php">VER PERFIL</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item espcialLinksHeader" href="../crud/login/sair.php">SAIR</a>
                        </li>
                    </ul>
                </li>

            </div>
        </div>
    </nav>
</header>

<body>

    <div class="container-fluid" style="margin-top:20px">
        <?php
        echo "<p style='color:green; font-size:20px; text-align:start'>Bem vindo(a) <b>$logado</b> </p>";
        ?></div>
    <div class="container" style="margin-top:25px">

        <div class="row">
            <div class="col-sm-4">
                <div class=" card cardSquare">
                    <a href="responsavelFamilia/responsavelFamilia.php" style="text-decoration: none;">
                        <div class="container">
                            <img src="../imgs/iconesCardHome/Familia.png" class="card-img-top" alt="Familia">
                        </div>
                        <div class="card-body">
                            <p class="card-text textSquareHome">
                                <b>Cadastre e Gerencie as Familias</b>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card cardSquare">
                    <a href="cestas/cestas.php" style="text-decoration: none;">
                        <div class="container">
                            <img src="../imgs/iconesCardHome/Cestas.png" class="card-img-top" alt="Cestas">
                        </div>
                        <div class="card-body">
                            <p class="card-text textSquareHome">
                                <b>Cadastre e Gerencie as Cestas</b>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card cardSquare">
                    <a href="conta/conta.php" style="text-decoration: none;">
                        <div class="container">
                            <img src="../imgs/iconesCardHome/Conta.png" class="card-img-top" alt="Conta">
                        </div>
                        <div class="card-body">
                            <p class="card-text textSquareHome">
                                <b>Configure a sua Conta</b>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container cardsHorizontalHome">
                <div class="jumbotron jumbotron-fluid">
                    <h1 class="display-4" style="color:green">Familias</h1>
                    <p class="lead">
                        <?php
                        echo "<p><b>Total de Familias Cadastradas: $totalResponsavel</b></p>";
                        ?>
                    </p>
                    <hr class="my-4">
                    <p class="lead">
                        <a class="btn btn-success btn-lg" href="responsavelFamilia/responsavelFamilia.php"
                            role="button">
                            Ver Mais
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container cardsHorizontalHome">
                <div class="jumbotron jumbotron-fluid">
                    <h1 class="display-4" style="color:green">Cestas</h1>
                    <p class="lead">
                        <?php
                        echo "<p><b>Total de Cestas Disponiveis: $totalCestasReal</b></p>";
                        ?>
                    </p>
                    <hr class="my-4">
                    <p class="lead">
                        <a class="btn btn-success btn-lg" href="cestas/cestas.php" role="button">
                            Ver Mais
                        </a>
                    </p>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid" style="padding:0; margin-top:6.3%;">
        <?php include('footer.php'); ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>
<?php
session_start();
if ((!isset($_SESSION['nomeUsuario']) == true) and (!isset($_SESSION['tipoUsuario']) == true)) {
    unset($_SESSION['nomeUsuario']);
    unset($_SESSION['tipoUsuario']);
    header('location: ../../index.php');
} else {
    $logado = $_SESSION['nomeUsuario'];
    include_once('../../connection/conexao.php');
    $banco = new conexao();
    $con = $banco->getConexao();
    $totalCestasBanco = $con->query('SELECT COUNT(*) FROM cestas')->fetchColumn();
    $totalCestasEntradaBanco = $con->query('SELECT SUM(quantidade_cestas) FROM cestas')->fetchColumn();
    $totalCestasSaidaBanco = $con->query('SELECT SUM(quantidade_saidaCestas) FROM saidaCestas')->fetchColumn();
    if ($totalCestasBanco != 0) {
        $totalCestasReal = $totalCestasEntradaBanco - $totalCestasSaidaBanco;
    } else {
        $totalCestasReal = 0;
    }
}

$sql = "select imagem_usuario from usuario where nome_usuario = '$logado'";
$result = $con->query($sql);
if ($result->rowCount() > 0) {

    while ($row = $result->fetch()) {
        $imagemUsuario = $row['imagem_usuario'];
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../imgs/favicon.ico" type="image/x-icon">
    <title>Cestas</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    <?php include '../../css/style.css';
    ?>
    </style>
</head>

<header>
    <nav class="navbar navbar-expand-lg headerNavBar">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home.php"><img src='../../imgs/logo2.png' width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navBarLinks" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="../responsavelFamilia/responsavelFamilia.php">Famílias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cestas.php">Cestas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../financeiro/financeiroProvisorio.php">Financeiro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../funcionarios/funcionarios.php">Funcionários</a>
                    </li>
                </ul>

                <li class="nav-item dropdown dropDownMenu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo '<img src="data:../../imgs/conta;base64,' . base64_encode($imagemUsuario) . '" style="border-radius:50px;width: 40px; height: 40px;">' ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="../conta/conta.php">Ver perfil</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="../../crud/login/sair.php">Sair</a>
                        </li>
                    </ul>
                </li>

            </div>
        </div>
    </nav>
</header>

<body style="background-color:whitesmoke">


    <div class="container-fluid">
        <div class="row" style="margin-bottom:15px">
            <div class="col m-auto" style="text-align:center">
                <div id="modalCadastro">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="container" style="text-align:center">
                                        <h5 class="modal-title" style="color: green;">Entrada de Cesta</h5>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form action='../../crud/cestas/controlecestas.php' method='GET' autocomplete="off">
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="number" min="0"
                                                name="quantidadeCestas" placeholder="Quantidade">
                                            <label class="labelCadastro">Quantidade Cestas</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="date" name="recebimentoCestas"
                                                placeholder="Data de Recebimento" required>
                                            <label class="labelCadastro">Data de Recebimento</label>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                        Fechar
                                    </button>
                                    <p><input type="submit" class="btn btn-outline-success" name='botao'
                                            value='Cadastrar'>
                                    </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row" style="margin-bottom:15px">
            <div class="col m-auto" style="text-align:center">
                <div id="modalCadastro">
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="container" style="text-align:center">
                                        <h5 class="modal-title" style="color: green;">Saída de Cesta</h5>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form action='../../crud/cestas/saida/controleCestasSaida.php' method='GET'
                                        autocomplete="off">
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="number" min="0"
                                                name="quantidade" placeholder="Quantidade">
                                            <label class="labelCadastro">Quantidade Cestas</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="date" name="dataSaida"
                                                placeholder="Data de Recebimento" required>
                                            <label class="labelCadastro">Data de Saída</label>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                        Fechar
                                    </button>
                                    <p><input type="submit" class="btn btn-outline-success" name='botao'
                                            value='cadastrarSaida'>
                                    </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="row">
                <div class="container">
                    <?php
                echo " <h4>Total de Cestas Disponíveis: $totalCestasReal</h4>";
                ?>
                </div>
                <div class="container">
                    <h5 style="text-align:center; margin-top:20px">Área de Gerenciamento das Cestas</h5>
                </div>
                <div class="container">
                    <div class="row cardSquareCestas">
                        <div class="col-md-4">
                            <div class="card cardSquare">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="text-decoration: none;">
                                    <img class="card-img-top" src="../../imgs/iconesCestas/cestaCadastrada.png">
                                    <hr>
                                    <div class="card-body">
                                        <h5 class="card-title">Cestas Cadastradas</h5>
                                        <?php
                                        echo "<p class='card-text'>Total de Cestas Cadastradas: $totalCestasEntradaBanco</p>";
                                        ?>

                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card cardSquare">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal1"
                                    style="text-decoration: none;">
                                    <img class="card-img-top" src="../../imgs/iconesCestas/cestaDoada.png">
                                    <hr>
                                    <div class="card-body">
                                        <h5 class="card-title">Cestas Doadas</h5>
                                        <?php
                                        echo "<p class='card-text'>Total de Cestas Doadas: $totalCestasSaidaBanco</p>";
                                        ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card cardSquare">
                                <a href="relatorioCestas.php" style="text-decoration: none; color:black">
                                    <img class="card-img-top" src="../../imgs/iconesCestas/documento.png">
                                    <hr>
                                    <div class="card-body">
                                        <h5 class="card-title">Exibir Relatórios</h5>
                                        <p class="card-text">Consulte a situação das Cestas</p>
                                    </div>
                                </a>
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
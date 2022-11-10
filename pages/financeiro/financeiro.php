<?php
    session_start();
    if((!isset($_SESSION['nomeUsuario']) == true) and (!isset($_SESSION['tipoUsuario']) == true))
    {
        unset($_SESSION['nomeUsuario']);
        unset($_SESSION['tipoUsuario']);
        header('location: ../index.php');
    }else if ($_SESSION['tipoUsuario'] != 'A'){
        echo "<script LANGUAGE= 'JavaScript'>
            window.alert('Você não possui acesso a essa página');
            window.location.href='../home.php';
            </script>";
    }else{
        include_once('../../connection/conexao.php');
        $logado = $_SESSION['idUsuario'];
        $banco = new conexao();
        $con = $banco->getConexao();
        $sql = "select imagem_usuario from usuario where id_usuario = '$logado'";
        $result = $con->query($sql);
        if ($result->rowCount() > 0) {

            while ($row = $result->fetch()) {
            $imagemUsuario = $row['imagem_usuario'];
            }
        }
        $verificarQuantidadeFinanceiro = $con->query('SELECT COUNT(*) FROM financeiro')->fetchColumn();
        $entradaFinanceiro = $con->query("SELECT SUM(valor_financeiro) FROM financeiro WHERE tipo_financeiro = 'E'")->fetchColumn();
        $saidaFinanceiro = $con->query("SELECT SUM(valor_financeiro) FROM financeiro WHERE tipo_financeiro = 'S'")->fetchColumn();
        if ($verificarQuantidadeFinanceiro != 0) {
            $total = $entradaFinanceiro - $saidaFinanceiro;
        } else {
            $total = 0;
        }
        
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../imgs/favicon.ico" type="image/x-icon">
    <title>Financeiro</title>
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
                        <a class="nav-link" href="../cestas/cestas.php">Cestas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="financeiro.php">Financeiro</a>
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

<body>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="container">
                    <h4>Saldo atual</h4>
                    <h1>R$ <?php echo $total ?></h1>
                </div>
                <div class="container">
                    <h5>Área Financeira</h5>
                </div>
                <div class="container">
                    <div class="row cardSquareFinanceiroProvisorio">
                        <div class="col-md-4">
                            <div class="card cardSquare">
                                <a data-bs-toggle="modal" data-bs-target="#entradaFinanceiroModal">
                                    <img class="card-img-top" src="../../imgs/iconesCardDash/lucro.png">
                                    <hr>
                                    <div class="card-body cardBodyBlack">
                                        <h5 class="card-title">Entradas</h5>
                                        <p class="card-text">Total R$: <?php echo $entradaFinanceiro ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card cardSquare">
                                <a data-bs-toggle="modal" data-bs-target="#saidaFinanceiroModal">
                                    <img class="card-img-top" src="../../imgs/iconesCardDash/despesa.png">
                                    <hr>
                                    <div class="card-body cardBodyBlack">
                                        <h5 class="card-title">Despesas</h5>
                                        <p class="card-text">Total R$: <?php echo $saidaFinanceiro ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card cardSquare">
                                <a href="relatorioFinanceiro.php">
                                    <img class="card-img-top" src="../../imgs/iconesCardDash/docs.png">
                                    <hr>
                                    <div class="card-body cardBodyBlack">
                                        <h5 class="card-title">Exibir Relatórios</h5>
                                        <p class="card-text">Consulte a situação financeira</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="entradaFinanceiroModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container modalHeaderColorCenter">
                        <h5 class="modal-title fs-5" id="exampleModalLabel">Cadastrar uma Entrada</h1>
                    </div>
                </div>
                <div class="modal-body">
                    <form action='../../crud/financeiro/controleFinanceiro.php' method='POST' autocomplete="off">
                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="text" name="tipo" placeholder="Tipo" readonly
                                value='Entrada'>
                            <label class="labelCadastro">Tipo</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="text" name="descricao" placeholder="Descrição"
                                required>
                            <label class="labelCadastro">Descrição</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="number" name="valor" min="1" max="9999"
                                placeholder="valor" required>
                            <label class="labelCadastro">valor</label>
                        </div>

                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="date" name="dataCadastro"
                                placeholder="Data de Recebimento" required>
                            <label class="labelCadastro">Data de Entrada</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-outline-success" value="entrada"
                        name="button">Cadastrar</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="saidaFinanceiroModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <div class="container modalHeaderColorCenter">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Cadastrar uma Saída</h5>
                </div>
                </div>
                <div class="modal-body">
                    <form action='../../crud/financeiro/controleFinanceiro.php' method='POST' autocomplete="off">
                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="text" name="tipo" placeholder="Tipo" readonly
                                value='Saída'>
                            <label class="labelCadastro">Tipo</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="text" name="descricao" placeholder="Descrição"
                                required>
                            <label class="labelCadastro">Descrição</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="number" name="valor" min="1" max="9999"
                                placeholder="valor" required>
                            <label class="labelCadastro">valor</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="date" name="dataCadastro"
                                placeholder="Data de Recebimento" required>
                            <label class="labelCadastro">Data de Saída</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-outline-success" value="saida" name="button">Cadastrar</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
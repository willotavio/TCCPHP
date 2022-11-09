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

   
    $sql = "select imagem_usuario from usuario where nome_usuario = '$logado'";
    $result = $con->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            $imagemUsuario = $row['imagem_usuario'];
        }
    }
    $totalResponsavel = $con->query('SELECT COUNT(*) FROM responsavel_familia')->fetchColumn();
    $totalCestas = $con->query('SELECT quantidade_estoque FROM estoque where produto_estoque = "cestas"')->fetchColumn();


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

<header>
    <nav class="navbar navbar-expand-lg  bg-light headerNavBar">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><img src='../imgs/logo2.png' width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navBarLinks" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="responsavelFamilia/responsavelFamilia.php">Famílias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cestas/cestas.php">Cestas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="financeiro/financeiro.php">Financeiro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="funcionarios/funcionarios.php">Funcionários</a>
                    </li>
                </ul>
                <li class="nav-item dropdown dropDownMenu">
                    <a class="nav-link dropdown-toggle espcialLinksHeader" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo '<img src="data:../imgs/conta;base64,' . base64_encode($imagemUsuario) . '" style="border-radius:50px;width: 40px; height: 40px;">' ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item espcialLinksHeader" href="conta/conta.php">Ver perfil</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item espcialLinksHeader" href="../crud/login/sair.php">Sair</a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>
</header>

<body>


    <div class="container-fluid containerTextoUsuario">
        <?php
        echo "<p> Bem-vindo(a) <b>$logado</b> </p>";
        ?></div>
    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <canvas id="entradaCestas" width="600" height="170"></canvas>
                </div>
                <div class="row">
                    <canvas id="saidaCestas" width="600" height="170"></canvas>
                </div>


            </div>


            <div class="col-lg-4 m-auto">
                <div class="d-grid gap-2">
                    <div class="card cardSquare">
                        <a href="responsavelFamilia/responsavelFamilia.php">
                            <img src="../imgs/iconesCardHome/Familia.png" class="card-img-top m-auto imagemCard"
                                alt="...">
                            <div class="card-body">
                                <p class="card-text">Famílias: <?php echo $totalResponsavel?></p>
                            </div>
                        </a>
                    </div>

                    <div class="card cardSquare">
                        <a href="cestas/cestas.php">
                            <img src="../imgs/iconesCardHome/Cestas.png" class="card-img-top m-auto imagemCard"
                                alt="...">
                            <div class="card-body">
                                <p class="card-text">Cestas: <?php echo $totalCestas?></p>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <div class="container-fluid containerFooter">
        <?php include('footer.php'); ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
    </script>
    <script>
    const labels = [
        <?php
                include_once('../connection/conexao.php');
                $banco = new conexao();
                $con = $banco->getConexao();
                $dataEntrada = $con->query("SELECT DATE_FORMAT(data_entradaEstoque, '%d/%m/%Y') as data_entradaEstoque FROM entradaEstoque");
                while ($row = $dataEntrada->fetch()) {
                    ?>
        <?php echo "'".$row['data_entradaEstoque']."',";?>


        <?php
            }?>
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'Entrada de Cestas',
            backgroundColor: 'rgb(0,255,127)',
            borderColor: 'rgb(0,250,154)',
            data: [<?php
                include_once('../connection/conexao.php');
                $banco = new conexao();
                $con = $banco->getConexao();
                $quantidadeEntrada = $con->query("SELECT quantidade_entradaEstoque FROM entradaEstoque");
                while ($row = $quantidadeEntrada->fetch()) {
                    ?>
                <?php echo $row['quantidade_entradaEstoque'].",";?>


                <?php
            }?>
            ],
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {

        }
    };

    const myChart = new Chart(
        document.getElementById('entradaCestas'),
        config
    );
    </script>

    <script>
    const labels2 = [
        <?php
                include_once('../connection/conexao.php');
                $banco = new conexao();
                $con = $banco->getConexao();
                $dataSaida = $con->query("SELECT DATE_FORMAT(data_saidaEstoque, '%d/%m/%Y') as data_saidaEstoque FROM saidaEstoque");
                while ($row = $dataSaida->fetch()) {
                    ?>
        <?php echo "'".$row['data_saidaEstoque']."',";?>


        <?php
            }?>
    ];

    const data2 = {
        labels: labels2,
        datasets: [{
            label: 'Saida de Cestas',
            backgroundColor: 'rgb(255,99,71)',
            borderColor: 'rgb(240,128,128)',
            data: [<?php
                include_once('../connection/conexao.php');
                $banco = new conexao();
                $con = $banco->getConexao();
                $dataSaida = $con->query("SELECT quantidade_saidaEstoque FROM saidaEstoque");
                while ($row = $dataSaida->fetch()) {
                    ?>
                <?php echo $row['quantidade_saidaEstoque'].",";?>


                <?php
            }?>
            ],
        }]
    };

    const config2 = {
        type: 'line',
        data: data2,
        options: {

        }
    };

    const myChart2 = new Chart(
        document.getElementById('saidaCestas'),
        config2,
    );
    </script>
</body>

</html>
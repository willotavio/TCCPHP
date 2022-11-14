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

<header style="margin:0">
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

    <div class="container-fluid" id="bannerHome">
        <div class="container" id="containerHomeAnimation">
            <p id="textoBoasVindas">Bem-vindo(a)</p>
            <?php
        echo "<p id='textoBoasVindasUsuario'> <b>$logado</b> </p>";
        ?>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3" style="margin-top:30px">
                <div class="row" style="margin:2px">
                    <div class="col-3 m-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-people"
                            viewBox="0 0 16 16" style="width:3rem; color:green; margin:5px">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                        </svg>
                    </div>
                    <div class="col-8 m-auto">
                        <div class="row">
                            <p class="textItensHome"><?php echo $totalResponsavel?></p>
                        </div>
                        <div class="row">
                            <p class="subTextItensHome">Familias Cadastradas</p>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="row" style="margin:2px">
                    <div class="col-3 m-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-box-seam"
                            style="width:3rem; color:green; margin:5px" viewBox="0 0 16 16">
                            <path
                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                    </div>
                    <div class="col-8 m-auto">
                        <div class="row">
                            <p class="textItensHome"><?php echo $totalCestas?></p>
                        </div>
                        <div class="row">
                            <p class="subTextItensHome"> Cestas Disponíveis</p>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
            <div class="col-lg-8 m-auto">
                <div class="container" style="margin-top:30px">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="chart-container" style="height:100%; width:95%; margin:auto">
                                <canvas id="entradaCestas"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="chart-container" style="height:100%; width:95%; margin:auto">
                                <canvas id="saidaCestas"></canvas>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
    </script>
    <script>
    const labels = [
        <?php
                include_once('../connection/conexao.php');
                $banco = new conexao();
                $con = $banco->getConexao();
                $dataEntrada = $con->query("SELECT DATE_FORMAT(data_entradaEstoque, '%d/%m/%Y') as data_entradaEstoqueFormat FROM entradaEstoque ORDER BY data_entradaEstoque");
                while ($row = $dataEntrada->fetch()) {
                    ?>
        <?php echo "'".$row['data_entradaEstoqueFormat']."',";?>


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
                $quantidadeEntrada = $con->query("SELECT quantidade_entradaEstoque FROM entradaEstoque ORDER BY data_entradaEstoque");
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
            responsive: true,
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
                $dataSaida = $con->query("SELECT DATE_FORMAT(data_saidaEstoque, '%d/%m/%Y') as data_saidaEstoqueFormat FROM saidaEstoque ORDER BY data_saidaEstoque");
                while ($row = $dataSaida->fetch()) {
                    ?>
        <?php echo "'".$row['data_saidaEstoqueFormat']."',";?>


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
            responsive: true,
        }
    };

    const myChart2 = new Chart(
        document.getElementById('saidaCestas'),
        config2,
    );
    </script>
    <div class="containerFooter">
        <?php include('footer.php'); ?>
    </div>

</body>

</html>
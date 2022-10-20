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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Total", {
                role: "style"
            }],
            ["Cestas", <?php echo $totalCestasReal?>, "green"],
            ["Famílias", <?php echo $totalResponsavel?>, "green"],
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        var options = {
            title: "Total de Famílias e Cestas",
            width: 600,
            height: 300,
            bar: {
                groupWidth: "50%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
    </script>


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
                        <a class="nav-link" href="financeiro/financeiroProvisorio.php">Financeiro</a>
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
    <div class="container" style="margin-top:25px">

        <div class="row">
            <div class="col">
                <div id="columnchart_values" style="width: 700px; height: 350px;"></div>
            </div>

            <div class="col">
                <div class="d-grid gap-2">
                    <a href="responsavelFamilia/responsavelFamilia.php">
                        <div class="card cardSquare">
                            <img src="../imgs/iconesCardHome/Familia.png" class="card-img-top m-auto imagemCard"
                                alt="...">
                            <div class="card-body">
                                <p class="card-text">Famílias</p>
                            </div>
                        </div>
                    </a>
                    <a href="cestas/cestas.php">
                        <div class="card cardSquare">
                            <img src="../imgs/iconesCardHome/Cestas.png" class="card-img-top m-auto imagemCard"
                                alt="...">
                            <div class="card-body">
                                <p class="card-text">Cestas</p>
                            </div>
                        </div>
                    </a>
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

</body>

</html>
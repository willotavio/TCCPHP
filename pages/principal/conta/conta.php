<?php
session_start();
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location: ../../index.php');
} else {
    $logado = $_SESSION['usuario'];
    include_once('../../../connection/conexao.php');
    $banco = new conexao();
    $con = $banco->getConexao();
    $sql = "select nome_usuario, tipo_usuario, email_usuario, imagem_usuario from usuario where nome_usuario = '$logado'";
    $result = $con->query($sql);
    if ($result->rowCount() > 0) {

        while ($row = $result->fetch()) {
            $emailU = $row['email_usuario'];
            $imagemU = $row['imagem_usuario'];
            $nomeU = $row['nome_usuario'];
            $tipoU = $row['tipo_usuario'];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../imgs/favicon.ico" type="image/x-icon">
    <title>Conta</title>
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

<header style="margin-bottom: 100px;">
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
                        <a class="nav-link" href="../../../pages/principal/dashboard/dashboard.php"
                            style="color:green">FINANCEIRO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../funcionarios/funcionarios.php" style="color:green">FUNCIONÁRIOS</a>
                    </li>

                </ul>
                <li class="nav-item dropdown " style="list-style: none;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" style="color:green">
                        <?php echo '<img src="data:../../../imgs/conta;base64,' . base64_encode($imagemU) . '" style="border-radius:50px;width: 40px; height: 40px;">' ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../conta/conta.php" style="color:green">VER PERFIL</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../../../crud/login/sair.php" style="color:green">SAIR</a>
                        </li>

            </div>
        </div>
    </nav>
</header>

<body>

    <div class="container-fluid" style="padding:0">

        <h6 style="color:green; font-size: 200%;">CONTA</h6>
        <div class="container">
            <?php echo '<img src="data:../../../imgs/conta;base64,' . base64_encode($imagemU) . '" style="border-radius:10px;width: 35%;">' ?>
        </div>
        <br>
        <div>
            <li class="nav-item dropdown " style="list-style: none;">
                <a data-bs-toggle="dropdown" href="#" role="button" id="editFoto" aria-expanded="false"><b>Editar
                        Foto</b></a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li style="list-style: none;">
                        <form>
                            <div>
                                <label for="arquivo" class="dropdown-item">Alterar Foto</label>
                                <input type="file" name="arquivo" id="arquivo">
                            </div>
                        </form>
                    </li>
                    <li><a class="dropdown-item" href="#">Remover Foto</a></li>

                </ul>
            </li>
        </div>
        <br>
        <div class="container"><?php echo "<p style='font-size:140%'><b>Perfil</b></p>" ?></div>
        <div class="container"><?php echo "<p style='font-size:120%'><b>NOME: $nomeU</b></p>" ?></div>
        <div class="container"><?php echo "<p style='font-size:120%'><b>EMAIL: $emailU</b></p>" ?></div>
        <div class="container">
            <?php if ($tipoU == "F") {
                echo "<p><b>TIPO: FUNCIONARIO</b></p>";
            } else if ($tipoU == "A") {
                echo "<p><b>TIPO: ADMINISTRADOR</b></p>";
            } else {
                echo "<p><b>ERRO</b></p>";
            }
            ?>
        </div>
    </div>





    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>
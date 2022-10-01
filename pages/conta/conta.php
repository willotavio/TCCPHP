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
    $sql = "select nome_usuario, tipo_usuario, email_usuario, imagem_usuario from usuario where nome_usuario = '$logado'";
    $result = $con->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            $emailUsuario = $row['email_usuario'];
            $imagemUsuario = $row['imagem_usuario'];
            $nomeUsuario = $row['nome_usuario'];
            $tipoUsuario = $row['tipo_usuario'];
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
    <link rel="shortcut icon" href="../../imgs/favicon.ico" type="image/x-icon">
    <title>Conta</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    <?php include '../../css/style.css';
    ?>
    </style>
</head>

<script>
$(document).ready(function() {
    $(".abrirModalFoto").click(function() {
        $("#modalfoto").modal('show');
    });
    $(".fecharModalFoto").click(function() {
        $("#modalfoto").modal('hide');
    });

});
</script>

<header style="margin-bottom: 100px;">
    <nav class="navbar navbar-expand-lg" style="background-color: white;position: fixed;z-index: 1000;width: 100%;">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home.php"><img src='../../imgs/logo2.png' width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        <a class="nav-link" href="../financeiro/financeiroProvisorio.php"
                            style="color:green">FINANCEIRO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../funcionarios/funcionarios.php" style="color:green">FUNCIONÁRIOS</a>
                    </li>
                </ul>

                <li class="nav-item dropdown" style="list-style: none;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" style="color:green">
                        <?php echo '<img src="data:../../imgs/conta;base64,' . base64_encode($imagemUsuario) . '" style="border-radius:50px;width: 40px; height: 40px;">' ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="conta.php" style="color:green">VER PERFIL</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="../../crud/login/sair.php" style="color:green">SAIR</a>
                        </li>
                    </ul>
                </li>

            </div>
        </div>
    </nav>
</header>

<body>

    <div class="modal fade" id="modalfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container" style="text-align:center">
                        <h5 class="modal-title" id="exampleModalLongTitle">Editar
                            Foto</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../../crud/contaIMG/imagemControle.php" autocomplete="off"
                        enctype="multipart/form-data">
                        <div class="mt-3 mb-3">
                            <label for="foto" class="form-control" id="lblArquivoCriarConta">Escolha uma Foto
                                de Perfil</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success" name='botao' value='Alterar'>Alterar</button>
                    <button type="submit" class="btn btn-outline-danger" name='botao' value='Deletar'>Remover
                        Foto</button>
                    </form>
                    <button type="button" class="btn btn-outline-secondary fecharModalFoto"
                        data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-6 m-auto">
                <div class="container" style="width: 30rem;">
                    <div class="card">
                        <?php echo '<img  class="card-img-top" src="data:../../imgs/conta;base64,' . base64_encode($imagemUsuario) . '" style="padding:10px; border-radius:40px">' ?>
                        <div class="card-body">
                            <p class="card-text">
                                <?php echo "<p style='font-size:1rem'><b>NOME: $nomeUsuario</b></p>" ?>
                                <?php echo "<p style='font-size:1rem'><b>EMAIL: $emailUsuario</b></p>" ?>
                            </p>
                            <div class="container">
                                <?php if ($tipoUsuario == "F") {
                                        echo "<p style='color:blue; border: 2px solid blue; border-radius:10px; display: inline-block; padding:3px; font-size:0.8rem'>FUNCIONARIO</p>";
                                    } else if ($tipoUsuario == "A") {
                                        echo "<p style='color:red; border: 2px solid red; border-radius:10px; display: inline-block; padding:3px; font-size:0.8rem'>ADMINISTRADOR</p>";
                                    } else {
                                        echo "<p><b>ERRO</b></p>";
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 m-auto">
                <div class="container" style="align-items: center;">
                    <div class="card m-auto" style="width: 18rem;">
                        <a class="abrirModalFoto" style="text-decoration:none;">
                            <img class="card-img-top" src="../../imgs/iconesPerfil/ajustes.png" alt="Ajuste">
                            <div class="card-body">
                                <h5 class="card-title" style="color:green">Altere o seu Perfil</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
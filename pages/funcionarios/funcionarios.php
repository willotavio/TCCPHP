<?php
    session_start();
    if((!isset($_SESSION['nomeUsuario']) == true) and (!isset($_SESSION['tipoUsuario']) == true))
    {
        unset($_SESSION['nomeUsuario']);
        unset($_SESSION['tipoUsuario']);
        header('location: ../../index.php');
    }else if ($_SESSION['tipoUsuario'] != 'A'){
        echo "<script LANGUAGE= 'JavaScript'>
            window.alert('Você não possui acesso a essa página');
            window.location.href='../home.php';
            </script>";
    }else{
        include_once('../../connection/conexao.php');
        $logado = $_SESSION['nomeUsuario'];
        $banco = new conexao();
        $con = $banco->getConexao();
        $sql = "select imagem_usuario from usuario where nome_usuario = '$logado'";
        $result = $con->query($sql);
        if ($result->rowCount() > 0) {

            while ($row = $result->fetch()) {
            $imagemUsuario = $row['imagem_usuario'];
            }
        }
    }

    $quantidade = 1;
    $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;
    $inicio = ($quantidade * $pagina) - $quantidade;
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../imgs/favicon.ico" type="image/x-icon">
    <title>Funcionario</title>
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
                        <a class="nav-link" href="../financeiro/financeiroProvisorio.php">Financeiro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="funcionarios.php">Funcionários</a>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col m-auto">

                <button type="button" class="btn btn-outline-success buttonCadastro" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Cadastrar
                    <br> Funcionários</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="container modalHeaderColorCenter">
                                    <h5 class="modal-title">Cadastrar uma Conta para Funcionário
                                    </h5>
                                </div>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="../../crud/criarConta/controleConta.php" autocomplete="off"
                                    enctype="multipart/form-data">
                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control inputGeral"
                                            placeholder="Digite o seu Usuario" required name="nome">
                                        <label class="labelCadastro">Digite o Nome de Usuário</label>
                                    </div>
                                    <div class="form-floating mt-3 mb-3">
                                        <input type="email" class="form-control inputGeral"
                                            placeholder="Digite o seu Email" name='email' required>
                                        <label class="labelCadastro">Digite o Email</label>
                                    </div>
                                    <div class="form-floating mt-3 mb-3">
                                        <input type="password" class="form-control inputGeral"
                                            placeholder="Digite a sua Senha" name='senha' required>
                                        <label class="labelCadastro">Digite a Senha</label>
                                    </div>
                                    <div class="form-floating mt-3 mb-3">
                                        <input type="password" class="form-control inputGeral"
                                            placeholder="Repita a sua Senha" name='confirmarSenha' required>
                                        <label class="labelCadastro">Repita a Senha</label>
                                    </div>
                                    <div class="mt-3 mb-3">
                                        <label for="arquivo" class="form-control" id="labelArquivo">Escolha
                                            uma Foto de Perfil</label>
                                        <input type="file" class="form-control" name="foto" id="arquivo">
                                    </div>
                                    <select class="form-select inputGeral" name="tipo">
                                        <option value="F" name="tipo" class="labelCadastro">
                                            Funcionário</option>
                                        <option value="A" name="tipo" class="labelCadastro">
                                            Administrador</option>
                                    </select>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                            Fechar
                                        </button>
                                        <button type="submit" class="btn btn-outline-success" value="cadastrar"
                                            name="botao">Cadastrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <ul class="pagination justify-content-center navPaginacao">
        <?php
    $con = mysqli_connect("localhost","root","","ong");
    $sqlTotal = "SELECT id_usuario FROM usuario";
    $qrTotal = mysqli_query($con, $sqlTotal) or die( mysqli_error($con));
    $numTotal = mysqli_num_rows($qrTotal);
    $totalPagina = ceil($numTotal/$quantidade);
    
    ?>
        <li class="page-item"><span class="page-link"><?php echo "Total: ".$numTotal ?></span></li>
        <li class="page-item"><a class="page-link" href="?menuop=usuario&pagina=1">Primeira página</a></li>
        <?php

    if($pagina>3){
        ?>
        <li class="page-item"><a class="page-link" href="?menuop=usuario&pagina=<?php echo $pagina-1?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg></a>
        </li>
        <?php
    }

    for($i=1;$i<=$totalPagina;$i++){
        if($i>=($pagina-5) && $i <= ($pagina+5)){
            if($i==$pagina){
                ?>
        <li class="page-item"><span class="page-link active"><?php echo $i ?></span></li>
        <?php
            }else{
                ?>
        <li class="page-item"><a class="page-link" href="?menuop=usuario&pagina= <?php echo $i ?>"> <?php echo $i?> </a>
        </li>
        <?php
            }  
        }
    }

    if($pagina< ($totalPagina-5)){
        ?>
        <li class="page-item"><a class="page-link" href="?menuop=usuario&pagina=<?php echo $pagina+1 ?>"> <svg
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                </svg> </a></li>
        <?php
    }
    ?>
        <li class="page-item"><a class="page-link" href="?menuop=usuario&pagina=<?php echo $totalPagina ?>">Última

                página</a></li>
        <?php
?>
    </ul>
    <div class="container">
        <div class="overflow-auto">
            <div class="column">
                <div class="m-2 ">
                    <table class="table funcionarioTable">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ações</th>
                        </thead>
                        <tbody>
                            <?php 
                                
                                include_once ("../../connection/conexao.php");
                                $sql= "SELECT * FROM usuario LIMIT $inicio, $quantidade";
                                $banco = new conexao();
                                $con = $banco->getConexao();
                                $result = $con->query($sql);
                                while($row = $result->fetch()){
                                    ?>
                            <tr>
                                <td style='text-align:center'><span
                                        id="nome<?php echo $row['id_usuario']; ?>"><?php echo $row['id_usuario']; ?></span>
                                </td>
                                <td style='text-align:center'><span
                                        id="nome<?php echo $row['nome_usuario']; ?>"><?php echo $row['nome_usuario']; ?></span>
                                </td>
                                <td style='text-align:center'><span id="tipo<?php echo $row['tipo_usuario']; ?>"><?php if($row['tipo_usuario'] == "A"){
                                            echo "ADMINISTRADOR";
                                        }else if ($row['tipo_usuario'] == "F"){
                                            echo "FUNCIONÁRIO";
                                        }else{
                                            echo "ERRO";
                                        } ?></span>
                                </td>
                                <td style='text-align:center'><span
                                        id="email<?php echo $row['email_usuario']; ?>"><?php echo $row['email_usuario']; ?></span>
                                </td>
                                <td style='text-align:center'>
                                    <button class='btn btn-sm btn-outline-primary consultFuncionario'
                                        value="<?php echo $row['id_usuario']; ?>">
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                            fill='currentColor' class='bi bi-clipboard' viewBox='0 0 16 16'>
                                            <path
                                                d='M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z' />
                                            <path
                                                d='M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z' />
                                        </svg>
                                    </button>
                                    <button class='btn btn-sm btn-outline-danger deleteFuncionario'
                                        value="<?php echo $row['id_usuario']; ?>">
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                            fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                            <path
                                                d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                            <path fill-rule='evenodd'
                                                d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                        </svg>
                                    </button>

                                </td>
                            </tr>
                            <?php
                                    }
                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteFuncionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container modalHeaderColorCenter">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar Funcionário</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action='../../crud/criarConta/deleteFuncionario.php' method='GET' autocomplete='off'>
                            <div class='form-floating mb-3 mt-3'>
                                <input class='form-control inputGeral' type='number' name='idFuncionario'
                                    placeholder='Id' id="idFuncionario" readonly>
                                <label class='labelCadastro'>ID</label>
                            </div>
                            <p>Realmente deseja excluir esse Funcionário?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                        <input type='submit' class='btn btn-outline-success' name='update' value='Deletar'>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="consultarFuncionarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container modalHeaderColorCenter">
                        <h5 class="modal-title" id="exampleModalLabel">Consultar Funcionário</h5>
                    </div>
                </div>
                <div class="modal-body">
                    
                <span id="consultarFuncionario"></span>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../Js/funcionario/deletarFuncionario.js"></script>
    <script src="../../Js/funcionario/consultaFuncionario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    
</body>
</html>
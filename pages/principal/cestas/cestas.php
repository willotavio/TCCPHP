<?php
    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('location: ../../index.php');
    }

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cestas</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <style>
    <?php 
    include '../../style.css';
    ?>
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body style="background-color:whitesmoke">
<header>
    <nav class="navbar navbar-expand-lg" style=" background-color: white;">
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
                        <a class="nav-link " href="../responsavelFamilia/responsavelFamilia.php"  id="linkBar">FAMILIAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cestas.php"  id="linkBar">CESTAS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color:green">
                            CONTA
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../conta/conta.php" id="linkBar">VER PERFIL</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../../../login/sair.php" id="linkBar">SAIR</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>
    <div class="container-fluid">
        <div class="row" style="margin-bottom:15px">
            <div class="col m-auto" style="text-align:center">
                <div id="modalCadastro">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" style="font-size: 1.2em; width: 200px; margin-top:50px">Cadastrar
                        <br> Cesta</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="TituloModalCentralizado" style="color; green;">Cesta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action='../../../crud/cestas/controlecestas.php' method='GET'
                                        autocomplete="off">
                                        <p>
                                            <input class="inputModalCadastroCesta" type="number" min="0" name="idCestas"
                                                placeholder="Id" />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastroCesta" type="text" name="quantidadeCestas"
                                                placeholder="Quantidade" />
                                        </p>
                                        <p>
                                            <input id="inputDataCadastroCesta" type="date" name="recebimentoCestas"
                                                placeholder="Data de Recebimento" />
                                        </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                        Fechar
                                    </button>
                                    <p><input type="submit" class="btn btn-outline-success" name='botao' value='Cadastrar'>
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
        <div class="overflow-auto">
            <div class="column">
                <div class="m-2 ">
                    <table class="table" style="color:green">
                        <thead>
                            <tr>
                                <th scope="col" style='text-align:center'>#</th>
                                <th scope="col" style='text-align:center'>Quantidade</th>
                                <th scope="col" style='text-align:center'>Data de Recebimento</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                    
                    include_once ("../../../connection/conexao.php");
                    $sql= "SELECT * FROM cestas";
                    $sqlSelect = "SELECT * FROM cestas WHERE idCestas =idCestas";
                    $banco = new conexao();
                    $con = $banco->getConexao();
                    $resultados_cestas = $con->query($sql);
                    $result= $con->query($sqlSelect);

                    if($result->rowCount() > 0){

                        while($user_data = $result->fetch()){
                        $idCestas = $user_data['idCestas'];
                        $quantidadeCestas = $user_data['quantidade_cestas'];
                        $recebimentoCestas = $user_data['recebimento_cestas'];
                        }
                    }
            
                    while($row = $resultados_cestas->fetch()){
                    echo "<tr>";
                        echo "<td style='text-align:center'>".$row['idCestas']."</td>";
                        echo "<td style='text-align:center'>".$row['quantidade_cestas']."</td>";
                        echo "<td style='text-align:center'>".$row['recebimento_cestas']."</td>";
                        echo "<td>
                            <a class='btn btn-sm btn-outline-primary' data-bs-toggle='modal' data-bs-target='#taticBackdrop'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clipboard' viewBox='0 0 16 16'>
                                    <path d='M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z'/>
                                    <path d='M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z'/>
                                </svg>
                            </a>
                            <a class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#taticBackdrop2'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                </svg>
                            </a>
                            <div class='modal fade' id='taticBackdrop2' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='staticBackdropLabel'>Excluir Cesta</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Deseja Realmente excluir está cesta?</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-warning' data-bs-dismiss='modal'>Cancelar</button>
                                            <a class='btn btn-danger' href='../../../crud/cestas/deleteCestas.php?idCestas=$row[idCestas]'>Confirmar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='modal fade' id='taticBackdrop' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabel'>Alterar Informações da Cesta</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <form action='../../../crud/cestas/editCestas.php' method='GET' autocomplete='off'>
                                                <p>
                                                    <input class='inputModalEdit' type='number' min='0' name='idCestas' placeholder='Id'
                                                    value='$idCestas' />
                            </p>
                            <p>
                                <input class='inputModalEdit' type='text' name='quantidadeCestas'
                                    placeholder='Quantidade' value= '$quantidadeCestas' />
                            </p>
                            <p>
                                <input class='inputModalEdit' type='date' name='recebimentoCestas'
                                    placeholder='Data de Recebimento' value='$recebimentoCestas'/>
                            </p>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-warning' data-bs-dismiss='modal'>Cancelar</button>
                    <p style='text-align:center'><input type='submit' class='btn btn-success' name='update'
                            value='update'>
                </div>
            </div>
            </form>
        </div>
    </div>

    </td>";
    echo "</tr>";
    }
    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
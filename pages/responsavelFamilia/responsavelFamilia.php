<?php
session_start();
if ((!isset($_SESSION['nomeUsuario']) == true) and (!isset($_SESSION['tipoUsuario']) == true)) {
    unset($_SESSION['nomeUsuario']);
    unset($_SESSION['tipoUsuario']);
    header('location: ../../login.php');
}
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

$quantidade = 10;
$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
$inicio = ($quantidade * $pagina) - $quantidade;

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../imgs/favicon.ico" type="image/x-icon">
    <title>Familias</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        <?php include '../../css/style.css';
        ?>
    </style>
</head>

<header>
    <nav class="navbar navbar-expand-lg headerNavBar">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home.php"><img src='../../imgs/logo2.png' width="60"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link" href="../funcionarios/funcionarios.php">Funcionários</a>
                    </li>
                </ul>

                <li class="nav-item dropdown dropDownMenu">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo '<img src="data:../imgs/conta;base64,' . base64_encode($imagemUsuario) . '" style="border-radius:50px;width: 40px; height: 40px;">' ?>
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

                <div id="modalCadastro">
                    <button type="button" class="btn btn-outline-success buttonCadastro" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar
                        <br> Responsável</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="container modalHeaderColorCenter">
                                        <h5 class="modal-title">Cadastrar Responsável da
                                            Família</h5>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form action='../../crud/responsavelFamilia/controleResponsavelFamilia.php' method='GET' autocomplete="off">
                                        <div class="form-floating mb-3 mt-3">
                                            <input type="text" class="form-control inputGeral" name='nome' required placeholder="Nome">
                                            <label class="labelCadastro">Nome</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="date" name="dataNascimento" required placeholder="Data de Nascimento">
                                            <label class="labelCadastro">Data de Nascimento</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="number" name="cpf" required placeholder="CPF">
                                            <label class="labelCadastro">CPF</label>
                                        </div>
                                        <div>
                                            <select class="form-select inputGeral" aria-label="Default select example" name="sexo" class="labelCadastro">
                                                <option value="F" name="sexo" class="labelCadastro">Feminino</option>
                                                <option value="M" name="sexo" class="labelCadastro">Masculino</option>
                                            </select>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="text" name="celular" placeholder="Celular">
                                            <label class="labelCadastro">Celular</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="text" name="telefone" placeholder="Telefone">
                                            <label class="labelCadastro">Telefone</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="email" name="email" placeholder="Email">
                                            <label class="labelCadastro">Email</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCepCadastro inputGeral" type="text" id="cepCadastro" name="cep" placeholder="CEP" required>
                                            <label class="labelCadastro">CEP</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="text" id="ruaCadastro" name="ruaCadastro" placeholder="Rua" readonly>
                                            <label class="labelCadastro">Rua</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="text" id="bairroCadastro" name="bairroCadastro" placeholder="Bairro" readonly>
                                            <label class="labelCadastro">Bairro</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="text" id="cidadeCadastro" name="cidadeCadastro" placeholder="Cidade" readonly>
                                            <label class="labelCadastro">Cidade</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="text" name="estadoCadastro" id="estadoCadastro" placeholder="Estado" readonly>
                                            <label class="labelCadastro">Estado</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="number" name="numeroResidencia" placeholder="Número da Residência" required>
                                            <label class="labelCadastro">Número Residência</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputGeral" type="text" name="complemento" placeholder="Complemento">
                                            <label class="labelCadastro">Complemento</label>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                        Fechar
                                    </button>
                                    <input type="submit" class="btn btn-outline-success" name='botao' value='Cadastrar'>
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
        $con = mysqli_connect("localhost", "root", "", "ong");
        $sqlTotal = "SELECT id_responsavel FROM responsavel_familia";
        $qrTotal = mysqli_query($con, $sqlTotal) or die(mysqli_error($con));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);

        ?>
        <li class="page-item"><span class="page-link"><?php echo "Total: " . $numTotal ?></span></li>
        <li class="page-item"><a class="page-link" href="?menuop=responsavel_familia&pagina=1">Primeira página</a></li>
        <?php

        if ($pagina > 3) {
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=responsavel_familia&pagina=<?php echo $pagina - 1 ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg> </a>
            </li>
            <?php
        }

        for ($i = 1; $i <= $totalPagina; $i++) {
            if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
                if ($i == $pagina) {
            ?>
                    <li class="page-item"><span class="page-link active"><?php echo $i ?></span></li>
                <?php
                } else {
                ?>
                    <li class="page-item"><a class="page-link" href="?menuop=responsavel_familia&pagina= <?php echo $i ?>">
                            <?php echo $i ?> </a></li>
            <?php
                }
            }
        }

        if ($pagina < ($totalPagina - 5)) {
            ?>
            <li class="page-item"><a class="page-link" href="?menuop=responsavel_familia&pagina=<?php echo $pagina + 1 ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a></li>
        <?php
        }
        if ($totalPagina > 0) {
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=responsavel_familia&pagina=<?php echo $totalPagina ?>">Última página</a></li>
        <?php

        } else if ($totalPagina = 0) {
        ?>
            <li class="page-item"><a class="page-link" href="">Última
                    página</a></li>
        <?php
        }
        ?>
    </ul>

    <div class="container">
        <div class="overflow-auto">
            <div class="column">
                <div class="m-2">

                    <table class="table responsavelTable">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Cestas Recebidas</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Ações</th>
                        </thead>
                        <tbody>
                            <?php

                            include_once("../../connection/conexao.php");
                            $sql = "SELECT responsavel_familia.id_responsavel, responsavel_familia.nome_responsavel,
                                DATE_FORMAT(responsavel_familia.data_nascimento_responsavel, '%d/%m/%Y') AS dataNascimento,
                                responsavel_familia.cpf_responsavel,SUM(saidaEstoque.quantidade_saidaEstoque) AS quantidadeCesta,
                                contato.celular FROM responsavel_familia 
                                LEFT JOIN contato ON responsavel_familia.id_responsavel = contato.Id_contato  
                                LEFT JOIN saidaEstoque ON saidaEstoque.responsavel_saidaEstoque =  responsavel_familia.id_responsavel GROUP BY id_responsavel
                                LIMIT $inicio, $quantidade";
                            $banco = new conexao();
                            $con = $banco->getConexao();
                            $resultados_responsavel = $con->query($sql);
                            while ($row = $resultados_responsavel->fetch()) {
                            ?>
                                <tr class="resultadosDaTabela">
                                    <td>
                                        <span id="id<?php echo $row['id_responsavel']; ?>"><?php echo $row['id_responsavel']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span id="nome<?php echo $row['id_responsavel']; ?>"><?php echo $row['nome_responsavel']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span id="data_nascimento<?php echo $row['id_responsavel']; ?>"><?php echo $row['dataNascimento']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span id="cpf<?php echo $row['id_responsavel']; ?>"><?php echo $row['quantidadeCesta']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span id="celular<?php echo $row['id_responsavel']; ?>"><?php echo $row['celular']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-success" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li>
                                                    <button class='btn btn-sm btn-outline-primary view' value="<?php echo $row['id_responsavel']; ?>">
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clipboard' viewBox='0 0 16 16'>
                                                            <path d='M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z' />
                                                            <path d='M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z' />
                                                        </svg>
                                                    </button>
                                                    <button class='btn btn-sm btn-outline-danger delete' value="<?php echo $row['id_responsavel']; ?>">
                                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                                            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                                        </svg>
                                                    </button>
                                                    <button class='btn btn-sm btn-outline-success edit' value="<?php echo $row['id_responsavel']; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                        </svg>
                                                    </button>
                                                    <button class='btn btn-sm btn-outline-info doar' value="<?php echo $row['id_responsavel']; ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box2-heart" viewBox="0 0 16 16">
                                                            <path d="M8 7.982C9.664 6.309 13.825 9.236 8 13 2.175 9.236 6.336 6.31 8 7.982Z" />
                                                            <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4h-8.5Zm0 1H7.5v3h-6l2.25-3ZM8.5 4V1h3.75l2.25 3h-6ZM15 5v10H1V5h14Z" />
                                                        </svg>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
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

    <div id="doarCesta" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container modalHeaderColorCenter">
                        <h5 class="modal-title" id="exampleModalLabel">Doar Cesta</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <form action='../../crud/cestas/saida/controleCestasSaida.php' method='GET' autocomplete="off">
                        <div class="form-floating mb-3 mt-3">
                            <input class='form-control inputGeral' type='number' name='idResponsavelDoar' placeholder='Id' id="idResponsavelDoar" readonly>
                            <label class='labelCadastro'>ID</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="number" min="0" name="quantidade" placeholder="Quantidade">
                            <label class="labelCadastro">Quantidade Cestas</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputGeral" type="date" name="dataSaida" placeholder="Data de Recebimento" required>
                            <label class="labelCadastro">Data de Saída</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                        Fechar
                    </button>
                    <input type="submit" class="btn btn-outline-success" name='botao' value='cadastrarSaida'>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="consultar" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container modalHeaderColorCenter">
                        <h5 class="modal-title" id="exampleModalLabel">Consulta do Responsável</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <span id="consultarResponsavel"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container modalHeaderColorCenter">
                        <h5 class="modal-title" id="exampleModalLabel1">Editar Responsável</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <span id="editarResponsavel"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container modalHeaderColorCenter">
                        <h5 class="modal-title" id="exampleModalLabel1">Apagar Responsável</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action='../../crud/responsavelFamilia/deleteResponsavelFamilia.php' method='GET' autocomplete='off'>
                            <div class='form-floating mb-3 mt-3'>
                                <input class='form-control inputGeral' type='number' name='idResponsavel' placeholder='Id' id="idResponsavel" readonly>
                                <label class='labelCadastro'>ID</label>
                            </div>
                            <p>Realmente deseja excluir esse Responsavel?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
                    <input type='submit' class='btn btn-outline-success' name='delete' value='Deletar'>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script src="../../Js/apiCep/cadastroCep.js"></script>
    <script src="../../Js/responsavel/modalsResponsavel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>
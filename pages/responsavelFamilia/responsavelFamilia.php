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

?>
<script>
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById("endereco").value = "";
    document.getElementById("bairro").value = "";
    document.getElementById("cidade").value = "";
    document.getElementById("estado").value = "";
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById("endereco").value = conteudo.logradouro;
        document.getElementById("bairro").value = conteudo.bairro;
        document.getElementById("cidade").value = conteudo.localidade;
        document.getElementById("estado").value = conteudo.uf;
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, "");

    //Verifica se campo cep possui valor informado.
    if (cep != "") {
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById("endereco").value = "...";
            document.getElementById("bairro").value = "...";
            document.getElementById("cidade").value = "...";
            document.getElementById("estado").value = "...";

            //Cria um elemento javascript.
            var script = document.createElement("script");

            //Sincroniza com o callback.
            script.src =
                "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callback";

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}
</script>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../imgs/favicon.ico" type="image/x-icon">
    <title>Familias</title>
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

                <li class="nav-item dropdown " style="list-style: none;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false" style="color:green">
                        <?php echo '<img src="data:../imgs/conta;base64,' . base64_encode($imagemUsuario) . '" style="border-radius:50px;width: 40px; height: 40px;">' ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="../conta/conta.php" style="color:green">VER PERFIL</a>
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

<body style="background-color:whitesmoke">

    <div class="container-fluid">
        <div class="row" style="margin-bottom:15px">
            <div class="col m-auto" style="text-align:center">

                <div id="modalCadastro">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" style="font-size: 1.2em; width: 200px; margin-top:50px">Cadastrar
                        <br> Responsável</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="container" style="text-align:center">
                                        <h5 class="modal-title" style="color: green;">Cadastrar Responsável da
                                            Família</h5>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action='../../crud/responsavelFamilia/controleResponsavelFamilia.php'
                                        method='GET' autocomplete="off">
                                        <div class="form-floating mb-3 mt-3">
                                            <input type="text" class="form-control inputCadastro" name='nome' required
                                                placeholder="Nome">
                                            <label class="labelCadastro">Nome</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCadastro" type="date" name="dataNascimento"
                                                required placeholder="Data de Nascimento">
                                            <label class="labelCadastro">Data de Nascimento</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCadastro" type="number" name="cpf" required
                                                placeholder="CPF">
                                            <label class="labelCadastro">CPF</label>
                                        </div>
                                        <div>
                                            <select class="form-select inputCadastro"
                                                aria-label="Default select example" name="sexo" class="labelCadastro">
                                                <option value="F" name="sexo" class="labelCadastro">Feminino</option>
                                                <option value="M" name="sexo" class="labelCadastro">Masculino</option>
                                            </select>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCadastro" type="text" name="celular"
                                                placeholder="Celular">
                                            <label class="labelCadastro">Celular</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCadastro" type="text" name="telefone"
                                                placeholder="Telefone">
                                            <label class="labelCadastro">Telefone</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCadastro" type="email" name="email"
                                                placeholder="Email">
                                            <label class="labelCadastro">Email</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCep inputCadastro" type="text" id="cep"
                                                name="cep" placeholder="CEP" required>
                                            <script>
                                            $(document).ready(function() {
                                                $(".inputCep").blur(function() {
                                                    var divItens = document.getElementById("cep").value;
                                                    pesquisacep(divItens);
                                                });
                                            });
                                            </script>
                                            <label class="labelCadastro">CEP</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCadastro" type="text" id="endereco"
                                                name="rua" placeholder="Rua" readonly>
                                            <label class="labelCadastro">Rua</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCadastro" type="text" id="bairro"
                                                name="bairro" placeholder="Bairro" readonly>
                                            <label class="labelCadastro">Bairro</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCadastro" type="text" id="cidade"
                                                name="cidade" placeholder="Cidade" readonly>
                                            <label class="labelCadastro">Cidade</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCadastro" type="text" name="estado"
                                                id="estado" placeholder="Estado" readonly>
                                            <label class="labelCadastro">Estado</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCadastro" type="number"
                                                name="numeroResidencia" placeholder="Número da Residência" required>
                                            <label class="labelCadastro">Número Residência</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3">
                                            <input class="form-control inputCadastro" type="text" name="complemento"
                                                placeholder="Complemento">
                                            <label class="labelCadastro">Complemento</label>
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

    <div class="container">
        <div class="overflow-auto">
            <div class="column">
                <div class="m-2">

                    <table class="table" style="color:green">
                        <thead>
                            <th scope="col" style="text-align:center">#</th>
                            <th scope="col" style="text-align:center">Nome</th>
                            <th scope="col" style="text-align:center">Data de Nascimento</th>
                            <th scope="col" style="text-align:center">CPF</th>
                            <th scope="col" style="text-align:center">Celular</th>
                            <th scope="col" style="text-align:center">Ações</th>
                        </thead>
                        <tbody>
                            <?php

                        include_once("../../connection/conexao.php");
                        $sql = "SELECT responsavel_familia.id_responsavel, responsavel_familia.nome_responsavel,
                                responsavel_familia.data_nascimento_responsavel,responsavel_familia.cpf_responsavel,
                                contato.celular FROM responsavel_familia INNER JOIN contato ON responsavel_familia.id_responsavel = contato.Id_contato";
                        $banco = new conexao();
                        $con = $banco->getConexao();
                        $resultados_responsavel = $con->query($sql);
                        while ($row = $resultados_responsavel->fetch()) {
                        ?>
                            <tr>
                                <td style='text-align:center'>
                                    <span
                                        id="id<?php echo $row['id_responsavel']; ?>"><?php echo $row['id_responsavel']; ?>
                                    </span>
                                </td>
                                <td style='text-align:center'>
                                    <span
                                        id="nome<?php echo $row['id_responsavel']; ?>"><?php echo $row['nome_responsavel']; ?>
                                    </span>
                                </td>
                                <td style='text-align:center'>
                                    <span
                                        id="data_nascimento<?php echo $row['id_responsavel']; ?>"><?php echo $row['data_nascimento_responsavel']; ?>
                                    </span>
                                </td>
                                <td style='text-align:center'>
                                    <span
                                        id="cpf<?php echo $row['id_responsavel']; ?>"><?php echo $row['cpf_responsavel']; ?>
                                    </span>
                                </td>
                                <td style='text-align:center'>
                                    <span
                                        id="celular<?php echo $row['id_responsavel']; ?>"><?php echo $row['celular']; ?>
                                    </span>
                                </td>
                                <td style='text-align:center'>
                                    <button class='btn btn-sm btn-outline-primary view'
                                        value="<?php echo $row['id_responsavel']; ?>">
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                            fill='currentColor' class='bi bi-clipboard' viewBox='0 0 16 16'>
                                            <path
                                                d='M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z' />
                                            <path
                                                d='M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z' />
                                        </svg>
                                    </button>

                                    <button class='btn btn-sm btn-outline-danger delete'
                                        value="<?php echo $row['id_responsavel']; ?>">
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'
                                            fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                            <path
                                                d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                                            <path fill-rule='evenodd'
                                                d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                                        </svg>
                                    </button>

                                    <button class='btn btn-sm btn-outline-success edit'
                                        value="<?php echo $row['id_responsavel']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
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

    <div id="consultar" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container" style="text-align:center">
                        <h5 class="modal-title" id="exampleModalLabel">Consulta do Responsavel</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <span id="consultarResponsavel"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                        id="closeView">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container" style="text-align:center">
                        <h4 class="modal-title" id="exampleModalLabel1">Apagar Responsavel</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action='../../crud/responsavelFamilia/deleteResponsavelFamilia.php' method='GET'
                            autocomplete='off'>
                            <div class='form-floating mb-3 mt-3'>
                                <input class='form-control inputCadastro' type='number' name='idResponsavel'
                                    placeholder='Id' id="idResponsavel" readonly>
                                <label class='labelCadastro'>ID</label>
                            </div>
                            <p>Realmente deseja excluir esse Responsavel?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                            id="closeDelete">Fechar</button>
                        <p style='text-align:center'><input type='submit' class='btn btn-outline-success' name='delete'
                                value='Deletar'>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container" style="text-align:center">
                        <h4 class="modal-title" id="exampleModalLabel1">Editar Responsavel</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <span id="editarResponsavel"></span>
                </div>
            </div>
            </form>
        </div>
    </div>



    <script>
    $(document).ready(function() {

        $(document).on("click", ".view", function() {
            var id = $(this).val();
            if (id != '') {
                var dados = {
                    id: id
                }
                $.ajax({
                    type: "POST",
                    url: "../../crud/responsavelFamilia/consultaResponsavelFamilia.php",
                    data: dados,
                    success: function(resultado) {
                        $("#consultarResponsavel").html(resultado);
                        $('#consultar').modal('show');
                    }
                });
            } else {
                alert("ERRO ID VAZIO");
            }
        });

        $(document).on("click", ".edit", function() {
            var id = $(this).val();
            if (id != '') {
                var dados = {
                    id: id
                }
                $.ajax({
                    type: "POST",
                    url: "../../crud/responsavelFamilia/editResponsavelFamilia.php",
                    data: dados,
                    success: function(resultado) {
                        $("#editarResponsavel").html(resultado);
                        $('#edit').modal('show');
                    }
                });
            } else {
                alert("ERRO ID VAZIO");
            }
        });

        $(document).ready(function() {
            $(document).on("click", ".delete", function() {
                var id = $(this).val();
                $("#delete").modal("show");
                $("#idResponsavel").val(id);
            });
        });

        $(document).ready(function() {
            $("#closeDelete").click(function() {
                $("#delete").modal('hide');
            });

            $("#closeView").click(function() {
                $("#consultar").modal('hide');
            });

            $("#closeEdit").click(function() {
                $("#edit").modal('hide');
            });
        });

    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
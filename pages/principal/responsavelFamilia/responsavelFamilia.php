<?php
session_start();
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location: ../../../login.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../../Js/consultaCEP.js"></script>
    <title>Familias</title>
    </title>



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

<body>
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
                        <a class="nav-link " href="responsavelFamilia.php" id="linkBar">FAMILIAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cestas/cestas.php" id="linkBar">CESTAS</a>
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
                <div id="modalCadastrar">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCadastrar"
                        style="font-size: 1.2em; width: 200px; margin-top:50px">Cadastrar <br> Responsável</button>
                    <div class="modal fade" id="exampleModalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <div class="container" style="text-align:center">
                                    <h5 class="modal-title" style="color: green;">Cadastrar Responsável da
                                        Família</h5></div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action='../../../crud/responsavelF/controleResponsavelF.php' method='GET'
                                        autocomplete="off">
                                        <p>
                                            <input class="inputModalCadastro" type="text" name="nome" placeholder="Nome"
                                                required />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="date" name="dataNasc"
                                                placeholder="Data de Nascimento" required />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="number" name="cpf"
                                                placeholder="CPF" required/>
                                        </p>
                                        <p>
                                            <select class="form-select" aria-label="Default select example"
                                                name="sexoP">
                                                <option value="F" name="sexoP">Feminino</option>
                                                <option value="M" name="sexoP">Masculino</option>
                                            </select>
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="text" name="celular"
                                                placeholder="Celular" />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="text" name="telefone"
                                                placeholder="Telefone" />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="email" name="email"
                                                placeholder="Email" />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="text"
                                                onblur="pesquisacep(this.value);" id="cep" name="cep" placeholder="CEP"
                                                required />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="text" id="endereco" name="rua"
                                                placeholder="Rua" />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="text" id="bairro" name="bairro"
                                                placeholder="Bairro" />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="text" id="cidade" name="cidade"
                                                placeholder="Cidade" />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="text" name="estado" id="estado" placeholder="Estado">
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="number" name="numRes"
                                                placeholder="Número da Residência" required />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="text" name="complemento"
                                                placeholder="Complemento" />
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

        <div class="container">
            <div class="overflow-auto">
                <table class="table" style="color:green;">
                    <thead>
                        <tr><a href="#">
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Data de Nascimento</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Ações</th>
                        </tr></a>
                    </thead>
                    <tbody>
                        <?php

                        include_once("../../../connection/conexao.php");
                        $sql = "SELECT responsavelFamilia.idResponsavel, responsavelFamilia.nome_responsavel,
                                responsavelFamilia.data_nascimento_responsavel,responsavelFamilia.cpf_responsavel,
                                contato.celular FROM responsavelFamilia INNER JOIN contato ON responsavelFamilia.idResponsavel = contato.IdContato";

                        $sqlSelect = "SELECT responsavelFamilia.idResponsavel, responsavelFamilia.nome_responsavel,responsavelFamilia.data_nascimento_responsavel,
                                responsavelFamilia.sexo_responsavel,contato.celular,contato.telefone,contato.email,responsavelFamilia.complemento_responsavel,
                                responsavelFamilia.n_responsavel,responsavelFamilia.data_atendimento,responsavelFamilia.cpf_responsavel,codigoEnderecoPostal.cep,codigoEnderecoPostal.rua,
                                codigoEnderecoPostal.bairro,codigoEnderecoPostal.estado,codigoEnderecoPostal.cidade	 
                                FROM responsavelFamilia INNER JOIN contato ON responsavelFamilia.idResponsavel = contato.IdContato 
                                INNER JOIN codigoEnderecoPostal on responsavelFamilia.idResponsavel = codigoEnderecoPostal.idCep 
                                where idResponsavel=idResponsavel";
                        $banco = new conexao();
                        $con = $banco->getConexao();
                        $resultados_responsavel = $con->query($sql);
                        $result = $con->query($sqlSelect);

                        if ($result->rowCount() > 0) {

                            while ($user_data = $result->fetch()) {
                                $idResponsavel = $user_data['idResponsavel'];
                                $nome_responsavel = $user_data['nome_responsavel'];
                                $data_nascimento_responsavel = $user_data['data_nascimento_responsavel'];
                                $sexo_responsavel = $user_data['sexo_responsavel'];
                                $complemento_responsavel = $user_data['complemento_responsavel'];
                                $n_responsavel = $user_data['n_responsavel'];
                                $data_atendimento = $user_data['data_atendimento'];
                                $cpf = $user_data['cpf_responsavel'];

                                $celular = $user_data['celular'];
                                $telefone = $user_data['telefone'];
                                $email = $user_data['email'];

                                $cep = $user_data['cep'];
                                $rua = $user_data['rua'];
                                $bairro = $user_data['bairro'];
                                $estado = $user_data['estado'];
                                $cidade = $user_data['cidade'];
                            }
                        }


                        while ($row = $resultados_responsavel->fetch()) {
                            echo "<tr>";
                            echo "<td>" . $row['idResponsavel'] . "</td>";
                            echo "<td>" . $row['nome_responsavel'] . "</td>";
                            echo "<td>" . $row['data_nascimento_responsavel'] . "</td>";
                            echo "<td>" . $row['cpf_responsavel'] . "</td>";
                            echo "<td>" . $row['celular'] . "</td>";
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
                            <div class='modal' id='taticBackdrop2' tabindex='-1' role='dialog'>
                                <div class='modal-dialog' role='document'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <div class='container' style='text-align:center'>
                                                <h5 class='modal-title'>Deletar Informações do Responsável</h5>
                                            </div>
                                        </div>
                                        <div class='modal-body'>
                                            <p style='color:black'>Deseja Realmente Deletar as Informações do Responsável desta Familia?</p>
                                        </div>
                                        <div class='modal-footer'>
                                        <button type='button' class='btn btn-outline-danger' data-bs-dismiss='modal'>
                                        Cancelar
                                    </button> 
                                            <a class='btn btn-outline-success' href='../../../crud/responsavelF/deleteResponsavelF.php?idResponsavel=$row[idResponsavel]'>Confirmar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='modal fade' id='taticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                                <div class='container' style='text-align:center'>
                                                    <h5 class='modal-title' id='staticBackdropLabel'>Alterar Informações da responsavel</h5>
                                                </div>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                        <form action='../../../crud/responsavelF/editResponsavelF.php' method='GET' autocomplete='off'>
                                        <p>
                                            <input class='inputModalEdit' type='number' min='0' name='idResponsavel' placeholder='Id'
                                                value='$idResponsavel' />
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='text' name='nome' placeholder='Nome'
                                                value='$nome_responsavel' />
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='date' name='dataNasc' placeholder='Data de Nascimento'
                                                value='$data_nascimento_responsavel'/>
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='number' name='cpf' placeholder='CPF'
                                                value='$cpf'/>
                                        </p>
                                        <p>
                                            <select class='form-select' aria-label='Default select example' name='sexoP'>
                                                <option value= '$sexo_responsavel' name='sexoP'>
                                                </option>
                                                <option value='F' name='sexoP'>Feminino</option>
                                                <option value='M' name='sexoP'>Masculino</option>
                                            </select>
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='text' name='celular' placeholder='Celular'
                                                value='$celular' />
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='text' name='telefone' placeholder='Telefone'
                                                value='$telefone' />
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='email' name='email' placeholder='Email'
                                                value='$email' />
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='text' onblur='pesquisacep(this.value);' id='cep' name='cep'
                                                placeholder='CEP' value='$cep' />
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='text' id='endereco' name='rua' placeholder='Rua'
                                                value='$rua' />
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='text' id='bairro' name='bairro' placeholder='Bairro'
                                                value='$bairro' />
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='text' id='cidade' name='cidade' placeholder='Cidade'
                                                value='$cidade' />
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='text' name='estado' id='estado'
                                                value='$estado' />
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='number' name='numRes' placeholder='Número da Residência'
                                                value='$n_responsavel' />
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='text' name='complemento' placeholder='Complemento'
                                                value='$complemento_responsavel' />
                                        </p>
                                        <p>
                                            <input class='inputModalEdit' type='date' name='dataAtendimento'
                                                placeholder='Data de Atendimento' value='$data_atendimento' />
                                        </p>
                                        <div class='modal-footer'>
                                            <button type='button' class='btn btn-outline-danger' data-bs-dismiss='modal'>Cancelar</button>
                                            <p style='text-align:center'><input type='submit' class='btn btn-outline-success' name='update' value='Atualizar'>
                                        </div> 
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>



</html>
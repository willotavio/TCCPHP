<?php
    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('location: ../../indexlogin.php');
    }

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../Js/consultaCEP.js"></script>
    <title>Consulta</title>



    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <script>
    $(function() {
        $("#header").load("header.php");
    });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    <?php include '../style.css';
    ?>
    </style>
</head>

<body>
    <header id="header"></header>
    <div class="container-fluid">

        <div class="row" style="margin-bottom:15px">
            <!-- Deletar -->
            <div class="col m-auto" style="text-align:center">
                <div id="modalCadastrar">
                    <!-- Button Deletar -->
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCadastrar"
                        style="font-size: 1.2em; width: 200px; margin-top:50px">Cadastrar <br> Família</button>
                    <!-- Button Deletar -->
                    <!-- Modal Deletar -->
                    <div class="modal fade" id="exampleModalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="TituloModalCentralizado">Família</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action='../../crud/pessoa/controlepessoa.php' method='GET'>
                                        <p>
                                            <input class="inputModalCadastro" type="text" name="nome"
                                                placeholder="Nome" />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="date" name="dataNasc"
                                                placeholder="Data de Nascimento" />
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
                                                onblur="pesquisacep(this.value);" id="cep" name="cep"
                                                placeholder="CEP" />
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
                                            <input type="text" name="estado" id="estado" value="Estado">
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="number" name="numRes"
                                                placeholder="Número da Residência" />
                                        </p>
                                        <p>
                                            <input class="inputModalCadastro" type="text" name="complemento"
                                                placeholder="Complemento" />
                                        </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                        Fechar
                                    </button>
                                    <p><input type="submit" class="btn btn-success" name='botao' value='Cadastrar'>
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
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">CEP</th>
                            <th scope="col">Número da Residência</th>
                            <th scope="col">Complemento</th>
                            <th scope="col">Data de Atendimento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                    
                                include_once ("../../connection/conexao.php");
                                $sql= "SELECT pessoa.idPessoa, pessoa.pessoa_cep, pessoa.nome_pessoa,pessoa.data_nascimento_pessoa,pessoa.complemento_pessoa,pessoa.n_pessoa,
                                pessoa.data_atendimento,pessoa.sexo_pessoa,contato.telefone,contato.celular,contato.email FROM pessoa INNER JOIN contato ON pessoa.idPessoa = contato.IdContato";
                                $banco = new conexao();
                                $con = $banco->getConexao();
                                $resultados_pessoa= $con->query($sql);
                
                                
                                while($row = $resultados_pessoa->fetch()){
                                    echo "<tr>";
                                    echo "<td>".$row['idPessoa']."</td>";
                                    echo "<td>".$row['nome_pessoa']."</td>";
                                    echo "<td>".$row['data_nascimento_pessoa']."</td>";
                                    echo "<td>".$row['sexo_pessoa']."</td>";
                                    echo "<td>".$row['celular']."</td>";
                                    echo "<td>".$row['telefone']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['pessoa_cep']."</td>";
                                    echo "<td style='text-align:center'>".$row['n_pessoa']."</td>";
                                    echo "<td style='text-align:center'>".$row['complemento_pessoa']."</td>";
                                    echo "<td>".$row['data_atendimento']."</td>";
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
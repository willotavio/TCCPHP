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
                                    <form action='../../crud/familia/controleFamilia.php' method='GET'>
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
                        <tr><a href="#">
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Data de Nascimento</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Celular</th>
                        </tr></a>
                    </thead>
                    <tbody>
                        <?php 
                                    
                                include_once ("../../connection/conexao.php");
                                $sql= "SELECT familia.idFamilia, familia.nome_familia,
                                familia.data_nascimento_familia,familia.sexo_familia,contato.celular FROM familia INNER JOIN contato ON familia.idFamilia = contato.IdContato";
                                $banco = new conexao();
                                $con = $banco->getConexao();
                                $resultados_familia= $con->query($sql);
                
                                
                                while($row = $resultados_familia->fetch()){
                                    echo "<tr>";
                                    echo "<td>".$row['idFamilia']."</td>";
                                    echo "<td>".$row['nome_familia']."</td>";
                                    echo "<td>".$row['data_nascimento_familia']."</td>";
                                    echo "<td>".$row['sexo_familia']."</td>";
                                    echo "<td>".$row['celular']."</td>";
                                    echo "<td>
                                    <a class='btn btn-sm btn-outline-danger' href='indexEditFamilia.php?idFamilia=$row[idFamilia]'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-box-arrow-in-up-right' viewBox='0 0 16 16'>
                                            <path fill-rule='evenodd' d='M6.364 13.5a.5.5 0 0 0 .5.5H13.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 13.5 1h-10A1.5 1.5 0 0 0 2 2.5v6.636a.5.5 0 1 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H6.864a.5.5 0 0 0-.5.5z'/>
                                            <path fill-rule='evenodd' d='M11 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793l-8.147 8.146a.5.5 0 0 0 .708.708L10 6.707V10.5a.5.5 0 0 0 1 0v-5z'/>
                                        </svg>
                                    </a>
                                    </td>";
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
    <?php
    include_once ("../../connection/testeconexao.php");
    $sql= "SELECT * FROM pessoa";
    $resultados_pessoa= mysqli_query($conexaoTeste, $sql);
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulta</title>

        <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
        </script>
        <script>
        $(function() {
            $("#header").load("header.php");
        });
        </script>

        <style>
        <?php include '../style.css';
        ?>
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>

    <body>
        <header id="header"></header>
        <div class="container-fluid">
            <div class="column">
                <div class="row">

                    <!-- Cadastro -->
                    <div class="col-2 m-auto">
                        <div id="modalCadastro">
                            <!-- Button Cadastro -->
                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                style="font-size: 1.2em; width: 200px; margin-top:50px">Cadastrar <br> Família</button>
                            <!-- Button Cadastro -->
                            <!-- Modal Cadastro -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                                    <input class="inputModalCadastro" type="number" min="0"
                                                        name="codigo" placeholder="Código" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="text" name="nome"
                                                        placeholder="Nome" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="date" name="dataNasc"
                                                        placeholder="Data de Nascimento" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="number" name="celular"
                                                        placeholder="Celular" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="number" name="whatsapp"
                                                        placeholder="Whatsapp" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="number" name="telefone"
                                                        placeholder="Telefone" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="text" name="email"
                                                        placeholder="Email" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="text" name="cepPessoa"
                                                        placeholder="CEP" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="number" name="numRes"
                                                        placeholder="Número da Residência" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="text" name="complemento"
                                                        placeholder="Complemento" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="date" name="dataAtendimento"
                                                        placeholder="Data de Atendimento" />
                                                </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                Fechar
                                            </button>
                                            <p><input type="submit" class="btn btn-success" name='botao'
                                                    value='Cadastrar'>
                                            </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Cadastro -->
                        </div>
                    </div>
                    <!-- Cadastro -->
                    <!-- Deletar -->
                    <div class="col-2 m-auto">
                        <div id="modalDeletar">
                            <!-- Button Deletar -->
                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                data-bs-target="#exampleModalDeletar"
                                style="font-size: 1.2em; width: 200px; margin-top:50px">Deletar <br> Família</button>
                            <!-- Button Deletar -->
                            <!-- Modal Deletar -->
                            <div class="modal fade" id="exampleModalDeletar" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabelDeletar">Deletar Cadastro</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action='../../crud/pessoa/controlepessoa.php' method='GET'>
                                                <p>
                                                    <input class="inputModalCadastro" type="number" min="0"
                                                        name="codigo" placeholder="Código" />
                                                </p>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Fechar</button>
                                            <p><input type="submit" class="btn btn-success" name='botao'
                                                    value='Deletar'>
                                            </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Deletar -->
                        </div>
                    </div>
                    <!-- Deletar -->
                    <!-- Atualizar -->
                    <div class="col-2 m-auto">
                        <div id="modalAtualizar">
                            <!-- Button Atualizar -->
                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                data-bs-target="#exampleModalAttPessoa"
                                style="font-size: 1.2em; width: 200px; margin-top:50px">Atualizar <br> Família</button>
                            <!-- Button Atualizar -->
                            <!-- Modal Atualizar -->
                            <div class="modal fade" id="exampleModalAttPessoa" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabelAttPessoa">
                                                Atualizar Família
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action='../../crud/pessoa/controlepessoa.php' method='GET'>
                                                <p>
                                                    <input class="inputModalCadastro" type="number" min="0"
                                                        name="codigo" placeholder="Código" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="text" name="nome"
                                                        placeholder="Nome" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="date" name="dataNasc"
                                                        placeholder="Data de Nascimento" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="number" name="celular"
                                                        placeholder="Celular" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="number" name="whatsapp"
                                                        placeholder="Whatsapp" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="number" name="telefone"
                                                        placeholder="Telefone" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="text" name="email"
                                                        placeholder="Email" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="text" name="cepPessoa"
                                                        placeholder="CEP" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="number" name="numRes"
                                                        placeholder="Número da Residência" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="text" name="complemento"
                                                        placeholder="Complemento" />
                                                </p>
                                                <p>
                                                    <input class="inputModalCadastro" type="date" name="dataAtendimento"
                                                        placeholder="Data de Atendimento" />
                                                </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"" data-bs-dismiss=" modal">
                                                Fechar
                                            </button>
                                            <p><input type="submit" class="btn btn-success" name='botao'
                                                    value='Atualizar'>
                                            </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Atualizar -->
                        </div>
                    </div>
                    <!--Atualizar -->
                </div>

                <div class="row">
                    <div class="container">
                        <table class="table text-white">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Data de Nascimento</th>
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
                    
                    while($userdata = mysqli_fetch_assoc($resultados_pessoa)){
                        echo "<tr>";
                        echo "<td>".$userdata['codigo_pessoa']."</td>";
                        echo "<td>".$userdata['nome_pessoa']."</td>";
                        echo "<td>".$userdata['data_nascimento']."</td>";
                        echo "<td>".$userdata['celular']."</td>";
                        echo "<td>".$userdata['telefone']."</td>";
                        echo "<td>".$userdata['email']."</td>";
                        echo "<td>".$userdata['cep_pessoa']."</td>";
                        echo "<td>".$userdata['numero_casa']."</td>";
                        echo "<td>".$userdata['complemento']."</td>";
                        echo "<td>".$userdata['data_atendimento']."</td>";
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
    <?php
    include_once ("../../connection/testeconexao.php");
    $sql= "SELECT * FROM cestas";
    $resultados_cestas= mysqli_query($conexaoTeste, $sql);
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

    <header id="header"></header>

    <body>

        <div class="column">
            <div class="row">
                <div class="col-2 m-auto">
                    <div id="modalCadastro">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-light" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                            style="font-size: 1.2em; width: 200px; margin-top:50px">Cadastrar <br> Cesta</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="TituloModalCentralizado">Cesta</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action='../../crud/cestas/controlecestas.php' method='GET'>
                                            <p>
                                                <input class="inputModalCadastro" type="number" min="0" name="idCestas"
                                                    placeholder="Id" />
                                            </p>
                                            <p>
                                                <input class="inputModalCadastro" type="text" name="quantidadeCestas"
                                                    placeholder="Quantidade" />
                                            </p>
                                            <p>
                                                <input class="inputModalCadastro" type="date" name="recebimentoCestas"
                                                    placeholder="Data de Recebimento" />
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
                <div class="col-2 m-auto">
                    <div id="modalDeletar">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-light" data-bs-toggle="modal"
                            data-bs-target="#exampleModalDeletar"
                            style="font-size: 1.2em; width: 200px; margin-top:50px">Deletar <br> Cesta</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalDeletar" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelDeletar">Deletar Cesta</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action='../../crud/cestas/controlecestas.php' method='GET'>
                                            <p>
                                                <input class="inputModalDeletar" type="number" min="0" name="idCestas"
                                                    placeholder="Id" />
                                            </p>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Fechar</button>
                                        <p><input type="submit" class="btn btn-success" name='botao' value='Deletar'>
                                        </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-2 m-auto">
                    <div id="modalAtualizar">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-light" data-bs-toggle="modal"
                            data-bs-target="#exampleModalAttCesta"
                            style="font-size: 1.2em; width: 200px; margin-top:50px">Atualizar <br> Cesta</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalAttCesta" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelAttCesta">
                                            Atualizar Cesta
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action='../../crud/cestas/controlecestas.php' method='GET'>
                                            <p>
                                                <input class="inputModalAtualizar" type="number" min="0" name="idCestas"
                                                    placeholder="Id" />
                                            </p>
                                            <p>
                                                <input class="inputModalAtualizar" type="text" name="quantidadeCestas"
                                                    placeholder="Quantidade" />
                                            </p>
                                            <p>
                                                <input class="inputModalAtualizar" type="date" name="recebimentoCestas"
                                                    placeholder="Data de Recebimento" />
                                            </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                            Fechar
                                        </button>
                                        <p><input type="submit" class="btn btn-success" name='botao' value='Atualizar'>
                                        </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="m-2 ">

                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Data de Recebimento</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                    
                    while($userdata = mysqli_fetch_assoc($resultados_cestas)){
                        echo "<tr>";
                        echo "<td>".$userdata['idCestas']."</td>";
                        echo "<td>".$userdata['quantidade_cestas']."</td>";
                        echo "<td>".$userdata['recebimento_cestas']."</td>";
                        
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

    <?php include('footer.php');?>

    </html>
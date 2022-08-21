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
    <link rel="stylesheet" href="../style.css">
    <script>
    $(function() {
        $("#header").load("header.php");
    });
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <header id="header"></header>
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
        </div>


    </div>
    <div class="container">
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
                    
                    include_once ("../../connection/conexao.php");
                    $sql= "SELECT * FROM cestas";
                    $banco = new conexao();
                    $con = $banco->getConexao();
                    $resultados_cestas = $con->query($sql);
            
                    while($row = $resultados_cestas->fetch()){
                    echo "<tr>";
                        echo "<td style='text-align:center'>".$row['idCestas']."</td>";
                        echo "<td style='text-align:center'>".$row['quantidade_cestas']."</td>";
                        echo "<td style='text-align:center'>".$row['recebimento_cestas']."</td>";
                        echo "<td>
                            <a class='btn btn-sm btn-warning' href='indexcestasEdit.php?idCestas=$row[idCestas]'><svg
                                    xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                    class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path
                                        d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
                                </svg>
                            </a>
                            <a class='btn btn-sm btn-danger'
                                href='../../crud/cestas/deleteCestas.php?idCestas=$row[idCestas]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                    class='bi bi-file-earmark-excel' viewBox='0 0 16 16'>
                                    <path
                                        d='M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z' />
                                    <path
                                        d='M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z' />
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
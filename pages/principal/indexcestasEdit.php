    <?php
    if(!empty($_GET['idCestas'])){
        include_once('../../connection/testeconexao.php');

        $idCestas = $_GET['idCestas'];

        $sqlSelect = "SELECT * FROM cestas WHERE idCestas =$idCestas";

        $result = $conexaoTeste->query($sqlSelect);

        if($result->num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result)){
            $idCestas = $user_data['idCestas'];
            $quantidadeCestas = $user_data['quantidade_cestas'];
            $recebimentoCestas = $user_data['recebimento_cestas'];
            }
        }else{
            header('location: ../../pages/principal/indexcestas.php');
        }
    }else{
            header('location: ../../pages/principal/indexcestas.php');
        }
    
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cestas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="../style.css">
    </head>


    <body>
        <div class="container" style="margin-top:10%">
            <div class="row">
                <div class="col-2 m-auto">
                    <h5 class="modal-title" style="text-align:center">Cesta</h5>
                    <form action='../../crud/cestas/editCestas.php' method='GET'>
                        <p>
                            <input class="inputModalEdit" type="number" min="0" name="idCestas" placeholder="Id"
                                value=<?php echo $idCestas?> />
                        </p>
                        <p>
                            <input class="inputModalEdit" type="text" name="quantidadeCestas" placeholder="Quantidade"
                                value=<?php echo $quantidadeCestas?> />
                        </p>
                        <p>
                            <input class="inputModalEdit" type="date" name="recebimentoCestas"
                                placeholder="Data de Recebimento" value=<?php echo $recebimentoCestas?> />
                        </p>
                </div>
                <p style="text-align:center"><input type="submit" class="btn btn-success" name='update' value='update'>
                </p>
                </form>
                <a href="indexcestas.php" style="text-align:center">Voltar</a>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>
    </body>

    </html>
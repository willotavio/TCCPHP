<?php
    if(!empty($_GET['idFamilia'])){
        include_once('../../connection/conexao.php');
        session_start();
        $idFamilia = $_GET['idFamilia'];
        $_SESSION['id'] = $idFamilia;
        $sqlSelect = "SELECT familia.idFamilia, familia.nome_familia,familia.data_nascimento_familia,
        familia.sexo_familia,contato.celular,contato.telefone,contato.email,familia.complemento_familia,
        familia.n_familia,familia.data_atendimento,codigoEnderecoPostal.cep,codigoEnderecoPostal.rua,
        codigoEnderecoPostal.bairro,codigoEnderecoPostal.estado,codigoEnderecoPostal.cidade	 
        FROM familia INNER JOIN contato ON familia.idFamilia = contato.IdContato 
        INNER JOIN codigoEnderecoPostal on familia.idFamilia = codigoEnderecoPostal.idCep 
        where idFamilia=$idFamilia";
        
        $banco = new conexao();
        $con = $banco->getConexao();
        $result= $con->query($sqlSelect);

        if($result->rowCount() > 0){

            while($user_data = $result->fetch()){
            $idFamilia = $user_data['idFamilia'];
            $nome_familia = $user_data['nome_familia'];
            $data_nascimento_familia = $user_data['data_nascimento_familia'];
            $sexo_familia = $user_data['sexo_familia'];
            $complemento_familia = $user_data['complemento_familia'];
            $n_familia = $user_data['n_familia'];
            $data_atendimento = $user_data['data_atendimento'];
            
            $celular = $user_data['celular'];
            $telefone = $user_data['telefone'];
            $email = $user_data['email'];
            
            $cep = $user_data['cep'];
            $rua = $user_data['rua'];
            $bairro = $user_data['bairro'];
            $estado = $user_data['estado']; 
            $cidade = $user_data['cidade'];

            }
        }else{
            header('location: ../../pages/principal/indexfamilia.php');
        }
    }else{
            header('location: ../../pages/principal/indexfamilia.php');
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
    <style>
    <?php include '../style.css';
    ?>
    </style>
</head>


<body>
    <div class="container" style="margin-top:10%">
        <div class="row">
            <div class="col-2 m-auto">
                <h5 class="modal-title" style="text-align:center">Cesta</h5>
                <form action='../../crud/cestas/editCestas.php' method='GET'>
                    <p>
                        <input class="inputModalEdit" type="number" min="0" name="idCestas" placeholder="Id"
                            value=<?php echo $idFamilia?> />
                    </p>
                    <p>
                        <input class="inputModalEdit" type="text" name="nome" placeholder="Nome"
                            value=<?php echo $nome_familia?> />
                    </p>
                    <p>
                        <input class="inputModalEdit" type="date" name="dataNasc" placeholder="Data de Nascimento"
                            value=<?php echo    $data_nascimento_familia ?> />
                    </p>
                    <p>
                        <select class="form-select" aria-label="Default select example" name="sexoP">
                            <option value=<?php echo $sexo_familia?>name="sexoP">
                                <?php if($sexo_familia=="F"){
                                echo "Feminino";
                            }else{
                                echo"Masculino";
                            }
                            ?>
                            </option>
                            <option value="F" name="sexoP">Feminino</option>
                            <option value="M" name="sexoP">Masculino</option>
                        </select>
                    </p>
                    <p>
                        <input class="inputModalEdit" type="text" name="celular" placeholder="Celular"
                            value=<?php echo $celular?> />
                    </p>
                    <p>
                        <input class="inputModalEdit" type="text" name="telefone" placeholder="Telefone"
                            value=<?php echo $telefone?> />
                    </p>
                    <p>
                        <input class="inputModalEdit" type="email" name="email" placeholder="Email"
                            value=<?php echo $email?> />
                    </p>
                    <p>
                        <input class="inputModalEdit" type="text" onblur="pesquisacep(this.value);" id="cep" name="cep"
                            placeholder="CEP" value=<?php echo  $cep?> />
                    </p>
                    <p>
                        <input class="inputModalEdit" type="text" id="endereco" name="rua" placeholder="Rua"
                            value=<?php echo    $rua?> />
                    </p>
                    <p>
                        <input class="inputModalEdit" type="text" id="bairro" name="bairro" placeholder="Bairro"
                            value=<?php echo   $bairro?> />
                    </p>
                    <p>
                        <input class="inputModalEdit" type="text" id="cidade" name="cidade" placeholder="Cidade"
                            value=<?php echo $estado?> />
                    </p>
                    <p>
                        <input type="text" name="estado" id="estado" value="Estado" value=<?php echo 
                    $cidade?>>
                    </p>
                    <p>
                        <input class="inputModalEdit" type="number" name="numRes" placeholder="Número da Residência"
                            value=<?php echo  $n_familia?> />
                    </p>
                    <p>
                        <input class="inputModalEdit" type="text" name="complemento" placeholder="Complemento"
                            value=<?php echo  $complemento_familia?> />
                    </p>
                    <p>
                        <input class="inputModalEdit" type="date" name="dataAtendimento"
                            placeholder="Data de Atendimento" value=<?php echo $data_atendimento ?> />
                    </p>
            </div>
            <p style="text-align:center">
                <input type="submit" class="btn btn-success" name='update' value='update'>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#taticBackdrop">
                    Deletar
                </button>
            <div class='modal fade' id='taticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1'
                aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='staticBackdropLabel'>Excluir Familia</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <p>Deseja Realmente excluir está familia?</p>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-warning' data-bs-dismiss='modal'>Cancelar</button>
                            <a class='btn btn-danger'
                                href='../../crud/familia/deleteFamilia.php?idFamilia=<?php echo $_SESSION['id']?>'>Confirmar</a>
                        </div>
                    </div>
                </div>
            </div>
            </p>
            </form>
            <a href="indexfamilia.php" style="text-align:center">Voltar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
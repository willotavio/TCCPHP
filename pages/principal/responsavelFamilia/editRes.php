<?php
    if(!empty($_GET['id'])){
        include_once('../../../connection/conexao.php');
        $id = $_GET['id'];
        $banco = new conexao();
        $con = $banco->getConexao();
        $sql = "SELECT responsavel_familia.id_responsavel, responsavel_familia.nome_responsavel,responsavel_familia.data_nascimento_responsavel,
                responsavel_familia.sexo_responsavel,contato.celular,contato.telefone,contato.email,responsavel_familia.complemento_responsavel,
                responsavel_familia.num_responsavel,responsavel_familia.data_atendimento_responsavel,responsavel_familia.cpf_responsavel,endereco_postal.cep,endereco_postal.rua,
                endereco_postal.bairro,endereco_postal.estado,endereco_postal.cidade	 
                FROM responsavel_familia INNER JOIN contato ON responsavel_Familia.id_responsavel = contato.Id_contato 
                INNER JOIN endereco_postal on responsavel_familia.id_responsavel = endereco_postal.id_cep 
                where id_responsavel=$id";
        $result = $con->query($sql);
        if($result->rowCount() > 0){

            while( $row = $result->fetch()){
            $idResponsavel = $row['id_responsavel'];
            $nomeR = $row['nome_responsavel'];
            $dataNascR = $row['data_nascimento_responsavel'];
            $sexoR = $row['sexo_responsavel'];
            $celular = $row['celular'];
            $telefone = $row['telefone'];
            $email = $row['email'];
            $compR = $row['complemento_responsavel'];
            $numR= $row['num_responsavel'];
            $dataAtenR = $row['data_atendimento_responsavel'];
            $cpf = $row['cpf_responsavel'];
            $cep = $row['cep'];
            $rua = $row['rua'];
            $bairro = $row['bairro'];
            $estado = $row['estado'];
            $cidade = $row['cidade'];

        }
        }else{
            header('location: responsavelFamilia.php');
        }
    }else{
            header('location: responsavelFamilia.php');
        }
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../../../Js/consultaCEP.js"></script>
        <title>Cestas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
        <?php include '../../style.css';
        ?>
        </style>
    </head>


    <body>
        <div class="container" style="margin: 4% 10% 0">
            <div class="row">
                <div class="container" style="text-align:center">
                    <h5 class="modal-title" style="color: green;">Editar Responsável da Família</h5>
                </div>
                    <form action='../../../crud/responsavelF/editResponsavelF.php' method='GET'
                        autocomplete="off">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control inputCadastro" name='id' required
                                placeholder="ID" readonly value=<?php echo $idResponsavel?>>
                            <label class="labelCadastro">ID</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control inputCadastro" name='nome' required
                                placeholder="Nome" value=<?php echo $nomeR?>>
                            <label class="labelCadastro">Nome</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input class="form-control inputCadastro" type="date" name="dataNasc" required
                                placeholder="Data de Nascimento" value=<?php echo $dataNascR?>>
                            <label class="labelCadastro">Data de Nascimento</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input  class="form-control inputCadastro" type="number" name="cpf" required
                                placeholder="CPF" value=<?php echo $cpf?>>
                            <label class="labelCadastro">CPF</label>
                        </div>
                        <div>
                            <select class="form-select inputCadastro" aria-label="Default select example"
                                name="sexoP" class="labelCadastro" value=<?php echo $sexoR?>>
                                <option value="F" name="sexoP" class="labelCadastro">Feminino</option>
                                <option value="M" name="sexoP" class="labelCadastro">Masculino</option>
                            </select>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input  class="form-control inputCadastro" type="text" name="celular"
                                placeholder="Celular" value=<?php echo $celular?>>
                            <label class="labelCadastro">Celular</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input  class="form-control inputCadastro" type="text" name="telefone"
                                placeholder="Telefone" value=<?php echo $telefone?>>
                            <label class="labelCadastro">Telefone</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input  class="form-control inputCadastro" type="email" name="email"
                                placeholder="Email"  value=<?php echo $email?>>
                            <label class="labelCadastro">Email</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input  class="form-control inputCadastro" type="text"
                                onblur="pesquisacep(this.value);" id="cep" name="cep" placeholder="CEP"
                                required value=<?php echo $cep?>>
                            <label class="labelCadastro">CEP</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input  class="form-control inputCadastro"  type="text" id="rua" name="rua"
                                placeholder="Rua" value=<?php echo preg_replace('/\s+/', '',$rua)?>>
                            <label class="labelCadastro" >Rua</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input  class="form-control inputCadastro" type="text" id="bairro" name="bairro"
                                placeholder="Bairro" value=<?php echo $bairro?>>
                            <label class="labelCadastro">Bairro</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input  class="form-control inputCadastro" type="text" id="cidade" name="cidade"
                                placeholder="Cidade" value=<?php echo preg_replace('/\s+/', '',$cidade)?>>
                            <label class="labelCadastro">Cidade</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input  class="form-control inputCadastro" type="text" name="estado" id="estado" placeholder="Estado" value=<?php echo $estado?>>
                            <label class="labelCadastro">Estado</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input  class="form-control inputCadastro" type="number" name="numRes"
                                placeholder="Número da Residência" required value=<?php echo $numR?>>
                            <label class="labelCadastro">Número Residência</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input  class="form-control inputCadastro" type="text" name="complemento"
                                placeholder="Complemento" value=<?php echo $compR?>>
                            <label class="labelCadastro">Complemento</label>
                        </div>
                        <div class="form-floating mb-3 mt-3">
                            <input  class="form-control inputCadastro" type="date" name="atendimento"
                                placeholder="atendimento" value=<?php echo $dataAtenR?>>
                            <label class="labelCadastro">Data atendimento</label>
                        </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" onclick="window.location.href='responsavelFamilia.php';" style="margin-right:20px">
                            Voltar
                        </button>
                        <input type="submit" class="btn btn-outline-success" name='update' value='Editar'>
                        
                        </form>
                    </div>
                </div>
                </form>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>
    </body>

    </html>
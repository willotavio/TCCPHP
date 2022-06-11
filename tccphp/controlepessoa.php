<?php
    $codigo = filter_input(INPUT_GET,'codigo');
    $nome =  filter_input(INPUT_GET,'nome');
    $dataNasc =  filter_input(INPUT_GET,'dataNasc');
    $celular =  filter_input(INPUT_GET,'celular');
    $whatsapp = filter_input(INPUT_GET,'whatsapp');
    $telefone =  filter_input(INPUT_GET,'telefone');
    $email =  filter_input(INPUT_GET,'email');
    $cepPessoa =  filter_input(INPUT_GET,'cepPessoa');
    $numRes = filter_input(INPUT_GET,'numRes');
    $complemento =  filter_input(INPUT_GET,'complemento');
    $dataAtendimento =  filter_input(INPUT_GET,'dataAtendimento');
    $botao =  filter_input(INPUT_GET,'botao');

    include 'pessoa.php';
    $pes = new pessoa();
    
    $pes->setCodigo($codigo);
    $pes->setNome($nome);
    $pes->setdataNasc($dataNasc);
    $pes->setCelular($celular);
    $pes->setWhatsapp($whatsapp);
    $pes->setTelefone($telefone);
    $pes->setEmail($email);
    $pes->setcepPessoa($cepPessoa);
    $pes->setnumRes($numRes);
    $pes->setComplemento($complemento);
    $pes->setdataAtendimento($dataAtendimento);

    include 'pessoaDAO.php';
    $pesDao = new pessoaDao();

    if($botao=='Cadastrar'){
        $pesDao->cadastrarPessoa($pes);
    }else if($botao=='Consultar'){
        $pesDao->consultarPessoa();
        foreach($pesDao->consultarPessoa() as $res){
            ?>
            <form action='controlepessoa.php' method='GET'>
            <p><?php echo $res['codigo_pessoa'] ?></p>
            <p><input type='text' value='<?php echo $res['nome_pessoa'] ?>'></p>
            <p><input type='text' value='<?php echo $res['data_nascimento'] ?>'></p>
            <p><input type='text' value='<?php echo $res['celular'] ?>'></p>
            <p><input type='text' value='<?php echo $res['whatsapp'] ?>'></p>
            <p><input type='text' value='<?php echo $res['telefone'] ?>'></p>
            <p><input type='text' value='<?php echo $res['email'] ?>'></p>
            <p><input type='text' value='<?php echo $res['cep_pessoa'] ?>'></p>
            <p><input type='text' value='<?php echo $res['numero_casa'] ?>'></p>
            <p><input type='text' value='<?php echo $res['complemento'] ?>'></p>
            <p><input type='text' value='<?php echo $res['data_atendimento'] ?>'></p>

            <p><input type='submit' name='botao' value='Atualizar'></p>
            <p><input type='submit' name='botao' value='Deletar'></p>
            </form>
        <?php
        }
        }else if($botao=='Atualizar'){
            $pesDao->atualizarPessoa($pes);
        }else if($botao=='Deletar'){
            $pesDao->deletarPessoa($codigo);
        }
    
?>
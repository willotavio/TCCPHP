<?php
    include '../../connection/conexao.php';
    class responsavelFamiliaDao{

        public function cadastrarResponsavelFamilia(ResponsavelFamilia $f, Contato $cont){
            $banco = new conexao();
            $con = $banco->getConexao();

            $sqlCont = 'insert into contato (telefone,celular,email) values (?,?,?)';
            $resultado1 = $con->prepare($sqlCont);
            $resultado1->bindvalue(1, $cont->getTelefone());
            $resultado1->bindvalue(2, $cont->getCelular());
            $resultado1->bindvalue(3, $cont->getEmail());
            $final = $resultado1->execute();
            $idContato = $con->lastInsertId();
        

            $diaAtual = date("Y/m/d");
            $sqlRes= 'insert into responsavel_familia (nome_responsavel, data_nascimento_responsavel, num_responsavel, complemento_responsavel,sexo_responsavel, cpf_responsavel, data_atendimento_responsavel,contato_responsavel,cep_responsavel) values (?,?,?,?,?,?,?,?,?)';
            $resultado2 = $con->prepare($sqlRes);
            $resultado2->bindValue(1, $f->getNome());
            $resultado2->bindValue(2, $f->getdataNascimento());
            $resultado2->bindValue(3, $f->getNumeroResidencia());
            $resultado2->bindValue(4, $f->getComplemento());
            $resultado2->bindValue(5, $f->getSexo()); 
            $resultado2->bindValue(6, $f->getcpf()); 
            $resultado2->bindValue(7, $diaAtual); 
            $resultado2->bindValue(8, $idContato); 
            $resultado2->bindValue(9, $f->getCep()); 
            $final = $resultado2->execute();

            if($final){
                echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrado com sucesso');
                window.location.href='../../pages/responsavelFamilia/responsavelFamilia.php';
                </script>";
            }
        }
    }
?>
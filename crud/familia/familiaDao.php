<?php
    include '../../connection/conexao.php';
    class familiaDao{
     

        public function cadastrarFamilia(Familia $f, Contato $cont, CodigoEnderecoPostal $c){
            $banco = new conexao();
            $con = $banco->getConexao();

            $sqlCont = 'insert into contato (telefone,celular,email) values (?,?,?)';
            $resultado1 = $con->prepare($sqlCont);
            $resultado1->bindvalue(1, $cont->getTelefone());
            $resultado1->bindvalue(2, $cont->getCelular());
            $resultado1->bindvalue(3, $cont->getEmail());
            $final = $resultado1->execute();
            $idConR = $con->lastInsertId();
            
            $sqlCep = 'insert into codigoEnderecoPostal (cep, rua, bairro, estado, cidade) values (?,?,?,?,?)';
            $resultado = $con->prepare($sqlCep);
            $resultado->bindValue(1, $c->getCep());
            $resultado->bindValue(2, $c->getRua());
            $resultado->bindValue(3, $c->getBairro());
            $resultado->bindValue(4, $c->getEstado());
            $resultado->bindValue(5, $c->getCidade());
            $final = $resultado->execute();
            $idCepR = $con->lastInsertId();

            $date = date("Y/m/d");
            $sqlFam = 'insert into familia (nome_familia, data_nascimento_familia, n_familia, complemento_familia,sexo_familia,data_atendimento,familia_contato,familia_cep) values (?,?,?,?,?,?,?,?)';
            $resultado2 = $con->prepare($sqlFam);
            $resultado2->bindValue(1, $f->getNomeF());
            $resultado2->bindValue(2, $f->getdataNasc());
            $resultado2->bindValue(3, $f->getNumRes());
            $resultado2->bindValue(4, $f->getComplemento());
            $resultado2->bindValue(5, $f->getSexoF()); 
            $resultado2->bindValue(6, $date); 
            $resultado2->bindValue(7, $idConR); 
            $resultado2->bindValue(8, $idCepR); 
            $final = $resultado2->execute();

            if($final){
                echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrado com sucesso');
                window.location.href='../../pages/principal/indexfamilia.php';
                </script>";
            }
        }

        public function consultarPessoa(){
            $sql = 'select * from pessoa';

            $banco = new conexao();
            $con = $banco->getConexao();
            $resultado = $con->prepare($sql);
            $resultado->execute();
            if($resultado->rowCount()>0){
                $valor = $resultado->fetchAll(\PDO::FETCH_ASSOC);
                return $valor;
            }
        }

    }//finalclass
?>
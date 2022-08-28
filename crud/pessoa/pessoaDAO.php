<?php
    include '../../connection/conexao.php';

    class pessoaDao{

        public function cadastrarPessoa(Pessoa $p, CodigoEnderecoPostal $c, Contato $cont){
            $sqlCep = 'insert into codigoEnderecoPostal (cep, rua, bairro, estado, cidade) values (?,?,?,?,?)';
            $banco = new conexao();
            $con = $banco->getConexao();
            $resultado = $con->prepare($sqlCep);
            $resultado->bindValue(1, $c->getCep());
            $resultado->bindValue(2, $c->getRua());
            $resultado->bindValue(3, $c->getBairro());
            $resultado->bindValue(4, $c->getEstado());
            $resultado->bindValue(5, $c->getCidade());
            $final = $resultado->execute();

            $sqlCont = 'insert into contato (telefone,celular,email) values (?,?,?)';
            $resultado1 = $con->prepare($sqlCont);
            $resultado1->bindvalue(1, $cont->getTelefone());
            $resultado1->bindvalue(2, $cont->getCelular());
            $resultado1->bindvalue(3, $cont->getEmail());
            $final = $resultado1->execute();
            session_start();
            $recIdCont = $con->lastInsertId();
            $_SESSION['contatoId'] = $recIdCont;

            $date = date("Y/m/d");
            $sqlPes = 'insert into pessoa (nome_pessoa, data_nascimento_pessoa, n_pessoa, complemento_pessoa,sexo_pessoa,pessoa_cep,pessoa_contato,data_atendimento) values (?,?,?,?,?,?,?,?)';
            $resultado2 = $con->prepare($sqlPes);
            $resultado2->bindValue(1, $p->getNome());
            $resultado2->bindValue(2, $p->getdataNasc());
            $resultado2->bindValue(3, $p->getNumRes());
            $resultado2->bindValue(4, $p->getComplemento());
            $resultado2->bindValue(5, $p->getSexoP()); 
            $resultado2->bindValue(6, $p->getCepessoa());
            $resultado2->bindValue(7, $p->getContPessoa());
            $resultado2->bindValue(8, $date);  
            $final = $resultado2->execute();

            if($final){
                echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrado com sucesso');
                window.location.href='../../pages/principal/indexpessoa.php';
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
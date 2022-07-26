<?php
    include '../../connection/conexao.php';

    class pessoaDao{
        
        public function consultalogin(Pessoa $pessoa){
            $query = "select * from usuario
            where nome_login=? and senha=?";
            $conexao = new Conexao(); 
            $con = $conexao->getConexao();
            $valores = $con->prepare($query);
            $valores->bindValue(1, $pessoa->getNome_Login());
            $valores->bindValue(2, $pessoa->getSenha());
            $valores->execute();
    
            if($valores->rowCount()>0){
                $resultado = $valores->fetchAll
                (\PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Senha ou Usuario incorretos');
                window.location.href='../indexlogin.php';
                </script>";
            }
        }

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

            
            $sqlPes = 'insert into pessoa (nome_pessoa, data_nascimento_pessoa, n_pessoa, complemento_pessoa,sexo_pessoa,pessoa_cep,pessoa_contato) values (?,?,?,?,?,?,?)';
            $resultado2 = $con->prepare($sqlPes);
            $resultado2->bindValue(1, $p->getNome());
            $resultado2->bindValue(2, $p->getdataNasc());
            $resultado2->bindValue(3, $p->getNumRes());
            $resultado2->bindValue(4, $p->getComplemento());
            $resultado2->bindValue(5, $p->getSexoP()); 
            $resultado2->bindValue(6, $p->getCepessoa());
            $resultado2->bindValue(7, $p->getContPessoa()); 
            $final = $resultado2->execute();

            /* update pessoa set data = curdate(); */

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
            $resultado->execute();8 
            if($resultado->rowCount()>0){
                $valor = $resultado->fetchAll(\PDO::FETCH_ASSOC);
                return $valor;
            }
        }

    }//finalclass
?>




<!-- public function atualizarPessoa(Pessoa $p){
            $sql='update pessoa set nome_pessoa=?, data_nascimento=?, celular=?, whatsapp=?, telefone=?, email=?, cep_pessoa=?, numero_casa=?, complemento=?, data_atendimento=? where codigo_pessoa=?';

            $banco = new conexao();
            $con = $banco->getConexao();
            $resultado = $con->prepare($sql);
            $resultado->bindValue(11, $p->getCodigo());
            $resultado->bindValue(1, $p->getNome());
            $resultado->bindValue(2, $p->getdataNasc());
            $resultado->bindValue(3, $p->getCelular());
            $resultado->bindValue(4, $p->getWhatsapp());
            $resultado->bindValue(5, $p->getTelefone());
            $resultado->bindValue(6, $p->getEmail());
            $resultado->bindValue(7, $p->getcepPessoa());
            $resultado->bindValue(8, $p->getnumRes());
            $resultado->bindValue(9, $p->getComplemento());
            $resultado->bindValue(10, $p->getdataAtendimento());
            
            $final = $resultado->execute();

            if($final){
                echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Atualizado com sucesso');
                window.location.href='../../pages/principal/indexpessoa.php';
                </script>";
            }
        }

        public function deletarPessoa($codigo){
            $sql = 'delete from pessoa where codigo_pessoa=?';

            $banco = new conexao();
            $con = $banco->getConexao();
            $resultado = $con->prepare($sql);
            $resultado->bindValue(1, $codigo);
            
            $final = $resultado->execute();

            if($final){
                echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Deletado com sucesso');
                window.location.href='../../pages/principal/indexpessoa.php';
                </script>";
            }
        } -->
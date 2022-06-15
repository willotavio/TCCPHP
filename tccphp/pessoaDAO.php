<?php
    include 'conexao.php';

    class pessoaDao{
        
        public function consultalogin(Pessoa $pessoa){
            $query = "select * from login
             where usuario=? and senha=?";
            $conexao = new Conexao(); 
            $con = $conexao->getConexao();
            $valores = $con->prepare($query);
            $valores->bindValue(1, $pessoa->getUsuario());
            $valores->bindValue(2, $pessoa->getSenha());
            $valores->execute();
    
            if($valores->rowCount()>0){
                $resultado = $valores->fetchAll
                (\PDO::FETCH_ASSOC);
                return $resultado;
            }
        }

        public function cadastrarPessoa(Pessoa $p){
            $sql = 'insert into pessoa (codigo_pessoa, nome_pessoa, data_nascimento, celular, whatsapp, telefone, email, cep_pessoa, numero_casa, complemento, data_atendimento) values (?,?,?,?,?,?,?,?,?,?,?)';

            $banco = new conexao();
            $con = $banco->getConexao();
            $resultado = $con->prepare($sql);
            $resultado->bindValue(1, $p->getCodigo());
            $resultado->bindValue(2, $p->getNome());
            $resultado->bindValue(3, $p->getdataNasc());
            $resultado->bindValue(4, $p->getCelular());
            $resultado->bindValue(5, $p->getWhatsapp());
            $resultado->bindValue(6, $p->getTelefone());
            $resultado->bindValue(7, $p->getEmail());
            $resultado->bindValue(8, $p->getcepPessoa());
            $resultado->bindValue(9, $p->getnumRes());
            $resultado->bindValue(10, $p->getComplemento());
            $resultado->bindValue(11, $p->getdataAtendimento());

            $final = $resultado->execute();

            if($final){
                echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrado com sucesso');
                window.location.href='indexpessoa.php';
                </script>";
            }
        }
        
        public function atualizarPessoa(Pessoa $p){
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
                window.location.href='indexpessoa.php';
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
                window.location.href='indexpessoa.php';
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
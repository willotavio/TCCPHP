<?php
    include 'conexao.php';

    class pessoaDao{
        public function cadastrarPesoa(Pessoa $p){
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
            $resultado->bindValue(9, $p->getnumeroCasa());
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
            $resultado->bindValue(1, $p->getCodigo());
            $resultado->bindValue(2, $p->getNome());
            $resultado->bindValue(3, $p->getdataNasc());
            $resultado->bindValue(4, $p->getCelular());
            $resultado->bindValue(5, $p->getWhatsapp());
            $resultado->bindValue(6, $p->getTelefone());
            $resultado->bindValue(7, $p->getEmail());
            $resultado->bindValue(8, $p->getcepPessoa());
            $resultado->bindValue(9, $p->getnumeroCasa());
            $resultado->bindValue(10, $p->getComplemento());
            $resultado->bindValue(11, $p->getdataAtendimento());
            
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
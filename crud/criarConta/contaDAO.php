<?php

include_once '../../connection/conexao.php';

class contaDao{
        private $nome, $senha, $email, $confirmarSenha, $tipo, $foto, $dest, $figuraAtual;

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        
        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }
        
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }

        public function getConfirmarSenha(){
            return $this->confirmarSenha;
        }
        public function setConfirmarSenha($confirmarSenha){
            $this->confirmarSenha = $confirmarSenha;
        }

        public function getTipo(){
            return $this->tipo;
        }
        public function setTipo($tipo){
            $this->tipo = $tipo;
        }

        public function getFoto(){
            return $this->foto;
        }
        public function setFoto($foto){
            $this->foto =$foto;
        }

        public function cadastrarNovaConta(){
            if (!isset($_SESSION)) {
                session_start();
            }
            move_uploaded_file($_SESSION['arquivoTemp'],   $_SESSION['destino'] );
            $imagem = file_get_contents("http://localhost/TCCPHP/imgs/conta/".  $_SESSION['arquivoAtual']  );

            $sql = 'insert into usuario (nome_usuario, senha_usuario, tipo_usuario, email_usuario, foto_usuario, imagem_usuario) values (?,?,?,?,?,?)';
            $banco = new conexao();
            $con = $banco->getConexao();
            $resultado = $con->prepare($sql);
            $resultado->bindValue(1, $this->nome);
            $resultado->bindValue(2, $this->senha);
            $resultado->bindValue(3, $this->tipo);
            $resultado->bindValue(4, $this->email);
            $resultado->bindValue(5, $_SESSION['arquivoAtual'] );
            $resultado->bindValue(6, $imagem);
            $final = $resultado->execute();

            if($final){
                
                echo "<script LANGUAGE= 'JavaScript'>
                    window.alert('Cadastrado com sucesso');
                    window.location.href='../../pages/funcionarios/funcionarios.php';
                    </script>";
            }
            
        }



}

?>
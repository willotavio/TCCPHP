<?php

include_once '../../connection/conexao.php';

class contacDao{
        private $cadastrarULogin, $cadastrarUSenha, $cadastrarUEmail, $cadastrarUCSenha, $cadastrarUTipo, $cadastrarFoto, $dest, $figuraAtual;

        public function getULogin(){
            return $this->cadastrarULogin;
        }
        public function setULogin($id){
            $this->cadastrarULogin= $id;
        }
        
        public function getUsenha(){
            return $this->cadastrarUSenha;
        }
        public function setUsenha($senha){
            $this->cadastrarUSenha = $senha;
        }
        
        public function getUEmail(){
            return $this->cadastrarUEmail;
        }
        public function setUEmail($email){
            $this->cadastrarUEmail = $email;
        }

        public function getUCSSenha(){
            return $this->cadastrarUCSenha;
        }
        public function setUCSSenha($csenha){
            $this->cadastrarUCSenha = $csenha;
        }

        public function getUTipo(){
            return $this->cadastrarUTipo;
        }
        public function setUTipo($cstipo){
            $this->cadastrarUTipo = $cstipo;
        }

        public function getUFoto(){
            return $this->cadastrarFoto;
        }
        public function setUFoto($f){
            $this->cadastrarFoto =$f;
        }

        public function cadastrarNvC(){
            if (!isset($_SESSION)) {
                session_start();
            }
            move_uploaded_file($_SESSION['arquivoTemp'],   $_SESSION['destino'] );
            $imagem = file_get_contents("http://localhost/TCCPHP/imgs/conta/".  $_SESSION['arquivoAtual']  );

            $sql = 'insert into usuario (nome_usuario, senha_usuario, tipo_usuario, email_usuario, foto_usuario, imagem_usuario) values (?,?,?,?,?,?)';
            $banco = new conexao();
            $con = $banco->getConexao();
            $resultado = $con->prepare($sql);
            $resultado->bindValue(1, $this->cadastrarULogin);
            $resultado->bindValue(2, $this->cadastrarUCSenha);
            $resultado->bindValue(3, $this->cadastrarUTipo);
            $resultado->bindValue(4, $this->cadastrarUEmail);
            $resultado->bindValue(5, $_SESSION['arquivoAtual'] );
            $resultado->bindValue(6, $imagem);
            $final = $resultado->execute();

            if($final){
                
                echo "<script LANGUAGE= 'JavaScript'>
                    window.alert('Cadastrado com sucesso');
                    window.location.href='../../index.php';
                    </script>";
            }
            
        }



}

?>
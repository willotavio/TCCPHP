<?php
    class criarConta{
        private $cadastrarUUsuario, $cadastrarUSenha, $cadastrarUEmail, $cadastrarUCSenha, $cadastrarUTipo

        public function getUUsuario(){
            return $this->cadastrarUUsuario
        }
        public function setUUsuario($id){
            $this->cadastrarUUsuario = $id;
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
            return $this->cadastrarUCSenha;
        }
        public function setUTipo($csenha){
            $this->cadastrarUCSenha = $csenha;
        }
    }
?>
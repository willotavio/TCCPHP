<?php
    class criarConta{
        private $cadastrarULogin, $cadastrarUSenha, $cadastrarUEmail, $cadastrarUCSenha, $cadastrarUTipo;

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
    }
?>
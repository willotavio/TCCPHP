<?php
    class pessoa{
        private  $nome, $dataNasc, $numRes, $complemento, $sexoP, $nome_login, $senha;

        public function getNome_login(){
            return $this->nome_login;
        }
        public function setNome_login($lg){
            $this->nome_login= $lg;
        }

        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($sn){
            $this->senha = $sn;
        }   

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getSexoP(){
            return $this->sexoP;
        }
        public function setSexoP($sexoP){
            $this->sexoP = $sexoP;
        }

        public function getdataNasc(){
            return $this->dataNasc;
        }
        public function setdataNasc($dataNasc){
            $this->dataNasc = $dataNasc;
        }
        
        public function getnumRes(){
            return $this->numRes;
        }
        public function setnumRes($numRes){
            $this->numRes = $numRes;
        }

        public function getComplemento(){
            return $this->complemento;
        }
        public function setComplemento($complemento){
            $this->complemento = $complemento;
        }

    
    }
?>
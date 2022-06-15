<?php
    class pessoa{
        private $codigo, $nome, $dataNasc, $celular, $whatsapp, $telefone, $email, $cepPessoa, $numRes, $complemento, $dataAtendimento, $login, $senha;

        public function getLogin(){
            return $this->login;
        }
        public function setLogin($lg){
            $this->login = $lg;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($sn){
            $this->senha = $sn;
        }


        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }


        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }


        public function getdataNasc(){
            return $this->dataNasc;
        }

        public function setdataNasc($dataNasc){
            $this->dataNasc = $dataNasc;
        }

        
        public function getCelular(){
            return $this->celular;
        }

        public function setCelular($celular){
            $this->celular = $celular;
        }

        
        public function getWhatsapp(){
            return $this->whatsapp;
        }

        public function setWhatsapp($whatsapp){
            $this->whatsapp = $whatsapp;
        }

        
        public function getTelefone(){
            return $this->telefone;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        
        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }
        
        
        public function getcepPessoa(){
            return $this->cepPessoa;
        }

        public function setcepPessoa($cepPessoa){
            $this->cepPessoa = $cepPessoa;
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

        
        public function getdataAtendimento(){
            return $this->dataAtendimento;
        }

        public function setdataAtendimento($dataAtendimento){
            $this->dataAtendimento = $dataAtendimento;
        }
    }
?>
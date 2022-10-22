<?php
    class responsavelFamilia{
        private  $nome, $dataNascimento, $numeroResidencia, $complemento, $sexo, $cpf, $cep;

        public function getcpf(){
            return$this->cpf;
        }

        public function setcpf($cpf_res){
            $this->cpf = $cpf_res;
        }

        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getSexo(){
            return $this->sexo;
        }
        public function setSexo($sexo){
            $this->sexo = $sexo;
        }

        public function getDataNascimento(){
            return $this->dataNascimento;
        }
        public function setDataNascimento($dataNascimento){
            $this->dataNascimento = $dataNascimento;
        }
        
        public function getNumeroResidencia(){
            return $this->numeroResidencia;
        }
        public function setNumeroResidencia($numeroResidencia){
            $this->numeroResidencia = $numeroResidencia;
        }

        public function getComplemento(){
            return $this->complemento;
        }
        public function setComplemento($complemento){
            $this->complemento = $complemento;
        }

        public function getCep(){
            return $this->cep;
        }
        public function setCep($cep){
            $this->cep = $cep;
        }

    
    }
?>
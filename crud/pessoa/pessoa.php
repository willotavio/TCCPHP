<?php
    class pessoa{
        private  $nome, $dataNasc, $numRes, $complemento, $sexoP, $cepessoa, $recIdCont;

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
        
        public function getCepessoa(){
            return $this->cepessoa;
        }
        public function setCepessoa($cepessoa){
            $this->cepessoa = $cepessoa;
        }
        
        public function getContPessoa(){
            return $this->recIdCont;
        }
        public function setContPessoa($recIdCont){
            $this->recIdCont = $recIdCont;
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
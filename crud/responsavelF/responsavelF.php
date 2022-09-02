<?php
    class responsavelF{
        private  $nomeF, $dataNasc, $numRes, $complemento, $sexoF, $cpf;



        public function getcpf(){
            return$this->cpf;
        }

        public function setcpf($cpf_res){
            $this->cpf = $cpf_res;
        }

        public function getNomeF(){
            return $this->nomeF;
        }
        public function setNomeF($nome){
            $this->nomeF = $nome;
        }

        public function getSexoF(){
            return $this->sexoF;
        }
        public function setSexoF($sexo){
            $this->sexoF = $sexo;
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
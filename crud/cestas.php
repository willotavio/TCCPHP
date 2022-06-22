<?php
    class cestas{
        private $idCestas, $quantidadeCestas, $recebimentoCestas;

        public function getidCestas(){
            return $this->idCestas;
        }
        public function setidCestas($id){
            $this->idCestas = $id;
        }
        
        public function getquantidadeCestas(){
            return $this->quantidadeCestas;
        }
        public function setquantidadeCestas($qc){
            $this->quantidadeCestas = $qc;
        }
        
        public function getrecebimentoCestas(){
            return $this->recebimentoCestas;
        }
        public function setrecebimentoCestas($rc){
            $this->recebimentoCestas = $rc;
        }
    }
?>
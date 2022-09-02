<?php

include '../../connection/conexao.php';

class cestasDao{
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

    public function cadastrarCesta(){
        $sql = 'insert into cestas (idCestas, quantidade_cestas, recebimento_cestas) values (?,?,?)';
        
        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $this->idCestas);
        $resultado->bindValue(2, $this->quantidadeCestas);
        $resultado->bindValue(3, $this->recebimentoCestas);
        
        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrada com sucesso');
                window.location.href='../../pages/principal/cestas/cestas.php';
                </script>";
        }
    }
}

?>
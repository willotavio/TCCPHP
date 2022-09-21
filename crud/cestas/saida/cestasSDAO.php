<?php

include '../../../connection/conexao.php';

class cestasDao{
        private $idCestas, $quantidadeCestas, $cadastroCestas, $usuario;

        public function getidCestas(){
            return $this->idCestas;
        }
        public function setidCestas($id){
            $this->idCestas = $id;
        }
        
        public function getcadastroCestas(){
            return $this->cadastroCestas;
        }
        public function setcadastroCestas($qc){
            $this->cadastroCestas = $qc;
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
        public function getUsuario(){
            return $this->usuario;
        }
        public function setUsuario($u){
            $this->usuario = $u;
        }
        

    public function cadastrarCesta(){
        $sql = 'insert into saidaCestas (quantidade_cestasS, data_cadastro, usuario_saidaCestas ) values (?,?,?)';
        
        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $this->quantidadeCestas);
        $resultado->bindValue(2, $this->cadastroCestas);
        $resultado->bindValue(3, $this->usuario);
        
        
        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrada com sucesso');
                window.location.href='../../../pages/principal/cestas/cestas.php';
                </script>";
        }
    }
}

?>
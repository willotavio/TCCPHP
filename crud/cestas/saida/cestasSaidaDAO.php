<?php

include '../../../connection/conexao.php';

class cestasSaidaDao{
        private  $quantidade, $dataSaida, $usuario;
        
        public function getDataSaida(){
            return $this->dataSaida;
        }
        public function setDataSaida($dataSaida){
            $this->dataSaida = $dataSaida;
        }

        public function getquantidade(){
            return $this->quantidade;
        }
        public function setquantidade($quantidades){
            $this->quantidade = $quantidades;
        }

        public function getUsuario(){
            return $this->usuario;
        }
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        

    public function cadastrarSaidaCesta(){
        $sql = 'insert into saidaCestas (quantidade_saidaCestas, data_saidaCestas, usuario_saidaCestas ) values (?,?,?)';
        
        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $this->quantidade);
        $resultado->bindValue(2, $this->dataSaida);
        $resultado->bindValue(3, $this->usuario);
        
        
        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrada com sucesso');
                window.location.href='../../../pages/cestas/cestas.php';
                </script>";
        }
    }
}

?>
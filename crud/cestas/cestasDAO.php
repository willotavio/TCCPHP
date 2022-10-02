<?php

include '../../connection/conexao.php';

class cestasDao{
        private  $quantidade, $recebimento, $usuario;
        
        public function getQuantidade(){
            return $this->quantidade;
        }
        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }
        
        public function getRecebimento(){
            return $this->recebimento;
        }
        public function setRecebimento($recebimento){
            $this->recebimento = $recebimento;
        }
         public function getUsuario(){
            return $this->usuario;
        }
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        

    public function cadastrarCesta(){
        $sql = 'insert into cestas (quantidade_cestas, recebimento_cestas, usuario_cestas) values (?,?,?)';
        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $this->quantidade);
        $resultado->bindValue(2, $this->recebimento);
        $resultado->bindValue(3, $this->usuario);
        
        
        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrada com sucesso');
                window.location.href='../../pages/cestas/cestas.php'
                </script>";
        }
    }
}

?>
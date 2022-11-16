<?php

include '../../connection/conexao.php';

class cestasDao{
        private  $quantidade, $dataEntrada, $usuario, $codigoProduto, $id;
        
        public function getQuantidade(){
            return $this->quantidade;
        }
        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }
        
        public function getDataEntrada(){
            return $this->dataEntrada;
        }
        public function setDataEntrada($dataEntrada){
            $this->dataEntrada = $dataEntrada;
        }
        public function getUsuario(){
            return $this->usuario;
        }
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        public function getCodigoProduto(){
            return $this->codigoProduto;
        }
        public function setCodigoProduto($codigoProduto){
            $this->codigoProduto = $codigoProduto;
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }

        

    public function cadastrarCesta(){
        $sql = 'INSERT INTO entradaEstoque (quantidade_entradaEstoque, data_entradaEstoque, usuario_entradaEstoque, estoque_entradaEstoque) values (?,?,?,?)';
        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $this->quantidade);
        $resultado->bindValue(2, $this->dataEntrada);
        $resultado->bindValue(3, $this->usuario);
        $resultado->bindValue(4, $this->codigoProduto);
        
        
        
        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrada com sucesso');
                window.location.href='../../pages/cestas/cestas.php'
                </script>";
        }
    }
    public function deletarCesta(){
        $sql = 'DELETE FROM entradaEstoque WHERE id_entradaEstoque = ?';
        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $this->id);
        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Deletado com sucesso');
                window.location.href='../../pages/cestas/relatorioCestas.php'
                </script>";
        }
    }
}

?>
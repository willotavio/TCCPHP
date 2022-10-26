<?php

include '../../../connection/conexao.php';

class cestasSaidaDao{
        private  $quantidade, $dataSaida, $usuario, $codigoProduto, $codigoResponsavel;
        
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

        public function getCodigoUsuario(){
            return $this->usuario;
        }
        public function setCodigoUsuario($usuario){
            $this->usuario = $usuario;
        }
        
        public function getCodigoProduto(){
            return $this->codigoProduto;
        }
        public function setCodigoProduto($codigoProduto){
            $this->codigoProduto = $codigoProduto;
        }

        public function getCodigoResponsavel(){
            return $this->codigoResponsavel;
        }
        public function setCodigoResponsavel($codigoResponsavel){
            $this->codigoResponsavel = $codigoResponsavel;
        }

    public function cadastrarSaidaCesta(){
        $sql = 'insert into saidaEstoque (quantidade_saidaEstoque, data_saidaEstoque, usuario_saidaEstoque, estoque_saidaEstoque, responsavel_saidaEstoque ) values (?,?,?,?,?)';
        
        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $this->quantidade);
        $resultado->bindValue(2, $this->dataSaida);
        $resultado->bindValue(3, $this->usuario);
        $resultado->bindValue(4, $this->codigoProduto);
        $resultado->bindValue(5, $this->codigoResponsavel);
        
        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrada com sucesso');
                window.location.href='../../../pages/responsavelFamilia/responsavelFamilia.php';
                </script>";
        }
    }
}

?>
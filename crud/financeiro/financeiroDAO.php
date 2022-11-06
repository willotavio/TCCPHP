<?php

include '../../connection/conexao.php';

class financeiroDao{
        private  $tipo, $descricao, $valor, $data, $usuario;
        
        public function getTpo(){
            return $this->tipo;
        }
        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
        
        public function getDescricao(){
            return $this->descricao;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }
        public function getValor(){
            return $this->valor;
        }
        public function setValor($valor){
            $this->valor = $valor;
        }
        public function getData(){
            return $this->data;
        }
        public function setData($data){
            $this->data = $data;
        }
        public function getUsuario(){
            return $this->usuario;
        }
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }

    public function cadastrarEntradaSaidaFinanceiro(){
        $sql = 'insert into financeiro (tipo_financeiro,descricao_financeiro,valor_financeiro,data_financeiro,usuario_financeiro) values (?,?,?,?,?)';
        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $this->tipo);
        $resultado->bindValue(2, $this->descricao);
        $resultado->bindValue(3, $this->valor);
        $resultado->bindValue(4, $this->data);
        $resultado->bindValue(5, $this->usuario);
        
        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Registrado com sucesso');
                window.location.href='../../pages/financeiro/financeiro.php'
                </script>";
        }else{
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('ERRO SQL - Cadastro não efetuado');
                window.location.href='../../pages/financeiro/financeiro.php'
                </script>";
        }
    }
}

?>
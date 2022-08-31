<?php

class codigoEnderecoPostal{
    private $cep, $rua, $bairro, $estado, $cidade;
    
    public function getCep(){
        return $this->cep;
    }
    public function setCep($c){
        $this->cep = $c;
    }

    public function getRua(){
        return $this->rua;
    }
    public function setRua($rua){
        $this->rua = $rua;
    }

    public function getBairro(){
        return $this->bairro;
    }
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getCidade(){
        return $this->cidade;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
}

?>
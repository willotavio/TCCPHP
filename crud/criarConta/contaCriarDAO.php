<?php

include '../../connection/conexao.php';

class contacDao{

    public function cadastrarNvC(CriarConta $cc){
        $sql = 'insert into usuario (nome_usuario, senha_usuario, tipo_usuario, email_usuario) values (?,?,?,?)';

        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $cc->getULogin());
        $resultado->bindValue(2, $cc->getUsenha());
        $resultado->bindValue(3, $cc->getUTipo());
        $resultado->bindValue(4, $cc->getUEmail());
        
        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrado com sucesso');
                window.location.href='../../index.php';
                </script>";
        }
    }



}

?>
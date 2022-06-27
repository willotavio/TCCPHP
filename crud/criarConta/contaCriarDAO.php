<?php

include '../../connection/conexao.php';

class contacDao{

    public function cadastrarNvC(CriarConta $cc){
        $sql = 'insert into usuario (nome, senha, email_usuario, tipo) values (?,?,?,?)';

        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $cc->getUUsuario());
        $resultado->bindValue(2, $cc->getUsenha());
        $resultado->bindValue(3, $cc->getUEmail());
        $resultado->bindValue(4, $cc->getUTipo());
        
        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrada com sucesso');
                window.location.href='../../pages/principal/indexcestas.php';
                </script>";
        }
    }

}

?>
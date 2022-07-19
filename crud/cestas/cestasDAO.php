<?php

include '../../connection/conexao.php';

class cestasDao{

    public function cadastrarCesta(Cestas $c){
        $sql = 'insert into cestas (idCestas, quantidade_cestas, recebimento_cestas) values (?,?,?)';
        
        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $c->getidCestas());
        $resultado->bindValue(2, $c->getquantidadeCestas());
        $resultado->bindValue(3, $c->getrecebimentoCestas());
        
        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Cadastrada com sucesso');
                window.location.href='../../pages/principal/indexcestas.php';
                </script>";
        }
    }

    public function atualizarCesta(Cestas $c){
        $sql = 'update cestas set quantidade_cestas=?, recebimento_cestas=? where idCestas=?';
        
        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(3, $c->getidCestas());
        $resultado->bindValue(1, $c->getquantidadeCestas());
        $resultado->bindValue(2, $c->getrecebimentoCestas());
        
        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Atualizada com sucesso');
                window.location.href='../../pages/principal/indexcestas.php';
                </script>";
        }
    }

    public function deletarCesta($idCestas){
        $sql = 'delete from cestas where idCestas=?';

        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $idCestas);

        $final = $resultado->execute();

        if($final){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Deletado com sucesso');
                window.location.href='../../pages/principal/indexcestas.php';
                </script>";
        }
    }
    
    public function consultarCesta(){
        $sql = 'select * from cestas';

        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->execute();
        if($resultado->rowCount()>0){
            $valor = $resultado->fetchAll(\PDO::FETCH_ASSOC);
            return $valor;
        }
    }

}

?>
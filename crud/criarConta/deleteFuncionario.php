<?php

 if(!empty($_GET['idFuncionario'])){
        $id = $_GET['idFuncionario'];
        
        if(!isset($_SESSION)){

            session_start();

        }
        if($id == $_SESSION['idUsuario'] ){

        echo "<script LANGUAGE= 'JavaScript'>
            window.alert('ERRO - não é possível excluir a sua própria conta');
            window.location.href='../../pages/funcionarios/funcionarios.php';
            </script>";

        }else{

            include_once('../../connection/conexao.php');   
            $banco = new conexao();
            $con = $banco->getConexao();
            $sqlSelect = "SELECT * FROM usuario WHERE id_usuario =$id";
            $result = $con->query($sqlSelect);

            if($result->rowCount() > 0){

                $sqlConsultaEntrada= "SELECT * FROM entradaEstoque WHERE usuario_entradaEstoque = $id";
                $resultConsultaEntrada = $con->query($sqlConsultaEntrada);

                $sqlConsultaSaida= "SELECT * FROM saidaEstoque WHERE usuario_saidaEstoque = $id;";
                $resultConsultaSaida = $con->query($sqlConsultaSaida);
                
                if($resultConsultaEntrada->rowCount() > 0 || $resultConsultaSaida->rowCount() > 0){

                    $sqlApagarEntrada="UPDATE entradaEstoque SET usuario_entradaEstoque = null  WHERE usuario_entradaEstoque = $id;";
                    $sqlApagarSaida="UPDATE saidaEstoque SET usuario_saidaEstoque = null  WHERE usuario_saidaEstoque = $id;";
                    $sqlApagarFuncionario = "DELETE FROM usuario WHERE id_usuario=$id";
                    $resultApagarSaida = $con->query($sqlApagarSaida);
                    $resultApagarEntrada = $con->query($sqlApagarEntrada);
                    $resultApagarFuncionario = $con->query($sqlApagarFuncionario);
                    echo "<script LANGUAGE= 'JavaScript'>
                    window.alert('Deletado com Sucesso');
                    window.location.href='../../pages/funcionarios/funcionarios.php';
                    </script>";

                }else{

                    $sqlApagarFuncionario = "DELETE FROM usuario WHERE id_usuario=$id";
                    $resultApagarFuncionario = $con->query($sqlApagarFuncionario);
                    echo "<script LANGUAGE= 'JavaScript'>
                    window.alert('Deletado com Sucesso');
                    window.location.href='../../pages/funcionarios/funcionarios.php';
                    </script>";

                }

            }else{

                echo "<script LANGUAGE= 'JavaScript'>
                window.alert('ERRO');
                window.location.href='../../pages/funcionarios/funcionarios.php';
                </script>"; 
                
            }
        }
    }else{
        echo "<script LANGUAGE= 'JavaScript'>
        window.alert('Variável não encontrada');
        window.location.href='../../pages/funcionarios/funcionarios.php';
        </script>"; 
    }

?>
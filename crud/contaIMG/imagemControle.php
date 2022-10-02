<?php
include_once '../../connection/conexao.php';
$botao =  filter_input(INPUT_POST,'botao');

if (!isset($_SESSION)) {
    session_start();
}

$id= $_SESSION['idUsuario']; 
$Atual = $_FILES['foto']['name'];   

    if($Atual == '' && $botao == "Alterar"){

        echo "<script LANGUAGE= 'JavaScript'>
            window.alert('nenhuma imagem selecionada');
            window.location.href='../../pages/conta/conta.php';
            </script>";
    }else if(isset($Atual) && $botao == "Alterar"){
        
        $Temp = $_FILES['foto']['tmp_name'];
        $Dest = '../../imgs/conta/'.$Atual;
        move_uploaded_file($Temp,  $Dest);
        $imagem = file_get_contents("http://localhost/TCCPHP/imgs/conta/" . $Atual);
        $sql = "update usuario set foto_usuario = ?, imagem_usuario = ? where id_usuario = ?";
        $banco = new conexao();
        $con = $banco->getConexao();
        $resultado = $con->prepare($sql);
        $resultado->bindValue(1, $Atual);
        $resultado->bindValue(2, $imagem);
        $resultado->bindValue(3, $id);
        $final = $resultado->execute();

        if($final){

            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Alterado com sucesso');
                window.location.href='../../pages/conta/conta.php';
                </script>";
        }else{

            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('ERRO SQL');
                window.location.href='../../pages/conta/conta.php';
                </script>";
        }
    
    }else if($botao == "Deletar"){
        
        $banco = new conexao();
        $con = $banco->getConexao();
        $nomeFoto = $con->query("SELECT foto_usuario FROM usuario WHERE id_usuario = '$id'")->fetchColumn();
        if($nomeFoto == "fotoPerfil.png"){
            echo "<script LANGUAGE= 'JavaScript'>
                window.alert('Não é possivel Deletar a Imagem Padrão');
                window.location.href='../../pages/conta/conta.php';
                </script>";
        }else if(unlink("../../imgs/conta/" . $nomeFoto)){
            $fotoD = "fotoPerfil.png";
            $imagemD = file_get_contents("http://localhost/TCCPHP/imgs/conta/" . $fotoD);
            $sql = "update usuario set foto_usuario = ?, imagem_usuario = ? where id_usuario = ?";
            $resultado = $con->prepare($sql);
            $resultado->bindValue(1, $fotoD);
            $resultado->bindValue(2, $imagemD);
            $resultado->bindValue(3, $id);
            $final = $resultado->execute();

            if($final){

                echo "<script LANGUAGE= 'JavaScript'>
                    window.alert('Deletado com sucesso');
                    window.location.href='../../pages/conta/conta.php';
                    </script>";
            }else{

                    echo "<script LANGUAGE= 'JavaScript'>
                    window.alert('ERRO EXECUTAR O SQL');
                    window.location.href='../../pages/conta/conta.php';
                    </script>";
            }
        }else{
            
        echo "<script LANGUAGE= 'JavaScript'>
                window.alert('ERRO SQL BUSCA IMAGEM');
                window.location.href='../../pages/conta/conta.php';
                </script>";
        }
    }
?>
<?php
$nome = filter_input(INPUT_POST,'nome');
$senha = sha1(filter_input(INPUT_POST,'senha'));
$confirmarSenha = sha1(filter_input(INPUT_POST,'confirmarSenha'));
$email = filter_input(INPUT_POST,'email');
$tipo = filter_input(INPUT_POST,'tipo');
$botao =  filter_input(INPUT_POST,'botao');


include 'contaDAO.php';
$contaDao = new contaDao();

$contaDao->setNome($nome);
$contaDao->setSenha($senha);
$contaDao->setEmail($email); 
$contaDao->setConfirmarSenha($senha);
$contaDao->setTipo($tipo);


if (!isset($_SESSION)) {
    session_start();
}
if(isset($_FILES['foto'])){
    $Atual = $_FILES['foto']['name'];
    $Temp = $_FILES['foto']['tmp_name'];
    $Dest = '../../imgs/conta/'.$Atual;
    $_SESSION['arquivoAtual']  = $Atual;
    $_SESSION['arquivoTemp'] =  $Temp;
    $_SESSION['destino'] = $Dest;
}{
    $Atual = "fotoPerfil.png";
    $Temp = "fotoPerfil.png";
    $Dest = '../../imgs/conta/'.$Atual;
    $_SESSION['arquivoAtual']  = $Atual;
    $_SESSION['arquivoTemp'] =  $Temp;
    $_SESSION['destino'] = $Dest;
}

if($botao=='cadastrar'){
    if($senha == $confirmarSenha){
        $contaDao->cadastrarNovaConta();
    }else{
        echo "<script LANGUAGE= 'JavaScript'>
            window.alert('As senhas digitadas não indênticas tente novamente');
            window.location.href='../../pages/funcionarios/funcionarios.php';
            </script>"; 
    }
    }
?>
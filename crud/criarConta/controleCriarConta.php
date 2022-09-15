<?php
header("Content-type: text/html; charset=utf=8");
$cadastrarULogin = filter_input(INPUT_POST,'cadastrarULogin');
$cadastrarUSenha = filter_input(INPUT_POST,'cadastrarUSenha');
$cadastrarUCSenha = filter_input(INPUT_POST,'cadastrarUCSenha');
$cadastrarUEmail = filter_input(INPUT_POST,'cadastrarUEmail');
$cadastrarUTipo = filter_input(INPUT_POST,'cadastrarUTipo');
$botao =  filter_input(INPUT_POST,'botao');


include 'contaCriarDAO.php';
$contaCDao = new contaCDao();

$contaCDao->setULogin($cadastrarULogin);
$contaCDao->setUsenha($cadastrarUSenha);
$contaCDao->setUEmail($cadastrarUEmail); 
$contaCDao->setUCSSenha($cadastrarUCSenha);
$contaCDao->setUTipo($cadastrarUTipo);
$contaCDao->setUCSSenha($cadastrarUCSenha);

if (!isset($_SESSION)) {
    session_start();
}
if(isset($_FILES['arquivo'])){
    $Atual = $_FILES['arquivo']['name'];
    $Temp = $_FILES['arquivo']['tmp_name'];
    $Dest = '../../imgs/conta/'.$Atual;
    $_SESSION['arquivoAtual']  = $Atual;
    $_SESSION['arquivoTemp'] =  $Temp;
    $_SESSION['destino'] = $Dest;
}




if($botao=='cadastrar'){
    if($cadastrarUSenha == $cadastrarUCSenha){
        $contaCDao->cadastrarNvC();
    }else{
        echo "<script LANGUAGE= 'JavaScript'>
            window.alert('As senhas digitadas não indênticas tente novamente');
            window.location.href='../../pages/login/criarConta.php';
            </script>"; 
    }
    }
?>







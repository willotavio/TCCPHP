<?php
$cadastrarUUsuario = filter_input(INPUT_GET,'cadastrarUUsuario');
$cadastrarUSenha = filter_input(INPUT_GET,'cadastrarUSenha');
$cadastrarUCSenha = filter_input(INPUT_GET,'$cadastrarUCSenha');
$cadastrarUemail = filter_input(INPUT_GET,'$cadastrarUEmail');
$botao =  filter_input(INPUT_GET,'botao');

include 'contaCriar.php';
$contaC = new contaCriar();

$contaC->setUUsuario($cadastrarUUsuario);
$contaC->setUsenha($cadastrarUSenha);
$contaC->setUEmail($cadastrarUemail); 
$contaC->setUCSSenha($cadastrarUCSenha); 


include 'contaCriarDAO.php';
$contaCDao = new contaCDao();

if($botao=='Cadastrar'){
    if($cadastrarUSenha == $cadastrarUCSenha){
        $contaCDao->cadastrarNvC($contac)
    }else{
        echo "<script LANGUAGE= 'JavaScript'>
            window.alert('As senhas digitadas não indênticas tente novamente');
            window.location.href='../indexlogin.php';
            </script>"; 
    }
    }
?>
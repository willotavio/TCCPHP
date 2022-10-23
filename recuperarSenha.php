<?php
include_once('connection/conexao.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'lib/vendor/autoload.php';
$mail = new PHPMailer(true);
$banco = new conexao();
$con = $banco->getConexao();
$email= filter_input(INPUT_POST,'recuperarEmail');


if(!empty($_POST['recuperarEmail'])){
    //var_dump($email);
    $email = $_POST['recuperarEmail'];
    $query_usuario = "SELECT id_usuario, nome_usuario, email_usuario
    FROM usuario
    WHERE email_usuario = '$email'";
    $result = $con->query($query_usuario);
  
    if(($result) AND ($result->rowCount() != 0)){
        $row_usuario = $result->fetch(PDO::FETCH_ASSOC);
        $chave_recuperar_senha = password_hash($row_usuario['id_usuario'], PASSWORD_DEFAULT);
      //  echo "CHAVE $chave_recuperar_senha<br>";
        $query_up_usaurio = "UPDATE usuario 
                SET  recuperar_senha =:recuperar_senha 
                WHERE id_usuario =:id_usuario 
                LIMIT 1";
                $result_up_usuario = $con->prepare($query_up_usaurio);
                $result_up_usuario->bindParam(":recuperar_senha", $chave_recuperar_senha, PDO::PARAM_STR);
                $result_up_usuario->bindParam(":id_usuario", $row_usuario['id_usuario'], PDO::PARAM_INT);


                if($result_up_usuario->execute()){
                   $link = "http://localhost/TCCPHP/atualizarSenha.php?chave=$chave_recuperar_senha";
                    
                    try{
                        
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    
                        $mail->CharSet = "UTF-8";
                        $mail->isSMTP();                                           
                        $mail->Host       = 'smtp.mailtrap.io';                     
                        $mail->SMTPAuth   = true;                                   
                        $mail->Username   = 'c33fd3a9414ed3';                     
                        $mail->Password   = 'd480662e7fafcf';                               
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
                        $mail->Port       = 2525; 

                        $mail->setFrom('OngAlemBrasil@gmail.com', 'Ong');
                        $mail->addAddress($row_usuario['email_usuario'], $row_usuario['nome_usuario']);

                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Recuperar Senha';
                        $mail->Body    = 'Prezado(a) ' . $row_usuario['nome_usuario'] . "<br><br>Você Solicitou alteração de Senha. 
                        <br><br> Para continuar o processo de recuperação da sua senha, clique no link abaixo ou cole no seu navegador: <br><br><a href='" . $link .  "'> " . $link . "</a> <br><br>
                        Se você não solicitou
                        esta alteração, nenhuma ação é necesséria. Sua senha permanecerá a mesma até que você ative esse código. <br><br>";
                        $mail->AltBody = 'Prezado(a) ' . $row_usuario['nome_usuario'] . "\n\n  Você Solicitou alteração de Senha. 
                        <br><br> Para continuar o processo de recuperação da sua senha, clique no link abaixo ou cole no seu navegador: \n\n" . $link . "\n\nSe você não solicitou
                        esta alteração, nenhuma ação é necesséria. Sua senha permanecerá a mesma até que você ative esse código.\n\n";
                    
                        $mail->send();

                        echo "<script LANGUAGE= 'JavaScript'>
                        window.alert('Enviado email com instruções para você recuperar a sua senha, por favor acesse a sua caixa de entrada!');
                        window.location.href='index.php';
                        </script>"; 

                    }catch (Exception $e) {
                        echo "Erro E-mail não enviado!!. Mailer Error: {$mail->ErrorInfo}";

                    }

                }else{
                   echo "<script LANGUAGE= 'JavaScript'>
                    window.alert('ERRO!! Email Inválido');
                    window.location.href='index.php';
                    </script>"; 
                }

    }else{
         echo "<script LANGUAGE= 'JavaScript'>
            window.alert('ERRO!! Email Invalido Tente Novamente');
            window.location.href='index.php';
            </script>"; 
    }

}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}




?>
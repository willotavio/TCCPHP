<?php

include_once('connection/conexao.php');
$banco = new conexao();
$con = $banco->getConexao();

$chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);

    if(!empty($chave)){
        //var_dump($chave);

        $query_usuario = "SELECT  id_usuario 
        FROM usuario
        WHERE  recuperar_senha =:recuperar_senha 
        LIMIT 1";
            $result_usuario = $con->prepare($query_usuario);
            $result_usuario->bindParam(":recuperar_senha", $chave, PDO::PARAM_STR);
            $result_usuario->execute();

            if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
                $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
              //  var_dump($dados);
                if(!empty($dados['SendNovaSenha'])){
                    $senha_usuario = sha1($dados['senha_usuario']);
                     $recuperar_senha = 'NULL';

                $query_up_usuario = "UPDATE usuario 
                            SET  senha_usuario =:senha_usuario,
                            recuperar_senha =:recuperar_senha
                            WHERE id_usuario =:id_usuario 
                            LIMIT 1";
                    $result_up_usuario = $con->prepare($query_up_usuario);
                    $result_up_usuario->bindParam(":senha_usuario", $senha_usuario, PDO::PARAM_STR);
                    $result_up_usuario->bindParam(":recuperar_senha", $recuperar_senha);
                    $result_up_usuario->bindParam(":id_usuario", $row_usuario['id_usuario'], PDO::PARAM_INT);

                    if($result_up_usuario->execute()){
                        echo "<script LANGUAGE= 'JavaScript'>
                        window.alert('Senha Atualizada Com Sucesso!!');
                        window.location.href='index.php';
                        </script>"; 
                    }else{
                        "<script LANGUAGE= 'JavaScript'>
            window.alert('ERRO!! Não foi Possivel Atualizar a Sua Senha, Tente Novamente!);
            window.location.href='index.php';
            </script>"; 
                    }

                }
            }else {
                "<script LANGUAGE= 'JavaScript'>
            window.alert('ERRO Link Inválido');
            window.location.href='index.php';
            </script>"; 
            }

    }else{
        "<script LANGUAGE= 'JavaScript'>
            window.alert('ERRO FATAL');
            window.location.href='index.php';
            </script>"; 
    }


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Senha</title>
    <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        <?php include 'css/style.css';
        ?>
    </style>
</head>

<body id="bodyIndex">

    <div style="margin-top: 10rem">

        <ul class="nav nav-pills white justify-content-center" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane"
                    type="button" role="tab" aria-controls="login-tab-pane" aria-selected="true">Esqueceu Sua Senha</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab"
                tabindex="0">
                <div class="container m-auto mt-2" id="containerFormAtualizarSenha">
                    <div class="row justify-content-start">
                        <div class="col-xl-6 colunaFormularioIndex">
                        <form method="POST" autocomplete="off" enctype="multipart/form-data">
                                <?php
                                    $usuario = "";
                                    if(isset($dados['senha_usuario'])){
                                        $usuario = $dados['senha_usuario'];
                                    }
                                ?>
                                <h1 style="text-align:center; font-size:25px; padding:15px; color:rgba(25,135,84,255)">
                                    Atualizar Senha</h1>
                                <div class="form-floating mt-3 mb-3 input-group">
                                    <input type="password" class="form-control recupSenha" placeholder="Digite a sua Senha" name='senha_usuario' required value="<?php echo $usuario;?>">
                                    <label>Digite a Sua Nova Senha</label>
                                    <span class="input-group-text" id="spanExibirSenha">
                                        <i onclick="eyeClick()" id="exibirSenha">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </i>
                                    </span>
                                </div>
                                <div class="form-floating mt-3 mb-3 input-group">
                                    <input type="password" class="form-control recupSenha" placeholder="Repita a sua Senha" name='confirmarSenha' required>
                                    <label>Repita a Sua Senha</label>
                                    <span class="input-group-text" id="spanExibirSenha">
                                        <i onclick="eyeClick()" id="exibirSenha">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </i>
                                    </span>
                                </div>
                                <div class="row m-auto">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" style="font-size:16px" value="atualizar" name="SendNovaSenha">Atualizar</button>
                                </div>
                                <div style="margin-top:5px">
                                    <div class="row m-auto">
                                        <button type="submit" class="btn btn-success btn-lg btn-block" style="font-size:16px" onclick="window.location.href='index.php'">Voltar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
<!doctype html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relatório do Financeiro PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
    * {
        font-family: helvetica, sans-serif;
    }

    td {

        padding: 5px;
    }

    table,
    th,
    td {
        text-align: center;
        margin: auto;
        border: 1px solid black;
        border-collapse: collapse;
        font-size: 14px;
    }

    span {
        padding: 10px;
        margin: 10px;
    }

    p {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container" style="text-align:center; margin:10px auto;display:inline">
            <img src="http://localhost/tccphp/imgs/logo.jpg" alt="" style="height:70px; display: inline">
            <p style="font-size:10px;display:inline;padding-left:10%">R. Curitiba, 94  - Parque Erasmo Assunção  Santo André - SP, 09271-480 (11) 94717-4050</p>
            <hr>
        </div>

    <div class="container" style="text-align:center">
        <p style="font-size: 26px;"> <b>Relatório Financeiro</b> </p>
    </div>

    <div class="container">
        <p style="text-align:center"><b>Entrada</b></p>
        <div class="overflow-auto">
            <div class="column">
                <div class="m-2 ">
                    <table class="table">
                        <thead>

                            <th scope="col" style='text-align:center; width: 25%'>Descrição</th>
                            <th scope="col" style='text-align:center; width: 25%'>Valor</th>
                            <th scope="col" style='text-align:center; width: 25%'>Data</th>
                            <th scope="col" style='text-align:center; width: 25%'>Usuário</th>
                        </thead>
                        <tbody>
                            <?php 
                                
                                include_once ("../../../connection/conexao.php");
                                $sql= "SELECT financeiro.id_financeiro, financeiro.descricao_financeiro, financeiro.valor_financeiro, DATE_FORMAT(financeiro.data_financeiro, '%d/%m/%Y') as dataSaida, usuario.nome_usuario FROM financeiro LEFT JOIN 
                                usuario on financeiro.usuario_financeiro = usuario.id_usuario
                                WHERE tipo_financeiro = 'E'";
                                $banco = new conexao();
                                $con = $banco->getConexao();
                                $result = $con->query($sql);
                                while($row = $result->fetch()){
                                    ?>
                            <tr>
                                <td>
                                    <span
                                        id="descricao<?php echo $row['id_financeiro']; ?>"><?php echo $row['descricao_financeiro']; ?>
                                    </span>
                                </td>
                                <td>
                                    <span
                                        id="valor<?php echo $row['id_financeiro']; ?>"><?php echo $row['valor_financeiro']; ?>
                                    </span>
                                </td>
                                <td>
                                    <span id="data<?php echo $row['id_financeiro']; ?>"><?php echo $row['dataSaida']; ?>
                                    </span>
                                </td>
                                <td>
                                    <span id="nome<?php echo $row['id_financeiro']; ?>">
                                        <?php 
                                            if($row['nome_usuario'] == ""){
                                                echo "Funcionário";
                                            }else{
                                                echo $row['nome_usuario'];
                                            } 
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:20px">
        <p style="text-align:center"><b>Saída</b></p>
        <div class="overflow-auto">
            <div class="column">
                <div class="m-2 ">
                    <table class="table">
                        <thead>

                            <th scope="col" style='text-align:center; width: 25%'>Descrição</th>
                            <th scope="col" style='text-align:center; width: 25%'>Valor</th>
                            <th scope="col" style='text-align:center; width: 25%'>Data</th>
                            <th scope="col" style='text-align:center; width: 25%'>Usuário</th>
                        </thead>
                        <tbody>
                            <?php 
                                
                                include_once ("../../../connection/conexao.php");
                                $sql= "SELECT financeiro.id_financeiro, financeiro.descricao_financeiro, financeiro.valor_financeiro, DATE_FORMAT(financeiro.data_financeiro, '%d/%m/%Y') as dataSaida, usuario.nome_usuario FROM financeiro LEFT JOIN 
                                usuario on financeiro.usuario_financeiro = usuario.id_usuario
                                WHERE tipo_financeiro = 'S'";
                                $banco = new conexao();
                                $con = $banco->getConexao();
                                $result = $con->query($sql);
                                while($row = $result->fetch()){
                                    ?>
                            <tr>
                                <td>
                                    <span
                                        id="descricao<?php echo $row['id_financeiro']; ?>"><?php echo $row['descricao_financeiro']; ?>
                                    </span>
                                </td>
                                <td>
                                    <span
                                        id="valor<?php echo $row['id_financeiro']; ?>"><?php echo $row['valor_financeiro']; ?>
                                    </span>
                                </td>
                                <td>
                                    <span id="data<?php echo $row['id_financeiro']; ?>"><?php echo $row['dataSaida']; ?>
                                    </span>
                                </td>
                                <td>
                                    <span id="nome<?php echo $row['id_financeiro']; ?>">
                                        <?php 
                                            if($row['nome_usuario'] == ""){
                                                echo "Funcionário";
                                            }else{
                                                echo $row['nome_usuario'];
                                            } 
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <p><?php echo "Gerado no Dia: " . date("d/m/Y") . "<br>";?></p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
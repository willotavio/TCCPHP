<!doctype html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relatório de Cestas PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
    body {
        font-family: helvetica;
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

    <div class="container" style="text-align:center; margin:10px auto;">
    <img src="http://localhost/tccphp/imgs/logo.jpg" alt="" style="widht:70px;height:70px; "></div>
    <h1 style='text-align: center'>Relatório de Cestas Doadas</h1><br>
    <table>
        <thead>
            <th>Quantidade</th>
            <th>Data de saída</th>
            <th>Responsável</th>
            <th>Usuário</th>
        </thead>
        <tbody>
            <?php 
            include_once ("../../../connection/conexao.php");
            $sql= "SELECT id_saidaEstoque, quantidade_saidaEstoque, DATE_FORMAT(data_saidaEstoque, '%d/%m/%Y') as dataSaida,  usuario.nome_usuario, responsavel_familia.nome_responsavel
            FROM saidaEstoque LEFT JOIN usuario on saidaEstoque.usuario_saidaEstoque = usuario.id_usuario LEFT JOIN responsavel_familia on saidaEstoque.responsavel_saidaEstoque = responsavel_familia.id_responsavel";
            $banco = new conexao();
            $con = $banco->getConexao();
            $result = $con->query($sql);

            while($row = $result->fetch()){
                ?>
            <tr>
                <td>
                    <span
                        id="quantidade<?php echo $row['id_saidaEstoque']; ?>"><?php echo $row['quantidade_saidaEstoque']; ?>
                    </span>
                </td>
                <td>
                    <span id="data<?php echo $row['id_saidaEstoque']; ?>"><?php echo $row['dataSaida']; ?>
                    </span>
                </td>
                <td>
                    <span id="nomeResponsavel<?php echo $row['id_saidaEstoque']; ?>">
                        <?php echo $row['nome_responsavel']; ?>
                    </span>
                </td>
                <td>
                    <span id="nomeUsuario<?php echo $row['id_saidaEstoque']; ?>">
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
    <p><?php echo "Gerado no Dia: " . date("d/m/Y") . "<br>";?></p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
  
    <style>
        <?php include 'style.css'; ?>
    </style>

</head>
<body>

    <div>

<div class=caixa>

    <h1>CADASTRO DE PESSOAS</h1>

    <form action='controlefuncionario.php' method='GET'>
        
        <div class="divFormulario">
            <input class='pessoa' type='number' name='codigo' required> 
            <label for="codigo" class='inputLabel'>Código</label>
        </div>
        
        <div class="divFormulario">
            <input class='pessoa'type='text' name='nome' required>
            <label for="pessoa" class='inputLabel'>Pessoa</label>
        </div>
        
        <div class="divFormulario">
            <label for="dataNasc" class='inputLabel'><b>Data de Nascimento</b></label>
            <br><input class='pessoa' type='date' name='dataNasc' required>
        </div>

        <div class="divFormulario">
            <input class='pessoa'type='number' name='celular' required>
            <label for="celular" class='inputLabel'>Celular</label>
        </div>

        <div class="divFormulario">
            <input class='pessoa'type='text' name='whatsapp' required>
            <label for="whatsapp" class='inputLabel'>Whatsapp</label>
        </div>

        <!--<div class="divFormulario"></div>
        <div class="divFormulario"></div>
        <div class="divFormulario"></div>
        <div class="divFormulario"></div>
        <div class="divFormulario"></div>
        <div class="divFormulario"></div>
        <div class="divFormulario"></div>
        <div class="divFormulario"></div>
        <div class="divFormulario"></div>




       
        <p><input class='pessoa'type='text' name='whatsapp' placeholder="Whatsapp"></p>
        <p><input class='pessoa'type='text' name='telefone' placeholder="Telefone"></p>
        <p><input class='pessoa'type='email' name='email' placeholder="Email"></p>
        <p><input class='pessoa'type='text' name='cepPessoa' placeholder="CEP"></p>
        <p><input class='pessoa'type='number' name='numeroCasa' placeholder="Número da Residência"></p>
        <p><input class='pessoa' type='text' name='complemento' placeholder="Complemento"></p>
        <p><input class='pessoa'type='date' name='dataAtendimento' placeholder="Data de Atendimento"></p>
        <p><input type='submit' name='botao' value='Cadastrar'></p>
        <p><input type='submit' name='botao' value='Atualizar'></p>
        <p><input type='submit' name='botao' value='Deletar'></p>-->
    </form>

    <form action='controlepessoa.php' method='GET'>
        <p><input type='submit' name='botao' value='Consultar'></p>
    </form>

    <form action='home.php'>
        <br><p><input type='submit' value="Voltar"></p>
    </form>

</div>

    </div>

</body>
</html>
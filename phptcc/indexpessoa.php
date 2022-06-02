<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoas</title>
  
    <style>
        <?php include 'style.css'; ?>
    </style>

</head>
<body>

    <div>

<div class=caixa>

    <h1>CADASTRO DE PESSOAS</h1>

    <form action='controlepessoa.php' method='GET'>
        
        <div class="divFormulario">
            <input class='pessoa' type='number' name='codigo' required> 
            <label for="codigo" class='inputLabel'>Código</label>
        </div>
        
        <div class="divFormulario">
            <input class='pessoa'type='text' name='nome' required>
            <label for="pessoa" class='inputLabel'>Nome</label>
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

        <div class="divFormulario">
        <input class='pessoa'type='number' name='telefone' required>
            <label for="telefone" class='inputLabel'>Telefone</label>
        </div>

        <div class="divFormulario">
            <input class='pessoa'type='number' name='Email' required>
            <label for="email" class='inputLabel'>Email</label>
        </div>

        <div class="divFormulario">
            <input class='pessoa'type='number' name='cepPessoa' required>
            <label for="cepPessoa" class='inputLabel'>CEP</label>
        </div>

        <div class="divFormulario">
            <input class='pessoa'type='number' name='numeroRes' required>
            <label for="numeroRes" class='inputLabel'>Número da Residência</label>
        </div>

        <div class="divFormulario">
            <input class='pessoa'type='text' name='complemento' required>
            <label for="celular" class='inputLabel'>Complemento</label>
        </div>

        <div class="divFormulario">
        <label for="dataAtendimento" class='inputLabel'><b>Data de Atendimento</b></label>
            <br><input class='pessoa' type='date' name='dataAtendimento' required>
        </div>
        
        <p><input type='submit' name='botao' value='Cadastrar'></p>
        <p><input type='submit' name='botao' value='Atualizar'></p>
        <p><input type='submit' name='botao' value='Deletar'></p>
        
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
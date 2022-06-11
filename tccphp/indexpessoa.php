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

<div class="caixa">

    <h1>CADASTRO DE FAMÍLIAS</h1>

    <form action='controlepessoa.php' method='GET'>
        
    <table>
        <td>
        <div class="divFormulario">
            <input class='pessoa' type='number' name='codigo' required> 
            <label for="codigo" class='inputLabel'>Código</label>
        </div>
        
        <div class="divFormulario">
            <input class='pessoa'type='text' name='nome' required>
            <label for="pessoa" class='inputLabel'>Nome</label>
        </div>
        
        <div class="divFormulario">
            <label for="dataNasc" class='inputLabel'>Data de Nascimento</label>
        <input class='pessoa' type='date' name='dataNasc'>
        </div>

        <div class="divFormulario">
            <input class='pessoa'type='number' name='celular' required>
            <label for="celular" class='inputLabel'>Celular</label>
        </div>

        <div class="divFormulario">
            <input class='pessoa'type='number' name='whatsapp' required>
            <label for="whatsapp" class='inputLabel'>Whatsapp</label>
        </div>
        </div>
        </td>

        <td>
        <div class="divFormulario">
            <input class='pessoa'type='number' name='telefone' required>
            <label for="telefone" class='inputLabel'>Telefone</label>
    </div>
        <div class="divFormulario">
            <input class='pessoa'type='text' name='email' required>
            <label for="email" class='inputLabel'>Email</label>
        </div>

        <div class="divFormulario">
            <input class='pessoa'type='number' name='cepPessoa' required>
            <label for="cepPessoa" class='inputLabel'>CEP</label>
        </div>

        <div class="divFormulario">
            <input class='pessoa'type='number' name='numRes' required>
            <label for="numRes" class='inputLabel'>Número da Residência</label>
        </div>

        <div class="divFormulario">
            <input class='pessoa'type='text' name='complemento' required>
            <label for="celular" class='inputLabel'>Complemento</label>
        </div>
        </td>
    </table>
    <table>
    <div class="divFormulario">
            <label for="dataAtendimento" class='inputLabel'>Data de Atendimento</label>
        <input class='pessoa' type='date' name='dataAtendimento'>
        </div>
    </table>
    <table align="center">
        <td>
            <p><input type='submit' name='botao' value='Cadastrar'></p>
        </td>
        <td>
            <p><input type='submit' name='botao' value='Atualizar'></p>
        </td>
        <td>
            <p><input type='submit' name='botao' value='Deletar'></p>
        </td>
        <table>
    </form>
    <form action='controlepessoa.php' method='GET'>
        <p><input type='submit' name='botao' value='Consultar'></p>
    </form>

    <form action='home.php'>
        <p><input type='submit' value="Voltar"></p>
    </form>

</div>

</body>
</html>
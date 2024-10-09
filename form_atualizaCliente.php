<?php
    require 'Banco.php';
    require 'Cliente.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();
    $cliente = new Cliente($conexao);

    $cliente->setId($_GET['id']);
    $smtm = $cliente->consultar();
    $clienteSelecionado = $smtm->fetch(PDO::FETCH_ASSOC); //apenas para uma linha

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Edição</title>
</head>
<body>
    <h3> Edição de Cliente </h3>
    <form method="POST" action="atualizaCliente.php">
        <input type="hidden" name="id" value="<?php echo $clienteSelecionado['id']?>">
        <br>
        Nome: <input type="text" name="nome" value="<?php echo $clienteSelecionado['nome']?>">
        <br>
        Telefone:<input type="text" name="telefone" value="<?php echo $clienteSelecionado['telefone']?>">
        <br>
        Email: <input type="email" name="email" value="<?php echo $clienteSelecionado['email']?>">
        <br>
        CPF: <input type="text" name="cpf" value="<?php echo $clienteSelecionado['cpf']?>">
        <br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
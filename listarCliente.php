<?php
    require 'Banco.php';
    require 'Cliente.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();

    $cliente = new Cliente($conexao);
    $stmt = $cliente->read($conexao);
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>CPF</th>
        <th>Ações</th>
    </tr>

    <?php foreach($clientes as $cliente) {?>
        <tr>
            <td><?php echo $cliente['id']; ?></td>
            <td><?php echo $cliente['nome']; ?></td>
            <td><?php echo $cliente['telefone']; ?></td>
            <td><?php echo $cliente['email']; ?></td>
            <td><?php echo $cliente['cpf']; ?></td>
            <td> 
                <a href="form_atualizaCliente.php?id=<?php echo $cliente['id']; ?>">Editar</a>
                <a href="deletaCliente.php?id=<?php echo $cliente['id']; ?>">Excluir</a>
            </td>
        </tr>
    <?php } ?>
</table>

<a href="form_cadastroCliente.php">Cadastrar Novo Cliente</a>
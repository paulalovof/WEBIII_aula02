<?php
    require 'Banco.php';
    require 'Cliente.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();
    $cliente = new Cliente($conexao);

    $cliente->setId($_POST['id']);
    $cliente->setNome($_POST['nome']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setEmail($_POST['email']);
    $cliente->setCpf($_POST['cpf']);

        if ($cliente->update()) {
            echo "Cliente editado com sucesso!";
            header("Refresh:3;url=listarCliente.php");
        }else {
            echo "Erro ao editar o cliente!";
        }
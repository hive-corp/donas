<?php

header("Access-Control-Allow-Origin: *");

include("../global.php");

session_start();

$connection = Conexao::conectar();

$stmt = $connection->prepare('DELETE FROM tbMensagem WHERE idCliente = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$stmt = $connection->prepare('DELETE FROM tbAvaliacao WHERE idCliente = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$stmt = $connection->prepare('DELETE FROM tbPedidoServico WHERE idCliente = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$stmt = $connection->prepare('DELETE FROM tbPedidoProduto WHERE idCliente = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$stmt = $connection->prepare('DELETE FROM tbPreferencias WHERE idCliente = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$stmt = $connection->prepare('DELETE FROM tbSeguidor WHERE idCliente = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$stmt = $connection->prepare('DELETE FROM tbNotifccliente WHERE idCliente = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$stmt = $connection->prepare('DELETE FROM tbNotifcVendedora WHERE idCliente = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$stmt = $connection->prepare('DELETE FROM tbDenuncia WHERE idCliente = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$cliente = new Cliente();
$cliente->setIdCliente($_SESSION['id']);

daoCliente::deletar($cliente);
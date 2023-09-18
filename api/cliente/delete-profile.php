<?php

header("Access-Control-Allow-Origin: *");

include("../global.php");

session_start();

$connection = Conexao::conectar();

$stmt = $connection->prepare('DELETE FROM tbMensagem WHERE idCliente = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$cliente = new Cliente();
$cliente->setIdCliente($_SESSION['id']);

daoCliente::deletar($cliente);
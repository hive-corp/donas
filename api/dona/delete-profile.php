<?php

header("Access-Control-Allow-Origin: *");

include("../global.php");

session_start();

$connection = Conexao::conectar();

$stmt = $connection->prepare('DELETE FROM tbMensagem WHERE idVendedora = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$vendedora = new Vendedora();
$vendedora->setIdVendedora($_SESSION['id']);

daoVendedora::deletar($vendedora);
<?php

header("Access-Control-Allow-Origin: *");

require_once('../global.php');

$cliente = new Cliente();

$cliente->setEmailCliente($_POST['email']);
$cliente->setSenhaCliente($_POST['pass']);

$conexao = Conexao::conectar();

$stmt = $conexao->prepare('SELECT COUNT(idCliente) FROM tbCliente
                            WHERE emailCliente = ? AND senhaCliente = ?');
$stmt->bindValue(1, $cliente->getEmailCliente());
$stmt->bindValue(2, $cliente->getSenhaCliente());
$stmt->execute();

$count = $stmt->fetch()[0];

if($count==0){
    echo 0;
}else{
    echo 1;
}
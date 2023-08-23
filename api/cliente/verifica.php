<?php

header("Access-Control-Allow-Origin: *");

require_once('../global.php');

$cliente = new Cliente();

$cliente->setEmailCliente($_POST['email']);
$cliente->setSenhaCliente($_POST['pass']);

echo daoCliente::verificaLogin($cliente);
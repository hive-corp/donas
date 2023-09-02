<?php

header("Access-Control-Allow-Origin: *");

require_once('../global.php');

$vendedora = new Vendedora();

$vendedora->setIdVendedora($_POST['id']);

daoVendedora::deletar($vendedora);
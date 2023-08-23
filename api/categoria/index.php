<?php

header("Access-Control-Allow-Origin: *");

require_once('../global.php');

$categorias = daoCategoria::listar();

echo json_encode($categorias);

?>
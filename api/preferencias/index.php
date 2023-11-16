<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

session_start();

$preferencias = json_decode($_POST['preferencias']);

daoPreferencias::deletarPorUsuario($_SESSION['id']);

$cliente = new Cliente();
$cliente->setIdCliente($_SESSION['id']);

foreach ($preferencias as $p) {
    $categoria = new Categoria();
    $categoria->setIdCategoria($p);

    $preferencia = new Preferencias();
    $preferencia->setCategoria($categoria);
    $preferencia->setCliente($cliente);

    daoPreferencias::cadastrar($preferencia);
}

<?php

    require_once 'global.php';

    header("Location: seus-pedidos.php");

    session_start();

    $encomenda = new Encomenda();

    $encomenda->setIdEncomenda($_GET['p']);

    daoEncomenda::cancelar($encomenda);
?>
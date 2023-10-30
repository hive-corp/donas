<?php

    require_once 'global.php';

    header("Location: encomendas.php");

    session_start();

    $encomenda = new Encomenda();

    $encomenda->setIdEncomenda($_GET['e']);

    daoEncomenda::cancelar($encomenda);
?>
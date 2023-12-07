<?php

require_once 'global.php';

header("Location: index.php");

session_start();

$anuncio = new Anuncio();
$anuncio->setIdAnuncio($_GET['a']);

daoPedidoProduto::deletarPorAnuncio($_GET['a']);
daoPedidoServico::deletarPorAnuncio($_GET['a']);
daoAnuncioSubCategoria::deletarPorAnuncio($_GET['a']);
daoAvaliacao::deletarPorAnuncio($_GET['a']);
daoEntradaProduto::deletarPorAnuncio($_GET['a']);
daoSaidaProduto::deletarPorAnuncio($_GET['a']);
daoNotifcVendedora::deletarPorAnuncio($_GET['a']);
daoNotifcCliente::deletarPorAnuncio($_GET['a']);

daoAnuncio::deletar($anuncio);

<?php

header("Access-Control-Allow-Origin: *");

include("../global.php");

session_start();

$connection = Conexao::conectar();

$stmt = $connection->prepare('DELETE FROM tbMensagem WHERE idVendedora = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$stmt = $connection->prepare('SELECT idAnuncio FROM tbAnuncio WHERE idVendedora = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$anuncios = $stmt->fetchAll();

foreach ($anuncios as $anuncio) {
    $id = $anuncio['idAnuncio'];
    daoPedidoProduto::deletarPorAnuncio($id);
    daoPedidoServico::deletarPorAnuncio($id);
    daoAnuncioSubCategoria::deletarPorAnuncio($id);
    daoAvaliacao::deletarPorAnuncio($id);
    daoEntradaProduto::deletarPorAnuncio($id);
    daoSaidaProduto::deletarPorAnuncio($id);
    daoNotifcVendedora::deletarPorAnuncio($id);
    daoNotifcCliente::deletarPorAnuncio($id);
}

$stmt = $connection->prepare('DELETE FROM tbAnuncio WHERE idVendedora = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$stmt = $connection->prepare('DELETE FROM tbSeguidor WHERE idVendedora = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$stmt = $connection->prepare('DELETE FROM tbNotifcVendedora WHERE idVendedora = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$stmt = $connection->prepare('SELECT idDenuncia FROM tbDenuncia WHERE idVendedora = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$denuncias = $stmt->fetchAll();

foreach ($denuncias as $denuncia) {
    $id = $denuncia['idDenuncia'];

    $stmt = $connection->prepare('DELETE FROM tbNotifcCliente WHERE idDenuncia = ?');
    $stmt->bindValue(1, $id);
    $stmt->execute();
}

$stmt = $connection->prepare('DELETE FROM tbDenuncia WHERE idVendedora = ?');
$stmt->bindValue(1, $_SESSION['id']);
$stmt->execute();

$vendedora = new Vendedora();
$vendedora->setIdVendedora($_SESSION['id']);

daoVendedora::deletar($vendedora);

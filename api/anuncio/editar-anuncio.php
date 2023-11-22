<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

$anuncio = new Anuncio();

$anuncio->setNomeAnuncio($_POST['nome']);
$anuncio->setDescricaoAnuncio(($_POST['desc']));
$anuncio->setValorAnuncio($_POST['valor']);
$anuncio->setIdAnuncio($_GET['a']);
$anuncio->setQtdProduto($_POST['qtd']);

daoAnuncio::editar($anuncio);

if (isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
    if (is_uploaded_file($_FILES["foto"]["tmp_name"])) {
        $id = $_GET['a'];

        $nomeimagem = $_FILES['foto']['name'];
        $tipo = $_FILES['foto']['type'];

        $extensao = substr($nomeimagem, -4);
        $extensao == 'jpeg' ? $extensao = substr($nomeimagem, -5) : $extensao;

        $arquivo = "assets/media/products-services/" . $id . $extensao;

        move_uploaded_file($_FILES['foto']['tmp_name'], "../../" . $arquivo);

        $anuncio->setIdAnuncio($id);
        $anuncio->setImagemPrincipalAnuncio($arquivo);

        daoAnuncio::editarFoto($anuncio);
    }
}

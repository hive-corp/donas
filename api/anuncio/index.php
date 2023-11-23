<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "POST":

        $anuncio = new Anuncio();

        $anuncio->setNomeAnuncio($_POST['nome']);
        $anuncio->setDescricaoAnuncio(($_POST['desc']));
        $anuncio->setValorAnuncio($_POST['valor']);
        $anuncio->setEstrelasAnuncio(0);
        $anuncio->setTipoAnuncio($_POST['tipo']);
        $anuncio->setQtdProduto($_POST['tipo'] == 2 ? $_POST['qtd'] : 0);

        session_start();

        $vendedora = new Vendedora();
        $vendedora->setIdVendedora($_SESSION['id']);

        $anuncio->setVendedora($vendedora);

        daoAnuncio::cadastrar($anuncio);

        $id = daoAnuncio::consultarId($anuncio);

        $nomeimagem = $_FILES['foto']['name'];
        $tipo = $_FILES['foto']['type'];

        $extensao = substr($nomeimagem, -4);
        $extensao == 'jpeg' ? $extensao = substr($nomeimagem, -5) : $extensao;

        $arquivo = "assets/media/products-services/" . $id . $extensao;

        move_uploaded_file($_FILES['foto']['tmp_name'], "../../" . $arquivo);

        $anuncio->setIdAnuncio($id);
        $anuncio->setImagemPrincipalAnuncio($arquivo);

        daoAnuncio::editarFoto($anuncio);


        $AnuncioSubCategoria = json_decode($_POST['AnuncioSubCategoria']);

        foreach ($AnuncioSubCategoria as $sub) {
            $SubCategoria = new SubCategoria();
            $SubCategoria->setIdSubCategoria($sub);

            $AnuncioSubCategoria = new AnuncioSubCategoria();
            $AnuncioSubCategoria->setSubCategoria($SubCategoria);
            $AnuncioSubCategoria->setAnuncio($anuncio);

            daoAnuncioSubcategoria::cadastrar($AnuncioSubCategoria);
        }

        break;

    case "PUT":

        //a acrescentar...

        break;

    case "DELETE":

        //a acrescentar...

        break;
}

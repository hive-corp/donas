<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

date_default_timezone_set('America/Sao_Paulo');

session_start();

$anuncio = new Anuncio();

$anuncio->setNomeAnuncio($_POST['nome']);
$anuncio->setDescricaoAnuncio(($_POST['desc']));
$anuncio->setValorAnuncio($_POST['valor']);
$anuncio->setPrecoCustoAnuncio($_POST['preco-custo']);
$anuncio->setIdAnuncio($_GET['a']);

$qtdAtual = daoAnuncio::consultarPorId($_GET['a'])['qtdProduto'];
$diferenca = $qtdAtual - $_POST['qtd'];

if($diferenca > 0){
    $saida = new SaidaProduto();
    $dataSaida = date('Y-m-d H:i:s');
    
    $saida->setAnuncio($anuncio);
    $saida->setDataSaidaProduto($dataSaida);
    $saida->setQtdSaidaProduto(abs($diferenca));

    daoSaidaProduto::cadastrar($saida);
}else if($diferenca < 0){
    $entrada = new EntradaProduto();
    $dataEntrada = date('Y-m-d H:i:s');
    
    $entrada->setAnuncio($anuncio);
    $entrada->setDataEntradaProduto($dataEntrada);
    $entrada->setQtdEntradaProduto(abs($diferenca));

    daoEntradaProduto::cadastrar($entrada);
}

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

$AnuncioSubCategoria = json_decode($_POST['AnuncioSubCategoria']);

daoAnuncioSubCategoria::deletarPorAnuncio($_GET['a']);

$cliente = new Cliente();
$cliente->setIdCliente($_SESSION['id']);

foreach ($AnuncioSubCategoria as $sub) {
    $SubCategoria = new SubCategoria();
    $SubCategoria->setIdSubCategoria($sub);

    $AnuncioSubCategoria = new AnuncioSubCategoria();
    $AnuncioSubCategoria->setSubCategoria($SubCategoria);
    $AnuncioSubCategoria->setAnuncio($anuncio);

    daoAnuncioSubcategoria::cadastrar($AnuncioSubCategoria);
}

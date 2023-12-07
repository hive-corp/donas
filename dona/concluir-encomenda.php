<?php
    require_once 'global.php';
    header("Location: encomendas.php");

    session_start();
    
    date_default_timezone_set('America/Sao_Paulo');

    $encomenda = new PedidoProduto();

    $encomenda->setIdPedidoProduto($_GET['e']);

    daoPedidoProduto::finalizar($encomenda);

    $id = daoPedidoProduto::consultarPorId($_GET['e'])['idAnuncio'];
    $idcliente = daoPedidoProduto::consultarPorId($_GET['e'])['idCliente'];
    
    $notific = new NotifcCliente();

    $cliente = new Cliente();

    $cliente->setIdCliente($idcliente);
    $notific->setCliente($cliente);

    $denuncia = new Denuncia();
    $denuncia->setIdDenuncia(null);

    $anuncio = new Anuncio();

    $anuncio->setIdAnuncio($id);
    $notific->setAnuncio($anuncio);

    $notific->setTipoNotificacao(6);
    $notific->setStatusNotificacao(0);

    daoNotifcCliente::cadastrar($notific);

    $saida = new SaidaProduto();
    $dataSaida = date('Y-m-d H:i:s');
    
    $qtd = daoPedidoProduto::consultarPorId($_GET['e'])['qtdProdutoPedido'];
    $anuncio->setIdAnuncio($id);
    $saida->setAnuncio($anuncio);
    $saida->setDataSaidaProduto($dataSaida);
    $saida->setQtdSaidaProduto($qtd);

    daoSaidaProduto::cadastrar($saida);
    $qtdAnuncio = daoAnuncio::consultarPorId($id)['qtdProduto'];
    $saidaQtd = $qtdAnuncio - $qtd;
    $AnuncioSaida = new Anuncio();
    $AnuncioSaida->setIdAnuncio($id);
    $AnuncioSaida->setQtdProduto($saidaQtd);

    daoAnuncio::editarQuantidade($AnuncioSaida);
?>

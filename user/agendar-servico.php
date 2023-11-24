<?php

    require_once 'global.php';


    session_start();

    $anuncio = new Anuncio();
    $anuncio->setIdAnuncio($_GET['a']);

    $dados = daoAnuncio::consultarPorId($_GET['a']);

    $cliente = new Cliente();
    $cliente->setIdCliente($_SESSION['id']);

    $agendar = new PedidoServico();
    $data = !empty($_POST['data-entrega-serviço']) ? $_POST['data-entrega-serviço'] : null;
    $dataFormatada = !empty($data) ? date('Y-m-d\TH:i', strtotime($data)) : null;
    $dataFeito = date('Y-m-d H:i:s');
// Calcula o valor total com base na quantidade
$valorTotal = $dados['valorAnuncio'];
    $agendar->setCliente($cliente);
    $agendar->setAnuncio($anuncio);
    $agendar->setValorTotal($valorTotal);
    $agendar->setDataServicoContratado($dataFeito);
    $agendar->setDataServicoMarcado($dataFormatada);
    $agendar->setStatusPedidoServico(1);

    daoPedidoServico::criar($agendar);
?>

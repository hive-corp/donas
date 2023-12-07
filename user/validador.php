<?php
require_once 'global.php';

try {
    session_start();

    $cliente = new Cliente();

    $cliente->setEmailCliente($_SESSION['email']);
    $cliente->setSenhaCliente($_SESSION['senha']);

    $consultaCliente = daoCliente::consultaLogin($cliente);
    if ($consultaCliente == 0) {
        header("Location: ../login.php");
    } else {
        // $pedidos = daoPedidoProduto::listarPedidosCliente($_SESSION['id']);

        // foreach ($pedidos as $p) {
        //     $tempoAtual = time();
        //     $tempoUltimaAtualizacao = strtotime($p['dataPedidoFeito']);
        //     $tempoLimite = $tempoUltimaAtualizacao + 7200; // 7200 segundos (2 horas)

        //     // Verifica se passaram mais de 10 segundos desde a última atualização e o status é "Fazendo"
        //     // if ($tempoAtual > $tempoLimite && $p['statusPedidoProduto'] == 1) {
        //     //     // Atualiza o status para "Cancelado"
        //     //     daoPedidoProduto::cancelarAuto($p['idPedidoProduto'], 5); // 2 representa o status "Cancelado"

        //     //     $id = daoPedidoProduto::consultarPorId($p['idPedidoProduto'])['idAnuncio'];
        //     //     $idcliente = daoPedidoProduto::consultarPorId($id)['idCliente'];

        //     //     $notific = new NotifcCliente();

        //     //     $cliente = new Cliente();

        //     //     $cliente->setIdCliente($idcliente);
        //     //     $notific->setCliente($cliente);

        //     //     $denuncia = new Denuncia();
        //     //     $denuncia->setIdDenuncia(null);

        //     //     $anuncio = new Anuncio();

        //     //     $anuncio->setIdAnuncio($id);
        //     //     $notific->setAnuncio($anuncio);

        //     //     $notific->setTipoNotificacao(5);
        //     //     $notific->setStatusNotificacao(0);

        //     //     daoNotifcCliente::cadastrar($notific);
        //     // }
        // }
    }
} catch (Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}

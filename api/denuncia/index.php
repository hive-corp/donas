<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

session_start();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "POST":

        $cliente = new Cliente();
        $cliente->setIdCliente($_SESSION['id']);

        $vendedora = new Vendedora();
        $vendedora->setNomeUsuarioNegocioVendedora($_GET['user']);

        $id = daoVendedora::consultarIdPorNomeUsuario($vendedora);

        $vendedora->setIdVendedora($id);

        $denuncia = new Denuncia();
        $denuncia->setCliente($cliente);
        $denuncia->setVendedora($vendedora);

        $denuncia->setDescricaoDenuncia($_POST['conteudo']);
        $denuncia->setMotivoDenuncia($_POST['motivo']);

        daoDenuncia::cadastrar($denuncia);

        $notific = new NotifcCliente();
        $notific->setCliente($cliente);

        $iddenuncia = daoDenuncia::consultaUltimaDenunciaCliente($_SESSION['id']);
        $denuncia->setIdDenuncia($iddenuncia);
        
        $notific->setDenuncia($denuncia);

        $anuncio = new Anuncio;
        $anuncio->setIdAnuncio(null);

        $notific->setTipoNotificacao(1);
        $notific->setStatusNotificacao(0);

        daoNotifcCliente::cadastrar($notific);

        break;

    case "PUT":

        //a acrescentar...

        break;

    case "DELETE":

        //a acrescentar...

        break;
}

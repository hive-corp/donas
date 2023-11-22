<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

if (isset($_GET['type']) && isset($_GET['username'])) {
    session_start();

    if ($_GET['type'] == 'messages') {
        if ($_SESSION['tipo-login'] == 0) {
            $cliente = new Cliente();
            $cliente->setIdCliente($_SESSION['id']);

            $vendedora = new Vendedora();
            $vendedora->setNomeUsuarioNegocioVendedora($_GET['username']);

            $id = daoVendedora::consultarIdPorNomeUsuario($vendedora);
            $vendedora->setIdVendedora($id);

            $conversa = new Mensagem();
            $conversa->setCliente($cliente);
            $conversa->setVendedora($vendedora);

            $mensagens_conversa = daoMensagem::listarConversa($conversa);
            echo json_encode($mensagens_conversa);
        }
        if ($_SESSION['tipo-login'] == 1) {
            $cliente = new Cliente();
            $cliente->setNomeUsuarioCliente($_GET['username']);

            $vendedora = new Vendedora();
            $vendedora->setIdVendedora($_SESSION['id']);

            $id = daoCliente::consultarIdPorNomeUsuario($cliente);

            $cliente->setIdCliente($id);

            $conversa = new Mensagem();
            $conversa->setCliente($cliente);
            $conversa->setVendedora($vendedora);

            $mensagens_conversa = daoMensagem::listarConversa($conversa);
            echo json_encode($mensagens_conversa);
        }
    }
}

if (isset($_GET['type']) && $_GET['type']=='chats') {
    session_start();
    if ($_SESSION['tipo-login'] == 0) {
        $cliente = new Cliente();
        $cliente->setIdCliente($_SESSION['id']);

        $conversas = new Mensagem();
        $conversas->setCliente($cliente);

        $lista_conversas = daoMensagem::listarConversasCliente($conversas);
        echo json_encode($lista_conversas);
    } else if ($_SESSION['tipo-login'] == 1) {
        $vendedora = new Vendedora();
        $vendedora->setIdVendedora($_SESSION['id']);

        $conversas = new Mensagem();
        $conversas->setVendedora($vendedora);

        $lista_conversas = daoMensagem::listarConversasVendedora($conversas);
        echo json_encode($lista_conversas);
    }
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "POST":

        $mensagem = new Mensagem();
        $mensagem->setConteudoMensagem(isset($_POST['conteudo']) ? $_POST['conteudo'] : "");

        session_start();

        if ($_SESSION['tipo-login'] == 0) {
            $mensagem->setOrigemMensagem(0);

            $cliente = new Cliente();
            $cliente->setIdCliente($_SESSION['id']);

            $mensagem->setCliente($cliente);

            $vendedora = new Vendedora();
            $vendedora->setNomeUsuarioNegocioVendedora($_POST['username']);

            $id = daoVendedora::consultarIdPorNomeUsuario($vendedora);
            $vendedora->setIdVendedora($id);

            $mensagem->setVendedora($vendedora);
        } else if ($_SESSION['tipo-login'] == 1) {
            $mensagem->setOrigemMensagem(1);

            $vendedora = new Vendedora();
            $vendedora->setIdVendedora($_SESSION['id']);

            $mensagem->setVendedora($vendedora);

            $cliente = new Cliente();
            $cliente->setNomeUsuarioCliente($_POST['username']);

            $id = daoCliente::consultarIdPorNomeUsuario($cliente);
            $cliente->setIdCliente($id);

            $mensagem->setCliente($cliente);
        }

        daoMensagem::criar($mensagem);

        if (isset($_FILES["arquivo"]) && !empty($_FILES["arquivo"]["name"])) {
            if (is_uploaded_file($_FILES["arquivo"]["tmp_name"])) {
                $id = daoMensagem::consultaIdUltimaMensagem($mensagem);

                $nomearquivo = $_FILES['arquivo']['name'];

                $extensao = strtolower(pathinfo($nomearquivo,PATHINFO_EXTENSION));
                $arquivo = "assets/media/messages/" . $id . "." . $extensao;

                move_uploaded_file($_FILES['arquivo']['tmp_name'], "../../" . $arquivo);

                $mensagem->setIdMensagem($id);
                $mensagem->setArquivoMensagem($arquivo);

                daoMensagem::editarArquivo($mensagem);

                echo $arquivo;
            }
        }

        break;

    case "PUT":

        //a acrescentar...

        break;

    case "DELETE":

        //a acrescentar...

        break;
}

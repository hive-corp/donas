<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

if (isset($_GET['SubCategoria'])) {
    $SubCategoria = daoSubCategoria::listar();
    echo json_encode($SubCategoria);
}

session_start();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "POST":
        if (isset($_SESSION['login-sessao']) && isset($_SESSION['senha-sessao'])) {
            $SubCategoria = new SubCategoria();
            $SubCategoria->setNomeSubCategoria($_POST['nome-subcategoria']);
            $SubCategoria->getCategoria()->setIdCategoria($_POST['categoria-subcategoria']);

            daoSubCategoria::cadastrar($SubCategoria);

            echo json_encode(["message" => "Subcategoria cadastrada com sucesso"]);

            // Aguarda por 3 segundos
            sleep(3);

            // Redireciona para a página após o atraso
            header('Location: ../../area-restrita-adm/cadastra-subcate.php');
            exit; // Certifique-se de encerrar o script após o redirecionamento

        } else {
            http_response_code(403);
            echo json_encode(["message" => "Você não tem acesso a esse recurso."]);
        }
        break;



    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);

        if (isset($_SESSION['login-sessao']) && isset($_SESSION['senha-sessao'])) {
            // Aqui, você precisa ajustar para lidar com a atualização de subcategorias
            $id = $_PUT['id'];
            $novaNomeSubCategoria = $_PUT['novo_nome'];
            daoSubCategoria::editar($id, $novaNomeSubCategoria);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Você não tem acesso a esse recurso."]);
        }
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);

        if (isset($_SESSION['login-sessao']) && isset($_SESSION['senha-sessao'])) {
            // Aqui, você precisa ajustar para lidar com a exclusão de subcategorias
            $id = $_DELETE['id'];
            daoSubCategoria::deletar($id);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Você não tem acesso a esse recurso."]);
        }
        break;
}

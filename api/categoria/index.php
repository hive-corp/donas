<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

if (isset($_GET['categorias'])) {
    $categorias = daoCategoria::listar();
    echo json_encode($categorias);
}

session_start();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "POST":
        if (isset($_SESSION['login-sessao']) && isset($_SESSION['senha-sessao'])) {
            $categoria = new Categoria();
            $categoria->setNomeCategoria($_POST['nome']);
            daoCategoria::cadastrar($categoria);

            $id = daoCategoria::consultarIdPorNome($categoria);

            $nomeimagem = $_FILES['foto']['name'];
            $tipo = $_FILES['foto']['type'];

            $extensao = substr($nomeimagem, -4);
            $extensao == 'jpeg' ? $extensao = substr($nomeimagem, -5) : $extensao;

            $arquivo = "assets/media/categories/" . $id . $extensao;

            move_uploaded_file($_FILES['foto']['tmp_name'], "../../" . $arquivo);

            $categoria->setIdCategoria($id);
            $categoria->setFotoCategoria($arquivo);

            daoCategoria::editarFoto($categoria);
        }else{
            http_response_code(404);
            echo json_encode(["message" => "Você não tem acesso a esse recurso."]);
        }
        break;

    case "PUT":

        //a acrescentar...

        break;

    case "DELETE":

        //a acrescentar...

        break;
}

<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

if (isset($_GET['cnpj'])) {
    $cnpj = $_GET["cnpj"];
    $count = daoVendedora::verificaCnpj($cnpj);
    echo json_encode($count);
} else if (isset($_GET['username'])) {
    $username = $_GET["username"];
    $count = daoVendedora::verificaNomeUsuario($username);
    echo json_encode($count);
} else if (isset($_GET['email'])) {
    $email = $_GET["email"];
    $count = daoVendedora::verificaEmail($email);
    echo json_encode($count);
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "POST":
        $vendedora = new Vendedora();

        $vendedora->setNomeVendedora($_POST['nome']);
        $vendedora->setEmailVendedora($_POST['email']);
        $vendedora->setSenhaVendedora($_POST['pass']);
        $vendedora->setDtNascVendedora($_POST['nasc']);
        $vendedora->setStatusVendedora(0);
        $vendedora->setNomeNegocioVendedora($_POST['nome-empresa']);
        $vendedora->setNomeUsuarioNegocioVendedora($_POST['username-empresa']);
        $vendedora->setLogNegocio($_POST['log']);
        $vendedora->setCidadeNegocioVendedora($_POST['cidade']);
        $vendedora->setEstadoNegocioVendedora($_POST['uf']);
        $vendedora->setBairroNegocioVendedora($_POST['bairro']);
        $vendedora->setNumNegocioVendedora($_POST['num']);
        $vendedora->setCompNegocioVendedora($_POST['comp']);
        $vendedora->setCepNegocioVendedora($_POST['cep']);
        $vendedora->setCnpjNegocioVendedora($_POST['cnpj']);
        $vendedora->setNivelNegocioVendedora($_POST['nivel'] == "Premium" ? 1 : 0);

        $categoria = new Categoria();

        $categoria->setIdCategoria($_POST['categoria']);

        $vendedora->setCategoria($categoria);

        daoVendedora::cadastrar($vendedora);

        $id = daoVendedora::consultarIdPorEmail($vendedora);
        $vendedora->setIdVendedora($id);

        $nomeimagem = $_FILES['foto-vendedora']['name'];
        $tipo = $_FILES['foto-vendedora']['type'];

        $extensao = substr($nomeimagem, -4);
        $extensao == 'jpeg' ? $extensao = substr($nomeimagem, -5) : $extensao;

        $arquivo = "assets/img/users/donas/" . $id . $extensao;

        move_uploaded_file($_FILES['foto-vendedora']['tmp_name'], "../../" . $arquivo);

        $vendedora->setFotoVendedora($arquivo);

        daoVendedora::editarFoto($vendedora);

        $nomeimagem = $_FILES['foto-empresa']['name'];
        $tipo = $_FILES['foto-empresa']['type'];

        $extensao = substr($nomeimagem, -4);
        $extensao == 'jpeg' ? $extensao = substr($nomeimagem, -5) : $extensao;

        $arquivo = "assets/img/users/negocios/" . $id . $extensao;

        move_uploaded_file($_FILES['foto-empresa']['tmp_name'], "../../" . $arquivo);

        $vendedora->setFotoNegocioVendedora($arquivo);

        daoVendedora::editarFotoNegocio($vendedora);
        break;

    case "PUT":

        //a acrescentar...

        break;

    case "DELETE":

        //a acrescentar...

        break;
}

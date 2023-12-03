<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once('../global.php');

$method = $_SERVER['REQUEST_METHOD'];

if ($method !== 'GET') {
    http_response_code(405); // Método não permitido
    exit();
}

$nomeusuario = $_GET['v'];

$valor = $_GET['p'];

$vendedora = new Vendedora();

$vendedora->setNomeUsuarioNegocioVendedora($nomeusuario);

$dados = daoVendedora::consultarPorNomeUsuario($vendedora);

$nomeVendedora = $dados['nomeVendedora'];
$nomeVendedora = str_replace(' ', '%2f', $nomeVendedora);

$cidadeVendedora = $dados['cidadeNegocioVendedora'];

$cidadeVendedora = str_replace(' ', '%2f', $cidadeVendedora);
$chaveVendedora = $dados['chavePixVendedora'];

$external_api_url = 'https://gerarqrcodepix.com.br/api/v1?nome='.$nomeVendedora.'&cidade='.$cidadeVendedora.'&saida=qr&valor='.$valor.'&chave='.$chaveVendedora;

$curl = curl_init($external_api_url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

if (curl_errno($curl)) {
    http_response_code(500);
    exit();
}

curl_close($curl);

echo $response;
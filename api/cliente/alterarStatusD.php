<?php

require_once('../global.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = new Cliente();
    $cliente->setIdCliente($_POST['id']); // Adicione esta linha para definir o idConta

    $statusAtual = daoCliente::consultarStatus($cliente); // Adicione esta linha para obter o status atual

    // Altera o status da cliente
    $novoStatus = $statusAtual == 0 ? 1 : 0; // Calcula o novo status

    $cliente->setStatusConta($novoStatus);
    daoCliente::alterarStatus($cliente);

    // Retorna o novo status
    echo json_encode(['status' => $novoStatus]);
    sleep(3);

    header('Location: ../../area-restrita-adm/denuncias.php');
} else {
    echo json_encode(["error" => "Método não permitido"]);
}
?>

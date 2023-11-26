<?php

require_once('../global.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vendedora = new Vendedora();
    $vendedora->setIdVendedora($_POST['id']); // Adicione esta linha para definir o idConta

    $statusAtual = daoVendedora::consultarStatus($vendedora); // Adicione esta linha para obter o status atual

    // Altera o status da vendedora
    $novoStatus = $statusAtual == 0 ? 1 : 0; // Calcula o novo status

    $vendedora->setStatusVendedora($novoStatus);
    daoVendedora::alterarStatus($vendedora);

    // Retorna o novo status
    echo json_encode(['status' => $novoStatus]);
    

    sleep(3);

    header('Location: ../../area-restrita-adm/donas.php');
} else {
    echo json_encode(["error" => "Método não permitido"]);
}
?>

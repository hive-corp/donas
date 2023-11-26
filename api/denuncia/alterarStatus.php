<?php

require_once('../global.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $visualizadoDenuncia = new Denuncia();
    $visualizadoDenuncia->setIdDenuncia($_POST['id']);

    $statusAtual = daoDenuncia::consultarStatus($visualizadoDenuncia);

    $novoStatus = $statusAtual == 0 ? 1 : 0;

    $visualizadoDenuncia->setVisualizadoDenuncia($novoStatus);
    daoDenuncia::alterarStatus($visualizadoDenuncia);

    // Aguarde 3 segundos antes de redirecionar (opcional)
    sleep(3);

    header('Location: ../../area-restrita-adm/denuncias.php');
} else {
    echo json_encode(["error" => "Método não permitido"]);
}
?>

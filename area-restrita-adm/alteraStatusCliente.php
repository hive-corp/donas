<?php
require_once "global.php";
include_once("validador.php");

error_log('Requisição recebida em alteraStatusCliente.php');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idCliente'])) {
        $idCliente = $_POST['idCliente'];

        $consulta = $conexao->prepare("SELECT statusConta FROM tbCliente WHERE idCliente = ?");
        $consulta->execute([$idCliente]);
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $novoStatus = ($resultado['statusConta'] == 1) ? 2 : 1;

            $atualizacao = $conexao->prepare("UPDATE tbCliente SET statusConta = ? WHERE idCliente = ?");
            $atualizacao->execute([$novoStatus, $idCliente]);

            echo json_encode(['success' => true, 'message' => 'Status alterado com sucesso']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Cliente não encontrado']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Requisição inválida']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro na conexão com o banco de dados: ' . $e->getMessage()]);
}
?>
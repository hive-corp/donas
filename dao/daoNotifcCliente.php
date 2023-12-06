<?php
require_once "global.php";

class daoNotifcCliente
{

    public static function cadastrar($NotifcCliente)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbNotifcCliente(idDenuncia, idAnuncio, idCliente, idPedidoProduto, idPedidoServico, tipoNotificacao, statusNotificacao, dataNotificacao)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $NotifcCliente->getDenuncia()->getIdDenuncia());
        $prepareStatement->bindValue(2, $NotifcCliente->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindValue(3, $NotifcCliente->getCliente()->getIdCliente());
        $prepareStatement->bindValue(4, $NotifcCliente->getPedidoProduto()->getIdPedidoProduto());
        $prepareStatement->bindValue(5, $NotifcCliente->getPedidoServico()->getIdPedidoServico());
        $prepareStatement->bindValue(6, $NotifcCliente->getTipoNotificacao());
        $prepareStatement->bindValue(7, $NotifcCliente->getStatusNotificacao());
        $prepareStatement->bindValue(8, $NotifcCliente->getDataNotificacao());

        $prepareStatement->execute();
    }

    public static function deletar($NotifcCliente)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbNotifcCliente WHERE idNotifcCliente = ?";
        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $NotifcCliente->getIdNotifcCliente());

        $prepareStatement->execute();
    }

    public static function editar($NotifcCliente)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbNotifcCliente
                            SET idDenuncia = ?, idAnuncio = ?, idCliente = ?, tipoNotificacao = ?, statusNotificacao = ?, dataNotificacao = ?
                            WHERE idNotifcCliente = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $NotifcCliente->getDenuncia()->getIdDenuncia());
        $prepareStatement->bindValue(2, $NotifcCliente->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindValue(3, $NotifcCliente->getCliente()->getIdCliente());
        $prepareStatement->bindValue(4, $NotifcCliente->getTipoNotificacao());
        $prepareStatement->bindValue(5, $NotifcCliente->getStatusNotificacao());
        $prepareStatement->bindValue(6, $NotifcCliente->getDataNotificacao());
        $prepareStatement->bindValue(7, $NotifcCliente->getIdNotifcCliente());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbNotifcCliente";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarNotificacoes($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbNotifcCliente WHERE idCliente = ?
                        ORDER BY idNotifcCliente DESC";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);

        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function contarNotificacoes($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT COUNT(idNotifcCliente) as qtd FROM tbNotifcCliente WHERE idCliente = ? AND statusNotificacao = 0";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);

        $resultado->execute();
        $lista = $resultado->fetch()[0];
        return $lista;
    }

    public static function visualizarNotificacoes($id)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbNotifcCliente
                        SET statusNotificacao = 1
                        WHERE idCliente = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $id);

        $prepareStatement->execute();
    }
}

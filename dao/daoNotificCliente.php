<?php
require_once "global.php";

class daoNotificCliente
{

    public static function cadastrar($NotificCliente)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbNotificCliente(idDenuncia, idAnuncio, idCliente, tipoNotificacao, statusNotificacao, dataNotificacao)
                            VALUES (?, ?, ?, ?, ?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $NotificCliente->getDenuncia()->getIdDenuncia());
        $prepareStatement->bindValue(2, $NotificCliente->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindValue(3, $NotificCliente->getCliente()->getIdCliente());
        $prepareStatement->bindValue(4, $NotificCliente->getTipoNotificacao());
        $prepareStatement->bindValue(5, $NotificCliente->getStatusNotificacao());
        $prepareStatement->bindValue(6, $NotificCliente->getDataNotificacao());

        $prepareStatement->execute();
    }

    public static function deletar($NotificCliente)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbNotificCliente WHERE idNotificCliente = ?";
        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $NotificCliente->getIdNotificCliente());

        $prepareStatement->execute();
    }

    public static function editar($NotificCliente)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbNotificCliente
                            SET idDenuncia = ?, idAnuncio = ?, idCliente = ?, tipoNotificacao = ?, statusNotificacao = ?, dataNotificacao = ?
                            WHERE idNotificCliente = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $NotificCliente->getDenuncia()->getIdDenuncia());
        $prepareStatement->bindValue(2, $NotificCliente->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindValue(3, $NotificCliente->getCliente()->getIdCliente());
        $prepareStatement->bindValue(4, $NotificCliente->getTipoNotificacao());
        $prepareStatement->bindValue(5, $NotificCliente->getStatusNotificacao());
        $prepareStatement->bindValue(6, $NotificCliente->getDataNotificacao());
        $prepareStatement->bindValue(7, $NotificCliente->getIdNotificCliente());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbNotificCliente";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarNotificacoes($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbNotificCliente WHERE idCliente = ?
                        ORDER BY idNotificCliente DESC";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);

        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function contarNotificacoes($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT COUNT(idNotificCliente) as qtd FROM tbNotificCliente WHERE idCliente = ? AND statusNotificacao = 0";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);

        $resultado->execute();
        $lista = $resultado->fetch()[0];
        return $lista;
    }

    public static function visualizarNotificacoes($id)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbNotificCliente
                        SET statusNotificacao = 1
                        WHERE idCliente = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $id);

        $prepareStatement->execute();
    }
}

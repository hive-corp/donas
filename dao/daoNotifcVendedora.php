<?php
require_once "global.php";

class daoNotifcVendedora
{

    public static function cadastrar($NotifcVendedora)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbNotifcVendedora(idVendedora, idAnuncio, idCliente, tipoNotificacao, statusNotificacao)
                            VALUES (?, ?, ?, ?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $NotifcVendedora->getVendedora()->getIdVendedora());
        $prepareStatement->bindValue(2, $NotifcVendedora->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindValue(3, $NotifcVendedora->getCliente()->getIdCliente());
        $prepareStatement->bindValue(4, $NotifcVendedora->getTipoNotificacao());
        $prepareStatement->bindValue(5, $NotifcVendedora->getStatusNotificacao());

        $prepareStatement->execute();
    }

    public static function deletar($NotifcVendedora)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbNotifcVendedora WHERE idNotificVendedora = ?";
        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $NotifcVendedora->getIdNotifcVendedora());

        $prepareStatement->execute();
    }

    public static function deletarPorAnuncio($id)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbNotifcVendedora WHERE idAnuncio = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $id);

        $prepareStatement->execute();
    }

    public static function editar($NotifcVendedora)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbNotifcVendedora
                            SET idVendedora = ?, idAnuncio = ?, idCliente = ?, tipoNotificacao = ?, statusNotificacao = ?
                            WHERE idNotificVendedora = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $NotifcVendedora->getVendedora()->getIdVendedora());
        $prepareStatement->bindValue(2, $NotifcVendedora->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindValue(3, $NotifcVendedora->getCliente()->getIdCliente());
        $prepareStatement->bindValue(4, $NotifcVendedora->getTipoNotificacao());
        $prepareStatement->bindValue(5, $NotifcVendedora->getStatusNotificacao());
        $prepareStatement->bindValue(7, $NotifcVendedora->getIdNotifcVendedora());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbNotifcVendedora";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarNotificacoes($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbNotifcVendedora WHERE idVendedora = ?
                        ORDER BY idNotifcVendedora DESC";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);

        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function contarNotificacoes($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT COUNT(idNotifcVendedora) as qtd FROM tbNotifcVendedora WHERE idVendedora = ? AND statusNotificacao = 0";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);

        $resultado->execute();
        $lista = $resultado->fetch()[0];
        return $lista;
    }

    public static function visualizarNotificacoes($id)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbNotifcVendedora
                        SET statusNotificacao = 1
                        WHERE idVendedora = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $id);

        $prepareStatement->execute();
    }
}

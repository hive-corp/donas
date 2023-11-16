<?php

require_once "global.php";

class daoPreferencias
{

    public static function cadastrar($Preferencias)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbpreferencias(idCliente, idCategoria)
            VALUES (?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $Preferencias->getCliente()->getIdCliente());
        $prepareStatement->bindvalue(2, $Preferencias->getCategoria()->getIdCategoria());

        $prepareStatement->execute();
    }

    public static function deletar($Preferencias)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE tbPreferencias WHERE idPreferencias = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindvalue(1, $Preferencias->getIdPreferencias());

        $prepareStatement->execute();
    }

    public static function deletarPorUsuario($id)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbPreferencias WHERE idCliente = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $id);

        $prepareStatement->execute();
    }

    public static function editar($Preferencias)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbPreferencias
                            SET idCliente = ?, idCategoria = ?
                            WHERE idPreferencias = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Preferencias->getCliente()->getIdCliente());
        $prepareStatement->bindValue(2, $Preferencias->getCategoria()->getIdCategoria());
        $prepareStatement->bindValue(3, $Preferencias->getIdPreferencias());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbPreferencias";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarUsuario($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT idCategoria FROM tbPreferencias WHERE idCliente = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
}
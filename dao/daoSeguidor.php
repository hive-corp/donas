<?php

require_once "global.php";

class daoSeguidor
{

    public static function cadastrar($Seguidor)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbSeguidor(idCliente, idVendedora)
            VALUES (?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $Seguidor->getCliente()->getIdCliente());
        $prepareStatement->bindvalue(2, $Seguidor->getVendedora()->getIdVendedora());

        $prepareStatement->execute();
    }

    public static function deletar($Seguidor)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE tbSeguidor WHERE idSeguidor = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindvalue(1, $Seguidor->getIdSeguidor());

        $prepareStatement->execute();
    }

    public static function pararDeSeguir($Seguidor)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbSeguidor WHERE idCliente = ? AND idVendedora = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        
        $prepareStatement->bindvalue(1, $Seguidor->getCliente()->getIdCliente());
        $prepareStatement->bindvalue(2, $Seguidor->getVendedora()->getIdVendedora());

        $prepareStatement->execute();
    }

    public static function editar($Seguidor)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbSeguidor
                            SET idCliente = ?, idVendedora = ?
                            WHERE idSeguidor = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Seguidor->getCliente()->getIdCliente());
        $prepareStatement->bindValue(2, $Seguidor->getVendedora()->getIdVendedora());
        $prepareStatement->bindValue(3, $Seguidor->getIdSeguidor());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbSeguidor";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function contarSeguidor($id){
        $connection = Conexao::conectar();

        $querySelect = "SELECT COUNT(idSeguidor) FROM tbSeguidor WHERE idVendedora = ?";

        $resultado = $connection->prepare($querySelect);

        $resultado->bindValue(1, $id);
        $resultado->execute();
        $lista = $resultado->fetch()[0];
        return $lista;
    }

    public static function consultaSeguidor($seguidor){
        $connection = Conexao::conectar();

        $querySelect = "SELECT COUNT(idSeguidor) FROM tbSeguidor WHERE idCliente = ? AND idVendedora = ?";

        $resultado = $connection->prepare($querySelect);
       
        $resultado->bindValue(1, $seguidor->getCliente()->getIdCliente());
        $resultado->bindValue(2, $seguidor->getVendedora()->getIdVendedora());

        $resultado->execute();
        $count = $resultado->fetch()[0];

        return $count!=0;
    }
}
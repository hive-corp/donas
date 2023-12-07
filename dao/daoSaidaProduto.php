<?php
require_once "global.php";

class daoSaidaProduto
{
    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbSaidaProduto";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public static function cadastrar($SaidaProduto)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbSaidaProduto(dataSaidaProduto, qtdSaidaProduto	, idAnuncio)
                                VALUES (?, ?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $SaidaProduto->getDataSaidaProduto());
        $prepareStatement->bindValue(2, $SaidaProduto->getQtdSaidaProduto());
        $prepareStatement->bindValue(3, $SaidaProduto->getAnuncio()->getIdAnuncio());
        $prepareStatement->execute();
    }
    public static function deletarPorAnuncio($id)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbSaidaProduto WHERE idAnuncio = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $id);

        $prepareStatement->execute();
    }
}

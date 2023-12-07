<?php

require_once "global.php";

class daoEntradaProduto
{
    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbEntradaProduto";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public static function cadastrar($EntradaProduto)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbEntradaProduto(dataEntradaProduto, qtdEntradaProduto, idAnuncio)
                                VALUES (?, ?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $EntradaProduto->getDataEntradaProduto());
        $prepareStatement->bindValue(2, $EntradaProduto->getQtdEntradaProduto());
        $prepareStatement->bindValue(3, $EntradaProduto->getAnuncio()->getIdAnuncio());
        $prepareStatement->execute();
    }
    public static function deletarPorAnuncio($id)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbEntradaProduto WHERE idAnuncio = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $id);

        $prepareStatement->execute();
    }
}

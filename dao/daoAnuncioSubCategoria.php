<?php

require_once "global.php";

class daoAnuncioSubcategoria
{

    public static function cadastrar($AnuncioSubCategoria)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbAnuncioSubCategoria(idAnuncio, idSubCategoria)
            VALUES (?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $AnuncioSubCategoria->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindvalue(2, $AnuncioSubCategoria->getSubCategoria()->getIdSubCategoria());

        $prepareStatement->execute();
    }

    public static function deletar($AnuncioSubCategoria)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE tbAnuncioSubCategoria WHERE idAnuncioSubCategoria = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindvalue(1, $AnuncioSubCategoria->getIdAnuncioSubCategoria());

        $prepareStatement->execute();
    }

    public static function deletarPorAnuncio($id)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbAnuncioSubCategorias WHERE idAnuncio = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $id);

        $prepareStatement->execute();
    }

    public static function editar($AnuncioSubCategoria)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbAnuncioSubCategoria
                            SET idAnuncio = ?, idSubCategoria = ?
                            WHERE idAnuncioSubCategoria = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $AnuncioSubCategoria->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindValue(2, $AnuncioSubCategoria->getSubCategoria()->getIdSubCategoria());
        $prepareStatement->bindValue(3, $AnuncioSubCategoria->getIdAnuncioSubCategoria());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbAnuncioSubCategoria";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarAnuncio($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT idSubCategoria FROM tbAnuncioSubCategoria WHERE idAnuncio = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
}

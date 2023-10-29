<?php

require_once "global.php";

class daoAvaliacao
{

    public static function cadastrar($Avaliacao)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbAvaliacao(conteudoAvaliacao, estrelasAvaliacao, idAnuncio, idCliente)
            VALUES (?, ?, ?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $Avaliacao->getConteudoAvaliacao());
        $prepareStatement->bindvalue(2, $Avaliacao->getEstrelasAvaliacao());
        $prepareStatement->bindvalue(3, $Avaliacao->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindvalue(4, $Avaliacao->getCliente()->getIdCliente());

        $prepareStatement->execute();
    }

    public static function deletar($Avaliacao)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE tbAvaliacao WHERE idAvaliacao = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindvalue(1, $Avaliacao->getIdAvaliacao());

        $prepareStatement->execute();
    }

    public static function editar($Avaliacao)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbAvaliacao
                            SET conteudoAvaliacao = ?, estrelasAvaliacao = ?, idAnuncio = ?, isCliente = ?, 
                            WHERE idAvaliacao = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Avaliacao->getConteudoAvaliacao());
        $prepareStatement->bindValue(2, $Avaliacao->getEstrelasAvaliacao());
        $prepareStatement->bindValue(6, $Avaliacao->getAnuncio()->getIdAnuncio());
        $prepareStatement->bindValue(6, $Avaliacao->getCliente()->getIdCliente());
        $prepareStatement->bindValue(7, $Avaliacao->getIdAvaliacao());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAvaliacao.*, nomeCliente, fotoCliente FROM tbAvaliacao
                        INNER JOIN tbCliente ON tbCliente.idCliente = tbAvaliacao.idCliente";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarPorAnuncio($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbAvaliacao.*, nomeCliente, fotoCliente FROM tbAvaliacao
                        INNER JOIN tbCliente ON tbCliente.idCliente = tbAvaliacao.idCliente
                        WHERE idAnuncio = ?";

        $prepareStatement = $connection->prepare($querySelect);
        $prepareStatement->bindValue(1, $id);
        $prepareStatement->execute();
        $lista = $prepareStatement->fetchAll();
        return $lista;
    }

    public static function contarAvaliacaoAnuncio($id)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idAvaliacao) FROM tbAvaliacao WHERE idAnuncio = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $count = $stmt->fetch()[0];

        return $count;
    }

    public static function consultarMediaAvaliacao($id){
        $connection = Conexao::conectar();

        $stmt = $connection->prepare(("SELECT AVG(estrelasAvaliacao) FROM tbAvaliacao WHERE idAnuncio = ?"));
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $avg = $stmt->fetch()[0];

        return $avg;
    }

}

<?php
require_once "global.php";

class daoAnuncio
{

    public static function cadastrar($Anuncio)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbAnuncio(nomeAnuncio, descricaoAnuncio, valorAnuncio, estrelasAnuncio, tipoAnuncio, qtdProduto, idVendedora)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindvalue(1, $Anuncio->getNomeAnuncio());
        $prepareStatement->bindvalue(2, $Anuncio->getDescricaoAnuncio());
        $prepareStatement->bindvalue(3, $Anuncio->getValorAnuncio());
        $prepareStatement->bindvalue(4, $Anuncio->getEstrelasAnuncio());
        $prepareStatement->bindvalue(5, $Anuncio->getTipoAnuncio());
        $prepareStatement->bindvalue(6, $Anuncio->getQtdProduto());
        $prepareStatement->bindvalue(7, $Anuncio->getVendedora()->getIdVendedora());

        $prepareStatement->execute();
    }

    public static function deletar($Anuncio)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE tbAnuncio WHERE idAnuncio = ?";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindvalue(1, $Anuncio->getIdAnuncio());

        $prepareStatement->execute();
    }

    public static function editar($Anuncio)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbAnuncio
                            SET nomeAnuncio = ?, descricaoAnuncio = ?, valorAnuncio = ?, estrelasAnuncio = ?, tipoAnuncio = ?, qtdAnuncio = ?, idNegocio = ?
                            WHERE idAnuncio = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Anuncio->getNomeAnuncio());
        $prepareStatement->bindValue(2, $Anuncio->getDescricaoAnuncio());
        $prepareStatement->bindValue(3, $Anuncio->getValorAnuncio());
        $prepareStatement->bindValue(4, $Anuncio->getEstrelasAnuncio());
        $prepareStatement->bindValue(5, $Anuncio->getTipoAnuncio());
        $prepareStatement->bindvalue(5, $Anuncio->getQtdAnuncio());
        $prepareStatement->bindValue(6, $Anuncio->getNegocio()->getIdNegocio());
        $prepareStatement->bindValue(7, $Anuncio->getIdAnuncio());

        $prepareStatement->execute();
    }

    public static function editarFoto($Anuncio)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbAnuncio
                            SET imagemPrincipalAnuncio = ?
                            WHERE idAnuncio = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Anuncio->getImagemPrincipalAnuncio());
        $prepareStatement->bindValue(2, $Anuncio->getIdAnuncio());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbAnuncio";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function listarAnunciosVendedora($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT *, nomeCategoria, nomeNegocioVendedora FROM tbAnuncio
                        INNER JOIN tbVendedora ON tbVendedora.idVendedora = tbAnuncio.idVendedora
                        INNER JOIN tbCategoria ON tbVendedora.idCategoria = tbCategoria.idCategoria
                        WHERE tbAnuncio.idVendedora = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function consultarId($Anuncio)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT idAnuncio FROM tbAnuncio
                            WHERE nomeAnuncio = ? AND descricaoAnuncio = ? AND idVendedora = ?');
        $stmt->bindValue(1, $Anuncio->getNomeAnuncio());
        $stmt->bindValue(2, $Anuncio->getDescricaoAnuncio());
        $stmt->bindValue(3, $Anuncio->getVendedora()->getIdVendedora());
        $stmt->execute();
        $id = $stmt->fetch()[0];

        return $id;
    }

    public static function contarAnuncio($Anuncio)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio");
        $stmt->execute();

        $countAnuncio = $stmt->fetchAll();

        return $countAnuncio;
    }

    public static function contarAnuncioServico($Anuncio)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE idVendedora = ? AND tipoAnuncio = 1");
        $stmt->execute();

        $countAnuncioServico = $stmt->fetchAll();

        return $countAnuncioServico;
    }

    public static function contarAnuncioProduto($Anuncio)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE idVendedora = ? AND tipoAnuncio = 2");
        $stmt->execute();

        $countAnuncioProduto = $stmt->fetchAll();

        return $countAnuncioProduto;
    }

    public static function contarAnuncioGeral($Anuncio)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idAnuncio) FROM tbAnuncio WHERE idVendedora = ?");
        $stmt->execute();

        $countAnuncioGeral = $stmt->fetchAll();

        return $countAnuncioGeral;
    }
}

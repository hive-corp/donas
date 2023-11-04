<?php
require_once "global.php";

class daoDenuncia
{

    public static function cadastrar($Denuncia)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbDenuncia(motivoDenuncia, descricaoDenuncia, idCliente, idVendedora)
                            VALUES (?, ?, ?, ?)";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $Denuncia->getMotivoDenuncia());
        $prepareStatement->bindValue(2, $Denuncia->getDescricaoDenuncia());
        $prepareStatement->bindValue(3, $Denuncia->getCliente()->getIdCliente());
        $prepareStatement->bindValue(4, $Denuncia->getVendedora()->getIdVendedora());

        $prepareStatement->execute();
    }

    public static function deletar($Denuncia)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE FROM tbDenuncia WHERE idDenuncia = ?";
        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $Denuncia->getIdDenuncia());

        $prepareStatement->execute();
    }

    public static function editar($Denuncia)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbDenuncia
                            SET nomeCategoria = ?, descricaoDenuncia = ?, idCliente = ?, idVendedora = ?
                            WHERE idCategoria = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Denuncia->getNomeCategoria());
        $prepareStatement->bindValue(2, $Denuncia->getDescricaoDenuncia());
        $prepareStatement->bindValue(3, $Denuncia->getCliente()->getIdCliente());
        $prepareStatement->bindValue(4, $Denuncia->getVendedora()->getIdVendedora());
        $prepareStatement->bindValue(5, $Denuncia->getIdDenuncia());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbDenuncia";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function consultaDenuncia($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbDenuncia WHERE idDenuncia = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();

        $dados = $resultado->fetch();
        return $dados;
    }

    public static function consultaUltimaDenunciaCliente($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT MAX(idDenuncia) as id FROM tbDenuncia WHERE idCliente = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();

        $dados = $resultado->fetch()[0];
        return $dados;
    }

}

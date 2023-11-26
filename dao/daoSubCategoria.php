<?php
require_once "global.php";

class daoSubCategoria
{

    public static function cadastrar($SubCategoria)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbSubCategoria(nomeSubCategoria, idCategoria)
                            VALUES (?,?)";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $SubCategoria->getNomeSubCategoria());        
        $prepareStatement->bindValue(2, $SubCategoria->getCategoria()->getIdCategoria());
        $prepareStatement->execute();
    }

    public static function deletar($SubCategoria)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE tbSubCategoria WHERE idSubCategoria = ?";
        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $SubCategoria->getIdSubCategoria());

        $prepareStatement->execute();
    }

    public static function editar($SubCategoria)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbSubCategoria
                            SET nomeSubCategoria = ?, idCategoria = ?
                            WHERE idSubCategoria = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $SubCategoria->getNomeSubCategoria());
        $prepareStatement->bindValue(2, $SubCategoria->getCategoria()->getIdCategoria);
        $prepareStatement->bindValue(3, $SubCategoria->getIdSubCategoria());

        $prepareStatement->execute();
    }

    public static function editarFoto($SubCategoria)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbSubCategoria
                            SET fotoSubCategoria = ?
                            WHERE idSubCategoria = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $SubCategoria->getFotoSubCategoria());
        $prepareStatement->bindValue(2, $SubCategoria->getIdSubCategoria());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();
    
        $querySelect = "SELECT s.*, c.idCategoria, c.nomeCategoria, c.fotoCategoria
                        FROM tbSubCategoria s
                        INNER JOIN tbCategoria c ON s.idCategoria = c.idCategoria
                        ORDER BY s.idSubCategoria DESC";
    
        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        
        return $lista;
    }
    
    

    public static function contarSubCategoria($SubCategoria)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idSubCategoria) FROM tbSubCategoria WHERE nomeSubCategoria = ?");
        $stmt->execute();

        $countSubCategoria = $stmt->fetchAll();

        return $countSubCategoria;
    }

    public static function listarPorCategoria($id)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbSubCategoria WHERE idCategoria = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $id);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function consultarIdPorNomeECategoria($SubCategoria)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT MAX(idSubCategoria) FROM tbSubCategoria
                            WHERE nomeCategoria = ? AND idCategoria = ?');
        $stmt->bindValue(1, $SubCategoria->getNomeSubCategoria());
        $stmt->bindValue(2, $SubCategoria->getCategoria()->getIdCategoria());
        $stmt->execute();
        $id = $stmt->fetch()[0];

        return $id;
    }
}

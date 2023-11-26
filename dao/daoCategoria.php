<?php
require_once "global.php";

class daoCategoria
{

    public static function cadastrar($Categoria)
    {
        $connection = Conexao::conectar();

        $queryInsert = "INSERT tbCategoria(nomeCategoria)
                            VALUES (?)";

        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $Categoria->getNomeCategoria());

        $prepareStatement->execute();
    }

    public static function deletar($Categoria)
    {
        $connection = Conexao::conectar();

        $queryInsert = "DELETE tbCategoria WHERE idCategoria = ?";
        $prepareStatement = $connection->prepare($queryInsert);
        $prepareStatement->bindValue(1, $Categoria->getIdCategoria());

        $prepareStatement->execute();
    }

    public static function editar($Categoria)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbCategoria
                            SET nomeCategoria = ?
                            WHERE idCategoria = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Categoria->getNomeCategoria());
        $prepareStatement->bindValue(2, $Categoria->getIdCategoria());

        $prepareStatement->execute();
    }

    public static function editarFoto($Categoria)
    {
        $connection = Conexao::conectar();

        $queryInsert = "UPDATE tbCategoria
                            SET fotoCategoria = ?
                            WHERE idCategoria = ?";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $Categoria->getFotoCategoria());
        $prepareStatement->bindValue(2, $Categoria->getIdCategoria());

        $prepareStatement->execute();
    }

    public static function listar()
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT * FROM tbCategoria";

        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function contarCategoria($Anuncio)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare("SELECT COUNT(idVendedora) FROM tbCategoria WHERE nomeCategoria = ?");
        $stmt->execute();

        $countCategoria = $stmt->fetchAll();

        return $countCategoria;
    }

    public static function consultarIdPorNome($categoria)
    {
        $connection = Conexao::conectar();

        $stmt = $connection->prepare('SELECT MAX(idCategoria) FROM tbCategoria
                            WHERE nomeCategoria = ?');
        $stmt->bindValue(1, $categoria->getNomeCategoria());
        $stmt->execute();
        $id = $stmt->fetch()[0];

        return $id;
    }
       public static function pesquisarCategoriaNome($string)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbCategoria.*, nomeCategoria FROM tbCategoria
                        WHERE nomeCategoria LIKE ? ";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, "%".$string."%");
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public static function pesquisarCategoriasnomeCategoriaCategoria($categoria, $string)
    {
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbCategoria.*, nomeCategoria FROM tbCategoria
                        WHERE idCategoria = ? AND nomeCategoria LIKE ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $categoria);
        $resultado->bindValue(2, "%".$string."%");
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public static function pesquisarCategoriasCategoria($categoria) {
    
        $connection = Conexao::conectar();

        $querySelect = "SELECT tbCategoria.*, nomeCategoria FROM tbCategoria

                        WHERE idCategoria = ?";

        $resultado = $connection->prepare($querySelect);
        $resultado->bindValue(1, $categoria);
        $resultado->execute();
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public static function graficoCategorias()
    {
        $connection = Conexao::conectar();
    
        $querySelect = "SELECT 
                            c.nomeCategoria, 
                            COUNT(v.idVendedora) as quantidade, 
                            COUNT(v.idVendedora) / (SELECT COUNT(*) FROM tbVendedora) * 100 as percentual
                        FROM tbcategoria c
                        LEFT JOIN tbVendedora v ON c.idCategoria = v.idCategoria
                        GROUP BY c.nomeCategoria";
                        
        $resultado = $connection->prepare($querySelect);
        $resultado->execute();
        $categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);
    
        $connection = null; // Feche a conexão usando null
    
        return $categorias;
    }
    
    
}


<?php
    require_once "global.php";

    class daoCategoria {
        
        public static function criar($Categoria){
            $connection = Conexao::conectar();

            $queryInsert = "INSERT tbCategoria(idCategoria, nomeCategoria)
                            VALUES (?,?)";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Categoria->getNomeCategoria());

            $prepareStatement->execute();
        }

        public static function deletar($Categoria){
            $connection = Conexao::conectar();

            $queryInsert = "DELETE tbCategoria WHERE idCategoria = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Categoria->getIdCategoria());

            $prepareStatement->execute();
        }

        public static function editar($Categoria){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbCategoria
                            SET nomeCategoria = ?
                            WHERE idCategoria = ?";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $Categoria->getNomeCategoria());
            $prepareStatement->bindValue(2, $Categoria->getIdCategoria());

            $prepareStatement->execute();
        }

         public static function editarFoto($Categoria){
            $connection = Conexao::conectar();

            $queryInsert = "UPDATE tbCategoria
                            SET fotoCategoria = ?
                            WHERE idCategoria = ?";
            
            $prepareStatement = $connection->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $Categoria->getFotoCategoria());
            $prepareStatement->bindValue(2, $Categoria->getIdCategoria());

            $prepareStatement->execute();
        }

        public static function listar(){
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

        $stmt = $connection->prepare("SELECT COUNT(idCategoria) FROM tbCategoria WHERE nomeCategoria = ?");
        $stmt->execute();

        $countCategoria = $stmt->fetchAll();

        return $countCategoria;
    }
    }
?>

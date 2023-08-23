<?php
    require_once "global.php";

    class daoEntradaProduto{
        public static function listar(){
            $connection = Conexao::conectar();

            $querySelect = "SELECT * FROM tbSaidaProduto";
            $resultado = $connection->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }

?>
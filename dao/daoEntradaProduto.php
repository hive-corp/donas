<?php


    include_once "./Conexao.php";
    include_once "./EntradaProduto.php";

    class daoEntradaProduto{
        public static function listar(){
            $connection = Conexao::conectar();

            $querySelect = "SELECT * FROM tbEntradaProduto";
            $resultado = $connection->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }

?>
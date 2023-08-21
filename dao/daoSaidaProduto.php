<?php


    include_once "./Conexao.php";
    include_once "./SaidaProduto.php";

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
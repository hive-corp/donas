<?php


    include_once "<div class="">
    <model>Conexao.php";
    include_once "<div class="">
    <model>EntradaProduto.php";

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
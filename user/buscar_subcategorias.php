<?php
// buscar_subcategorias.php

// Inclua seus arquivos e lógica de negócios necessários
require_once "validador.php";

// Obtenha a categoria da consulta GET
$categoriaSelecionada = $_GET['categoria'];

// Obtém as subcategorias com base na categoria selecionada
$Subcategorias = daoSubCategoria::listarPorCategoria($categoriaSelecionada);

// Retorna as subcategorias como resposta JSON
echo json_encode($Subcategorias);
?>
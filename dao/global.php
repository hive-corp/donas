<?php

//função que faz parte da SPL que significa Standard PHP Library
spl_autoload_register('carregarClasseDao');

function carregarClasseDao($nomeClasse)
{
    if (file_exists('../model/' . $nomeClasse . '.php')) {
        require_once '../model/' .$nomeClasse . '.php';
    }
   
}
<?php

header("Access-Control-Allow-Origin: *");

session_start();

$senha = $_POST['pass'];

if($senha == $_SESSION['senha']){
    echo "success";
}else{
    echo "error";
}
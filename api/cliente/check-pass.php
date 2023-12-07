<?php

header("Access-Control-Allow-Origin: *");

session_start();

$senha = $_POST['pass'];

if($senha == $_SESSION['senha-normal']){
    echo "success";
}else{
    echo "error";
}
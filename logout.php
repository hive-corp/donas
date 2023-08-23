<?php

header("Location:login.php");

session_start();

unset($_SESSION['id']);
unset($_SESSION['nome']);
unset($_SESSION['username']);
unset($_SESSION['senha']);
unset($_SESSION['email']);
unset($_SESSION['foto']);
unset($_SESSION['data-nasc']);
unset($_SESSION['cpf']);
unset($_SESSION['cidade']);
unset($_SESSION['estado']);
unset($_SESSION['log']);
unset($_SESSION['bairro']);
unset($_SESSION['num']);
unset($_SESSION['comp']);
unset($_SESSION['cep']);
unset($_SESSION['nome-empresa']);
unset($_SESSION['foto-empresa']);
unset($_SESSION['cnpj']);
unset($_SESSION['nivel-vendedora']);
unset($_SESSION['categoria-id']);

//a preencher

session_destroy();

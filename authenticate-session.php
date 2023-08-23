<?php

require_once "global.php";

$tipoLogin = $_POST['tipo-login'];

if($tipoLogin==1){
    $cliente = new Cliente();
    $cliente->setEmailCliente($_POST['email']);
    $cliente->setSenhaCliente($_POST['pass']);

    $consultaCliente = daoCliente::consultaLogin($cliente);
    if($consultaCliente == 0){
        header("Location: login.php");
    }else{
        session_start();

        $_SESSION['id']=$consultaCliente['idCliente'];
        $_SESSION['nome']=$consultaCliente['nomeCliente'];
        $_SESSION['username']=$consultaCliente['nomeUsuarioCliente'];
        $_SESSION['email']=$consultaCliente['emailCliente'];
        $_SESSION['senha']=$consultaCliente['senhaCliente'];
        $_SESSION['data-nasc']=$consultaCliente['dtNascCliente'];
        $_SESSION['foto']=$consultaCliente['fotoCliente'];
        $_SESSION['cidade']=$consultaCliente['cidadeCliente'];
        $_SESSION['estado']=$consultaCliente['estadoCliente'];
        $_SESSION['log']=$consultaCliente['logradouroCliente'];
        $_SESSION['bairro']=$consultaCliente['bairroCliente'];
        $_SESSION['num']=$consultaCliente['numeroCliente'];
        $_SESSION['comp']=$consultaCliente['complementoCliente'];
        $_SESSION['cep']=$consultaCliente['cepCliente'];
        $_SESSION['cpf']=$consultaCliente['cpfCliente'];

        header("Location: user/");
    }
}else{
    //a preencher
}

?>
<?php

    //recebe os dados do form
    $login = $_POST['txtlogin'];
    $senha = $_POST['txtsenha'];

    //confere se as credenciais estão corretas login = adm e senha = 123
    if( ($login == 'adm') && ($senha == '123') ){

        //se sim, cria a sessão e redireciona para a área restrita de acesso
        header("Location: area-restrita-adm/dashboard.php");
        session_start();
        $_SESSION['login-sessao'] = $login;
        $_SESSION['senha-sessao'] = $senha;
    }
    
    else{
        //senão, retorna o usuário para a área de login
        header("Location: login-adm.php");
    }
?>
<?php
    header("Location: ../login-adm.php");
    session_start();
    //limpar as variáveis de sessão e destruí-las
    unset($_SESSION['login-sessao']);
    unset($_SESSION['senha-sessao']);
    //destruir a sessão
    session_destroy();
?>
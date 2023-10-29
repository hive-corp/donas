<?php

require_once "validador.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seus pedidos</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="user-encomenda">
        <nav id="nav">
            <picture id="nav-logo">
                <source srcset="../assets/img/logo-letra.svg" media="(max-width:1200px)" />
                <img src="../assets/img/logo-h.svg" alt="Logo do DONAS" class="mobile-hide">
            </picture>
            <div id="nav-list">
                <a href="index.php" class="nav-link">
                    <i class="bi bi-house-door"></i>
                    <span>
                        Home
                    </span>
                </a>
                <a href="pesquisa.php" class="nav-link">
                    <i class="bi bi-search"></i>
                    <span>
                        Pesquisa
                    </span>
                </a>
                <a href="seus-pedidos.php" class="nav-link mobile-hide active">
                    <i class="bi bi-box-seam-fill"></i>
                    <span>
                        Seus pedidos
                    </span>
                </a>
                <a href="notificacoes.php" class="nav-link">
                    <i class="bi bi-bell"></i> <span>
                        Notificações
                    </span>
                </a>
                <a href="conversas.php" class="nav-link">
                    <i class="bi bi-chat"></i>
                    <span>
                        Conversas
                    </span>
                </a>
                <a href="configuracoes.php" class="nav-link">
                    <img src="../<?php echo $_SESSION['foto'] ?>" id="foto-usuario" />
                    <i class="bi bi-person"></i>
                    <span>
                        Configurações
                    </span>
                </a>
            </div>
            <div id="user-info">
                <a href="../">
                    <img src="../<?php echo $_SESSION['foto'] ?>" id="foto-info">
                </a>
                <div id="info-user">
                    <div id="nome-user">
                        <?php echo $_SESSION['nome'] ?>
                    </div>
                    <div id="nick-user">
                        @<?php echo $_SESSION['username'] ?>
                    </div>
                </div>
                <div class="dropup-center dropup">
                    <button id="options-user" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-sobe">
                        <li>
                            <a class="dropdown-item" href="../logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                Sair
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-theme-toggle="dark">
                                <i class="bi bi-moon"></i>
                                Modo noturno
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main id="main">
            <!-- <img src="../assets/img/rosas.svg" class="rosa-fundo"> -->
            <div id="main-title">
                Seus pedidos
            </div>
            <div id="content">
                <div id="encomendas">
                    <?php

                    $pedidos = daoEncomenda::listarEncomendasCliente($_SESSION['id']);

                    foreach ($pedidos as $p) {
                    ?>
                        <div class="pedido">
                            <div class="info-pedido">
                                <img src="../<?php echo $p['imagemPrincipalAnuncio'] ?>" alt="" class="foto-pedido">
                            </div>
                            <div class="nome-pedido">
                                <label for="" class="form-label">Pedido</label>
                                <div class="input-wrapper">
                                    <?php echo $p['nomeAnuncio'] ?>
                                </div>
                            </div>
                            <div class="preco-pedido">
                                <label for="" class="form-label">Valor</label>
                                <div class="input-wrapper">
                                    <?php echo number_format($p['valorEncomenda'], 2, ',', '.') ?>
                                </div>
                            </div>
                            <div class="data-pedido">
                                <label for="" class="form-label">Data do pedido</label>
                                <div class="input-wrapper">
                                    <?php echo $p['dataEncomenda'] ?>
                                </div>
                            </div>
                            <div class="status-pedido">
                                <label for="" class="form-label">Estado do pedido</label>
                                <div class="input-wrapper">
                                    <?php
                                    switch ($p['statusEncomenda']) {
                                        case 1:
                                            echo 'Fazendo';
                                            break;

                                        case 2:
                                            echo 'Cancelado';
                                            break;

                                        case 3:
                                            echo 'Concluído';
                                            break;
                                    }
                                    ?>
                                </div>
                            </div>
                            <a class="button button-red mx-auto">CANCELAR</a>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
            <!-- <img src="../assets/img/rosas.svg" class="rosa-fundo"> -->
        </main>
    </div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
<?php

require_once "validador.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificações</title>
    <link rel="shortcut icon" href="../assets/media/favicon.ico" type="image/x-icon" />
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="user-notifications">
        <nav id="nav" class="nav-dona">
            <picture id="nav-logo">
                <source srcset="../assets/media/logo-letra.svg" media="(max-width:1200px)" />
                <img src="../assets/media/logo-h.svg" alt="Logo do DONAS" class="mobile-hide">
            </picture>
            <div id="nav-list">
                <a href="index.php" class="nav-link">
                    <i class="bi bi-house-door"></i>
                    <span>
                        Home
                    </span>
                </a>
                <a href="encomendas.php" class="nav-link">
                    <i class="bi bi-grid"></i>
                    <span>
                        Pedidos
                    </span>
                </a>
                <a href="faturamento.php" class="nav-link">
                    <i class="bi bi-cash-stack"></i>
                    <span>
                        Faturamento
                    </span>
                </a>
                <a href="meus-anuncios.php" class="nav-link">
                    <i class="bi bi-box-seam"></i>
                    <span>
                        Meus anúncios
                    </span>
                </a>
                <a href="notificacoes.php" class="nav-link active">
                    <i class="bi bi-bell">
                        <?php
                        if (daoNotifcVendedora::contarNotificacoes($_SESSION['id'])) {
                        ?>
                            <span class="counter">
                                <?php
                                echo daoNotifcVendedora::contarNotificacoes($_SESSION['id']);
                                ?>
                            </span>
                        <?php
                        }
                        ?>
                    </i>
                    <span>
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
                    <img src="../<?php echo $_SESSION['foto-empresa'] ?>" id="foto-usuario">
                    <i class="bi bi-person"></i>
                    <span>
                        Configurações
                    </span>
                </a>
            </div>
            <a id="new-product" href="novo.php" class="button">
                <i class="bi bi-plus-lg"></i>
                <span>Criar novo anúncio</span>
            </a>
            <div id="user-info">
                <a>
                    <img src="../<?php echo $_SESSION['foto-empresa'] ?>" id="foto-info">
                </a>
                <div id="info-user">
                    <div id="nome-user">
                        <?php echo $_SESSION['nome-empresa'] ?>
                    </div>
                    <div id="nick-user">
                        @<?php echo $_SESSION['username'] ?>
                    </div>
                </div>
                <div class="dropup-center dropup">
                    <button id="options-user" class="options-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <!-- <img src="../assets/media/rosas.svg" class="rosa-fundo"> -->
            <div id="main-title">
                Notificações
            </div>
            <div id="content">
                <?php

                $notificacoes = daoNotifcVendedora::listarNotificacoes($_SESSION['id']);

                foreach ($notificacoes as $n) {
                ?>
                    <a class="notificacao<?php echo $n['statusNotificacao'] == 0 ? " new" : "" ?>" <?php
                                                                                                    switch ($n['tipoNotificacao']) {
                                                                                                        case 0:
                                                                                                            break;
                                                                                                        case 1:
                                                                                                            $cliente = daoCliente::consultarPorId($n['idCliente']);
                                                                                                            ?> href="conversas.php?username=<?php echo $cliente['nomeUsuarioCliente'] ?>" <?php
                                                                                                            break;
                                                                                                        case 2:
                                                                                                        case 3:
                                                                                                        case 4:
                                                                                                        case 5:
                                                                                                        case 6:
                                                                                                        case 7:
                                                                                                            $cliente = daoCliente::consultarPorId($n['idCliente']);
                                                                                                            $anuncio = daoAnuncio::consultarPorId($n['idAnuncio']);
                                                                                                            ?> href="encomendas.php" <?php
                                                                                                            break;
                                                                                                    } ?>>
                        <div class="notificacao-img">
                            <?php
                            switch ($n['tipoNotificacao']) {
                                case 0:
                                    $src = 'assets/media/logo-letra.svg';
                                    break;
                                case 1:
                                    $src = $cliente['fotoCliente'];
                                    break;
                                case 2:
                                case 3:
                                case 4:
                                case 5:
                                case 6:
                                case 7:
                                    $src = $anuncio['imagemPrincipalAnuncio'];
                                    break;
                                default:
                                    $src = '';
                                    break;
                            }

                            ?>
                            <img src="../<?php echo $src ?>" alt="">
                        </div>
                        <div class="notificacao-content">
                            <?php

                            switch ($n['tipoNotificacao']) {
                                case 0:
                            ?>
                                    Seja bem vinda à plataforma!
                                <?php
                                    break;
                                case 1:
                                ?>
                                    Você tem uma nova mensagem!
                                <?php
                                    break;
                                case 2:
                                ?>
                                    Você tem uma nova encomenda! - <span class="highlight"><?php echo $anuncio['nomeAnuncio'] ?></span>
                                <?php
                                    break;
                                case 3:
                                ?>
                                    Você tem um novo agendamento de serviço! - <span class="highlight"><?php echo $anuncio['nomeAnuncio'] ?></span>
                                <?php
                                    break;
                                case 4:
                                ?>
                                    Sua encomenda foi cancelada pelo cliente. - <span class="highlight"><?php echo $anuncio['nomeAnuncio'] ?></span>
                                <?php
                                    break;
                                case 5:
                                ?>
                                    Seu serviço foi cancelado pelo cliente. - <span class="highlight"><?php echo $anuncio['nomeAnuncio'] ?></span>
                                <?php
                                    break;
                                case 6:
                                ?>
                                    Sua encomenda foi cancelada pela plataforma. - <span class="highlight"><?php echo $anuncio['nomeAnuncio'] ?></span>
                                <?php
                                    break;
                                case 7:
                                ?>
                                    Seu serviço foi cancelado pelo cliente. - <span class="highlight"><?php echo $anuncio['nomeAnuncio'] ?></span>
                            <?php
                                    break;
                                default:
                                    break;
                            }
                            ?>
                        </div>

                    </a>
                <?php
                }

                daoNotifcVendedora::visualizarNotificacoes($_SESSION['id']);
                ?>
            </div>
            <!-- <img src="../assets/media/rosas.svg" class="rosa-fundo"> -->
        </main>

    </div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
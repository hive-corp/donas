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
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="user-notifications">
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
                <a href="seus-pedidos.php" class="nav-link mobile-hide">
                    <i class="bi bi-box-seam"></i>
                    <span>
                        Seus pedidos
                    </span>
                </a>
                <a href="notificacoes.php" class="nav-link active">
                    <i class="bi bi-bell">
                        <?php
                        if (daoNotifcCliente::contarNotificacoes($_SESSION['id'])) {
                        ?>
                            <span class="counter">
                                <?php
                                echo daoNotifcCliente::contarNotificacoes($_SESSION['id']);
                                ?>
                            </span>
                        <?php
                        }
                        ?>
                    </i> <span>
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
                Notificações
            </div>
            <div id="content">
                <?php

                $notificacoes = daoNotifcCliente::listarNotificacoes($_SESSION['id']);

                foreach ($notificacoes as $n) {
                ?>
                    <a class="notificacao <?php echo $n['statusNotificacao'] == 0 ? "new" : "" ?> " <?php

                                            switch ($n['tipoNotificacao']) {
                                                case 0:
                                                    break;
                                                case 1:
                                                case 2:
                                                    $dados = daoDenuncia::consultaDenuncia($n['idDenuncia']);
                                                    $vendedora = daoVendedora::consultarPorId($dados['idVendedora']);
                                                    
                                                    ?> href="profile.php?user=<?php echo $vendedora['nomeUsuarioNegocioVendedora'];
                                                    break;
                                                case 3:

                                                    break;
                                                case 4:


                                                    break;
                                                case 5:

                                                    break;
                                                default:
                                                    $src = '';
                                                    break;
                                            }

                                            ?> >
                        <div class="notificacao-img">
                            <?php

                            switch ($n['tipoNotificacao']) {
                                case 0:
                                    $src = 'assets/img/logo-letra.svg';
                                    break;
                                case 1:case 2:
                                    $src = $vendedora['fotoNegocioVendedora'];
                                    break;
                                case 3:

                                    break;
                                case 4:


                                    break;
                                case 5:

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
                                    Seja bem vindo à plataforma!
                                <?php
                                    break;
                                case 1:
                                ?>
                                    Sua denúncia foi recebida.
                                <?php
                                    break;
                                case 2:
                                ?>
                                    Sua denúncia foi aceita.
                                <?php
                                    break;
                                case 3:
                                ?>
                                    Sua encomenda foi recebida.
                                <?php
                                    break;
                                case 4:
                                ?>
                                    Sua encomenda foi cancelada.
                                <?php
                                    break;
                                case 5:
                                ?>
                                    Sua encomenda foi finalizada.
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

                daoNotifcCliente::visualizarNotificacoes($_SESSION['id']);
                ?>
            </div>
            <!-- <img src="../assets/img/rosas.svg" class="rosa-fundo"> -->
        </main>
    </div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch('../api/notificacao')
        })
    </script>
</body>

</html>
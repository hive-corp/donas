<?php

require_once "validador.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Açúcar e Canela</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/css/styles.css" />
</head>

<body>
    <div id="user-profile">
        <nav id="nav">
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
                <a href="notificacoes.php" class="nav-link">
                    <i class="bi bi-bell"></i>
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
            <div id="main-title">
                <button class="voltar" onclick="history.back()">
                    <i class="bi bi-arrow-left"></i>
                </button>
                Açúcar e Canela
            </div>
            <div id="content">
                <div id="negocio-bio">
                    <div id="bio-photo">
                        <img src="../assets/img/users/negocios/1.png" alt="">
                    </div>
                    <div id="bio-info">
                        <div id="bio-name">
                            Açúcar e Canela
                            <div class="dropdown-start dropdown">
                                <button id="options-profile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-start dropdown-sobe">
                                    <li>
                                        <a class="dropdown-item" href="product.php">
                                            <i class="bi bi-exclamation-triangle"></i>
                                            Denunciar
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="conversas.php?username=acucarcanela">
                                            <i class="bi bi-chat"></i>
                                            Iniciar conversa
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="bio-username">@acucarcanela</div>
                        <div id="bio-desc">Tornando o seu mundo um pouco mais doce.
                            - Sediada em SP
                        </div>
                        <div id="bio-options">
                            <button type="button" class="button bio-option">
                                Seguir
                            </button>
                            <button type="button" class="button bio-option">
                                Compartilhar
                                <i class="bi bi-share-fill"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="negocio-info">
                    <div class="negocio-information">
                        <i class="bi bi-bag"></i>
                        <span>5</span> Produtos
                    </div>
                    <div class="negocio-information">
                        <i class="bi bi-grid"></i>
                        <span>0</span> Serviços
                    </div>
                    <div class="negocio-information">
                        <i class="bi bi-people"></i>
                        <span>35</span> Seguidores
                    </div>
                </div>
                <div id="bio-products">
                    <a class="bio-product" href="produto.php">
                        <img src="../assets/img/products-services/1.png" alt="">
                    </a>
                    <a class="bio-product" href="produto.php">
                        <img src="../assets/img/products-services/2.png" alt="">
                    </a>
                    <a class="bio-product" href="produto.php">
                        <img src="../assets/img/products-services/3.png" alt="">
                    </a>
                    <a class="bio-product" href="produto.php">
                        <img src="../assets/img/products-services/4.png" alt="">
                    </a>
                    <a class="bio-product" href="produto.php">
                        <img src="../assets/img/products-services/5.png" alt="">
                    </a>
                    <!-- <a class="bio-product" href="produto.php">
                        <img src="../assets/img/products-services/1.png" alt="">
                    </a>
                    <a class="bio-product" href="produto.php">
                        <img src="../assets/img/products-services/pano-de-prato.jpg" alt="">
                    </a>
                    <a class="bio-product" href="produto.php">
                        <img src="../assets/img/products-services/sabonetes.jpg" alt="">
                    </a> -->

                    <!-- <div class="card-produto" href="produto.php" aria-hidden="true">
                        <div class="img-card placeholder-glow">
                            <span class="placeholder"></span>
                        </div>
                        <div class="info-card">
                            <div class="nome-card placeholder-glow">
                                <span class="placeholder col-5"></span>
                                <span class="placeholder col-6"></span>
                            </div>
                            <div class="preco-card placeholder-glow">
                                <div class="placeholder"></div>
                            </div>
                            <div class="avaliacao-card placeholder-glow">
                                <span class="placeholder col-12"></span>
                            </div>
                            <div class="categoria-card placeholder-glow">
                                <span class="placeholder col-4"></span>
                            </div>
                            <div class="negocio-card placeholder-glow">
                                <span class="placeholder col-4 placeholder-sm"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-produto" href="produto.php" aria-hidden="true">
                        <div class="img-card placeholder-glow">
                            <span class="placeholder"></span>
                        </div>
                        <div class="info-card">
                            <div class="nome-card placeholder-glow">
                                <span class="placeholder col-5"></span>
                                <span class="placeholder col-6"></span>
                            </div>
                            <div class="preco-card placeholder-glow">
                                <div class="placeholder"></div>
                            </div>
                            <div class="avaliacao-card placeholder-glow">
                                <span class="placeholder col-12"></span>
                            </div>
                            <div class="categoria-card placeholder-glow">
                                <span class="placeholder col-4"></span>
                            </div>
                            <div class="negocio-card placeholder-glow">
                                <span class="placeholder col-4 placeholder-sm"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-produto" href="produto.php" aria-hidden="true">
                        <div class="img-card placeholder-glow">
                            <span class="placeholder"></span>
                        </div>
                        <div class="info-card">
                            <div class="nome-card placeholder-glow">
                                <span class="placeholder col-5"></span>
                                <span class="placeholder col-6"></span>
                            </div>
                            <div class="preco-card placeholder-glow">
                                <div class="placeholder"></div>
                            </div>
                            <div class="avaliacao-card placeholder-glow">
                                <span class="placeholder col-12"></span>
                            </div>
                            <div class="categoria-card placeholder-glow">
                                <span class="placeholder col-4"></span>
                            </div>
                            <div class="negocio-card placeholder-glow">
                                <span class="placeholder col-4 placeholder-sm"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-produto" href="produto.php" aria-hidden="true">
                        <div class="img-card placeholder-glow">
                            <span class="placeholder"></span>
                        </div>
                        <div class="info-card">
                            <div class="nome-card placeholder-glow">
                                <span class="placeholder col-5"></span>
                                <span class="placeholder col-6"></span>
                            </div>
                            <div class="preco-card placeholder-glow">
                                <div class="placeholder"></div>
                            </div>
                            <div class="avaliacao-card placeholder-glow">
                                <span class="placeholder col-12"></span>
                            </div>
                            <div class="categoria-card placeholder-glow">
                                <span class="placeholder col-4"></span>
                            </div>
                            <div class="negocio-card placeholder-glow">
                                <span class="placeholder col-4 placeholder-sm"></span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </main>
    </div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
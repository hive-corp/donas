<?php

require_once "validador.php";
require_once "global.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/vendor/flickity/css/flickity.css" />
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/css/styles.css" />
</head>

<body>
    <div id="user-dashboard">
        <nav id="nav">
            <div id="nav-list">
                <a href="index.php" class="nav-link active">
                    <i class="bi bi-house-door-fill"></i>
                    <span>
                        Home
                    </span>
                </a>
                <a href="encomendas.php" class="nav-link">
                    <i class="bi bi-grid"></i>
                    <span>
                        Painel
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
                <a href="../">
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
            <div id="welcome" class="d-flex flex-column justify-content-center">
                <h2>Bem vindo, <span class="highlight"><?php echo $_SESSION['nome-empresa']; ?></span>!</h2>
                <h6><span class="highlight"><?php echo explode(" ",$_SESSION['nome'])[0]?></span>, aqui estão as informações do seu negócio!</h6>
            </div>
            <div id="content">
                <div class="section">
                    <div class="section-title placeholder-element placeholder-glow">
                        <span class="placeholder col-4"></span>
                    </div>
                    <div class="section-title load">Seus anúncios</div>
                    <span class="veja-mais placeholder-element placeholder-glow">
                        <span class="placeholder col-4"></span>
                    </span>
                    <a href="#" class="veja-mais load"> veja mais </a>
                </div>
                <div class="produtos placeholder-element">
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
                </div>
                <div class="produtos load">

                    <?php
                    foreach (daoAnuncio::listarAnunciosVendedora($_SESSION['id']) as $a) {
                    ?>
                        <a class="card-produto" href="produto.php">
                            <div class="img-card">
                                <img src="../<?php echo $a['imagemPrincipalAnuncio'] ?>">
                            </div>
                            <div class="info-card">
                                <div class="nome-card">
                                    <?php echo $a['nomeAnuncio'] ?>
                                </div>
                                <div class="preco-card">
                                    R$<?php echo number_format($a['valorAnuncio'], 2, ',', ' ')  ?>
                                </div>
                                <div class="avaliacao-card">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </div>
                                <div class="categoria-card">
                                    <?php echo $a['nomeCategoria'] ?>
                                </div>
                                <div class="negocio-card">
                                    <?php echo $a['nomeNegocioVendedora'] ?>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>



                </div>
            </div>
            <div id="stats">
                <div class="stats-box estatisticas">
                    <div class="stats-header">
                        <div class="section-title placeholder-element placeholder-glow">
                            <span class="placeholder col-4"></span>
                        </div>
                        <div class="section-title load">Suas estatísticas</div>
                    </div>
                    <div class="stats-body placeholder-element">
                        <div class="row">
                            <div class="col placeholder-glow">
                                <span class="placeholder col-12"></span>
                                <span class="placeholder col-12 highlight"></span>
                            </div>
                            <div class="col placeholder-glow">
                                <span class="placeholder col-12"></span>
                                <span class="placeholder col-12 highlight"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col placeholder-glow">
                                <span class="placeholder col-11"></span>
                                <span class="placeholder col-9"></span>
                            </div>
                            <div class="col highlight placeholder-glow">
                                <span class="placeholder col-11"></span>
                                <span class="placeholder col-7"></span>
                            </div>
                        </div>
                    </div>
                    <div class="stats-body load">
                        <div class="row">
                            <div class="col">
                                Hoje você teve: <span class="highlight">12 encomendas</span>
                            </div>
                            <div class="col">
                                Neste mês: <span class="highlight">56 encomendas</span>
                            </div>
                        </div>
                        <div class="stats-carousel">
                            <div class="row">
                                <div class="col">
                                    Seu anúncio melhor avaliado:
                                </div>
                                <a class="col highlight" href="produto.php">
                                    Bombom trufado de limão
                                </a>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Seu anúncio mais encomendado:
                                </div>
                                <a class="col highlight" href="produto.php">
                                    Bolo de Chocolate
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="stats-footer">

                    </div>
                </div>
                <div class="stats-box encomendas">
                    <div class="stats-header">
                        <div class="section-title placeholder-element placeholder-glow">
                            <span class="placeholder col-4"></span>
                        </div>
                        <div class="section-title load">Encomendas</div>
                        <span class="veja-mais placeholder-element placeholder-glow">
                            <span class="placeholder col-4"></span>
                        </span>
                        <a href="encomendas.php" class="veja-mais load"> veja mais </a>
                    </div>
                    <div class="stats-body placeholder-element">
                        <div class="stats-item">
                            <div class="stats-foto placeholder-glow">
                                <span class="placeholder"></span>
                            </div>
                            <div class="stats-name placeholder-glow">
                                <span class="placeholder col-7"></span>
                            </div>
                            <div class="stats-encomenda placeholder-glow">
                                <span class="placeholder col-6"></span>
                                <span class="placeholder col-5 highlight"></span>
                            </div>
                        </div>
                        <div class="stats-item">
                            <div class="stats-foto placeholder-glow">
                                <span class="placeholder"></span>
                            </div>
                            <div class="stats-name placeholder-glow">
                                <span class="placeholder col-7"></span>
                            </div>
                            <div class="stats-encomenda placeholder-glow">
                                <span class="placeholder col-6"></span>
                                <span class="placeholder col-5 highlight"></span>
                            </div>
                        </div>
                        <div class="stats-item">
                            <div class="stats-foto placeholder-glow">
                                <span class="placeholder"></span>
                            </div>
                            <div class="stats-name placeholder-glow">
                                <span class="placeholder col-7"></span>
                            </div>
                            <div class="stats-encomenda placeholder-glow">
                                <span class="placeholder col-6"></span>
                                <span class="placeholder col-5 highlight"></span>
                            </div>
                        </div>
                        <div class="stats-item">
                            <div class="stats-foto placeholder-glow">
                                <span class="placeholder"></span>
                            </div>
                            <div class="stats-name placeholder-glow">
                                <span class="placeholder col-7"></span>
                            </div>
                            <div class="stats-encomenda placeholder-glow">
                                <span class="placeholder col-6"></span>
                                <span class="placeholder col-5 highlight"></span>
                            </div>
                        </div>
                        <div class="stats-item">
                            <div class="stats-foto placeholder-glow">
                                <span class="placeholder"></span>
                            </div>
                            <div class="stats-name placeholder-glow">
                                <span class="placeholder col-7"></span>
                            </div>
                            <div class="stats-encomenda placeholder-glow">
                                <span class="placeholder col-6"></span>
                                <span class="placeholder col-5 highlight"></span>
                            </div>
                        </div>
                        <div class="stats-item">
                            <div class="stats-foto placeholder-glow">
                                <span class="placeholder"></span>
                            </div>
                            <div class="stats-name placeholder-glow">
                                <span class="placeholder col-7"></span>
                            </div>
                            <div class="stats-encomenda placeholder-glow">
                                <span class="placeholder col-6"></span>
                                <span class="placeholder col-5 highlight"></span>
                            </div>
                        </div>
                        <div class="stats-item">
                            <div class="stats-foto placeholder-glow">
                                <span class="placeholder"></span>
                            </div>
                            <div class="stats-name placeholder-glow">
                                <span class="placeholder col-7"></span>
                            </div>
                            <div class="stats-encomenda placeholder-glow">
                                <span class="placeholder col-6"></span>
                                <span class="placeholder col-5 highlight"></span>
                            </div>
                        </div>
                    </div>
                    <div class="stats-body load">
                        <a class="stats-item" href="encomendas.php">
                            <div class="stats-foto placeholder-glow">
                                <img src="../assets/img/Adm-dash.jpg" alt="">
                            </div>
                            <div class="stats-name placeholder-glow">
                                Lúcia Rodrigues
                            </div>
                            <div class="stats-encomenda placeholder-glow">
                                encomendou <span class="highlight">Bombom trufado de limão</span>
                            </div>
                        </a>
                        <a class="stats-item" href="encomendas.php">
                            <div class="stats-foto placeholder-glow">
                                <img src="../assets/img/Denun01.jpg" alt="">
                            </div>
                            <div class="stats-name placeholder-glow">
                                Maria de Lucas
                            </div>
                            <div class="stats-encomenda placeholder-glow">
                                encomendou <span class="highlight">Bombom trufado de limão</span>
                            </div>
                        </a>
                        <a class="stats-item" href="encomendas.php">
                            <div class="stats-foto placeholder-glow">
                                <img src="../assets/img/Perfil1.jpg" alt="">
                            </div>
                            <div class="stats-name placeholder-glow">
                                Luana Pinheiro Ferreira
                            </div>
                            <div class="stats-encomenda placeholder-glow">
                                encomendou <span class="highlight">Bolo de Chocolate</span>
                            </div>
                        </a>
                        <a class="stats-item" href="encomendas.php">
                            <div class="stats-foto placeholder-glow">
                                <img src="../assets/img/Adm-dash.jpg" alt="">
                            </div>
                            <div class="stats-name placeholder-glow">
                                Heloísa Silva
                            </div>
                            <div class="stats-encomenda placeholder-glow">
                                encomendou <span class="highlight">Docinhos Tradicionais</span>
                            </div>
                        </a>
                        <a class="stats-item" href="encomendas.php">
                            <div class="stats-foto placeholder-glow">
                                <img src="../assets/img/Perfil.jpg" alt="">
                            </div>
                            <div class="stats-name placeholder-glow">
                                Suzane Ferreira
                            </div>
                            <div class="stats-encomenda placeholder-glow">
                                encomendou <span class="highlight">Bolo de Laranja</span>
                            </div>
                        </a>
                    </div>
                    <div class="stats-footer">

                    </div>
                </div>
            </div>
        </main>
    </div>


    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/flickity/js/flickity.pkgd.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script>
        var elem = document.querySelector(".stats-carousel")

        new Flickity(elem, {
            prevNextButtons: false,
            pageDots: false,
            resize: false,
            autoPlay: 2500,
            wrapAround: true
        });
    </script>
</body>

</html>
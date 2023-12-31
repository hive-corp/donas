<?php

require_once "validador.php";
require_once "global.php";

$dados = daoVendedora::consultarPorId($_SESSION['id']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../assets/media/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/vendor/flickity/css/flickity.css" />
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/css/styles.css" />
</head>

<body>

    <div id="user-dashboard">

    <div class="modal pop" id="modal-premium" tabindex="-1" aria-labelledby="modal-encomenda" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Plano Premium</h1>
                    </div>
                    <div class="modal-body" style="grid-template-columns: 0fr 0fr;">
                        <div class="row">
                            <div class="col d-flex flex-column align-items-center justify-content-center">
                                <p class="section-title load" style="text-align: center">Confira tudo que o nosso plano premium <span class="highlight"> oferece</span></p>
                                </button>
                            </div>
                            <div class="col">
                                <div class="tipo-plano mx-auto" style="width: 280px">
                                    <div class="titulo-plano">
                                        Premium
                                    </div>
                                    <div class="preco-plano" style="color:black">
                                        R$49/mês
                                    </div>
                                    <div class="lista-plano" style="color:black">
                                        <div>
                                            <i class="bi bi-check"></i>
                                            Postar produtos a toda a rede de clientes
                                        </div>
                                        <div>
                                            <i class="bi bi-check"></i>
                                            Encomenda dos produtos através da plataforma Donas
                                        </div>
                                        <div>
                                            <i class="bi bi-check"></i>
                                            Painel de encomendas
                                        </div>
                                        <div>
                                            <i class="bi bi-check"></i>
                                            Engajamento maior dentro da plataforma
                                        </div>
                                    </div>
                                    <button class="aceitar-plano" type="button" class="button" id="iniciar-pagamento" data-bs-target="#modal-pagamento" data-bs-toggle="modal" for="premium">
                                        Comprar
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="button button-secondary" data-bs-dismiss="modal">Não tenho interresse</button>
                        <!-- <button type="button" class="button" id="iniciar-pagamento" data-bs-target="#modal-pagamento" data-bs-toggle="modal">Avançar</button> -->
                    </div>
                </div>
            </div>
        </div>
        <form action="pagar-encomendas.php" method="POST">
            <div class="modal pop" id="modal-pagamento" tabindex="-1" aria-labelledby="modal-pagamento" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Tem certeza?</h1>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Estamos quase no final! Escolha sua <span class="highlight">forma de pagamento</span>.</p>
                            <div class="input input-pagamento">
                                <label class="form-label" for="forma-pagamento">Forma de pagamento<span>*</span></label>
                                <div class="input-wrapper">
                                    <select name="forma-pagamento" id="forma-pagamento" required>
                                        <option selected value="1">PIX</option>
                                        <option value="2">Boleto</option>
                                    </select>
                                </div>
                                <div class="invalid-feedback">
                                    Insira uma quantidade para a encomenda
                                </div>
                            </div>
                            <div id="qrcode-pix">
                                <div id="loading-pix"></div>
                                <img src="../assets/media/PagamentoPraGnete.png" alt="QR Code do PIX" id="qr-code" class="hide m-3">
                            </div>
                            <div id="boleto" style="display: none;">
                                <div class="premium-plan-overlay d-flex flex-column align-items-center justify-content-center m-5">
                                    <p class="section-title load" style="text-align: center">Clique no botão para gerar o boleto</p>
                                    <div class=" d-flex justify-content-around">
                                        <a id="new-product" target="_blank" onclick="gerarBoleto()" class="button">
                                            <i class="bi bi-card-heading"></i>
                                            <span>Gerar boleto</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-around">
                            <button type="submit" class="button">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <nav id="nav" class="nav-dona">
            <picture id="nav-logo">
                <source srcset="../assets/media/logo-letra.svg" media="(max-width:1200px)" />
                <img src="../assets/media/logo-h.svg" alt="Logo do DONAS" class="mobile-hide">
            </picture>
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
                <a href="notificacoes.php" class="nav-link">
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
            <div id="welcome" class="d-flex flex-column justify-content-center">
                <h2>Bem vindo, <span class="highlight"><?php echo $_SESSION['nome-empresa']; ?></span>!</h2>
                <h6><span class="highlight"><?php echo explode(" ", $_SESSION['nome'])[0] ?></span>, aqui estão as informações do seu negócio!</h6>
            </div>
            <div id="content">
                <?php if ($dados['nivelNegocioVendedora'] == 1) {
                ?>
                    <div class="section">
                        <div class="section-title placeholder-element placeholder-glow">
                            <span class="placeholder w-75"></span>
                        </div>
                        <div class="section-title load">Dados sobre o seu negócio</div>
                    </div>

                    <div class="row">
                        <?php

                        $qtdestrelas = daoAnuncio::consultarMediaVendedora($_SESSION['id']);

                        if ($qtdestrelas != '') {

                            $qtdestrelas = ceil($qtdestrelas);
                        ?>
                            <div class="col">
                                <div class="chart-wrapper" id="estrelas-post">
                                    <canvas id="grafico-estrelas"></canvas>
                                </div>
                            </div>
                            <div class="col d-flex flex-column justify-content-center">

                                <div class="stats-box p-4">
                                    <h3 class="highlight"><!--
                                    <?php

                                    switch (ceil($qtdestrelas)) {
                                        case 0:
                                        case 1:
                                        case 2:
                                    ?>
                                            Puxa...
                                        <?php
                                            break;
                                        case 3:
                                        ?>
                                            Quase lá!
                                        <?php
                                            break;
                                        case 4:
                                        case 5:
                                        ?>
                                            Parabéns!
                                    <?php
                                        default:
                                            break;
                                    }
                                    ?>-->
                                        <?php
                                        for ($i = 0; $i < $qtdestrelas; $i++) {
                                        ?>
                                            <i class="bi bi-star-fill"></i>
                                        <?php
                                        }
                                        for ($i = 0; $i < 5 - $qtdestrelas; $i++) {
                                        ?>
                                            <i class="bi bi-star"></i>
                                        <?php
                                        }
                                        ?>
                                    </h3>
                                    <h4>
                                        Suas avaliações estão <span class="highlight"><?php
                                                                                        switch ($qtdestrelas) {
                                                                                            case 0:
                                                                                        ?>insuficientes...
                                            <?php
                                                                                                break;
                                                                                            case 1:
                                                                                            case 2:
                                            ?>baixas...
                                            <?php
                                                                                                break;
                                                                                            case 3:
                                            ?>boas.
                                            <?php
                                                                                                break;
                                                                                            case 4:
                                                                                            case 5:
                                            ?>ótimas!
                                    <?php
                                                                                            default:
                                                                                                break;
                                                                                        }
                                    ?></span>
                                    </h4>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col d-flex justify-content-center align-items-center p-5">
                                <h5>Sem informações o suficiente</h5>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                } else {
                ?>
                    <div class="premium-plan-overlay d-flex flex-column align-items-center justify-content-center m-5">
                        <p class="section-title load" style="text-align: center">Upgrade para o plano premium para obter benefícios adicionais!</p>
                        <button id="new-product" data-bs-target="#modal-premium" data-bs-toggle="modal" class="button">
                            <i class="bi bi-cash"></i>
                            <span>Comprar Plano Premium</span>
                        </button>

                    </div>
                <?php
                }
                ?>

                <div class="section">
                    <div class="section-title placeholder-element placeholder-glow">
                        <span class="placeholder col-4"></span>
                    </div>
                    <div class="section-title load">Seus anúncios</div>
                    <span class="veja-mais placeholder-element placeholder-glow">
                        <span class="placeholder col-4"></span>
                    </span>
                    <a href="#" class="veja-mais load">veja mais</a>
                </div>
                <div class="produtos placeholder-element">
                    <div class="card-anuncio" href="produto.php" aria-hidden="true">
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
                    <div class="card-anuncio" href="produto.php" aria-hidden="true">
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
                    <div class="card-anuncio" href="produto.php" aria-hidden="true">
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
                    <div class="card-anuncio" href="produto.php" aria-hidden="true">
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
                    <div class="card-anuncio" href="produto.php" aria-hidden="true">
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
                    <div class="card-anuncio" href="produto.php" aria-hidden="true">
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
                    <div class="card-anuncio" href="produto.php" aria-hidden="true">
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
                    <div class="card-anuncio" href="produto.php" aria-hidden="true">
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
                    <div class="card-anuncio" href="produto.php" aria-hidden="true">
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
                    <div class="card-anuncio" href="produto.php" aria-hidden="true">
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
                        $qtdestrelas = $a['estrelasAnuncio'];
                    ?>
                        <a class="card-anuncio" href="anuncio.php?a=<?php echo $a['idAnuncio'] ?>">
                            <div class="img-card">
                                <img src="../<?php echo $a['imagemPrincipalAnuncio'] ?>">
                            </div>
                            <div class="info-card">
                                <div class="nome-card">
                                    <?php echo $a['nomeAnuncio'] ?>
                                </div>
                                <div class="preco-card">
                                    R$<?php echo number_format($a['valorAnuncio'], 2, ',', '.')  ?>
                                </div>
                                <?php if ($dados['nivelNegocioVendedora'] == 1) {
                                ?>
                                    <div class="avaliacao-card">
                                        <?php

                                        for ($i = 0; $i < $qtdestrelas; $i += 1) {
                                        ?>
                                            <i class="bi bi-star-fill"></i>
                                        <?php
                                        }
                                        for ($i = 0; $i < 5 - $qtdestrelas; $i++) {
                                        ?>
                                            <i class="bi bi-star"></i>
                                        <?php
                                        }

                                        ?>
                                    </div>
                                <?php
                                } ?>
                                <div class="categoria-card">
                                    <?php echo $a['nomeCategoria'] ?>
                                </div>
                                <div class="negocio-card">
                                    <?php echo $a['nomeNegocioVendedora'] ?>
                                </div><?php
                                        ?>
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
                        <?php if ($dados['nivelNegocioVendedora'] == 1) {
                        ?>
                            <div class="row">


                                <div class="col">
                                    Hoje você teve: <span class="highlight"><?php echo daoPedidoProduto::contarPedidosHoje($_SESSION['id']) ?> encomendas</span>
                                </div>
                                <div class="col">
                                    Neste mês: <span class="highlight"><?php echo daoPedidoProduto::contarPedidosEsteMes($_SESSION['id']) ?> encomendas</span>
                                </div>
                            </div>
                            <div class="stats-carousel">
                                <div class="row">
                                    <?php
                                    $melhor = daoAnuncio::consultarMelhorAvaliado($_SESSION['id']);

                                    ?>
                                    <div class="col">
                                        Seu anúncio melhor avaliado:
                                    </div>
                                    <a class="col highlight d-flex flex-column justify-content-center" href="anuncio.php?a=<?php echo $melhor['idAnuncio'] ?>">
                                        <?php
                                        echo isset($melhor['nomeAnuncio']) ? $melhor['nomeAnuncio'] : "Nenhum"
                                        ?>
                                    </a>
                                </div>
                                <div class="row">
                                    <?php
                                    $mais = daoAnuncio::consultarMaisEncomendado($_SESSION['id']);
                                    ?>
                                    <div class="col">
                                        Seu anúncio mais encomendado:
                                    </div>
                                    <a class="col highlight d-flex flex-column justify-content-center" href="anuncio.php?a=<?php echo $mais['idAnuncio'] ?>">
                                        <?php
                                        echo isset($mais['nomeAnuncio']) ? $mais['nomeAnuncio'] : "Nenhum"
                                        ?>
                                    </a>
                                </div>
                            <?php
                        } else { ?>
                                <div class="row">
                                    <div class="col" style="text-align:center">
                                        Upgrade para o plano premium para obter benefícios adicionais!
                                    </div>
                                </div>

                            <?php
                        } ?>
                            </div>
                    </div>
                    <div class="stats-footer">

                    </div>
                </div>
                <?php if ($dados['nivelNegocioVendedora'] == 1) {
                ?>
                    <div class="stats-box encomendas">
                        <div class="stats-header">
                            <div class="section-title placeholder-element placeholder-glow">
                                <span class="placeholder col-4"></span>
                            </div>
                            <div class="section-title load">Pedidos</div>
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
                            <?php


                            $pedidos = daoPedidoProduto::listarPedidosVendedora($_SESSION['id']);

                            foreach ($pedidos as $p) {
                            ?>
                                <a class="stats-item" href="encomendas.php">
                                    <div class="stats-foto placeholder-glow">
                                        <img src="../<?php echo $p['fotoCliente'] ?>" alt="">
                                    </div>
                                    <div class="stats-name placeholder-glow">
                                        <?php echo $p['nomeCliente'] ?>
                                    </div>
                                    <div class="stats-encomenda placeholder-glow">
                                        encomendou <span class="highlight"><?php echo $p['nomeAnuncio'] ?></span>
                                    </div>
                                </a>
                            <?php
                            }
                            ?>

                        </div>
                    <?php
                } ?>
                    <div class="stats-footer">

                    </div>
                    </div>
            </div>
        </main>
    </div>


    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/flickity/js/flickity.pkgd.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/vendor/chartjs/js/chart.js"></script>
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script>
        var iniciarPagamento = document.getElementById('iniciar-pagamento')
        var elem = document.querySelector(".stats-carousel")
        var legendColor, borderColor

        legendColor = localStorage.getItem('theme') == 'dark' ? 'white' : '#666'

        new Flickity(elem, {
            prevNextButtons: false,
            pageDots: false,
            resize: false,
            autoPlay: 2500,
            wrapAround: true
        });

        let cores = [
            '#32103B',
            '#572664',
            '#6E347E',
            '#7F3E91',
            '#A857BF',
            '#CB6CE6'
        ]

        new Chart(document.querySelector('#grafico-estrelas'), {
            type: 'pie',
            data: {
                labels: <?php echo json_encode(array_keys(daoAnuncio::contarEstrelasAnuncioVendedora($_SESSION['id']))) ?>,
                datasets: [{
                    label: 'Quantidade de anúncios',
                    data: <?php echo json_encode(array_values(daoAnuncio::contarEstrelasAnuncioVendedora($_SESSION['id']))) ?>,
                    borderRadius: 4,
                    color: 'rgb(0,0,0)',
                    backgroundColor: cores
                }]

            },
            options: {
                responsive: true,
                aspectRatio: 1 / 1,
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 12,
                                family: 'DM Sans',
                            },
                            color: legendColor
                        },
                    },
                    title: {
                        display: true,
                        text: 'Quantidade de anúncios por estrela',
                        font: {
                            size: 14,
                            family: 'DM Sans',
                            weight: 'bold',
                        },
                        color: legendColor
                    }

                }
            }
        })

        iniciarPagamento.addEventListener('click', () => {

            let qrCodeImg = document.querySelector('#qr-code')
            let loadingQrCode = document.querySelector('#loading-pix')

            qrCodeImg.classList.add('hide')
            loadingQrCode.classList.remove('hide')

            setTimeout(() => {
                qrCodeImg.classList.remove('hide')
                loadingQrCode.classList.add('hide')
            }, 2000)
        })

        
        function gerarBoleto() {
            var url = "../api/boleto/boleto_bb.php?v=<?php echo $_SESSION['username'] ?>&bairroCliente=<?php echo $dados['bairroNegocioVendedora'] ?>&numCliente=<?php echo $dados['numNegocioVendedora'] ?>&negocio=Hive&cnpj=79798353000139&cidade=São Paulo&valorUni=49&estado=SP&cep=&bairro=&num=&qtd=1&valor=49";

            window.open(url, '_blank');
        }

        $(document).ready(function() {
            $("#forma-pagamento").change(function() {
                if ($(this).val() === "2") {
                    $("#boleto").show();
                    $("#qrcode-pix").hide();
                } else {
                    $("#qrcode-pix").show();
                    $("#boleto").hide();
                }
            });
        });
    </script>
</body>

</html>
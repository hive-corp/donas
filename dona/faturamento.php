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
    <title>Faturamento</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../assets/media/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/vendor/flickity/css/flickity.css" />
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/css/styles.css" />
</head>

<body>

    <div id="user-faturamento">
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
        <form action="pagar.php" method="POST">
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
                                    <select name="forma-pagamento" id="forma-pagamento" style="background: var(--select-bg);
    color: var(--text-color);" required>
                                        <option value="1">PIX</option>
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
                <a href="index.php" class="nav-link">
                    <i class="bi bi-house-door-fill"></i>
                    <span>
                        Home
                    </span>
                </a>
                <a href="encomendas.php" class="nav-link">
                    <i class="bi bi-grid"></i>
                    <span>
                        Encomendas
                    </span>
                </a>
                <a href="faturamento.php" class="nav-link active">
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
                <h2>Seu faturamento</h2>
                <h6><span class="highlight"><?php echo explode(" ", $_SESSION['nome'])[0] ?></span>, aqui está o faturamento do seu negócio!</h6>
            </div>
            <div id="content">
                <div class="stats-faturamento d-flex flex-column justify-content-center align-items-center">
                    <?php
                    $valorHoje = daoPedidoProduto::valorPedidosHoje($_SESSION['id']) + daoPedidoServico::valorPedidosHoje($_SESSION['id']);
                    $contarHoje = daoPedidoProduto::contarPedidosHoje($_SESSION['id']) + daoPedidoServico::contarPedidosHoje($_SESSION['id']);
                    ?>
                    <div class="faturamento-periodo">
                        Hoje
                    </div>
                    <div class="faturamento-valor">
                        R$<?php echo number_format($valorHoje, 2, ',', '.')  ?>
                    </div>
                    <div class="faturamento-qtd highlight">
                        <?php echo daoPedidoProduto::contarPedidosHoje($_SESSION['id']) ?> pedidos
                    </div>
                </div>
                <div class="stats-faturamento d-flex flex-column justify-content-center align-items-center">
                    <?php
                    $valorEstaSemana = daoPedidoProduto::valorPedidosEstaSemana($_SESSION['id']) + daoPedidoServico::valorPedidosEstaSemana($_SESSION['id']);
                    $contarEstaSemana = daoPedidoProduto::contarPedidosEstaSemana($_SESSION['id']) + daoPedidoServico::contarPedidosEstaSemana($_SESSION['id']);
                    ?>
                    <div class="faturamento-periodo">
                        Esta semana
                    </div>
                    <div class="faturamento-valor">
                        R$<?php echo number_format($valorEstaSemana, 2, ',', '.')  ?>
                    </div>
                    <div class="faturamento-qtd highlight">
                        <?php echo $contarEstaSemana ?> pedidos
                    </div>
                </div>
                <div class="stats-faturamento d-flex flex-column justify-content-center align-items-center">
                    <?php
                    $valorEsteMes = daoPedidoProduto::valorPedidosEsteMes($_SESSION['id']) + daoPedidoServico::valorPedidosEsteMes($_SESSION['id']);
                    $contarEsteMes = daoPedidoProduto::contarPedidosEsteMes($_SESSION['id']) + daoPedidoServico::contarPedidosEsteMes($_SESSION['id']);
                    ?>
                    <div class="faturamento-periodo">
                        Este mês
                    </div>
                    <div class="faturamento-valor">
                        R$<?php echo number_format($valorEsteMes, 2, ',', '.')  ?>
                    </div>
                    <div class="faturamento-qtd highlight">
                        <?php echo $contarEsteMes ?> pedidos
                    </div>
                </div>
                <div class="stats-faturamento d-flex flex-column justify-content-center align-items-center">
                    <?php
                    $valorEsteAno = daoPedidoProduto::valorPedidosEsteAno($_SESSION['id']) + daoPedidoServico::valorPedidosEsteAno($_SESSION['id']);
                    $contarEsteAno = daoPedidoProduto::contarPedidosEsteAno($_SESSION['id']) + daoPedidoServico::contarPedidosEsteAno($_SESSION['id']);
                    ?>
                    <div class="faturamento-periodo">
                        Este ano
                    </div>
                    <div class="faturamento-valor">
                        R$<?php echo number_format($valorEsteAno, 2, ',', '.')  ?>
                    </div>
                    <div class="faturamento-qtd highlight">
                        <?php echo $contarEsteAno ?> pedidos
                    </div>
                </div>
                <div class="stats-encomendado">
                    <?php
                    $mais = daoAnuncio::consultarMaisEncomendado($_SESSION['id']);
                    ?>
                    <h4>
                        Seu anúncio mais encomendado é: <span class="highlight"><?php
                                                                                echo isset($mais['nomeAnuncio']) ? $mais['nomeAnuncio'] : "Nenhum"
                                                                                ?></span>
                    </h4>
                    <?php
                    if (isset($mais)) {
                        $qtdestrelas = $mais['estrelasAnuncio'];
                    ?>
                        <a class="card-anuncio" href="anuncio.php?a=<?php echo $a['idAnuncio'] ?>">
                            <div class="img-card">
                                <img src="../<?php echo $mais['imagemPrincipalAnuncio'] ?>">
                            </div>
                            <div class="info-card">
                                <div class="nome-card">
                                    <?php echo $mais['nomeAnuncio'] ?>
                                </div>
                                <div class="preco-card">
                                    R$20,00
                                </div>
                                <div class="preco-card">
                                    R$<?php echo number_format($mais['valorAnuncio'], 2, ',', '.')  ?>
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
                                <div class="categoria-card" style="color: lightslategray">
                                    <?php echo $mais['nomeCategoria'] ?>
                                </div>
                                <div class="negocio-card">
                                    <?php echo $mais['nomeNegocioVendedora'] ?>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
                <div class="stats-box mais-encomendados">
                    <div class="stats-header">
                        <div class="section-title placeholder-element placeholder-glow">
                            <span class="placeholder col-4"></span>
                        </div>
                        <div class="section-title load">Mais procurados</div>

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
                    </div>
                    <div class="stats-body load">
                        <?php
                        $procurados = daoAnuncio::consultarCincoMaisEncomendadosPorEmcomendasFinalizadas($_SESSION['id']);

                        foreach ($procurados as $p) {
                        ?>
                            <a class="stats-item" href="anuncio.php">
                                <div class="stats-foto placeholder-glow">
                                    <img src="../<?php echo $p['imagemPrincipalAnuncio'] ?>" alt="">
                                </div>
                                <div class="stats-name placeholder-glow">
                                    <?php echo $p['nomeAnuncio'] ?>
                                </div>
                                <div class="stats-encomenda placeholder-glow">
                                    <span class="highlight"><?php echo $p['qtd'] ?> pedidos</span>
                                </div>
                            </a>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="stats-footer">

                    </div>
                </div>
                <div class="stats-lucro">
                    <?php
                    $dadosLucroProduto = daoPedidoProduto::consultaLucro($_SESSION['id']);
                    $dadosLucroServico = daoPedidoServico::consultaLucro($_SESSION['id']);

                    $valorTotalCusto = $dadosLucroProduto['valorTotalCusto'] + $dadosLucroServico['valorTotalCusto'];
                    $valorTotalVenda = $dadosLucroProduto['valorTotalVenda'] + $dadosLucroServico['valorTotalVenda'];

                    $margemLucro = ($valorTotalVenda - $valorTotalCusto) / $valorTotalVenda * 100;
                    ?>
                    <h4>
                        Sua taxa de lucro é: <span class="highlight"><?php echo number_format($margemLucro, 0, ',', '.') ?>%</span>
                    </h4>
                    <div class="stats-valores">
                        <div>
                            Valor de custo: <span class="highlight">R$<?php echo number_format($valorTotalCusto, 2, ',', '.')  ?></span>
                        </div>
                        <div>
                            Valor de venda: <span class="highlight">R$<?php echo number_format($valorTotalVenda, 2, ',', '.')  ?></span>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>


    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/flickity/js/flickity.pkgd.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/vendor/chartjs/js/chart.js"></script>
    <script>
        var iniciarPagamento = document.getElementById('iniciar-pagamento')
        var legendColor, borderColor

        legendColor = localStorage.getItem('theme') == 'dark' ? 'white' : '#666'

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
    </script>
</body>

</html>
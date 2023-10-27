<?php

require_once "global.php";

if (isset($_GET['a'])) {
    $anuncio = daoAnuncio::consultarPorId($_GET['a']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $anuncio['nomeAnuncio'] ?></title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="modal pop" id="modal-login" tabindex="-1" aria-labelledby="modal-login" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Puxa...</h1>
                </div>
                <div class="modal-body d-flex flex-column text-center">
                    <i class="bi bi-emoji-frown"></i>
                    Você precisa estar logado para acessar essa área...
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button button-secondary" data-bs-dismiss="modal">OK</button>
                    <a class="button" href="../login.php">FAZER LOGIN</a>
                </div>
            </div>
        </div>
    </div>

    <div id="user-product">
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
                <a href="#" class="nav-link" data-bs-target="#modal-login" data-bs-toggle="modal">
                    <i class="bi bi-chat"></i>
                    <span>
                        Conversas
                    </span>
                </a>
                <a href="configuracoes.php" class="nav-link">
                    <i class="bi bi-person"></i>
                    <span>
                        Configurações
                    </span>
                </a>
            </div>
        </nav>
        <main id="main">
            <!-- <img src="../assets/img/rosas.svg" class="rosa-fundo"> -->
            <?php if (isset($anuncio['nomeAnuncio'])) { ?>
                <div id="content">
                    <div id="produto">
                        <div id="foto-anuncio">
                            <button onclick="history.back()" id="voltar">
                                <i class="bi bi-arrow-left"></i>
                            </button>
                            <img src="../<?php echo $anuncio['imagemPrincipalAnuncio'] ?>">
                        </div>
                        <div id="info-anuncio">
                            <div id="nome-anuncio">
                                <?php echo $anuncio['nomeAnuncio'] ?>
                            </div>
                            <div id="preco-anuncio">
                                R$<?php echo number_format($anuncio['valorAnuncio'], 2, ',') ?>
                            </div>
                            <?php
                            if ($anuncio['nivelNegocioVendedora'] == 1) {
                            ?>
                                <button class="button button-square" id="encomendar" data-bs-target="#modal-login" data-bs-toggle="modal">Encomendar</button>
                            <?php
                            }
                            ?>
                            <div id="avaliacao-anuncio">
                                <?php
                                $qtdestrelas = $anuncio['estrelasAnuncio'];

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

                                $qtdavaliacoes = daoAvaliacao::contarAvaliacaoAnuncio($anuncio['idAnuncio']);

                                echo $qtdavaliacoes > 1 ? "(" . $qtdavaliacoes . " avaliações)" : "(" . $qtdavaliacoes . " avaliação)";
                                ?>
                            </div>
                            <div id="categoria-anuncio">
                                <?php echo $anuncio['nomeCategoria'] ?>
                            </div>

                            <div class="accordion accordion-flush accordion-anuncio">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-descricao" aria-expanded="true" aria-controls="collapse-descricao">
                                            Descrição
                                        </button>
                                    </h2>
                                    <div id="collapse-descricao" class="accordion-collapse collapse" data-bs-parent="#accordion-descricao">
                                        <div class="accordion-body">
                                            <?php echo $anuncio['descricaoAnuncio'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-empresa" aria-expanded="false" aria-controls="collapse-empresa">
                                            Sobre a empresa
                                        </button>
                                    </h2>
                                    <div id="collapse-empresa" class="accordion-collapse collapse" data-bs-parent="#accordion-empresa">
                                        <a class="accordion-body accordion-empresa" href="profile.php?user=<?php echo $anuncio['nomeUsuarioNegocioVendedora'] ?>">
                                            <img src="../<?php echo $anuncio['fotoNegocioVendedora'] ?>" id="foto-accordion">
                                            <div id="empresa-anuncio">
                                                <?php
                                                echo $anuncio['nomeNegocioVendedora'];
                                                if ($anuncio['nivelNegocioVendedora'] == 1) {
                                                ?>
                                                    <i class="bi bi-gem highlight"></i>
                                                <?php
                                                }

                                                ?>
                                            </div>
                                            <div id="categoria-empresa">
                                                <?php echo $anuncio['nomeCategoria'] ?>
                                            </div>
                                            <div id="anuncios-empresa">
                                                <?php
                                                $qtdanuncio = daoAnuncio::contarAnuncioGeral($anuncio['idVendedora']);

                                                echo $qtdanuncio > 1 ? $qtdanuncio . " anúncios" : $qtdanuncio . " anúncio";
                                                ?>
                                            </div>
                                            <div id="seguidores-empresa">
                                                <?php
                                                $qtdseguidores = daoSeguidor::contarSeguidor($anuncio['idVendedora']);

                                                echo $qtdseguidores > 1 ? $qtdseguidores . " seguidores" : $qtdseguidores . " seguidor";
                                                ?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="comentarios-anuncio">
                        <div id="comentarios-titulo">
                            Avaliações
                        </div>
                        <div id="comentarios">
                            <?php
                            $avaliacoes = daoAvaliacao::listarPorAnuncio($anuncio['idAnuncio']);

                            foreach ($avaliacoes as $a) {
                            ?>
                                <div class="comentario">
                                    <img src="../<?php echo $a['fotoCliente'] ?>" class="foto-comentario">
                                    <div class="nome-comentario">
                                        <?php echo $a['nomeCliente'] ?>
                                    </div>
                                    <div class="avaliacao-comentario">
                                        <?php
                                        $qtdestrelas = $a['estrelasAvaliacao'];

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
                                    </div>
                                    <div class="conteudo-comentario">
                                        <?php echo $a['conteudoAvaliacao'] ?>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <h2 class="mx-auto my-auto">Nenhum anúncio foi encontrado.</h2>
            <?php
            } ?>
            <!-- <img src="../assets/img/rosas.svg" class="rosa-fundo"> -->
        </main>

    </div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
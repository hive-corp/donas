<?php

require_once "validador.php";
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
    <title><?php echo isset($anuncio['nomeAnuncio']) ? $anuncio['nomeAnuncio'] :  'Nada foi encontrado.' ?></title>

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="user-product">
        <div class="modal pop" id="modal-encomenda" tabindex="-1" aria-labelledby="modal-encomenda" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Tem certeza?</h1>
                    </div>
                    <div class="modal-body d-flex flex-column text-center">
                        <i class="bi bi-box-seam"></i>
                        Você está prestes a encomendar esse <?php echo $anuncio['tipoAnuncio'] == 1 ? "serviço" : "produto"; ?>. Tem certeza?
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="button button-secondary" data-bs-dismiss="modal">Não</button>
                        <a class="button" href="fazer-encomenda.php?a=<?php echo $anuncio['idAnuncio'] ?>">Sim</a>
                    </div>
                </div>
            </div>
        </div>
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
                <a href="notificacoes.php" class="nav-link">
                    <i class="bi bi-bell">
                        <?php
                        if (daoNotificCliente::contarNotificacoes($_SESSION['id'])) {
                        ?>
                            <span class="counter">
                                <?php
                                echo daoNotificCliente::contarNotificacoes($_SESSION['id']);
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
                                R$<?php echo number_format($anuncio['valorAnuncio'], 2, ',', '.') ?>
                            </div>
                            <?php

                            $encomenda = new Encomenda();
                            $a = new Anuncio();
                            $c = new Cliente();

                            $a->setIdAnuncio($anuncio['idAnuncio']);
                            $c->setIdCliente($_SESSION['id']);

                            $encomenda->setAnuncio($a);
                            $encomenda->setCliente($c);

                            if ($anuncio['nivelNegocioVendedora'] == 1) {
                                $temEncomenda = daoEncomenda::consultaTemEncomenda($encomenda);
                                $temEncomendaAtiva = daoEncomenda::consultaTemEncomendaAtiva($encomenda);

                                if (!$temEncomenda || !$temEncomendaAtiva) {
                            ?>
                                    <button class="button button-square" id="encomendar" data-bs-target="#modal-encomenda" data-bs-toggle="modal">Encomendar</button>
                                <?php
                                } else if ($temEncomendaAtiva) {
                                ?>
                                    <button class="button button-square button-secondary" id="encomendar">Encomendado</button>
                            <?php
                                }
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

                                echo $qtdavaliacoes != 1 ? "(" . $qtdavaliacoes . " avaliações)" : "(" . $qtdavaliacoes . " avaliação)";
                                ?>
                            </div>
                            <div id="categoria-anuncio">
                                <?php echo $anuncio['nomeCategoria'] ?>
                            </div>
                            <div id="estoque-anuncio">
                                <?php
                                if ($anuncio['tipoAnuncio'] == 2) {
                                    echo $anuncio['qtdProduto'] != 1 ? $anuncio['qtdProduto'] . " unidades" : $anuncio['qtdProduto'] . " unidade";
                                }
                                ?>
                            </div>
                            <div class="accordion accordion-flush accordion-anuncio">
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-descricao" aria-expanded="true" aria-controls="collapse-descricao">
                                            Descrição
                                        </button>
                                    </h3>
                                    <div id="collapse-descricao" class="accordion-collapse collapse" data-bs-parent="#accordion-descricao">
                                        <div class="accordion-body"><?php echo $anuncio['descricaoAnuncio'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-empresa" aria-expanded="false" aria-controls="collapse-empresa">
                                            Sobre a empresa
                                        </button>
                                    </h3>
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

                                                echo $qtdanuncio != 1 ? $qtdanuncio . " anúncios" : $qtdanuncio . " anúncio";
                                                ?>
                                            </div>
                                            <div id="seguidores-empresa">
                                                <?php
                                                $qtdseguidores = daoSeguidor::contarSeguidor($anuncio['idVendedora']);

                                                echo $qtdseguidores != 1 ? $qtdseguidores . " seguidores" : $qtdseguidores . " seguidor";
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
                        <?php

                        $foiFinalizada = daoEncomenda::foiFinalizada($encomenda);
                        if ($foiFinalizada) {
                        ?>
                            <form id="input-comentario" method="post" action="avaliar-anuncio.php?a=<?php echo $anuncio['idAnuncio'] ?>" class="needs-validation" novalidate>
                                <img src="../<?php echo $_SESSION['foto'] ?>" id="foto-comentario">
                                <div id="nome-comentario">
                                    <?php echo $_SESSION['nome'] ?>
                                </div>
                                <div id="avaliacao">
                                    <input value="5" name="rate" id="star5" type="radio">
                                    <label title="text" for="star5"></label>
                                    <input value="4" name="rate" id="star4" type="radio">
                                    <label title="text" for="star4"></label>
                                    <input value="3" name="rate" id="star3" type="radio">
                                    <label title="text" for="star3"></label>
                                    <input value="2" name="rate" id="star2" type="radio">
                                    <label title="text" for="star2"></label>
                                    <input value="1" name="rate" id="star1" type="radio">
                                    <label title="text" for="star1"></label>
                                </div>
                                <div class="input" id="textarea-comentario">
                                    <div class="input-wrapper">
                                        <textarea name="comentario" id="comentario" cols="30" rows="4" placeholder="Sua avaliação" required></textarea>
                                    </div>
                                    <div class="invalid-feedback">
                                        Você não preencheu o campo de conteúdo.
                                    </div>
                                </div>
                                <div class="input input-enviar">
                                    <button class="button button-square" id="enviar">Enviar</button>
                                </div>
                            </form>
                        <?php
                        }
                        ?>
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
    <script>
        var inputComentario = document.querySelector("#input-comentario"),
            conteudoInputComentario = document.querySelector("#comentario")

        inputComentario.addEventListener("submit", e => {

            e.preventDefault();
            e.stopPropagation()

            if (!inputComentario.checkValidity()) {
                inputComentario.classList.add('was-validated')
            } else {
                inputComentario.submit();
            }
        })
    </script>
</body>

</html>
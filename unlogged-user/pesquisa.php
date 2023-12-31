<?php

require_once "global.php";
if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
    $pesquisa = $_GET['pesquisa'];
}
if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
}
if (isset($_GET['tipo']) && !empty($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
}
if (isset($_GET['preco']) && !empty($_GET['preco'])) {
    $preco = $_GET['preco'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/media/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/vendor/flickity/css/flickity.css" />
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

    <div id="user">
        <nav id="nav">
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
                <a href="pesquisa.php" class="nav-link active">
                    <i class="bi bi-search-heart"></i>
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
            <a id="new-product" href="login.php" class="button">
				<i class="bi bi-box-arrow-in-right"></i>
				<span>Fazer log-in</span>
			</a>
        </nav>
        <main id="main">

            <form action="pesquisa.php">
                <div id="pesquisa">
                    <img class="logo-pesquisa" src="../assets/media/Logo-menor.png" alt="">

                    <div class="search-container search-square">
                        <input type="text" role="search" placeholder="Pesquisa" class="search-field" name="pesquisa" value="<?php echo isset($pesquisa) ? $pesquisa : "" ?>" />
                        <button class="search-button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>

                </div>
                <div id="content">
                    <div class="filtro-pesquisa">
                        <div class="filtro-title">
                            Filtro
                        </div>
                        <div class="filtros">
                            <select class="select-filtro" name="tipo" id="tipo">
                                <option value="" selected>Tipo</option>
                                <option value="2">Produto</option>
                                <option value="1">Serviço</option>
                            </select>


                            <select class="select-filtro" name="categoria" id="categoria" onchange="atualizarSubcategorias()">
                                <option value="" selected>Categoria</option>
                                <?php
                                $categorias = daoCategoria::listar();

                                foreach ($categorias as $c) {
                                ?>
                                    <option value="<?php echo $c['idCategoria'] ?>" <?php echo $c['idCategoria'] == $categorias ? "selected" : "" ?>>
                                        <?php echo $c['nomeCategoria'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>

                            <select class="select-filtro hide" name="subcategoria" id="subcategoria">
                                <option value="" selected>Subcategoria</option>
                            </select>
                        </div>
                    </div>
            </form>

            <?php
            if (empty($pesquisa) && empty($categoria) && empty($tipo)) {
            ?>
                <div class="filtro-pesquisa">
                    <div class="filtro-title">
                        <?php

                        echo "Categorias"

                        ?>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="filtro-pesquisa">
                    <div class="filtro-title">
                        <?php

                        echo isset($pesquisa) && !empty($pesquisa) ? "Procurando por vendedoras com \"" . $pesquisa . "\"" : "Vendedoras"

                        ?>
                    </div>
                </div>
            <?php

            } ?>
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
            <?php
            if (empty($pesquisa) && empty($categoria) && empty($tipo)) {
            ?>
                <div class="carrossel-cards load">

                    <?php
                    $categorias = daoCategoria::listar();

                    foreach ($categorias as $c) {
                    ?>
                        <form style="display: flex; flex-direction: row;" action="pesquisa.php">
                            <button style="background-color: transparent;" value="<?php echo $c['idCategoria'] ?>" name="categoria">
                                <a class="card-categoria  <?php echo $c['idCategoria'] == $categorias ? "selected" : "" ?>">
                                    <div class="img-categoria">
                                        <img src="../<?php echo $c['fotoCategoria'] ?>" alt="<?php echo $c['nomeCategoria'] ?>" />
                                    </div>

                                    <p class="nome-categoria"><?php echo $c['nomeCategoria'] ?></p>
                                </a>
                            </button>
                        </form>
                    <?php
                    }
                    ?>

                </div>
            <?php
            } else {
            ?>
                <div class="carrossel-cards load">
                    <?php
                    if (isset($categoria) && isset($pesquisa)) {
                        $vendedoras = daoVendedora::pesquisarVendedoraNomeDescricaoCategoria($categoria, $pesquisa);
                    } else if (isset($categoria)) {
                        $vendedoras = daoVendedora::pesquisarVendedoraCategoria($categoria);
                    } else if (isset($pesquisa)) {
                        $vendedoras = daoVendedora::pesquisarVendedoraNome($pesquisa);
                    } else {
                        $vendedoras = daoVendedora::listar();
                    }
                    $anuncios = daoAnuncio::listar();

                    foreach ($vendedoras as $a) {
                        $estrelas = daoAnuncio::consultarMediaVendedora($a['idVendedora']);
                        $totalanuncios = daoAnuncio::contarAnuncioVendedora($a['idVendedora']);

                        $estrelas = ceil($estrelas);
                    ?>

                        <a class="card-vendedora" href="profile.php?user=<?php echo $a['nomeUsuarioNegocioVendedora'] ?> ">
                            <div class="img-vendedora">
                                <img src="../<?php echo $a['fotoNegocioVendedora'] ?>" alt="<?php echo $a['nomeNegocioVendedora'] ?>" />
                            </div>

                            <div class="nome-vendedora"><?php echo $a['nomeNegocioVendedora'];
                                                        if ($a['nivelNegocioVendedora'] == 1) {
                                                        ?>
                                    <i class="bi bi-gem highlight"></i>
                                <?php
                                                        }
                                ?>
                            </div>
                            <?php
                            if ($a['nivelNegocioVendedora'] == 1) {
                            ?>
                                <div class="estrelas-vendedora highlight">
                                    <?php

                                    for ($i = 0; $i < $estrelas; $i += 1) {
                                    ?>
                                        <i class="bi bi-star-fill"></i>
                                    <?php
                                    }
                                    for ($i = 0; $i < 5 - $estrelas; $i++) {
                                    ?>
                                        <i class="bi bi-star"></i>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="anuncios-vendedora"><?php echo $totalanuncios ?> anúncios</div>
                            <?php
                            } else {
                            ?> <div class="anuncios-vendedora"><?php echo $totalanuncios ?> anúncios</div>
                            <?php
                            }
                            ?>
                        </a>
                    <?php
                    }

                    ?>

                </div>
            <?php
            }
            ?>

            <div class="filtro-pesquisa">
                <div class="filtro-title">
                    <?php

                    echo isset($pesquisa) && !empty($pesquisa) ? "Procurando por produtos com \"" . $pesquisa . "\"" : "Produtos"

                    ?>
                </div>
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
                if (isset($categoria) && isset($pesquisa) && isset($tipo) && isset($subcategoria)) {
                    $anuncios = daoAnuncio::pesquisarAnunciosNomeDescricaoCategoriaTipoSubcatergoria($categoria, $pesquisa, $tipo, $subcategoria);
                } else if (isset($categoria) && isset($pesquisa) && isset($tipo)) {
                    $anuncios = daoAnuncio::pesquisarAnunciosNomeDescricaoCategoriaTipo($categoria, $pesquisa, $tipo);
                } else if (isset($categoria) && isset($subcategoria) && isset($tipo)) {
                    $anuncios = daoAnuncio::pesquisarAnunciosCategoriaTipoSubcatergoria($categoria, $subcategoria, $tipo);
                } else if (isset($categoria) && isset($subcategoria) && isset($pesquisa)) {
                    $anuncios = daoAnuncio::pesquisarAnunciosNomeDescricaoCategoriaSubcategoria($categoria, $subcategoria, $pesquisa);
                } else if (isset($subcategoria) && isset($categoria)) {
                    $anuncios = daoAnuncio::pesquisarSubCategoriaCategoria($subcategoria, $categoria);
                } else if (isset($categoria) && isset($pesquisa)) {
                    $anuncios = daoAnuncio::pesquisarAnunciosNomeDescricaoCategoria($categoria, $pesquisa);
                } else if (isset($pesquisa) && isset($tipo)) {
                    $anuncios = daoAnuncio::pesquisarAnunciosNomeDescricaoTipo($pesquisa, $tipo);
                } else if (isset($categoria) && isset($tipo)) {
                    $anuncios = daoAnuncio::pesquisarCategoriaTipo($categoria, $tipo);
                } else if (isset($categoria)) {
                    $anuncios = daoAnuncio::pesquisarAnunciosCategoria($categoria);
                } else if (isset($pesquisa)) {
                    $anuncios = daoAnuncio::pesquisarAnunciosNomeDescricao($pesquisa);
                } else if (isset($tipo)) {
                    $anuncios = daoAnuncio::pesquisarTipo($tipo);
                } else {
                    $anuncios = daoAnuncio::listar();
                }

                foreach ($anuncios as $a) {

                    $qtdestrelas = $a['estrelasAnuncio'];

                ?>
                    <a class="card-anuncio" href="anuncio.php?a=<?php echo $a['idAnuncio'] ?>">
                        <div class="img-card">
                            <img src="../<?php echo $a['imagemPrincipalAnuncio'] ?>" />
                        </div>
                        <div class="info-card">
                            <div class="nome-card"><?php echo $a['nomeAnuncio'] ?></div>
                            <div class="preco-card">R$<?php echo number_format($a['valorAnuncio'], 2, ',', '.') ?></div>
                            <?php if ($a['nivelNegocioVendedora'] == 1) { ?>
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
                                <div class="categoria-card"><?php echo $a['nomeCategoria'] ?></div>
                                <div class="negocio-card"><?php echo $a['nomeNegocioVendedora'] ?></div>
                            <?php } else { ?>
                                <div class="avaliacao-card" style="color: lightslategray">
                                    <?php echo $a['nomeCategoria'] ?>
                                </div>
                                <div class="negocio-card">
                                    <?php echo $a['nomeNegocioVendedora'] ?>
                                </div><?php
                                    } ?>
                        </div>
                    </a>
                <?php
                }

                ?>
            </div>
            <?php
            if (empty($pesquisa) && empty($categoria) && empty($tipo)) {
            ?>
                <div class="filtro-pesquisa">
                    <div class="filtro-title">
                        <?php

                        echo isset($pesquisa) && !empty($pesquisa) ? "Procurando por vendedoras com \"" . $pesquisa . "\"" : "Vendedoras"

                        ?>
                    </div>
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

                <div class="carrossel-cards load">

                    <?php
                    if (isset($categoria) && isset($pesquisa)) {
                        $vendedoras = daoVendedora::pesquisarVendedoraNomeDescricaoCategoria($categoria, $pesquisa);
                    } else if (isset($categoria)) {
                        $vendedoras = daoVendedora::pesquisarVendedoraCategoria($categoria);
                    } else if (isset($pesquisa)) {
                        $vendedoras = daoVendedora::pesquisarVendedoraNome($pesquisa);
                    } else {
                        $vendedoras = daoVendedora::listar();
                    }
                    $anuncios = daoAnuncio::listar();

                    foreach ($vendedoras as $a) {
                        $estrelas = daoAnuncio::consultarMediaVendedora($a['idVendedora']);
                        $totalanuncios = daoAnuncio::contarAnuncioVendedora($a['idVendedora'])
                    ?>
                        <a class="card-vendedora" href="profile.php?user=<?php echo $a['nomeUsuarioNegocioVendedora'] ?> ">
                            <div class="img-vendedora">
                                <img src="../<?php echo $a['fotoNegocioVendedora'] ?>" alt="<?php echo $a['nomeNegocioVendedora'] ?>" />
                            </div>

                            <div class="nome-vendedora"><?php echo $a['nomeNegocioVendedora'];
                                                        if ($a['nivelNegocioVendedora'] == 1) {
                                                        ?>
                                    <i class="bi bi-gem highlight"></i>
                                <?php
                                                        }
                                ?>
                            </div>
                            <?php
                            if ($a['nivelNegocioVendedora'] == 1) {
                            ?>
                                <div class="estrelas-vendedora highlight">
                                    <?php

                                    for ($i = 0; $i < $estrelas; $i += 1) {
                                    ?>
                                        <i class="bi bi-star-fill"></i>
                                    <?php
                                    }
                                    for ($i = 0; $i < 5 - $estrelas; $i++) {
                                    ?>
                                        <i class="bi bi-star"></i>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="anuncios-vendedora"><?php echo $totalanuncios ?> anúncios</div>
                            <?php
                            } else {
                            ?> <div class="anuncios-vendedora"><?php echo $totalanuncios ?> anúncios</div>
                            <?php
                            }
                            ?>
                        </a>
                    <?php
                    }
                    ?>
                </div>
    </div>
<?php
            }
?>

</main>
</div>

<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/script.js"></script>
<script src="../assets/vendor/flickity/js/flickity.pkgd.min.js"></script>
<script>
    var elem = document.querySelectorAll(".carrossel-cards")

    elem.forEach((item) => {
        new Flickity(item, {
            cellAlign: "left",
            prevNextButtons: false,
            pageDots: false,
            resize: false,
            contain: true,
        });
    });

    var carro = document.querySelector("#carrossel")

    new Flickity(carro, {
        prevNextButtons: false,
        pageDots: true,
        resize: true,
        contain: false,
        lazyLoad: true,
        wrapAround: true,
        autoPlay: 1500
    });
</script>
<script>
      function atualizarSubcategorias() {
        var categoriaSelecionada = document.getElementById("categoria").value;
        var subcategoriaDropdown = document.getElementById("subcategoria");

        subcategoriaDropdown.innerHTML = '<option value="" selected>Subcategoria</option>';

        if (categoriaSelecionada !== "") {
            subcategoriaDropdown.classList.remove('hide')

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var subcategorias = JSON.parse(xhr.responseText);

                    subcategorias.forEach(function(sub) {
                        var option = document.createElement("option");
                        option.value = sub.idSubCategoria;
                        option.text = sub.nomeSubCategoria;
                        subcategoriaDropdown.add(option);
                    });
                }
            };

            xhr.open("GET", "../api/subcategoria/search.php?categoria=" + categoriaSelecionada, true);
            xhr.send();
        }else{
            subcategoriaDropdown.classList.add('hide')
        }
    }
</script>
</body>

</html>
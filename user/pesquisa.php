<?php

require_once "validador.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="user">
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
                <a href="pesquisa.php" class="nav-link active">
                    <i class="bi bi-search-heart"></i>
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
            <div id="pesquisa">
                <div class="search-container">
                    <input type="text" role="search" placeholder="Pesquisa" class="search-field">
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
                        <select class="select-filtro" name="tipo" id="filtro-tipo">
                            <option selected>Tipo</option>
                            <option value="1">Produto</option>
                            <option value="2">Serviço</option>
                        </select>
                        <select class="select-filtro" name="preco" id="filtro-preco">
                            <option selected>Preço</option>
                            <option value="<10">
                                < R$10 </option>
                            <option value="<25">
                                < R$25 </option>
                            <option value="<40">
                                < R$40</option>
                            <option value="<50">
                                < R$50 </option>
                            <option value="<75">
                                < R$75 </option>
                        </select>
                        <select class="select-filtro" name="distancia" id="filtro-distancia">
                            <option selected>Distância</option>
                            <option value="1">
                                < 1km</option>
                            <option value="2">
                                < 2km</option>
                            <option value="3">
                                < 5km</option>
                            <option value="4">
                                < 10km</option>
                            <option value="5">
                                < 15km</option>
                        </select>
                        <select class="select-filtro" name="categoria" id="filtro-categoria">
                            <option selected>Categoria</option>
                            <option value="1">Artesanato</option>
                            <option value="2">Culinária</option>
                            <option value="3">Manicure</option>
                            <option value="4">Roupas</option>
                            <option value="5">Joias</option>
                            <option value="6">Livros</option>
                        </select>
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
                    <a class="card-anuncio" href="produto.php">
                        <div class="img-card">
                            <img src="../assets/img/products-services/cadernos-artesanais.jpg">
                        </div>
                        <div class="info-card">
                            <div class="nome-card">
                                Cadernos artesanais
                            </div>
                            <div class="preco-card">
                                R$25,00
                            </div>
                            <div class="avaliacao-card">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                            <div class="categoria-card">
                                Artesanato
                            </div>
                            <div class="negocio-card">
                                Cantinho da Arte
                            </div>
                        </div>
                    </a>
                    <a class="card-anuncio" href="produto.php">
                        <div class="img-card">
                            <img src="../assets/img/products-services/francesinha.jpeg">
                        </div>
                        <div class="info-card">
                            <div class="nome-card">
                                Francesinha
                            </div>
                            <div class="preco-card">
                                R$20,00
                            </div>
                            <div class="avaliacao-card">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <div class="categoria-card">
                                Manicure
                            </div>
                            <div class="negocio-card">
                                Mulher Maravilha
                            </div>
                        </div>
                    </a>
                    <a class="card-anuncio" href="produto.php">
                        <div class="img-card">
                            <img src="../assets/img/products-services/bolo-laranja.jpg">
                        </div>
                        <div class="info-card">
                            <div class="nome-card">
                                Bolo de Laranja
                            </div>
                            <div class="preco-card">
                                R$20,00
                            </div>
                            <div class="avaliacao-card">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="categoria-card">
                                Culinária
                            </div>
                            <div class="negocio-card">
                                Açúcar e Canela
                            </div>
                        </div>
                    </a>
                    <a class="card-anuncio" href="produto.php">
                        <div class="img-card">
                            <img src="../assets/img/products-services/bolo-chocolate.jpg">
                        </div>
                        <div class="info-card">
                            <div class="nome-card">
                                Bolo de Chocolate
                            </div>
                            <div class="preco-card">
                                R$25,00
                            </div>
                            <div class="avaliacao-card">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="categoria-card">
                                Culinária
                            </div>
                            <div class="negocio-card">
                                Açúcar e Canela
                            </div>

                        </div>
                    </a>
                    <a class="card-anuncio" href="produto.php">
                        <div class="img-card">
                            <img src="../assets/img/products-services/sabonetes.jpg">
                        </div>
                        <div class="info-card">
                            <div class="nome-card">
                                Sabonetes Artesanais de Lavanda
                            </div>
                            <div class="preco-card">
                                R$12,00
                            </div>
                            <div class="avaliacao-card">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                            <div class="categoria-card">
                                Beleza
                            </div>
                            <div class="negocio-card">
                                Ana Rodrigues
                            </div>
                        </div>
                    </a>
                    <a class="card-anuncio" href="produto.php">
                        <div class="img-card">
                            <img src="../assets/img/products-services/pano-de-prato.jpg">
                        </div>
                        <div class="info-card">
                            <div class="nome-card">
                                Pano de Prato Bordado
                            </div>
                            <div class="preco-card">
                                R$25,00
                            </div>
                            <div class="avaliacao-card">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </div>
                            <div class="categoria-card">
                                Artesanato
                            </div>
                            <div class="negocio-card">
                                Maria Santos
                            </div>
                        </div>
                    </a>
                    <a class="card-anuncio" href="produto.php">
                        <div class="img-card">
                            <img src="../assets/img/products-services/conjunto-de-velas.jpg">
                        </div>
                        <div class="info-card">
                            <div class="nome-card">
                                Conjunto de Velas Perfumadas
                            </div>
                            <div class="preco-card">
                                R$35,00
                            </div>
                            <div class="avaliacao-card">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="categoria-card">
                                Decoração
                            </div>
                            <div class="negocio-card">
                                Isabella Silva
                            </div>
                        </div>
                    </a>
                    <a class="card-anuncio" href="produto.php">
                        <div class="img-card">
                            <img src="../assets/img/products-services/oleo-essencial-de-lavanda-10ml.jpg">
                        </div>
                        <div class="info-card">
                            <div class="nome-card">
                                Óleo Essencial Relaxante de Lavanda 10ml
                            </div>
                            <div class="preco-card">
                                R$30,00
                            </div>
                            <div class="avaliacao-card">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="categoria-card">
                                Bem estar
                            </div>
                            <div class="negocio-card">
                                Luísa Oliveira
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </main>

    </div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
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
    <div id="user-ads">
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
                        Encomendas
                    </span>
                </a>
                <a href="meus-anuncios.php" class="nav-link active">
                    <i class="bi bi-box-seam-fill"></i>
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
            <div id="welcome">
                <h2>Seus anúncios</h2>
            </div>
            <div id="content">
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
                                }else {?>
                                <div class="avaliacao-card" style="color: lightslategray">
                                    <?php echo $a['nomeCategoria'] ?>
                                </div>
                                <div class="negocio-card">
                                    <?php echo $a['nomeNegocioVendedora'] ?>
                                </div><?php
                                }?>
                            </div>
                        </a>
                    <?php
                    }
                    ?>

                </div>
            </div>

        </main>
    </div>


    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
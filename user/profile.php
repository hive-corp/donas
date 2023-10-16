<?php

require_once "validador.php";
require_once "global.php";

if (isset($_GET['user'])) {
    $vendedora = new Vendedora();
    $vendedora->setNomeUsuarioNegocioVendedora($_GET['user']);
    $dados = daoVendedora::consultarPorNomeUsuario($vendedora);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($dados['nomeNegocioVendedora']) ? $dados['nomeNegocioVendedora'] :  'Nada foi encontrado.' ?></title>
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
				<a href="#" class="nav-link mobile-hide">
					<i class="bi bi-box-seam"></i>
					<span>
						Seus pedidos
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
                <?php echo isset($dados['nomeNegocioVendedora']) ? $dados['nomeNegocioVendedora'] :  'Nada foi encontrado.' ?>
            </div>
            <div id="content">
                <?php if (isset($dados['nomeNegocioVendedora'])) { ?>
                    <div id="negocio-bio">
                        <div id="bio-photo">
                            <img src="../<?php echo $dados['fotoNegocioVendedora'] ?>" alt="">
                        </div>
                        <div id="bio-info">
                            <div id="bio-name">
                                <?php echo $dados['nomeNegocioVendedora'] ?>
                                <div class="dropdown-start dropdown">
                                    <button id="options-profile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-start dropdown-sobe">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi bi-exclamation-triangle"></i>
                                                Denunciar
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="conversas.php?username=<?php echo $dados['nomeUsuarioNegocioVendedora']?>">
                                                <i class="bi bi-chat"></i>
                                                Iniciar conversa
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="bio-username">@<?php echo $dados['nomeUsuarioNegocioVendedora'] ?></div>
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
                            <?php
                            $qtdprodutos = daoAnuncio::contarAnuncioProduto($dados['idVendedora']);

                            ?>
                            <span><?php echo $qtdprodutos ?></span> Produtos
                        </div>
                        <div class="negocio-information">
                            <i class="bi bi-grid"></i>
                            <?php
                            $qtdservicos = daoAnuncio::contarAnuncioServico($dados['idVendedora']);

                            ?>
                            <span><?php echo $qtdservicos ?></span> Serviços
                        </div>
                        <div class="negocio-information">
                            <i class="bi bi-people"></i>
                            <span>35</span> Seguidores
                        </div>
                    </div>
                    <div id="bio-products">
                        <?php

                        $anuncios = daoAnuncio::listarAnunciosVendedora($dados['idVendedora']);

                        foreach ($anuncios as $a) {

                            $qtdestrelas = $a['estrelasAnuncio'];

                        ?>
                            <a class="bio-product" href="anuncio.php?a=<?php echo $a['idAnuncio'] ?>">
                                <img src="../<?php echo $a['imagemPrincipalAnuncio'] ?>" />
                            </a>

                        <?php
                        }

                        ?>
                    </div>
                <?php
                } else {
                ?>
                    <h2 class="mx-auto my-auto">Nenhum negócio com esse nome foi encontrado.</h2>
                <?php
                } ?>
            </div>
        </main>
    </div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>
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
    <link rel="shortcut icon" href="../assets/media/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../assets/css/styles.css" />
</head>

<body>
    <div id="user-profile">
        <div class="modal pop" id="modal-denuncia" tabindex="-1" aria-labelledby="modal-denuncia" aria-hidden="true">
            <form id="form-denuncia" class="modal-dialog modal-dialog-centered needs-validation" action="nova-denuncia.php?user=<?php echo $_GET['user'] ?>" method="post" novalidate>
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Nova denúncia</h1>
                    </div>
                    <div class="modal-body">
                        <div class="input input-denunciante">
                            <label class="form-label">Nome do denunciante<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" disabled value="<?php echo $_SESSION['nome'] ?>">
                            </div>
                            <div class="invalid-feedback">
                                Insira um nome para o anúncio
                            </div>
                        </div>
                        <div class="input input-denunciado">
                            <label class="form-label" for="nome-denunciado">Nome do negócio<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" disabled value="<?php echo $dados['nomeNegocioVendedora'] ?>">
                            </div>
                        </div>
                        <div class="input input-motivo">
                            <label class="form-label" for="motivo">Motivo da denúncia<span>*</span></label>
                            <div class="input-wrapper">
                                <select name="motivo" id="motivo" required>
                                    <option value="1">Propaganda enganosa</option>
                                    <option value="2">Assédio</option>
                                    <option value="3">Atividades ilegais</option>
                                    <option value="4">Ofensas</option>
                                    <option value="5">Falta de segurança</option>
                                    <option value="6">Se passando por outra pessoa</option>
                                </select>
                            </div>
                            <div class="invalid-feedback">
                                Insira um motivo da denúncia
                            </div>
                        </div>
                        <div class="input input-conteudo">
                            <label class="form-label" for="conteudo">Conteúdo<span>*</span></label>
                            <div class="input-wrapper">
                                <textarea name="conteudo" id="conteudo" cols="30" rows="6" required></textarea>
                            </div>
                            <div class="invalid-feedback">
                                Informe o conteúdo da denúncia
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="button" data-bs-dismiss="modal">Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal pop" id="modal-sucesso" tabindex="-1" aria-labelledby="modal-sucesso" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Denúncia realizada com sucesso!</h1>
                    </div>
                    <div class="modal-body d-flex flex-column text-center">
                        <i class="bi bi-check-circle"></i>
                        Denúncia realizada com sucesso!
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                    </div>
                </div>
            </div>
        </div>
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
                        if (daoNotifcCliente::contarNotificacoes($_SESSION['id'])) {
                        ?>
                            <span class="counter">
                                <?php
                                echo daoNotifcCliente::contarNotificacoes($_SESSION['id']);
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
                                <?php echo $dados['nomeNegocioVendedora'];
                                if ($dados['nivelNegocioVendedora'] == 1) {
                                ?>
                                    <i class="bi bi-gem highlight" id="bio-star"></i>
                                <?php
                                }
                                ?>
                            </div>
                            <div id="bio-rating">
                                <?php
                                $qtdestrelas = ceil(daoAnuncio::consultarMediaVendedora($dados['idVendedora']));

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
                            <div id="bio-dropdown">
                                <div class="dropdown-start dropdown">
                                    <button class="options-button" id="options-bio" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-start dropdown-sobe">
                                        <li>
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-denuncia" href="#">
                                                <i class="bi bi-exclamation-triangle"></i>
                                                Denunciar
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="conversas.php?username=<?php echo $dados['nomeUsuarioNegocioVendedora'] ?>">
                                                <i class="bi bi-chat"></i>
                                                Iniciar conversa
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="bio-username">
                                @<?php echo $dados['nomeUsuarioNegocioVendedora'] ?>
                            </div>
                            <div id="bio-followers">
                                <?php
                                $qtdseguidores = daoSeguidor::contarSeguidor($dados['idVendedora']);

                                echo $qtdseguidores != 1 ? $qtdseguidores . " seguidores" : $qtdseguidores . " seguidor";
                                ?>
                            </div>
                            <div id="bio-desc"><?php echo $dados['bioNegocioVendedora'] ?></div>
                            <?php

                            $seguidor = new Seguidor();

                            $vendedora = new Vendedora();
                            $vendedora->setIdVendedora($dados['idVendedora']);

                            $cliente = new Cliente();
                            $cliente->setIdCliente($_SESSION['id']);

                            $seguidor->setCliente($cliente);
                            $seguidor->setVendedora($vendedora);

                            $isFollowed = daoSeguidor::consultaSeguidor($seguidor);
                            ?>
                            <a href="<?php echo $isFollowed ? "unfollow" : "follow" ?>.php?user=<?php echo $dados['nomeUsuarioNegocioVendedora'] ?>" class="button <?php echo $isFollowed ? "button-secondary" : "" ?> bio-option" id="bio-follow">
                                <?php echo $isFollowed ? "Parar de seguir" : "Seguir" ?>
                            </a>
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
    <script>
        var form = document.querySelector('#form-denuncia')
        form.addEventListener('submit', event => {
            event.preventDefault()
            event.stopPropagation()
            if (!form.checkValidity()) {
                form.classList.add('was-validated')
            } else {
                let formData = new FormData(form)

                fetch('../api/denuncia/?user=<?php echo $dados['nomeUsuarioNegocioVendedora'] ?>', {
                    method: 'POST',
                    header: {
                        'Accept': 'application/json',
                        'Content-type': 'application/json'
                    },
                    body: formData
                }).then(() => {
                    new bootstrap.Modal('#modal-sucesso').toggle()
                    setTimeout(() => location.reload(), 2500)
                })
            }
        })
    </script>
</body>

</html>
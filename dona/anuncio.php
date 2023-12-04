<?php

require_once "validador.php";
require_once "global.php";

if (isset($_GET['a'])) {
    $anuncio = new Anuncio();
    $anuncio->setIdAnuncio($_GET['a']);

    $vendedora = new Vendedora();
    $vendedora->setIdVendedora($_SESSION['id']);
    $anuncio->setVendedora($vendedora);

    $anuncio = daoAnuncio::consultarPorVendedoraId($anuncio);
}
$dados = daoVendedora::consultarPorId($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($anuncio['nomeAnuncio']) ? $anuncio['nomeAnuncio'] :  'Nada foi encontrado.' ?></title>

    <link rel='stylesheet' href='../assets/vendor/cropperjs/css/cropper.css'>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/media/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="user-product">
        <div class="modal pop" id="modal-excluir" tabindex="-1" aria-labelledby="modal-cancelar" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Tem certeza?</h1>
                    </div>
                    <div class="modal-body  text-center">
                        Você está prestes a excluir o anúncio <h5 class="highlight"><?php echo $anuncio['nomeAnuncio'] ?></h5>Ao excluir, não será mais possível ter acesso a ele novamente, e <span class="highlight">todos os dados serão deletados</span>.
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a href="excluir-anuncio.php?a=<?php echo $anuncio['idAnuncio'] ?>" class="button button-red" id="cancelar-pedido">OK</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal pop" id="modal-editar" tabindex="-1" aria-labelledby="modal-editar" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <form class="modal-content" class="needs-validation" method='post' novalidate>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Editar anúncio</h1>
                    </div>
                    <div class="modal-body">
                        <div id="new-form">
                            <div id="imagens-form">
                                <label for="foto-principal" id="foto-anuncio-cadastro">
                                    <img src="../<?php echo $anuncio['imagemPrincipalAnuncio'] ?>" id="preview-foto">
                                </label>
                                <input type="file" accept="image/*" name="foto-principal" id="foto-principal">
                                <div class="invalid-feedback">
                                    Insira uma foto
                                </div>
                            </div>
                            <div id="info-form">
                                <div class="input">
                                    <label class="form-label" for="nome-anuncio">Nome<span>*</span></label>
                                    <div class="input-wrapper">
                                        <input type="text" name="nome-anuncio" id="nome-anuncio-cadastro" required value="<?php echo $anuncio['nomeAnuncio'] ?>">
                                    </div>
                                    <div class="invalid-feedback">
                                        Insira um nome para o anúncio
                                    </div>
                                </div>
                                <div class="input">
                                    <label class="form-label" for="tipo-new">Tipo</label>
                                    <div class="input-wrapper">
                                        <input type="text" disabled value="<?php echo $anuncio['tipoAnuncio'] == 1 ? "Serviço" : "Anúncio" ?>">
                                    </div>
                                </div>
                                <div class="input">
                                    <label class="form-label" for="preco">Preço<span>*</span></label>
                                    <div class="input-wrapper">
                                        <input type="number" name="preco" id="preco" required value="<?php echo $anuncio['valorAnuncio'] ?>">
                                    </div>
                                    <div class="invalid-feedback">
                                        Insira um preço para o anúncio
                                    </div>
                                </div>

                                <div class="input">
                                    <label class="form-label" for="preco-custo">Preço de custo<span>*</span></label>
                                    <div class="input-wrapper">
                                        <input type="number" name="preco-custo" id="preco-custo" required step="0.01" onblur="adicionarCasasDecimais(this)" value="<?php echo $anuncio['precoCustoAnuncio'] ?>">
                                    </div>
                                    <div class="invalid-feedback">
                                        Insira um preço de custo para o anúncio
                                    </div>
                                </div>
                                <div class="input" id="qtd-anuncio" <?php echo $anuncio['tipoAnuncio'] == 1 ? "" : "style='display: block;'" ?>>
                                    <label class="form-label" for="estoque">Estoque<span>*</span></label>
                                    <div class="input-wrapper">
                                        <input type="number" name="estoque" id="estoque" value="<?php echo $anuncio['qtdProduto'] ?>">
                                    </div>
                                    <div class="invalid-feedback">
                                        Informe um valor inicial de estoque
                                    </div>
                                </div>
                                <div class="input">
                                    <label class="form-label" for="desc">Descrição<span>*</span></label>
                                    <div class="input-wrapper">
                                        <textarea name="desc" id="desc" cols="30" rows="6" required><?php echo $anuncio['descricaoAnuncio'] ?></textarea>
                                    </div>
                                    <div class="invalid-feedback">
                                        Insira a descrição do seu anúncio
                                    </div>
                                </div>
                                <div class="input">
                                    <label class="form-label">Subcategorias<span>*</span></label>
                                    <div id="subcategorias">

                                        <?php
                                        $subCategorias = daoSubCategoria::listarPorCategoria($_SESSION['categoria-id']);

                                        $subCategoriasAnuncio = daoAnuncioSubCategoria::listarAnuncio($anuncio['idAnuncio']);

                                        foreach ($subCategorias as $sub) {
                                        ?>
                                            <label for="<?php echo $sub['nomeSubCategoria'] ?>">
                                                <input type="checkbox" class="form-check-input checkbox-subCategoria" name="subCategorias" id="<?php echo $sub['nomeSubCategoria'] ?>" value="<?php echo $sub['idSubCategoria'] ?>" <?php if (in_array($sub['idSubCategoria'], array_column($subCategoriasAnuncio, 'idSubCategoria'))) echo "checked" ?>>
                                                <?php echo $sub['nomeSubCategoria'] ?>
                                            </label>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="button" data-bs-dismiss="modal" id="salvar">Salvar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal pop" id="modal-sucesso" tabindex="-1" aria-labelledby="modal-sucesso" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Anúncio alterado com sucesso!</h1>
                    </div>
                    <div class="modal-body d-flex flex-column text-center">
                        <i class="bi bi-check-circle"></i>
                        Alteração feita com sucesso!
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal pop" id="modal-foto" tabindex="-1" aria-labelledby="modal-foto" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Recorte da foto</h1>
                    </div>
                    <div class="modal-body">
                        <div class="result-crop new-ad"></div>
                    </div>
                    <div class="modal-footer d-flex justify-content-around">
                        <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="button" data-bs-dismiss="modal" id="confirmar-foto">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>

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
            <!-- <img src="../assets/media/rosas.svg" class="rosa-fundo"> -->
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
                            <div class="dropdown" id="editar-anuncio">
                                <button id="options-anuncio" class="options-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-end dropdown-sobe">
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-editar">
                                            <i class="bi bi-pen"></i>
                                            Editar anúncio
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-excluir">
                                            <i class="bi bi-trash"></i>
                                            Excluir anúncio
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="nome-anuncio">
                                <?php echo $anuncio['nomeAnuncio'] ?>
                            </div>
                            <div id="preco-anuncio">
                                R$<?php echo number_format($anuncio['valorAnuncio'], 2, ',', '.') ?>
                            </div>
                            <?php if ($dados['nivelNegocioVendedora'] == 1) {
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
                            <?php
                            } ?>
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
                <h2 class="mx-auto my-auto position-absolute">Nenhum anúncio foi encontrado.</h2>
            <?php
            } ?>
            <!-- <img src="../assets/media/rosas.svg" class="rosa-fundo"> -->
        </main>

    </div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src='../assets/vendor/cropperjs/js/cropper.js'></script>

    <script>
        var form = document.querySelector('form'),
            fotoInput = document.querySelector('#foto-principal'),
            result = document.querySelector('.result-crop'),
            confirmarFoto = document.querySelector('#confirmar-foto'),
            fotoPreview = document.querySelector('#preview-foto'),
            confirmarAlteracao = document.querySelector('#salvar')

        form.addEventListener('submit', event => {
            event.preventDefault()
            event.stopPropagation()
            if (!form.checkValidity()) {
                form.classList.add('was-validated')
            } else {
                let inputFoto = document.querySelector('#foto-principal'),
                    AnuncioSubCategoriaCheck = document.querySelectorAll('input[name=subCategorias]:checked')

                let AnuncioSubCategoria = []

                AnuncioSubCategoriaCheck.forEach(item => {
                    AnuncioSubCategoria.push(item.value)
                })

                if (inputFoto.value != '') {
                    let canvas = cropper.getCroppedCanvas({
                        width: 512,
                        height: 512
                    })

                    canvas.toBlob(function(blob) {
                        let formData = new FormData()

                        formData.append('foto', blob, 'photo.png')
                        formData.append('nome', document.getElementById('nome-anuncio-cadastro').value)
                        formData.append('desc', document.getElementById('desc').value)
                        formData.append('valor', document.getElementById('preco').value)
                        formData.append('preco-custo', document.getElementById('preco-custo').value)
                        formData.append('qtd', document.getElementById('estoque').value)
                        formData.append('AnuncioSubCategoria', JSON.stringify(AnuncioSubCategoria))

                        fetch('../api/anuncio/editar-anuncio.php?a=<?php echo $anuncio['idAnuncio'] ?>', {
                            method: 'POST',
                            header: {
                                'Accept': 'application/json',
                                'Content-type': 'application/json'
                            },
                            body: formData
                        }).then(() => {
                            new bootstrap.Modal('#modal-sucesso').toggle()
                            setTimeout(() => location.reload(), 1500)
                        })
                    })
                } else {
                    let formData = new FormData()

                    formData.append('nome', document.getElementById('nome-anuncio-cadastro').value)
                    formData.append('desc', document.getElementById('desc').value)
                    formData.append('valor', document.getElementById('preco').value)
                    formData.append('preco-custo', document.getElementById('preco-custo').value)
                    formData.append('qtd', document.getElementById('estoque').value)
                    formData.append('AnuncioSubCategoria', JSON.stringify(AnuncioSubCategoria))

                    fetch('../api/anuncio/editar-anuncio.php?a=<?php echo $anuncio['idAnuncio'] ?>', {
                        method: 'POST',
                        header: {
                            'Accept': 'application/json',
                            'Content-type': 'application/json'
                        },
                        body: formData
                    }).then(() => {
                        new bootstrap.Modal('#modal-sucesso').toggle()
                        setTimeout(() => location.reload(), 1500)
                    })
                }
            }
        })


        fotoInput.addEventListener('change', e => {
            new bootstrap.Modal('#modal-foto').toggle()

            if (e.target.files.length) {
                const reader = new FileReader();
                reader.onload = e => {
                    if (e.target.result) {
                        let img = document.createElement('img');
                        img.id = 'image';
                        img.src = e.target.result;
                        result.innerHTML = '';
                        result.appendChild(img);

                        cropper = new Cropper(img, {
                            aspectRatio: 1 / 1,
                            dragMode: 'move',
                            guides: false,
                            minContainerHeight: 250,
                            minContainerWidth: 250,
                            viewMode: 1,
                        });
                    }
                };
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        confirmarFoto.addEventListener('click', e => {
            e.preventDefault();
            let imgSrc = cropper.getCroppedCanvas({
                maxWidth: 1024,
                fillColor: 'white'
            }).toDataURL('image/jpeg');

            fotoPreview.src = imgSrc;
        });
    </script>
</body>

</html>
<?php

require_once "validador.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo produto/serviço</title>


    <link rel='stylesheet' href='../assets/vendor/cropperjs/css/cropper.css'>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="shortcut icon" href="../assets/media/favicon.ico" type="image/x-icon" />

</head>

<body>
    <div class="modal pop" id="modal-sucesso" tabindex="-1" aria-labelledby="modal-sucesso" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Anúncio cadastrado com sucesso!</h1>
                </div>
                <div class="modal-body d-flex flex-column text-center">
                    <i class="bi bi-check-circle"></i>
                    Cadastro do anúncio feito com sucesso!
                </div>
                <div class="modal-footer d-flex justify-content-around">
                </div>
            </div>
        </div>
    </div>

    <div class="modal pop" id="modal-erro" tabindex="-1" aria-labelledby="modal-erro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">OPS!</h1>
                </div>
                <div class="modal-body d-flex flex-column text-center">
                    <i class="bi bi-x-circle"></i>
                    Ocorreu algum erro ao cadastrar. Verifique se todos os campos do formulário foram preenchidos
                    corretamente.
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button" data-bs-dismiss="modal">OK</button>
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

    <div class="modal pop" id="modal-anuncio" tabindex="-1" aria-labelledby="modal-canuncioonfirma" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Informações do anúncio</h1>
                </div>
                <div class="modal-body">
                    <img src="assets/img/foto.png" alt="" class="foto-modal">
                    <div class="nome-modal">
                        <div class="form-label">Nome</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                    <div class="tipo-modal">
                        <div class="form-label">Tipo</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                    <div class="preco-modal">
                        <div class="form-label">Preço</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                    <div class="preco-custo-modal">
                        <div class="form-label">Preço de custo</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                    <div class="estoque-modal">
                        <div class="form-label">Estoque</div>
                        <div class="input-wrapper">
                        </div>
                    </div>

                    <div class="desc-modal">
                        <div class="form-label">Descrição</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                    <div class="sub-modal">
                        <div class="form-label">Subcategorias</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button button-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="button" class="button" data-bs-dismiss="modal" id="cadastrar">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <div id="user-new">
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
            <div id="main-title">
                Novo anúncio
            </div>
            <div id="content">
                <form class="needs-validation" method='POST' id="new-form" novalidate>
                    <img src="../assets/img/rosas.svg" class="rosa-fundo">
                    <div id="imagens-form">
                        <label for="foto-principal" id="foto-anuncio-cadastro">
                            <img src="../assets/media/foto.png" id="preview-foto">
                        </label>
                        <input type="file" accept="image/*" name="foto-principal" id="foto-principal" required>
                        <div class="invalid-feedback">
                            Insira uma foto
                        </div>
                    </div>
                    <div id="info-form">
                        <div class="input">
                            <label class="form-label" for="nome-anuncio">Nome<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="nome-anuncio" id="nome-anuncio-cadastro" required>
                            </div>
                            <div class="invalid-feedback">
                                Insira um nome para o anúncio
                            </div>
                        </div>
                        <div class="input">
                            <label class="form-label" for="tipo-new">Tipo<span>*</span></label>
                            <div class="input-wrapper">
                                <select name="tipo-new" id="tipo-new" required>
                                    <option value="1">Serviço</option>
                                    <option value="2">Produto</option>
                                </select>
                            </div>
                        </div>
                        <div class="input">
                            <label class="form-label" for="preco">Preço de venda<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="number" name="preco" id="preco" required step="0.01" onblur="adicionarCasasDecimais(this)">
                            </div>
                            <div class="invalid-feedback">
                                Insira um preço de venda para o anúncio
                            </div>
                        </div>
                        <div class="input">
                            <label class="form-label" for="preco-custo">Preço de custo<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="number" name="preco-custo" id="preco-custo" required step="0.01" onblur="adicionarCasasDecimais(this)">
                            </div>
                            <div class="invalid-feedback">
                                Insira um preço de custo para o anúncio
                            </div>
                        </div>
                        <div class="input" id="qtd-anuncio">
                            <label class="form-label" for="estoque">Estoque<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="number" name="estoque" id="estoque" min="1" value="1">
                            </div>
                            <div class="invalid-feedback">
                                Informe um valor inicial de estoque
                            </div>
                        </div>

                        <div class="input">
                            <label class="form-label" for="desc">Descrição<span>*</span></label>
                            <div class="input-wrapper">
                                <textarea name="desc" id="desc" cols="30" rows="6" required></textarea>
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

                                foreach ($subCategorias as $sub) {
                                ?>
                                    <label for="<?php echo $sub['nomeSubCategoria'] ?>">
                                        <input type="checkbox" class="form-check-input checkbox-subCategoria" name="subCategorias" id="<?php echo $sub['nomeSubCategoria'] ?>" value="<?php echo $sub['idSubCategoria'] ?>">
                                        <?php echo $sub['nomeSubCategoria'] ?>
                                    </label>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <button class="button button-square" id="salvar">
                        Criar anúncio
                    </button>
                    <img src="../assets/img/rosas.svg" class="rosa-fundo">
                </form>
            </div>
        </main>
    </div>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src='../assets/vendor/cropperjs/js/cropper.js'></script>

    <script>
        var tipoAnuncio = document.querySelector('#tipo-new'),
            estoque = document.querySelector('#qtd-anuncio'),
            form = document.querySelector('form'),
            fotoInput = document.querySelector('#foto-principal'),
            result = document.querySelector('.result-crop'),
            confirmarFoto = document.querySelector('#confirmar-foto'),
            fotoPreview = document.querySelector('#preview-foto'),
            confirmarCadastro = document.querySelector('#cadastrar'),
            estoqueModalssss = document.querySelector('.estoque-modal')
        form.addEventListener('submit', event => {
            event.preventDefault()
            event.stopPropagation()
            if (!form.checkValidity()) {
                new bootstrap.Modal('#modal-erro').toggle()
                form.classList.add('was-validated')
            } else {
                new bootstrap.Modal('#modal-anuncio').toggle()

                const nomeModal = document.querySelector('.nome-modal .input-wrapper'),
                    precoModal = document.querySelector('.preco-modal .input-wrapper'),
                    precoCustoModal = document.querySelector('.preco-custo-modal .input-wrapper'),
                    tipoModal = document.querySelector('.tipo-modal .input-wrapper'),
                    estoqueModal = document.querySelector('.estoque-modal .input-wrapper'),
                    descModal = document.querySelector('.desc-modal .input-wrapper'),
                    subModal = document.querySelector('.sub-modal .input-wrapper'),
                    AnuncioSubCategoriaCheck = document.querySelectorAll('input[name=subCategorias]:checked')

                let subcategorias = ""

                let AnuncioSubCategoria = []

                AnuncioSubCategoriaCheck.forEach(item => {
                    AnuncioSubCategoria.push(item.value)
                    subcategorias += `${item.id}, `
                })

                subcategorias = subcategorias.slice(0, -2)

                nomeModal.innerText = document.getElementById('nome-anuncio-cadastro').value
                precoModal.innerText = document.getElementById('preco').value
                precoCustoModal.innerText = document.getElementById('preco-custo').value
                tipoModal.innerText = document.getElementById('tipo-new').options[document.getElementById('tipo-new').selectedIndex].text
                estoqueModal.innerText = document.getElementById('estoque').value
                descModal.innerText = document.getElementById('desc').value

                if (subcategorias != "") {
                    subModal.innerText = subcategorias
                } else {
                    subModal.innerText = "Nenhum"
                }

                confirmarCadastro.addEventListener('click', () => {
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
                        formData.append('tipo', document.getElementById('tipo-new').options[document.getElementById('tipo-new').selectedIndex].value)
                        formData.append('qtd', document.getElementById('estoque').value)
                        formData.append('AnuncioSubCategoria', JSON.stringify(AnuncioSubCategoria))

                        fetch('../api/anuncio/', {
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
                })
            }
        })

        tipoAnuncio.addEventListener('change', e => {
            if (tipoAnuncio.selectedIndex == 1) {
                estoque.classList.add('show')
                document.querySelector('#estoque').setAttribute('required', true)
                return
            }

            estoque.classList.remove('show')
            document.querySelector('#estoque').setAttribute('required', false)

        })

        function atualizarVisibilidadeEstoque() {
            if (tipoAnuncio.value === '2') {
                // Se o tipo de anúncio for "Produto", mostrar a seção de estoque
                estoqueModalssss.style.display = 'block';
            } else {
                // Se não for "Produto", esconder a seção de estoque
                estoqueModalssss.style.display = 'none';
            }
        }

        tipoAnuncio.addEventListener('change', atualizarVisibilidadeEstoque);

        // Chamar a função para definir a visibilidade inicial com base no valor inicial do tipo
        atualizarVisibilidadeEstoque();


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
            document.querySelector('.foto-modal').src = imgSrc
        });
    </script>
    <script>
        function adicionarCasasDecimais(input) {
            // Adiciona .00 se não houver casas decimais
            if (input.value && !/\.\d{2}$/.test(input.value)) {
                // Adiciona .0 se houver apenas uma casa decimal
                if (/\.\d$/.test(input.value)) {
                    input.value += '0';
                }
                input.value += '.00';
            }
        }
    </script>

</body>

</html>
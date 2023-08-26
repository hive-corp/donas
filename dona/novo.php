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
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon" />

    <link rel='stylesheet' href='../assets/css/cropper.css'>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="modal pop" id="modal-foto" tabindex="-1" aria-labelledby="modal-foto" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Recorte da foto</h1>
                </div>
                <div class="modal-body">
                    <div class="result-crop"></div>
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="button" data-bs-dismiss="modal" id="confirmar-foto">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <div id="user-new">
        <nav id="nav">
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
                        Painel
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
                <a href="../">
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
                Novo produto ou serviço
            </div>
            <div id="content">
                <form class="needs-validation" action="/" method='post' id="new-form" novalidate>
                    <img src="../assets/img/rosas.svg" class="rosa-fundo">
                    <div id="imagens-form">
                        <label for="foto-principal" id="foto-anuncio">
                            <img src="../assets/img/foto.png" id="preview-foto">
                            <input type="file" name="foto-principal" id="foto-principal">
                        </label>
                    </div>
                    <div id="info-form">
                        <div class="input">
                            <label class="form-label" for="nome-anuncio">Nome<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="nome-anuncio" id="nome-anuncio" required>
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
                            <label class="form-label" for="preco">Preço<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="preco" id="preco" required>
                            </div>
                            <div class="invalid-feedback">
                                Insira um preço para o anúncio
                            </div>
                        </div>
                        <div class="input" id="qtd-produto">
                            <label class="form-label" for="estoque">Estoque<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="estoque" id="estoque">
                            </div>
                            <div class="invalid-feedback">
                                Informe um valor inicial de estoque
                            </div>
                        </div>
                        <div class="input">
                            <label class="form-label" for="email">Descrição<span>*</span></label>
                            <div class="input-wrapper">
                                <textarea name="" id="" cols="30" rows="6" required></textarea>
                            </div>
                            <div class="invalid-feedback">
                                Insira a descrição do seu anúncio
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
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src='../assets/js/cropper.js'></script>

    <script>
        var tipoAnuncio = document.querySelector('#tipo-new'),
            estoque = document.querySelector('#qtd-produto'),
            form = document.querySelector('form'),
            fotoInput = document.querySelector('#foto-principal'),
            result = document.querySelector('.result-crop'),
            confirmarFoto = document.querySelector('#confirmar-foto'),
            fotoPreview = document.querySelector('#preview-foto')

        form.addEventListener('submit', event => {
            event.preventDefault()
            event.stopPropagation()
            if (!form.checkValidity()) {
                form.classList.add('was-validated')
            } else {
                form.submit()
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
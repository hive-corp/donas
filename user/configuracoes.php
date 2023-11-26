<?php

require_once "validador.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/media/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/vendor/cropperjs/css/cropper.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div class="modal pop" id="modal-confirma-excluir" tabindex="-1" aria-labelledby="modal-erro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Tem certeza?</h1>
                </div>
                <div class="modal-body d-flex flex-column text-center">
                    Você está prestes a iniciar o processo de deleção de conta. Ao finalizar, não será mais possível recuperar suas informações.
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="button button-red" data-bs-toggle="modal" data-bs-target="#modal-excluir">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal pop" id="modal-preferencias" tabindex="-1" aria-labelledby="modal-preferencias" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Escolha suas preferências</h1>
                </div>
                <div class="modal-body text-center">
                    <div id="preferencias">
                        <div id="preferencias-grid">
                            <?php
                            $categorias = daoCategoria::listar();

                            $preferencias = daoPreferencias::listarUsuario($_SESSION['id']);
                            foreach ($categorias as $c) {
                            ?>
                                <input type="checkbox" class="checkbox-preferencia" name="categoria" id="<?php echo $c['nomeCategoria'] ?>" value="<?php echo $c['idCategoria'] ?>" <?php if (in_array($c['idCategoria'], array_column($preferencias, 'idCategoria'))) echo "checked" ?>>
                                <label class="card-categoria" for="<?php echo $c['nomeCategoria'] ?>">
                                    <div class="img-categoria">
                                        <img src="<?php echo $c['fotoCategoria'] ?>" alt="<?php echo $c['nomeCategoria'] ?>" />
                                    </div>
                                    <p class="nome-categoria"><?php echo $c['nomeCategoria'] ?></p>
                                </label>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <a href="#" class="highlight" data-bs-dismiss="modal">Sair</a>
                    <button class="button" id="confirmar-preferencias" data-bs-dismiss="modal">Concluir</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal pop" id="modal-excluir" tabindex="-1" aria-labelledby="modal-erro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Insira sua senha</h1>
                </div>
                <div class="modal-body d-flex flex-column">
                    <div class="input">
                        <label for="" class="form-label">Insira sua senha para confirmar</label>
                        <div class="input-wrapper">
                            <input type="password" id="pass-excluir">
                            <button id="hide-show-pass" type="button">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="button button-red" id="confirmar-delete">OK</button>
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
                    <div class="result-crop"></div>
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button button-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="button" data-bs-dismiss="modal" id="confirmar-foto">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal pop" id="modal-alterar" tabindex="-1" aria-labelledby="modal-alterar" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Confirmar alterações?</h1>
                </div>
                <div class="modal-body">
                    <img src="../<?php echo $_SESSION['foto'] ?>" alt="" class="foto-modal">
                    <div class="nome-modal">
                        <div class="form-label">Nome</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                    <div class="username-modal">
                        <div class="form-label">Nome de usuário</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                    <div class="email-modal">
                        <div class="form-label">E-mail</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                    <div class="endereco-modal">
                        <div class="form-label">Endereço</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button button-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="button" class="button" data-bs-dismiss="modal" id="salvar">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal pop" id="modal-sucesso" tabindex="-1" aria-labelledby="modal-sucesso" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Alterações realizadas com sucesso!</h1>
                </div>
                <div class="modal-body d-flex flex-column text-center">
                    <i class="bi bi-check-circle"></i>
                    As alterações na sua conta foram feitas com sucesso!
                </div>
                <div class="modal-footer d-flex justify-content-around">
                </div>
            </div>
        </div>
    </div>

    <div id="user-config">
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
                <a href="configuracoes.php" class="nav-link active">
                    <img src="../<?php echo $_SESSION['foto'] ?>" id="foto-usuario" />
                    <i class="bi bi-person-fill"></i>
                    <span>
                        Configurações
                    </span>
                </a>
            </div>
            <div id="user-info">
                <a>
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

        <div id="config">
            <div id="config-title">
                Configurações
            </div>
            <div id="list-configs">
                <div class="config-item" data-config-target="#seu-perfil" data-config-name="Seu perfil">
                    Sua conta
                </div>
                <a href="seus-pedidos.php" class="config-item">
                    Seus pedidos
                </a>
                <label for="noturno-slider" class="config-item">
                    Tema escuro
                    <label class="switch">
                        <input type="checkbox" id="noturno-slider">
                        <span class="slider"></span>
                    </label>
                </label>
                <a href="../logout.php" class="config-item">
                    Sair
                </a>
            </div>
        </div>
        <main id="main" class="hide">
            <div id="main-title">
                <button class="voltar hide" id="voltar-config" data-config-hide="">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <button class="voltar hide" id="voltar-perfil" data-config-hide="">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <span></span>
            </div>
            <div id="content">
                <div class="config-box hide" id="seu-perfil">
                    <div class="config-item" data-config-target="#editar-perfil" data-config-name="Editar perfil">
                        Editar informações
                    </div>
                    <div class="config-item" data-bs-toggle="modal" data-bs-target="#modal-preferencias">
                        Suas preferências
                    </div>
                    <div class="config-item" data-bs-toggle="modal" data-bs-target="#modal-confirma-excluir">
                        Excluir conta
                    </div>
                </div>
                <div class="config-box hide" id="editar-perfil">
                    <form class="needs-validation" method='post' id="edit-cliente-form" novalidate>
                        <div class="input input-foto">
                            <label for="foto" class="foto-circulo">
                                <img src="../<?php echo $_SESSION['foto'] ?>">
                            </label>
                            <input type="file" id="foto" accept="image/*">
                            <div class="invalid-feedback">
                                Insira uma foto.
                            </div>
                        </div>
                        <div class="input input-nome">
                            <label class="form-label" for="nome">Nome</label>
                            <div class="input-wrapper">
                                <input type="text" name="nome" id="nome" value="<?php echo $_SESSION['nome'] ?>">
                            </div>
                            <div class="invalid-feedback">
                                Insira um nome válido.
                            </div>
                        </div>
                        <div class="input input-user">
                            <label class="form-label" for="username">Nome de usuário</label>
                            <div class="input-wrapper">
                                <input type="text" name="username" id="username" value="<?php echo $_SESSION['username'] ?>">
                            </div>
                            <div class="invalid-feedback" id="username-feedback">
                                Insira um nome de usuário válido.
                            </div>
                        </div>
                        <div class="input input-email">
                            <label class="form-label" for="email">E-mail</label>
                            <div class="input-wrapper">
                                <input type="email" name="email" id="email" value="<?php echo $_SESSION['email'] ?>">
                            </div>
                            <div class="invalid-feedback" id="email-feedback">
                                Insira um e-mail válido.
                            </div>
                        </div>
                        <div class="input input-senha">
                            <label class="form-label" for="senha">Senha</label>
                            <div class="input-wrapper">
                                <input type="password" name="senha" id="senha" value="<?php echo $_SESSION['senha-normal'] ?>" disabled>
                            </div>
                            <div class="invalid-feedback" id="email-feedback">
                                Insira um e-mail válido.
                            </div>
                        </div>
                        <div class="input input-cep">
                            <label class="form-label" for="cep">CEP</label>
                            <div class="input-wrapper">
                                <input type="text" name="cep" id="cep" maxlength="9" value="<?php echo substr($_SESSION['cep'], 0, 5) . '-' . substr($_SESSION['cep'], 5) ?>" onblur="pesquisacep(this.value)">
                            </div>
                            <div class="invalid-feedback">
                                Insira um CEP válido.
                            </div>
                        </div>
                        <div class="input input-estado">
                            <label class="form-label" for="uf">Estado</label>
                            <div class="input-wrapper">
                                <input type="text" name="uf" id="uf" value="<?php echo $_SESSION['estado'] ?>">
                            </div>
                            <div class="invalid-feedback">
                                Insira um estado válido.
                            </div>
                        </div>
                        <div class="input input-bairro">
                            <label class="form-label" for="bairro">Bairro</label>
                            <div class="input-wrapper">
                                <input type="text" name="bairro" id="bairro" value="<?php echo $_SESSION['bairro'] ?>">
                            </div>
                            <div class="invalid-feedback">
                                Insira um bairro válido.
                            </div>
                        </div>
                        <div class="input input-cidade">
                            <label class="form-label" for="cidade">Cidade</label>
                            <div class="input-wrapper">
                                <input type="text" name="cidade" id="cidade" value="<?php echo $_SESSION['cidade'] ?>">
                            </div>
                            <div class="invalid-feedback">
                                Insira uma cidade válida.
                            </div>
                        </div>
                        <div class="input input-log">
                            <label class="form-label" for="log">Logradouro</label>
                            <div class="input-wrapper">
                                <input type="text" name="log" id="log" value="<?php echo $_SESSION['log'] ?>">
                            </div>
                            <div class="invalid-feedback">
                                Insira um logradouro válido.
                            </div>
                        </div>
                        <div class="input input-num">
                            <label class="form-label" for="numero">Número</label>
                            <div class="input-wrapper">
                                <input type="text" name="numero" id="numero" value="<?php echo $_SESSION['num'] ?>">
                            </div>
                            <div class="invalid-feedback">
                                Insira um número válido.
                            </div>
                        </div>
                        <div class="input input-comp">
                            <label class="form-label" for="complemento">Complemento</label>
                            <div class="input-wrapper">
                                <input type="text" name="complemento" id="complemento" value="<?php echo $_SESSION['comp'] ?>">
                            </div>
                            <div class="invalid-feedback">
                                Insira um complemento válido.
                            </div>
                        </div>
                        <div class="input input-avancar">
                            <button class="button button-square">
                                Salvar informações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/vendor/cropperjs/js/cropper.js"></script>
    <script>
        var config = document.querySelectorAll('[data-config-target]'),
            configMainTitle = document.querySelector('#main-title span'),
            boxes = document.querySelectorAll('.config-box'),
            main = document.querySelector('#main'),
            configs = document.querySelector('#config'),
            voltarConfig = document.querySelector('#voltar-config'),
            voltarPerfil = document.querySelector('#voltar-perfil'),
            campoSenha = document.querySelector('#pass-excluir'),
            btnSenha = document.querySelector('#hide-show-pass'),
            iconBtnSenha = document.querySelector('#hide-show-pass i'),
            confirmarDelete = document.querySelector('#confirmar-delete'),
            form = document.querySelector('form'),
            campoCep = document.querySelector('#cep'),
            fotoPreview = document.querySelector('.foto-circulo img'),
            fotoInput = document.querySelector('#foto'),
            confirmarFoto = document.querySelector('#confirmar-foto'),
            confirmarAlteracao = document.querySelector('#salvar'),
            result = document.querySelector('.result-crop'),
            confirmarPreferencias = document.querySelector('#confirmar-preferencias')

        confirmarPreferencias.addEventListener('click', () => {
            preferenciasCheck = document.querySelectorAll('input[name=categoria]:checked')

            let preferencias = []

            preferenciasCheck.forEach(item => {
                preferencias.push(item.value)
            })

            let formData = new FormData()
            formData.append('preferencias', JSON.stringify(preferencias))

            fetch('../api/preferencias/', {
                method: 'POST',
                header: {
                    'Accept': 'application/json',
                    'Content-type': 'application/json'
                },
                body: formData
            }).then(() => {
                new bootstrap.Modal('#modal-sucesso').toggle()
                setTimeout(() => location.reload(), 3500)
            })
        })

        form.addEventListener('submit', event => {
            event.preventDefault()
            event.stopPropagation()
            if (!form.checkValidity()) {
                new bootstrap.Modal('#modal-erro').toggle()
                form.classList.add('was-validated')
            } else {
                new bootstrap.Modal('#modal-alterar').toggle()

                const nomeModal = document.querySelector('.nome-modal .input-wrapper'),
                    emailModal = document.querySelector('.email-modal .input-wrapper'),
                    nascModal = document.querySelector('.nasc-modal .input-wrapper'),
                    usernameModal = document.querySelector('.username-modal .input-wrapper'),
                    enderecoModal = document.querySelector('.endereco-modal .input-wrapper'),
                    logradouro = document.getElementById('log').value,
                    bairro = document.getElementById('bairro').value,
                    cidade = document.getElementById('cidade').value,
                    uf = document.getElementById('uf').value,
                    numero = document.getElementById('numero').value,
                    complemento = document.getElementById('complemento').value,
                    cep = campoCep.value

                nomeModal.innerText = document.getElementById('nome').value
                usernameModal.innerText = document.getElementById('username').value
                emailModal.innerText = document.getElementById('email').value
                enderecoModal.innerText = `${logradouro}, ${numero} - ${bairro}, ${cidade} - ${uf}, ${cep} ${complemento != '' ? ' - ' + complemento : ''}`

                confirmarAlteracao.addEventListener('click', () => {
                    if (typeof cropper !== 'undefined') {
                        let canvas = cropper.getCroppedCanvas({
                            width: 512,
                            height: 512
                        })

                        canvas.toBlob(async function(blob) {
                            let formData = new FormData()

                            formData.append('foto', blob, 'photo.png')
                            formData.append('nome', document.getElementById('nome').value)
                            formData.append('username', document.getElementById('username').value)
                            formData.append('email', document.getElementById('email').value)
                            formData.append('pass', campoSenha.value)
                            formData.append('log', logradouro)
                            formData.append('num', numero)
                            formData.append('bairro', bairro)
                            formData.append('cidade', cidade)
                            formData.append('uf', uf)
                            formData.append('cep', cep.replace(/\D/g, ''))
                            formData.append('comp', complemento)

                            fetch('../api/cliente/edit-profile.php', {
                                method: 'POST',
                                header: {
                                    'Accept': 'application/json',
                                    'Content-type': 'application/json'
                                },
                                body: formData
                            }).then(() => {
                                new bootstrap.Modal('#modal-sucesso').toggle()
                                setTimeout(() => location.reload(), 3500)
                            })
                        })
                    } else {
                        let formData = new FormData()

                        formData.append('nome', document.getElementById('nome').value)
                        formData.append('username', document.getElementById('username').value)
                        formData.append('email', document.getElementById('email').value)
                        formData.append('pass', campoSenha.value)
                        formData.append('log', logradouro)
                        formData.append('num', numero)
                        formData.append('bairro', bairro)
                        formData.append('cidade', cidade)
                        formData.append('uf', uf)
                        formData.append('cep', cep.replace(/\D/g, ''))
                        formData.append('comp', complemento)

                        fetch('../api/cliente/edit-profile.php', {
                            method: 'POST',
                            header: {
                                'Accept': 'application/json',
                                'Content-type': 'application/json'
                            },
                            body: formData
                        }).then(() => {
                            new bootstrap.Modal('#modal-sucesso').toggle()
                            setTimeout(() => location.reload(), 3500)
                        })

                    }
                })
            }
        })

        function maskCep(e) {
            const input = e.target;
            const value = input.value.replace(/\D/g, '');

            let formattedValue = '';

            const match = value.match(/^(\d{0,5})(\d{0,3})$/);
            if (match) {
                const [, firstGroup, secondGroup] = match;
                if (firstGroup) formattedValue += firstGroup;
                if (secondGroup) formattedValue += '-' + secondGroup;
            }

            if (value.length != 8) {
                campoCep.classList.add('is-invalid')
            } else {
                campoCep.classList.remove('is-invalid')
            }

            input.value = formattedValue
        }
        campoCep.addEventListener('input', maskCep)

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


        confirmarDelete.addEventListener('click', () => {
            let formData = new FormData
            formData.append('pass', campoSenha.value)

            fetch('../api/cliente/check-pass.php', {
                    method: 'POST',
                    header: {
                        'Accept': 'application/json',
                        'Content-type': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.text())
                .then(async data => {
                    if (data == 'success') {
                        fetch('../api/cliente/delete-profile.php')
                            .then(() => location.replace('../logout.php'))
                    }
                })
        })

        btnSenha.addEventListener('click', () => {
            if (campoSenha.getAttribute('type') == 'text') {
                campoSenha.setAttribute('type', 'password')
                iconBtnSenha.classList.remove('bi-eye-slash')
                iconBtnSenha.classList.add('bi-eye')
            } else {
                campoSenha.setAttribute('type', 'text')
                iconBtnSenha.classList.remove('bi-eye')
                iconBtnSenha.classList.add('bi-eye-slash')
            }
        })

        config.forEach(item => {
            let box = document.querySelector(item.getAttribute('data-config-target'))
            item.addEventListener('click', () => {
                boxes.forEach(item => {
                    item.classList.add('hide')
                })
                box.classList.remove('hide')
                configs.classList.add('hide')
                main.classList.remove('hide')
                if (item.getAttribute('data-config-target') == '#seu-perfil') {
                    voltarConfig.classList.remove('hide')
                    voltarPerfil.classList.add('hide')
                } else {
                    voltarConfig.classList.add('hide')
                    voltarPerfil.classList.remove('hide')
                }
                configMainTitle.innerText = item.getAttribute('data-config-name')
            })
        })

        voltarConfig.addEventListener('click', () => {
            configs.classList.remove('hide')
            main.classList.add('hide')
            document.querySelector('#seu-perfil').classList.add('hide')
            voltarConfig.classList.add('hide')
            configMainTitle.innerText = ''
        })

        voltarPerfil.addEventListener('click', () => {
            document.querySelector('#editar-perfil').classList.add('hide')
            document.querySelector('#seu-perfil').classList.remove('hide')
            voltarPerfil.classList.add('hide')
            voltarConfig.classList.remove('hide')
            configMainTitle.innerText = 'Seu perfil'
        })



        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('log').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");

        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('log').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
                campoCep.classList.add('is-invalid')
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('log').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    </script>
</body>

</html>
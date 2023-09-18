<?php

require_once "validador.php";
require_once "global.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
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

    <div class="modal pop" id="modal-foto-user" tabindex="-1" aria-labelledby="modal-foto-user" aria-hidden="true">
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
                    <button type="button" class="button" data-bs-dismiss="modal" id="confirmar-foto-user">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal pop" id="modal-foto-empresa" tabindex="-1" aria-labelledby="modal-foto-empresa" aria-hidden="true">
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
                    <button type="button" class="button" data-bs-dismiss="modal" id="confirmar-foto-empresa">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal pop" id="modal-alterar-dona" tabindex="-1" aria-labelledby="modal-alterar-dona" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
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
                    <div class="email-modal">
                        <div class="form-label">E-mail</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button button-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="button" class="button" data-bs-dismiss="modal" id="confirmar-dona">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal pop" id="modal-alterar-negocio" tabindex="-1" aria-labelledby="modal-alterar-negocio" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Confirmar alterações?</h1>
                </div>
                <div class="modal-body">
                    <img src="../<?php echo $_SESSION['foto-empresa'] ?>" alt="" class="foto-modal">
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
                    <div class="tel-modal">
                        <div class="form-label">Telefone</div>
                        <div class="input-wrapper"></div>
                    </div>
                    <div class="cat-modal">
                        <div class="form-label">Categoria</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                    <div class="cnpj-modal">
                        <div class="form-label">CNPJ</div>
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
                    <button type="button" class="button button-secondary" data-bs-toggle="modal" data-bs-target="#modal-dona">Voltar</button>
                    <button type="button" class="button" data-bs-dismiss="modal" id="confirmar-negocio">Cadastrar</button>
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
                <a href="configuracoes.php" class="nav-link active">
                    <img src="../<?php echo $_SESSION['foto-empresa'] ?>" id="foto-usuario">
                    <i class="bi bi-person-fill"></i>
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
        <div id="config">
            <div id="config-title">
                Configurações
            </div>
            <div id="list-configs">
                <div class="config-item" data-config-target="#seu-perfil" data-config-name="Seu perfil">
                    Sua conta
                </div>
                <a href="notificacoes.php" class="config-item">
                    Notificações
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
                <button class="voltar hide" id="voltar-editar" data-config-hide="">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <span></span>
            </div>
            <div id="content">
                <div class="config-box hide" id="seu-perfil">
                    <div class="config-item" data-config-target="#editar-perfil" data-config-name="Editar perfil">
                        Editar informações
                    </div>
                    <div class="config-item" data-bs-toggle="modal" data-bs-target="#modal-confirma-excluir">
                        Excluir conta
                    </div>
                </div>
                <div class="config-box hide" id="editar-perfil">
                    <div class="config-item" data-config-target="#editar-pessoal" data-config-name="Editar informações pessoais">
                        Editar informações pessoais
                    </div>
                    <div class="config-item" data-config-target="#editar-negocio" data-config-name="Editar informações do negócio">
                        Editar informações do negócio
                    </div>
                </div>
                <div class="config-box hide" id="editar-pessoal">
                    <form class="needs-validation" method='post' id="edit-dona-form" novalidate>
                        <div class="input input-foto">
                            <label for="foto-user" class="foto-circulo">
                                <img src="../<?php echo $_SESSION['foto'] ?>">
                            </label>
                            <input type="file" id="foto-user" accept="image/*">
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
                                <input type="password" name="senha" id="senha" value="<?php echo $_SESSION['senha'] ?>" disabled>
                            </div>
                            <div class="invalid-feedback" id="email-feedback">
                                Insira uma senha válida.
                            </div>
                        </div>
                        <div class="input input-avancar">
                            <button class="button button-square">
                                Salvar informações
                            </button>
                        </div>
                    </form>
                </div>
                <div class="config-box hide" id="editar-negocio">
                    <form class="needs-validation" method='post' id="edit-negocio-form" novalidate>
                        <div class="input input-foto">
                            <label for="foto-empresa" class="foto-circulo">
                                <img src="../<?php echo $_SESSION['foto-empresa'] ?>">
                            </label>
                            <input type="file" id="foto-empresa" accept="image/*">
                            <div class="invalid-feedback">
                                Insira uma foto.
                            </div>
                        </div>
                        <div class="input input-nome">
                            <label class="form-label" for="nome">Nome</label>
                            <div class="input-wrapper">
                                <input type="text" name="nome" id="nome-empresa" value="<?php echo $_SESSION['nome-empresa'] ?>">
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
                        <div class="input input-cnpj">
                            <label class="form-label" for="cnpj">CNPJ</label>
                            <div class="input-wrapper">
                                <input type="text" name="cnpj" value="<?php echo substr($_SESSION['cnpj'], 0, 2) . '.' . substr($_SESSION['cnpj'], 2, 3) . '.' . substr($_SESSION['cnpj'], 5, 3) . '/' . substr($_SESSION['cnpj'], 8, 4) . '-' . substr($_SESSION['cnpj'], 12) ?>" id="cnpj" disabled>
                            </div>
                            <div class="invalid-feedback" id="cnpj-feedback">
                                Insira um CNPJ válido.
                            </div>
                        </div>
                        <div class="input input-cat">
                            <label class="form-label" for="categoria">Categoria</label>
                            <div class="input-wrapper">
                                <select name="categoria" id="categoria">
                                    <?php
                                    $categorias = daoCategoria::listar();

                                    foreach ($categorias as $c) {
                                    ?>
                                        <option value="<?php echo $c['idCategoria'] ?>" <?php if ($c['idCategoria'] == $_SESSION['categoria-id']) echo 'selected' ?>> <?php echo $c['nomeCategoria'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="invalid-feedback">
                                Insira uma categoria válida.
                            </div>
                        </div>
                        
                        <div class="input input-tel">
                            <label class="form-label" for="telefone">Telefone<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="tel" name="telefone" id="telefone" value="<?php echo "(".substr($_SESSION['tel'],0, 2).") ".(strlen($_SESSION['tel'])==11 ? (substr($_SESSION['tel'], 2, 5).'-'.substr($_SESSION['tel'], 7, 4)) : (substr($_SESSION['tel'], 2, 4).'-'.substr($_SESSION['tel'], 6, 4)))?>">
                            </div>
                            <div class="invalid-feedback">
                                Insira um telefone válido.
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
            voltarEditar = document.querySelector('#voltar-editar'),
            campoSenha = document.querySelector('#pass-excluir'),
            btnSenha = document.querySelector('#hide-show-pass'),
            iconBtnSenha = document.querySelector('#hide-show-pass i'),
            confirmarDelete = document.querySelector('#confirmar-delete'),
            formDona = document.querySelector('#edit-dona-form'),
            formNegocio = document.querySelector('#edit-negocio-form'),
            fotoUserPreview = document.querySelector('#edit-dona-form .foto-circulo img'),
            fotoEmpresaPreview = document.querySelector('#edit-negocio-form .foto-circulo img'),
            confirmarAlteracaoDona = document.querySelector('#confirmar-dona'),
            confirmarAlteracaoNegocio = document.querySelector('#confirmar-negocio'),
            fotoUser = document.querySelector('#foto-user'),
            fotoEmpresa = document.querySelector('#foto-empresa'),
            resultUser = document.querySelector('#modal-foto-user .result-crop'),
            resultEmpresa = document.querySelector('#modal-foto-empresa .result-crop'),
            confirmarFotoUser = document.querySelector('#confirmar-foto-user'),
            confirmarFotoEmpresa = document.querySelector('#confirmar-foto-empresa'),
            campoCep = document.querySelector('#cep'),
            campoCnpj = document.querySelector('#cnpj')

        formDona.addEventListener('submit', event => {
            event.preventDefault()
            event.stopPropagation()
            if (!formDona.checkValidity()) {
                new bootstrap.Modal('#modal-erro').toggle()
                formDona.classList.add('was-validated')
            } else {
                new bootstrap.Modal('#modal-alterar-dona').toggle()

                const nomeModal = document.querySelector('.nome-modal .input-wrapper'),
                    emailModal = document.querySelector('.email-modal .input-wrapper')

                nomeModal.innerText = document.getElementById('nome').value
                emailModal.innerText = document.getElementById('email').value

                confirmarAlteracaoDona.addEventListener('click', () => {
                    if (typeof cropperVendedora !== 'undefined') {
                        let canvas = cropperVendedora.getCroppedCanvas({
                            width: 512,
                            height: 512
                        })

                        canvas.toBlob(async function(blob) {
                            let formData = new FormData()

                            formData.append('foto', blob, 'photo.png')
                            formData.append('nome', document.getElementById('nome').value)
                            formData.append('email', document.getElementById('email').value)

                            fetch('../api/dona/edit-dona.php', {
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
                        })
                    } else {
                        let formData = new FormData()

                        formData.append('nome', document.getElementById('nome').value)
                        formData.append('email', document.getElementById('email').value)

                        fetch('../api/dona/edit-dona.php', {
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
            }
        })
        formNegocio.addEventListener('submit', event => {
            event.preventDefault()
            event.stopPropagation()
            if (!formNegocio.checkValidity()) {
                new bootstrap.Modal('#modal-erro').toggle()
                formNegocio.classList.add('was-validated')
            } else {
                new bootstrap.Modal('#modal-alterar-negocio').toggle()

                const nomeModal = document.querySelector('#modal-alterar-negocio .nome-modal .input-wrapper'),
                    usernameModal = document.querySelector('#modal-alterar-negocio .username-modal .input-wrapper'),
                    cnpjModal = document.querySelector('#modal-alterar-negocio .cnpj-modal .input-wrapper'),
                    categoriaNegocioModal = document.querySelector('#modal-alterar-negocio .cat-modal .input-wrapper'),
                    enderecoModal = document.querySelector('#modal-alterar-negocio .endereco-modal .input-wrapper'),
                    telefoneModal = document.querySelector('#modal-alterar-negocio .tel-modal .input-wrapper'),
                    logradouro = document.getElementById('log').value,
                    bairro = document.getElementById('bairro').value,
                    cidade = document.getElementById('cidade').value,
                    uf = document.getElementById('uf').value,
                    numero = document.getElementById('numero').value,
                    complemento = document.getElementById('complemento').value,
                    cep = campoCep.value

                nomeModal.innerText = document.getElementById('nome-empresa').value
                usernameModal.innerText = document.getElementById('username').value
                cnpjModal.innerText = document.getElementById('cnpj').value
                telefoneModal.innerText = document.getElementById('telefone').value
                enderecoModal.innerText = `${logradouro}, ${numero} - ${bairro}, ${cidade} - ${uf}, ${cep} ${complemento != '' ? ' - ' + complemento : ''}`
                categoriaNegocioModal.innerText = document.getElementById('categoria').options[document.getElementById('categoria').selectedIndex].text

                confirmarAlteracaoNegocio.addEventListener('click', async () => {
                    if (typeof cropperEmpresa !== 'undefined') {
                        let canvas = cropperEmpresa.getCroppedCanvas({
                            width: 512,
                            height: 512
                        })

                        canvas.toBlob(function(blob) {
                            let formData = new FormData()

                            formData.append('foto-empresa', blob, 'photo.png')
                            formData.append('nome-empresa', document.getElementById('nome-empresa').value)
                            formData.append('username-empresa', document.getElementById('username').value)
                            formData.append('telefone', document.getElementById('telefone').value.replace(/\D/g, ''))
                            formData.append('cnpj', campoCnpj.value.replace(/\D/g, ''))
                            formData.append('log', logradouro)
                            formData.append('num', numero)
                            formData.append('bairro', bairro)
                            formData.append('cidade', cidade)
                            formData.append('uf', uf)
                            formData.append('cep', cep.replace(/\D/g, ''))
                            formData.append('comp', complemento)
                            formData.append('categoria', document.getElementById('categoria').options[document.getElementById('categoria').selectedIndex].value)

                            fetch('../api/dona/edit-negocio.php', {
                                    method: 'POST',
                                    header: {
                                        'Accept': 'application/json',
                                        'Content-type': 'application/json'
                                    },
                                    body: formData
                                })
                                .then(() => {
                                    new bootstrap.Modal('#modal-sucesso').toggle()
                                    setTimeout(() => location.reload(), 2500)
                                })
                        })
                    } else {
                        let formData = new FormData()

                        formData.append('nome-empresa', document.getElementById('nome-empresa').value)
                        formData.append('username-empresa', document.getElementById('username').value)
                        formData.append('telefone', document.getElementById('telefone').value.replace(/\D/g, ''))
                        formData.append('cnpj', campoCnpj.value.replace(/\D/g, ''))
                        formData.append('log', logradouro)
                        formData.append('num', numero)
                        formData.append('bairro', bairro)
                        formData.append('cidade', cidade)
                        formData.append('uf', uf)
                        formData.append('cep', cep.replace(/\D/g, ''))
                        formData.append('comp', complemento)
                        formData.append('categoria', document.getElementById('categoria').options[document.getElementById('categoria').selectedIndex].value)

                        const response = await fetch('../api/dona/edit-negocio.php', {
                                method: 'POST',
                                header: {
                                    'Accept': 'application/json',
                                    'Content-type': 'application/json'
                                },
                                body: formData
                            })
                            .then(() => {
                                new bootstrap.Modal('#modal-sucesso').toggle()
                                setTimeout(() => location.reload(), 2500)
                            })
                    }
                })
            }
        })

        fotoUser.addEventListener('change', e => {
            new bootstrap.Modal('#modal-foto-user').toggle()

            if (e.target.files.length) {
                const reader = new FileReader();
                reader.onload = e => {
                    if (e.target.result) {
                        let img = document.createElement('img');
                        img.id = 'image';
                        img.src = e.target.result;
                        resultUser.innerHTML = '';
                        resultUser.appendChild(img);

                        cropperVendedora = new Cropper(img, {
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

        confirmarFotoUser.addEventListener('click', e => {
            e.preventDefault();
            let imgSrc = cropperVendedora.getCroppedCanvas({
                maxWidth: 1024,
                fillColor: 'white'
            }).toDataURL('image/jpeg');

            fotoUserPreview.src = imgSrc;
            document.querySelector('#modal-alterar-dona .foto-modal').src = imgSrc
        });

        fotoEmpresa.addEventListener('change', e => {
            new bootstrap.Modal('#modal-foto-empresa').toggle()

            if (e.target.files.length) {
                const reader = new FileReader();
                reader.onload = e => {
                    if (e.target.result) {
                        let img = document.createElement('img');
                        img.id = 'image';
                        img.src = e.target.result;
                        resultEmpresa.innerHTML = '';
                        resultEmpresa.appendChild(img);

                        cropperEmpresa = new Cropper(img, {
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

        confirmarFotoEmpresa.addEventListener('click', e => {
            e.preventDefault();
            let imgSrc = cropperEmpresa.getCroppedCanvas({
                maxWidth: 1024,
                fillColor: 'white'
            }).toDataURL('image/jpeg');

            fotoEmpresaPreview.src = imgSrc;
            document.querySelector('#modal-alterar-negocio .foto-modal').src = imgSrc
        });


        confirmarDelete.addEventListener('click', () => {
            let formData = new FormData
            formData.append('pass', campoSenha.value)

            fetch('../api/dona/check-pass.php', {
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
                        fetch('../api/dona/delete-profile.php')
                            .then(() => location.replace('../logout.php'))
                    }
                })
        })

        function maskCNPJ(event) {
            const input = event.target;
            const value = input.value.replace(/\D/g, '');

            let formattedValue = '';

            const match = value.match(/^(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})$/);
            if (match) {
                const [, firstGroup, secondGroup, thirdGroup, fourthGroup, lastGroup] = match;
                if (firstGroup) formattedValue += firstGroup;
                if (secondGroup) formattedValue += '.' + secondGroup;
                if (thirdGroup) formattedValue += '.' + thirdGroup;
                if (fourthGroup) formattedValue += '/' + fourthGroup;
                if (lastGroup) formattedValue += '-' + lastGroup;
            }


            if (value.length < 14) {
                campoCnpj.classList.add('is-invalid')
            } else {
                campoCnpj.classList.remove('is-invalid')
            }

            input.value = formattedValue;
        }

        function maskCep(event) {
            const input = event.target;
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

        campoCnpj.addEventListener('input', maskCNPJ)
        campoCep.addEventListener('input', maskCep)

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
                    voltarEditar.classList.add('hide')
                } else if (item.getAttribute('data-config-target') == '#editar-perfil') {
                    voltarConfig.classList.add('hide')
                    voltarPerfil.classList.remove('hide')
                    voltarEditar.classList.add('hide')
                } else {
                    voltarConfig.classList.add('hide')
                    voltarPerfil.classList.add('hide')
                    voltarEditar.classList.remove('hide')
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

        voltarEditar.addEventListener('click', () => {
            document.querySelector('#editar-negocio').classList.add('hide')
            document.querySelector('#editar-pessoal').classList.add('hide')
            document.querySelector('#editar-perfil').classList.remove('hide')

            voltarEditar.classList.add('hide')
            voltarPerfil.classList.remove('hide')
            configMainTitle.innerText = 'Editar perfil'
        })
    </script>
</body>

</html>
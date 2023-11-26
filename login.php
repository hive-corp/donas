<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="shortcut icon" href="assets/media/favicon.ico" type="image/x-icon">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">

</head>

<body>

    <div class="modal pop" id="modal-revisao" tabindex="-1" aria-labelledby="modal-revisao" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Sua conta está em revisão!</h1>
                </div>
                <div class="modal-body d-flex flex-column text-center">
                <i class="bi bi-x-circle"></i>
                    Sua conta de empreendedora está atualmente bloqueada.
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal pop" id="modal-erro" tabindex="-1" aria-labelledby="modal-erro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Usuário não encontrado!</h1>
                </div>
                <div class="modal-body d-flex flex-column text-center">
                    <i class="bi bi-x-circle"></i>
                    Não conseguimos encontrar uma conta cliente associada a esse e-mail e senha.
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal pop" id="modal-bloqueado-cliente" tabindex="-1" aria-labelledby="modal-bloqueado-cliente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Sua conta está em revisão!</h1>
                </div>
                <div class="modal-body d-flex flex-column text-center">
                <i class="bi bi-x-circle"></i>
                    Sua conta de cliente está atualmente bloqueada.
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal pop" id="modal-erro-vendedora" tabindex="-1" aria-labelledby="modal-erro-vendedora" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Vendedora não encontrada!</h1>
                </div>
                <div class="modal-body d-flex flex-column text-center">
                    <i class="bi bi-x-circle"></i>
                    Não conseguimos encontrar uma conta de empreendedora associada a esse e-mail e senha.
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <div id="login">
        <div id="imagem-login-cadastro">
            <img src="assets/media/logo.svg">
        </div>
        <div id="login-cadastro">
            <img src="assets/media/rosas.svg" class="rosa-fundo">
            <form class="form-box needs-validation" action="authenticate-session.php" id="login-box" method="post" novalidate>
                <div class="form-title">
                    Login
                    <p>Entre para continuar!</p>
                </div>
                <div class="form">
                    <div id="login-type">
                        <input type="radio" name="tipo-login" id="cliente" value="1" checked>
                        <label for="cliente" class="tipo-login">
                            Cliente comum
                        </label>
                        <input type="radio" name="tipo-login" id="empreendedora" value="2">
                        <label for="empreendedora" class="tipo-login">
                            Empreendedora
                        </label>
                    </div>
                    <div class="input">
                        <label for="email" class="form-label">E-mail</label>
                        <div class="input-wrapper">
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="invalid-feedback">
                            Insira um e-mail válido.
                        </div>
                    </div>
                    <div class="input">
                        <label for="pass" class="form-label">Senha</label>
                        <div class="input-wrapper">
                            <input type="password" name="pass" id="pass" required>
                            <button id="hide-show-pass" type="button">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback">
                            Insira uma senha válida.
                        </div>
                        <a id="forgot-password" href="#">
                            Esqueceu sua senha?
                        </a>
                    </div>
                    <div class="input input-avancar">
                        <button class="button" type="submit">
                            Entrar
                        </button>
                    </div>
                </div>
                <div class="create-new">
                    Não possui uma conta? <a href="#" id="login-new">Crie uma!</a>
                </div>
                <a class="create-new" href="unlogged-user/">
                    Entrar sem login
                </a>
            </form>
            <div class="form-box hide-bottom" id="choice-box">
                <div class="form-title">
                    Escolha seu tipo de conta.
                </div>
                <div id="choices">
                    <a href="cadastro.php" class="account-type">
                        <img src="assets/media/cliente.png" alt="">
                        Cliente
                    </a>
                    <a href="cadastro-vendedora.php" class="account-type">
                        <img src="assets/media/vendedora.png" alt="">
                        Vendedora
                    </a>
                </div>
                <p class="create-new">
                    Já possui uma conta? <a href="#" id="escolha-new">Faça login!</a>
                </p>
            </div>
            <img src="assets/media/rosas.svg" class="rosa-fundo">
        </div>
    </div>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        let btnSenha = document.querySelector('#hide-show-pass'),
            iconBtnSenha = document.querySelector('#hide-show-pass i'),
            campoSenha = document.querySelector('#pass'),
            campoEmail = document.querySelector('#email'),
            form = document.querySelector('#login-box'),
            loginNew = document.getElementById('login-new'),
            escolhaNew = document.getElementById('escolha-new')

        loginNew.addEventListener('click', () => {
            document.getElementById('login').classList.add('register')
            document.getElementById('login-box').classList.add('hide-top')
            document.getElementById('choice-box').classList.remove('hide-bottom')
        })
        escolhaNew.addEventListener('click', () => {
            document.getElementById('login').classList.remove('register')
            document.getElementById('login-box').classList.remove('hide-top')
            document.getElementById('choice-box').classList.add('hide-bottom')
        })

        campoEmail.addEventListener('input', e => {
            if (!campoEmail.checkValidity()) {
                campoEmail.classList.add('is-invalid')
                campoEmail.classList.remove('is-valid')
            } else {
                campoEmail.classList.add('is-valid')
                campoEmail.classList.remove('is-invalid')
            }
        })

        form.addEventListener('submit', event => {
            event.preventDefault()
            event.stopPropagation()

            let formData = new FormData(form)

            if (!form.checkValidity()) {
                form.classList.add('was-validated')
            } else {
                let radio = document.getElementsByName('tipo-login')
                for (i = 0; i < radio.length; i++) {
                    if (radio[i].checked && radio[i].value == 1) {

                        fetch('api/cliente/verifica.php', {
                                method: 'POST',
                                header: {
                                    'Accept': 'application/json',
                                    'Content-type': 'application/json'
                                },
                                body: formData
                            })
                            .then(response => response.text())
                            .then(data => {
                                if (data == 1) {
                                    form.submit()
                                } else if(data == 2){
                                    new bootstrap.Modal('#modal-bloqueado-cliente').toggle()
                                } else {
                                    new bootstrap.Modal('#modal-erro').toggle()
                                }
                            })

                    }
                    if (radio[i].checked && radio[i].value == 2) {
                        fetch('api/dona/verifica.php', {
                                method: 'POST',
                                header: {
                                    'Accept': 'application/json',
                                    'Content-type': 'application/json'
                                },
                                body: formData
                            })
                            .then(response => response.text())
                            .then(data => {
                                if (data == 1) {
                                    form.submit()
                                } else if(data == 2) {
                                    new bootstrap.Modal('#modal-revisao').toggle()
                                }else{
                                    new bootstrap.Modal('#modal-erro-vendedora').toggle()
                                }
                            })
                    }
                }
            }
        }, false)

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
    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de vendedora</title>
    <link rel="shortcut icon" href="assets/media/favicon.ico" type="image/x-icon">

    <link rel='stylesheet' href='assets/vendor/cropperjs/css/cropper.css'>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
</head>

<body>

    <div class="modal pop" id="modal-sucesso" tabindex="-1" aria-labelledby="modal-sucesso" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Cadastro realizado com sucesso!</h1>
                </div>
                <div class="modal-body d-flex flex-column text-center">
                    <i class="bi bi-check-circle"></i>
                    Cadastro feito com sucesso! Redirecionando para a página de log-in.
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

    <div class="modal pop" id="modal-genero" tabindex="-1" aria-labelledby="modal-genero" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">OPS!</h1>
                </div>
                <div class="modal-body d-flex flex-column text-center">
                    <i class="bi bi-x-circle"></i>
                    Apenas aceitamos mulheres nesta plataforma.
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button" data-bs-dismiss="modal">OK</button>
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

    <div class="modal pop" id="modal-dona" tabindex="-1" aria-labelledby="modal-dona" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Informações da vendedora</h1>
                </div>
                <div class="modal-body">
                    <img src="assets/media/foto.png" alt="" class="foto-modal">
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
                    <div class="nasc-modal">
                        <div class="form-label">Data nasc.</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-around">
                    <button type="button" class="button button-secondary" data-bs-dismiss="modal">Voltar</button>
                    <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#modal-negocio">Avançar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal pop" id="modal-negocio" tabindex="-1" aria-labelledby="modal-negocio" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Informações do negócio</h1>
                </div>
                <div class="modal-body">
                    <img src="assets/media/foto.png" alt="" class="foto-modal">
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
                    <div class="cnpj-modal">
                        <div class="form-label">CNPJ</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                    <div class="tel-modal">
                        <div class="form-label">Telefone</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                    <div class="cat-modal">
                        <div class="form-label">Categoria</div>
                        <div class="input-wrapper">
                        </div>
                    </div>
                    <div class="plano-modal">
                        <div class="form-label">Plano</div>
                        <div class="input-wrapper">
                            Simples
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
                    <button type="button" class="button" data-bs-dismiss="modal" id="cadastrar">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <div id="cadastro">
        <div id="imagem-login-cadastro">
            <img src="assets/media/logo.svg">
        </div>
        <div id="login-cadastro">
            <img src="assets/media/rosas.svg" class="rosa-fundo">
            <form class="needs-validation" action="dona/index.html" id="form-cadastro" enctype="multipart/form-data" novalidate>
                <div class="form-box" id="register-dona-box">
                    <div class="form-title">
                        Seus dados pessoais
                    </div>
                    <div class="form">
                        <div class="input input-nome">
                            <label class="form-label" for="nome">Nome<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="nome" id="nome" autocomplete required>
                            </div>
                            <div class="invalid-feedback">
                                Insira um nome válido.
                            </div>
                        </div>
                        <div class="input input-email">
                            <label class="form-label" for="email">E-mail<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="email" name="email" id="email" autocomplete="email" required>
                            </div>
                            <div class="invalid-feedback" id="email-feedback">
                                Insira um e-mail válido.
                            </div>
                        </div>
                        <div class="input input-gen">
                            <label class="form-label" for="genero">Gênero<span>*</span></label>
                            <div class="input-wrapper">
                                <select name="genero" id="genero">
                                    <option value="1">Feminino</option>
                                    <option value="2">Masculino</option>
                                </select>
                            </div>
                            <div class="invalid-feedback">
                                Apenas aceitamos mulheres
                            </div>
                        </div>
                        <div class="input input-nasc">
                            <label class="form-label" for="date">Data de nascimento<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="date" name="date" id="date" autocomplete="bday" required>
                            </div>
                            <div class="invalid-feedback">
                                Insira uma data de nascimento.
                            </div>
                        </div>
                        <div class="input input-pass">
                            <label class="form-label" for="password">Senha<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="password" name="password" id="password" required>
                                <button id="hide-show-pass" type="button">
                                    <i class="fa bi-eye"></i>
                                </button>
                            </div>
                            <div id="invalid-senha" class="invalid-feedback">
                                Insira uma senha válida.
                            </div>
                        </div>
                        <div class="input input-confirm">
                            <label class="form-label" for="confirm-pass">Confirme a senha<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="password" name="confirm-pass" id="confirm-pass" required>
                            </div>
                            <div id="invalid-confirm" class="invalid-feedback">
                                Insira a mesma senha.
                            </div>
                        </div>
                        <div class="input input-avancar">
                            <button type="button" class="button" data-register-target="#user-photo-box">
                                Avançar
                            </button>
                        </div>
                    </div>
                    <p class="create-new">
                        Já possui uma conta? <a href="./login.php">Faça login!</a>
                    </p>
                </div>
                <div class="form-box hide" id="user-photo-box">
                    <div class="form-title">
                        <button class="voltar" type="button" data-register-target="#register-dona-box">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        Escolha uma foto do seu rosto
                    </div>
                    <div class="form">
                        <div class="input">
                            <label for="foto-user" class="foto-circulo">
                                <img src="assets/media/foto.png">
                            </label>
                            <input type="file" id="foto-user" accept="image/*" required>
                            <div class="invalid-feedback">
                                Insira uma foto.
                            </div>
                        </div>
                        <h5 class="escolha-foto">
                            Tire ou escolha uma foto para realizarmos o processo de revisão.
                        </h5>
                        <div class="input">
                            <button type="button" class="button" data-register-target="#empresa-box">
                                Avançar
                            </button>
                        </div>
                    </div>
                    <p class="create-new">
                        Já possui uma conta? <a href="./login.php">Faça login!</a>
                    </p>
                </div>
                <div class="form-box hide" id="empresa-box">
                    <div class="form-title">
                        <button class="voltar" type="button" data-register-target="#user-photo-box">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        Dados sobre a sua empresa
                    </div>
                    <div class="form">
                        <div class="input input-nome">
                            <label class="form-label" for="nome-empresa">Nome<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="nome-empresa" id="nome-empresa" required>
                            </div>
                            <div class="invalid-feedback">
                                Insira um nome válido.
                            </div>
                        </div>
                        <div class="input input-username">
                            <label class="form-label" for="username-empresa">Nome de usuário<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="username-empresa" id="username-empresa" autocomplete required>
                            </div>
                            <div class="invalid-feedback" id="username-feedback">
                                Insira um nome de usuário válido.
                            </div>
                        </div>
                        <div class="input input-cnpj">
                            <label class="form-label" for="cnpj">CNPJ<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="cnpj" id="cnpj" required>
                            </div>
                            <div class="invalid-feedback" id="cnpj-feedback">
                                Insira um CNPJ válido.
                            </div>
                        </div>
                        <div class="input input-cat">
                            <label class="form-label" for="categoria">Categoria<span>*</span></label>
                            <div class="input-wrapper">
                                <select name="categoria" id="categoria">
                                </select>
                            </div>
                            <div class="invalid-feedback">
                                Insira uma categoria válida.
                            </div>
                        </div>
                        <div class="input input-tel">
                            <label class="form-label" for="telefone">Telefone<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="tel" name="telefone" id="telefone" autocomplete="tel" required>
                            </div>
                            <div class="invalid-feedback">
                                Insira um telefone válido.
                            </div>
                        </div>
                        <div class="input input-cep">
                            <label class="form-label" for="cep">CEP<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="cep" id="cep" onblur="pesquisacep(this.value)" autocomplete required>
                            </div>
                            <div class="invalid-feedback">
                                Insira um CEP válido.
                            </div>
                        </div>
                        <div class="input input-estado">
                            <label class="form-label" for="uf">Estado<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="uf" id="uf" autocomplete required>
                            </div>
                            <div class="invalid-feedback">
                                Insira um estado válido.
                            </div>
                        </div>
                        <div class="input input-bairro">
                            <label class="form-label" for="bairro">Bairro<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="bairro" id="bairro" autocomplete required>
                            </div>
                            <div class="invalid-feedback">
                                Insira um bairro válido.
                            </div>
                        </div>
                        <div class="input input-cidade">
                            <label class="form-label" for="cidade">Cidade<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="cidade" id="cidade" autocomplete required>
                            </div>
                            <div class="invalid-feedback">
                                Insira uma cidade válida.
                            </div>
                        </div>
                        <div class="input input-log">
                            <label class="form-label" for="log">Logradouro<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="log" id="log" autocomplete required>
                            </div>
                            <div class="invalid-feedback">
                                Insira um logradouro válido.
                            </div>
                        </div>
                        <div class="input input-num">
                            <label class="form-label" for="numero">Número<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="numero" id="numero" autocomplete required>
                            </div>
                            <div class="invalid-feedback">
                                Insira um número válido.
                            </div>
                        </div>
                        <div class="input input-comp">
                            <label class="form-label" for="complemento">Complemento</label>
                            <div class="input-wrapper">
                                <input type="text" name="complemento" id="complemento" autocomplete>
                            </div>
                            <div class="invalid-feedback">
                                Insira um complemento válido.
                            </div>
                        </div>
                        <div class="input input-avancar">
                            <button type="button" class="button" data-register-target="#plano-box">
                                Avançar
                            </button>
                        </div>
                    </div>
                    <p class="create-new">
                        Já possui uma conta? <a href="./login.php">Faça login!</a>
                    </p>
                </div>
                <div class="form-box hide" id="plano-box">
                    <div class="form-title">
                        <button class="voltar" type="button" data-register-target="#empresa-box">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        Qual plano deseja?
                    </div>
                    <div class="form">
                        <input type="radio" name="plano-radio" id="simples" class="plano-radio" value="1" required>
                        <div class="tipo-plano">
                            <div class="titulo-plano">
                                Simples
                            </div>
                            <div class="preco-plano">
                                Grátis
                            </div>
                            <div class="lista-plano">
                                <div>
                                    <i class="bi bi-check"></i>
                                    Postar produtos a toda a rede de clientes
                                </div>
                                <div>
                                    <i class="bi bi-check"></i>
                                    Divulgação do contato da empresa para outras plataformas
                                </div>
                            </div>
                            <label class="aceitar-plano" for="simples">
                                Aceitar
                            </label>
                        </div>
                        <input type="radio" name="plano-radio" id="premium" class="plano-radio" value="2" required>
                        <div class="tipo-plano">
                            <div class="titulo-plano">
                                Premium
                            </div>
                            <div class="preco-plano">
                                R$49/mês
                            </div>
                            <div class="lista-plano">
                                <div>
                                    <i class="bi bi-check"></i>
                                    Postar produtos a toda a rede de clientes
                                </div>
                                <div>
                                    <i class="bi bi-check"></i>
                                    Encomenda dos produtos através da plataforma Donas
                                </div>
                                <div>
                                    <i class="bi bi-check"></i>
                                    Painel de encomendas
                                </div>
                                <div>
                                    <i class="bi bi-check"></i>
                                    Engajamento maior dentro da plataforma
                                </div>
                            </div>
                            <label class="aceitar-plano" for="premium">
                                Aceitar
                            </label>
                        </div>
                        <div class="invalid-feedback">
                            Escolha um plano.
                        </div>
                        <div class="input input-avancar">
                            <button type="button" class="button" data-register-target="#empresa-photo-box">
                                Avançar
                            </button>
                        </div>
                    </div>
                    <p class="create-new">
                        Já possui uma conta? <a href="./login.php">Faça login!</a>
                    </p>
                </div>
                <div class="form-box hide" id="empresa-photo-box">
                    <div class="form-title">
                        <button class="voltar" type="button" data-register-target="#plano-box">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        Quase lá...
                    </div>
                    <div class="form">
                        <div class="input">
                            <label for="foto-empresa" class="foto-circulo">
                                <img src="assets/media/foto.png">
                            </label>
                            <input type="file" id="foto-empresa" accept="image/*" required>
                            <div class="invalid-feedback">
                                Insira uma foto.
                            </div>
                        </div>
                        <h5 class="escolha-foto">Tire ou escolha uma foto para colocar no seu negócio.</h5>
                        <div class="input">
                            <button id="confirmar-cadastro" class="button">
                                Cadastrar
                            </button>
                        </div>
                    </div>
                    <p class="create-new">
                        Já possui uma conta? <a href="./login.php">Faça login!</a>
                    </p>
                </div>
            </form>
            <img src="assets/media/rosas.svg" class="rosa-fundo">
        </div>

        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src='assets/vendor/cropperjs/js/cropper.js'></script>
        <script>
            let btnSenha = document.querySelector('#hide-show-pass'),
                iconBtnSenha = document.querySelector('#hide-show-pass i'),
                campoEmail = document.querySelector('#email'),
                campoUsername = document.querySelector("#username-empresa"),
                campoSenha = document.querySelector('#password'),
                campoConfirm = document.querySelector('#confirm-pass'),
                campoCnpj = document.querySelector('#cnpj'),
                registerBox = document.querySelector('#register-box'),
                addressBox = document.querySelector('#address-box'),
                photoBox = document.querySelector('#photo-box'),
                avancar = document.querySelectorAll('[data-register-target]'),
                boxes = document.querySelectorAll('.form-box'),
                campoCep = document.querySelector('#cep'),
                campoTel = document.querySelector('#telefone'),
                fotoUserPreview = document.querySelector('#user-photo-box .foto-circulo img'),
                fotoEmpresaPreview = document.querySelector('#empresa-photo-box .foto-circulo img'),
                fotoUser = document.querySelector('#foto-user'),
                fotoEmpresa = document.querySelector('#foto-empresa'),
                nomeInput = document.querySelector('#nome'),
                form = document.querySelector('#form-cadastro'),
                resultUser = document.querySelector('#modal-foto-user .result-crop'),
                resultEmpresa = document.querySelector('#modal-foto-empresa .result-crop'),
                confirmarFotoUser = document.querySelector('#confirmar-foto-user'),
                confirmarFotoEmpresa = document.querySelector('#confirmar-foto-empresa'),
                confirmarCadastro = document.querySelector('#cadastrar'),
                genero = document.querySelector('#genero')

            genero.addEventListener('change', e => {

                let target = e.target

                genero = target.options[target.selectedIndex].value

                if(genero==2){
                    new bootstrap.Modal('#modal-genero').toggle()

                    target.value=1
                }
            })

            window.addEventListener('DOMContentLoaded', async () => {
                const response = await fetch('./api/categoria/?categorias')
                const data = await response.json()

                let selectCategoria = document.querySelector('#categoria')

                data.forEach(item => {
                    let option = document.createElement('option')
                    option.setAttribute('value', item.idCategoria)
                    option.innerText = item.nomeCategoria

                    selectCategoria.append(option)
                })
            })

            form.addEventListener('submit', event => {
                event.preventDefault()
                event.stopPropagation()
                if (!form.checkValidity() || campoCnpj.value.length < 14) {
                    new bootstrap.Modal('#modal-erro').toggle()
                    form.classList.add('was-validated')
                } else {
                    new bootstrap.Modal('#modal-dona').toggle()

                    const nomeModal = document.querySelector('#modal-dona .nome-modal .input-wrapper'),
                        emailModal = document.querySelector('#modal-dona .email-modal .input-wrapper'),
                        cnpjModal = document.querySelector('#modal-negocio .cnpj-modal .input-wrapper'),
                        telModal = document.querySelector('#modal-negocio .tel-modal .input-wrapper'),
                        nascModal = document.querySelector('#modal-dona .nasc-modal .input-wrapper'),
                        planoModal = document.querySelector('#modal-negocio .plano-modal .input-wrapper'),
                        nomeNegocioModal = document.querySelector('#modal-negocio .nome-modal .input-wrapper'),
                        usernameNegocioModal = document.querySelector('#modal-negocio .username-modal .input-wrapper'),
                        categoriaNegocioModal = document.querySelector('#modal-negocio .cat-modal .input-wrapper'),
                        planoNegocioModal = document.querySelector('#modal-negocio .plano-modal .input-wrapper'),
                        enderecoModal = document.querySelector('#modal-negocio .endereco-modal .input-wrapper'),
                        logradouro = document.getElementById('log').value,
                        bairro = document.getElementById('bairro').value,
                        cidade = document.getElementById('cidade').value,
                        uf = document.getElementById('uf').value,
                        numero = document.getElementById('numero').value,
                        complemento = document.getElementById('complemento').value,
                        cep = campoCep.value

                    nomeModal.innerText = document.getElementById('nome').value
                    cnpjModal.innerText = campoCnpj.value
                    emailModal.innerText = document.getElementById('email').value
                    nascModal.innerText = document.getElementById('date').value.replaceAll('-', '/')
                    nomeNegocioModal.innerText = document.getElementById('nome-empresa').value
                    usernameNegocioModal.innerText = campoUsername.value
                    categoriaNegocioModal.innerText = document.getElementById('categoria').options[document.getElementById('categoria').selectedIndex].text

                    let plano;

                    let radio = document.getElementsByName('plano-radio')
                    for (i = 0; i < radio.length; i++) {
                        if (radio[i].checked && radio[i].value == 2) {
                            plano = 'Premium'
                        }
                        if (radio[i].checked && radio[i].value == 1) {
                            plano = 'Simples'
                        }
                    }

                    planoNegocioModal.innerText = plano
                    telModal.innerText = document.getElementById('telefone').value

                    enderecoModal.innerText = `${logradouro}, ${numero} - ${bairro}, ${cidade} - ${uf}, ${cep} ${complemento != '' ? ' - ' + complemento : ''}`

                    confirmarCadastro.addEventListener('click', () => {
                        let canvasVendedora = cropperVendedora.getCroppedCanvas({
                            width: 512,
                            height: 512
                        })

                        let canvasEmpresa = cropperEmpresa.getCroppedCanvas({
                            width: 512,
                            height: 512
                        })

                        canvasVendedora.toBlob(function(blobVendedora) {
                            canvasEmpresa.toBlob(function(blobEmpresa) {

                                let formData = new FormData()

                                formData.append('foto-vendedora', blobVendedora, 'photo-vendedora.png')
                                formData.append('foto-empresa', blobEmpresa, 'photo-empresa.png')
                                formData.append('nome', document.getElementById('nome').value)
                                formData.append('email', document.getElementById('email').value)
                                formData.append('pass', campoSenha.value)
                                formData.append('nasc', document.getElementById('date').value.replaceAll('-', '/'))
                                formData.append('nome-empresa', document.getElementById('nome-empresa').value)
                                formData.append('username-empresa', campoUsername.value)
                                formData.append('telefone', document.getElementById('telefone').value.replace(/\D/g, ''))
                                formData.append('log', logradouro)
                                formData.append('num', numero)
                                formData.append('bairro', bairro)
                                formData.append('cidade', cidade)
                                formData.append('uf', uf)
                                formData.append('cep', cep.replace(/\D/g, ''))
                                formData.append('comp', complemento)
                                formData.append('cnpj', campoCnpj.value.replace(/\D/g, ''))
                                formData.append('nivel', plano)
                                formData.append('categoria', document.getElementById('categoria').options[document.getElementById('categoria').selectedIndex].value)

                                fetch('api/dona/index.php', {
                                    method: 'POST',
                                    header: {
                                        'Accept': 'application/json',
                                        'Content-type': 'application/json'
                                    },
                                    body: formData
                                }).then(() => {
                                    new bootstrap.Modal('#modal-sucesso').toggle()
                                    setTimeout(() => location.replace('./login.php'), 2500)
                                })

                            })

                        })
                    })
                }
            }, false)

            avancar.forEach(item => {
                let box = document.querySelector(item.getAttribute('data-register-target'))
                item.addEventListener('click', () => {
                    boxes.forEach(item => {
                        item.classList.add('hide')
                    })
                    box.classList.remove('hide')
                })
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

            campoUsername.addEventListener('blur', e => {
                let username = e.target.value

                fetch(`api/dona/?username=${username}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data == 1) {
                            document.querySelector('#username-feedback').innerText = "Esse nome de usuário já está sendo utilizado"
                            campoUsername.classList.add('is-invalid')
                            campoUsername.classList.remove('is-valid')
                        } else {
                            campoUsername.classList.add('is-valid')
                            campoUsername.classList.remove('is-invalid')
                        }
                    })
            })

            campoEmail.addEventListener('blur', e => {
                let email = e.target.value

                fetch(`api/dona/?email=${email}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data == 1) {
                            document.querySelector('#email-feedback').innerText = "Esse e-mail já está sendo utilizado"
                            campoEmail.classList.add('is-invalid')
                            campoEmail.classList.remove('is-valid')
                        } else {
                            campoEmail.classList.add('is-valid')
                            campoEmail.classList.remove('is-invalid')
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

            function maskTel(event) {
                const input = event.target;
                const value = input.value.replace(/\D/g, '');

                let formattedValue = '';

                const isPersonal = value.length > 10;

                if (isPersonal) {
                    const match = value.match(/^(\d{0,2})(\d{0,5})(\d{0,4})$/);
                    if (match) {
                        const [, firstGroup, secondGroup, thirdGroup] = match;
                        if (firstGroup) formattedValue += `(${firstGroup})`;
                        if (secondGroup) formattedValue += ' ' + secondGroup;
                        if (thirdGroup) formattedValue += '-' + thirdGroup;
                    }
                } else {
                    const match = value.match(/^(\d{0,2})(\d{0,4})(\d{0,4})$/);
                    if (match) {
                        const [, firstGroup, secondGroup, thirdGroup] = match;
                        if (firstGroup) formattedValue += `(${firstGroup})`;
                        if (secondGroup) formattedValue += ' ' + secondGroup;
                        if (thirdGroup) formattedValue += '-' + thirdGroup;
                    }
                }
                if (value.length < 9) {
                    campoTel.classList.add('is-invalid')
                } else {
                    campoTel.classList.remove('is-invalid')
                }

                input.value = formattedValue
            }

            campoCnpj.addEventListener('input', maskCNPJ)
            campoCnpj.addEventListener('blur', e => {

                let cnpj = e.target.value.replace(/\D/g, '')

                fetch(`api/dona/?cnpj=${cnpj}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data == 1) {
                            document.querySelector('#cnpj-feedback').innerText = "Esse CNPJ já está sendo utilizado"
                            campoCnpj.classList.add('is-invalid')
                            campoCnpj.classList.remove('is-valid')
                        } else {
                            campoCnpj.classList.add('is-valid')
                            campoCnpj.classList.remove('is-invalid')
                        }
                    })
            })
            campoCep.addEventListener('input', maskCep)
            campoTel.addEventListener('input', maskTel)

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
                document.querySelector('#modal-dona .foto-modal').src = imgSrc
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
                document.querySelector('#modal-negocio .foto-modal').src = imgSrc
            });

            btnSenha.addEventListener('click', () => {
                if (campoSenha.getAttribute('type') == 'text') {
                    campoSenha.setAttribute('type', 'password')
                    campoConfirm.setAttribute('type', 'password')
                    iconBtnSenha.classList.remove('bi-eye-slash')
                    iconBtnSenha.classList.add('bi-eye')
                } else {
                    campoSenha.setAttribute('type', 'text')
                    campoConfirm.setAttribute('type', 'text')
                    iconBtnSenha.classList.remove('bi-eye')
                    iconBtnSenha.classList.add('bi-eye-slash')
                }
            })

            function verificaSenha() {
                let senha = campoSenha.value
                let confirm = campoConfirm.value

                let invalidSenha = document.getElementById('invalid-senha')
                let invalidConfirm = document.getElementById('invalid-confirm')

                if (senha != confirm) {
                    campoSenha.classList.add('is-invalid')
                    campoConfirm.classList.add('is-invalid')

                    invalidSenha.innerText = "Senhas não condizem."
                    invalidConfirm.innerText = "Senhas não condizem."
                } else if (senha == '' && confirm == '') {
                    campoSenha.classList.add('is-invalid')
                    campoConfirm.classList.add('is-invalid')

                    invalidSenha.innerText = "Insira uma senha válida."
                    invalidConfirm.innerText = "Insira a mesma senha."
                } else {
                    campoSenha.classList.remove('is-invalid')
                    campoConfirm.classList.remove('is-invalid')
                }
            }

            campoSenha.addEventListener('input', verificaSenha)
            campoConfirm.addEventListener('input', verificaSenha)

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
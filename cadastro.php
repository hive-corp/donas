<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de cliente</title>
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <link rel='stylesheet' href='assets/css/cropper.css'>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
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

    <div class="modal pop" id="modal-confirma" tabindex="-1" aria-labelledby="modal-confirma" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Informações do cliente</h1>
                </div>
                <div class="modal-body">
                    <img src="assets/img/foto.png" alt="" class="foto-modal">
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
                    <div class="cpf-modal">
                        <div class="form-label">CPF</div>
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
                    <div class="endereco-modal">
                        <div class="form-label">Endereço</div>
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

    <div id="cadastro">
        <div id="imagem-login-cadastro">
            <img src="assets/img/logo.svg">
        </div>
        <div id="login-cadastro">
            <img src="assets/img/rosas.svg" class="rosa-fundo">
            <form class="needs-validation" action="user/index.html" id="form-cadastro" enctype="multipart/form-data" novalidate>
                <div class="form-box" id="register-box">
                    <div class="form-title">
                        Seus dados pessoais
                    </div>
                    <div class="form">
                        <div class="input input-nome">
                            <label class="form-label" for="nome">Nome<span><span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="nome" id="nome" autocomplete required>
                            </div>
                            <div class="invalid-feedback">
                                Insira um nome válido.
                            </div>
                        </div>
                        <div class="input input-user">
                            <label class="form-label" for="username">Nome de usuário<span><span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="username" id="username" autocomplete required>
                            </div>
                            <div class="invalid-feedback" id="username-feedback">
                                Insira um nome de usuário válido.
                            </div>
                        </div>
                        <div class="input input-cpf">
                            <label class="form-label" for="cpf">CPF<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="cpf" id="cpf" maxlength="14" required>
                            </div>
                            <div class="invalid-feedback" id="cpf-feedback">
                                Insira um CPF válido.
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
                        <div class="input input-nasc">
                            <label class="form-label" for="date">Data de nascimento<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="date" name="date" id="date" autocomplete required>
                            </div>
                            <div class="invalid-feedback">
                                Insira uma data de nascimento.
                            </div>
                        </div>
                        <div class="input input-pass">
                            <label class="form-label" for="password">Senha<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="password" name="password" id="password" autocomplete required>
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
                                <input type="password" name="confirm-pass" id="confirm-pass" autocomplete required>
                            </div>
                            <div id="invalid-confirm" class="invalid-feedback">
                                Insira a mesma senha.
                            </div>
                        </div>
                        <div class="input input-avancar">
                            <button type="button" class="button" data-register-target="#address-box">
                                Avançar
                            </button>
                        </div>
                    </div>
                    <p class="create-new">
                        Já possui uma conta? <a href="./login.php">Faça login!</a>
                    </p>
                </div>
                <div class="form-box hide" id="address-box">
                    <div class="form-title">
                        <button class=" voltar" type="button" data-register-target="#register-box">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        Adicione o seu endereço
                    </div>
                    <div class="form">
                        <div class="input input-cep">
                            <label class="form-label" for="cep">CEP<span>*</span></label>
                            <div class="input-wrapper">
                                <input type="text" name="cep" id="cep" maxlength="9" onblur="pesquisacep(this.value)" autocomplete required>
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
                            <button type="button" class="button" data-register-target="#photo-box">
                                Avançar
                            </button>
                        </div>
                    </div>
                    <p class="create-new">
                        Já possui uma conta? <a href="./login.php">Faça login!</a>
                    </p>
                </div>
                <div class="form-box hide" id="photo-box">
                    <div class="form-title">
                        <button class="voltar" type="button" data-register-target="#address-box">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        Quase lá...
                    </div>
                    <div class="form">
                        <div class="input">
                            <label for="foto" class="foto-circulo">
                                <img src="assets/img/foto.png">
                            </label>
                            <input type="file" id="foto" accept="image/*" required>
                            <div class="invalid-feedback">
                                Insira uma foto.
                            </div>
                        </div>
                        <h5 class="escolha-foto">Tire ou escolha uma foto para colocar no perfil.</h5>
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
            <img src="assets/img/rosas.svg" class="rosa-fundo">
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src='assets/js/cropper.js'></script>
    <script>
        let btnSenha = document.querySelector('#hide-show-pass'),
            iconBtnSenha = document.querySelector('#hide-show-pass i'),
            campoSenha = document.querySelector('#password'),
            campoConfirm = document.querySelector('#confirm-pass'),
            campoCpf = document.querySelector('#cpf'),
            campoEmail = document.querySelector('#email'),
            campoUsername = document.querySelector("#username"),
            avancar = document.querySelectorAll('[data-register-target]'),
            boxes = document.querySelectorAll('.form-box'),
            campoCep = document.querySelector('#cep'),
            fotoPreview = document.querySelector('.foto-circulo img'),
            fotoInput = document.querySelector('#foto'),
            nomeInput = document.querySelector('#nome'),
            result = document.querySelector('.result-crop'),
            confirmarFoto = document.querySelector('#confirmar-foto'),
            confirmarCadastro = document.querySelector('#cadastrar'),
            form = document.querySelector('#form-cadastro')

        nomeInput.addEventListener("input", () => {
            localStorage.setItem("nome", nomeInput.value)
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

            fetch(`api/cliente/?username=${username}`)
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

            fetch(`api/cliente/?email=${email}`)
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

        form.addEventListener('submit', event => {
            event.preventDefault()
            event.stopPropagation()
            if (!form.checkValidity() || campoCpf.value.length != 14) {
                new bootstrap.Modal('#modal-erro').toggle()
                form.classList.add('was-validated')
            } else {
                new bootstrap.Modal('#modal-confirma').toggle()

                const nomeModal = document.querySelector('.nome-modal .input-wrapper'),
                    emailModal = document.querySelector('.email-modal .input-wrapper'),
                    nascModal = document.querySelector('.nasc-modal .input-wrapper'),
                    cpfModal = document.querySelector('.cpf-modal .input-wrapper'),
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
                cpfModal.innerText = campoCpf.value
                emailModal.innerText = document.getElementById('email').value
                nascModal.innerText = document.getElementById('date').value.replaceAll('-', '/')
                enderecoModal.innerText = `${logradouro}, ${numero} - ${bairro}, ${cidade} - ${uf}, ${cep} ${complemento != '' ? ' - ' + complemento : ''}`

                confirmarCadastro.addEventListener('click', () => {
                    let canvas = cropper.getCroppedCanvas({
                        width: 512,
                        height: 512
                    })

                    canvas.toBlob(function(blob) {
                        let formData = new FormData()

                        console.log(document.getElementById('nome').value)

                        formData.append('foto', blob, 'photo.png')
                        formData.append('nome', document.getElementById('nome').value)
                        formData.append('username', document.getElementById('username').value)
                        formData.append('email', document.getElementById('email').value)
                        formData.append('pass', campoSenha.value)
                        formData.append('cpf', campoCpf.value.replace(/\D/g, ''))
                        formData.append('nasc', document.getElementById('date').value.replaceAll('-', '/'))
                        formData.append('log', logradouro)
                        formData.append('num', numero)
                        formData.append('bairro', bairro)
                        formData.append('cidade', cidade)
                        formData.append('uf', uf)
                        formData.append('cep', cep)
                        formData.append('comp', complemento)

                        fetch('api/cliente/index.php', {
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
            }
        })

        function maskCPF(e) {
            const input = e.target;
            const value = input.value.replace(/\D/g, '');

            let formattedValue = '';

            const match = value.match(/^(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})$/);
            if (match) {
                const [, firstGroup, secondGroup, thirdGroup, lastGroup] = match;
                if (firstGroup) formattedValue += firstGroup;
                if (secondGroup) formattedValue += '.' + secondGroup;
                if (thirdGroup) formattedValue += '.' + thirdGroup;
                if (lastGroup) formattedValue += '-' + lastGroup;
            }

            if (value.length != 11) {
                campoCpf.classList.add('is-invalid')
            } else {
                campoCpf.classList.remove('is-invalid')
            }

            input.value = formattedValue
        }

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

        campoCpf.addEventListener('input', maskCPF)
        campoCpf.addEventListener('blur', e => {

            campoCpf.classList.remove('is-valid')
            campoCpf.classList.remove('is-invalid')

            const cpf = e.target.value.replace(/\D/g, '')
            var soma;
            var resto;
            soma = 0;

            if (cpf == "00000000000" ||
                cpf == "11111111111" ||
                cpf == "22222222222" ||
                cpf == "33333333333" ||
                cpf == "44444444444" ||
                cpf == "55555555555" ||
                cpf == "66666666666" ||
                cpf == "77777777777" ||
                cpf == "88888888888" ||
                cpf == "99999999999") {

                campoCpf.classList.add('is-invalid')
                return false
            }

            for (i = 1; i <= 9; i++) soma = soma + parseInt(cpf.substring(i - 1, i)) * (11 - i);
            resto = (soma * 10) % 11;

            if ((resto == 10) || (resto == 11)) resto = 0;
            if (resto != parseInt(cpf.substring(9, 10))) {
                campoCpf.classList.add('is-invalid')
                return false
            }

            soma = 0;
            for (i = 1; i <= 10; i++) soma = soma + parseInt(cpf.substring(i - 1, i)) * (12 - i);
            resto = (soma * 10) % 11;

            if ((resto == 10) || (resto == 11)) resto = 0;
            if (resto != parseInt(cpf.substring(10, 11))) {
                campoCpf.classList.add('is-invalid')
                return false
            }

            fetch(`api/cliente/?cpf=${cpf}`)
                .then(response => response.json())
                .then(data => {
                    if (data == 1) {
                        document.querySelector('#cpf-feedback').innerText = "Esse CPF já está sendo utilizado"
                        campoCpf.classList.add('is-invalid')
                        campoCpf.classList.remove('is-valid')
                    } else {
                        campoCpf.classList.add('is-valid')
                        campoCpf.classList.remove('is-invalid')
                    }
                })
        })

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

        avancar.forEach(item => {
            let box = document.querySelector(item.getAttribute('data-register-target'))
            item.addEventListener('click', () => {
                boxes.forEach(item => {
                    item.classList.add('hide')
                })
                box.classList.remove('hide')
            })
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
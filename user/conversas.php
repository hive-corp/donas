<?php

require_once "validador.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversas</title>
    <link rel='stylesheet' href='../assets/css/cropper.css'>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/bootstrap-icons-1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div id="user-chats">
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
                <a href="notificacoes.php" class="nav-link">
                    <i class="bi bi-bell"></i> <span>
                        Notificações
                    </span>
                </a>
                <a href="conversas.php" class="nav-link active">
                    <i class="bi bi-chat-fill"></i>
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

        <div id="conversas">
            <div id="conversas-title">
                Conversas
            </div>
            <div id="search-chats">
                <div class="search-container">
                    <input type="text" role="search" class="search-field">
                    <button type="button" class="search-button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
            <div id="list-chats">
                <div class="chat-item placeholder-element">
                    <div class="chat-foto placeholder-glow">
                        <span class="placeholder"></span>
                    </div>
                    <div class="chat-name placeholder-glow">
                        <span class="placeholder col-7"></span>
                    </div>
                    <div class="chat-username placeholder-glow">
                        <span class="placeholder col-4"></span>
                    </div>
                    <div class="chat-message placeholder-glow">
                        <span class="placeholder col-4"></span>
                    </div>
                </div>
                <div class="chat-item placeholder-element">
                    <div class="chat-foto placeholder-glow">
                        <span class="placeholder"></span>
                    </div>
                    <div class="chat-name placeholder-glow">
                        <span class="placeholder col-7"></span>
                    </div>
                    <div class="chat-username placeholder-glow">
                        <span class="placeholder col-4"></span>
                    </div>
                    <div class="chat-message placeholder-glow">
                        <span class="placeholder col-4"></span>
                    </div>
                </div>
                <div class="chat-item placeholder-element">
                    <div class="chat-foto placeholder-glow">
                        <span class="placeholder"></span>
                    </div>
                    <div class="chat-name placeholder-glow">
                        <span class="placeholder col-7"></span>
                    </div>
                    <div class="chat-username placeholder-glow">
                        <span class="placeholder col-4"></span>
                    </div>
                    <div class="chat-message placeholder-glow">
                        <span class="placeholder col-4"></span>
                    </div>
                </div>
                <div class="chat-item placeholder-element">
                    <div class="chat-foto placeholder-glow">
                        <span class="placeholder"></span>
                    </div>
                    <div class="chat-name placeholder-glow">
                        <span class="placeholder col-7"></span>
                    </div>
                    <div class="chat-username placeholder-glow">
                        <span class="placeholder col-4"></span>
                    </div>
                    <div class="chat-message placeholder-glow">
                        <span class="placeholder col-4"></span>
                    </div>
                </div>

                <div class="chat-item load">
                    <div class="chat-foto">
                        <img src="../assets/img/users/donas/acucarcanela.png" alt="" />
                    </div>
                    <div class="chat-name">Açúcar e Canela</div>
                    <div class="chat-username">@acucarcanela</div>
                    <div class="chat-message">Beleza!</div>
                </div>
                <div class="chat-item load">
                    <div class="chat-foto">
                        <img src="../assets/img/users/donas/grifecoracao.png" alt="" />
                    </div>
                    <div class="chat-name">Grife do Coração</div>
                    <div class="chat-username">@grifecoracao</div>
                    <div class="chat-message">Entendido!</div>
                </div>
            </div>
            <div class="dropup">
                <button id="new-chat" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-plus-lg"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-sobe">

                </ul>
            </div>
        </div>
        <main id="main" class="hide">
            <div id="main-title">
                <button class="voltar" id="voltar-chat">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <div>Escolha uma conversa ao lado</div>
            </div>
            <div id="content">
                <img src="../assets/img/rosas.svg" class="rosa-fundo">

                <div id="crop-image" class="hide">
                    <div class="crop-title">
                        <button class="voltar" id="voltar-crop">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                    </div>
                    <div class="crop-area">
                        <div class="result-crop"></div>
                    </div>
                    <div class="crop-send">
                        <div class="message-container" id="crop-message-container">
                            <input type="text" placeholder="Escreva uma mensagem" class="message-field" id="crop-message-field" autofocus>
                            <button class="message-button" id="crop-message-button" type="button">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <p id="abra-conversa">Abra uma conversa</p>
                <button id="desce-chat" class="hide">
                    <i class="bi bi-arrow-down"></i>
                </button>

                <div id="chat">
                </div>

                <div class="message-container hide" id="main-message-container">
                    <div class="message-embeds">
                        <label for="message-photo">
                            <i class="bi bi-image"></i>
                            <input type="file" id="message-photo" accept="image/*">
                        </label>
                    </div>
                    <input type="text" placeholder="Escreva uma mensagem" class="message-field" id="main-message-field" autofocus>
                    <button class="message-button" id="main-message-button" type="button">
                        <i class="bi bi-send"></i>
                    </button>
                </div>

                <img src="../assets/img/rosas.svg" class="rosa-fundo">
            </div>
        </main>
    </div>


    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script> -->
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src='../assets/js/cropper.js'></script>
    <script src="../assets/js/script.js"></script>
    <script>
        //o código aqui é só pra bobagem, mesmo.

        var mainMessageButton = document.querySelector('#main-message-button'),
            mainMessageField = document.querySelector('#main-message-field'),
            mainMessageContainer = document.querySelector('#main-message-container'),
            chat = document.querySelector('#chat'),
            newChat = document.querySelector('#new-chat'),
            main = document.querySelector('#main'),
            conversas = document.querySelector('#conversas'),
            desceChat = document.querySelector('#desce-chat'),
            abraConversa = document.getElementById('abra-conversa'),
            voltarChat = document.querySelector('#voltar-chat'),
            voltarCrop = document.querySelector('#voltar-crop'),
            messagePhoto = document.querySelector('#message-photo'),
            cropImage = document.querySelector('#crop-image'),
            result = document.querySelector('.result-crop'),
            cropMessageButton = document.querySelector('#crop-message-button'),
            cropMessageField = document.querySelector('#crop-message-field'),
            cropMessageContainer = document.querySelector('#crop-message-container')


        document.querySelectorAll('.chat-item.load').forEach(item => {
            item.addEventListener('click', () => {
                abraConversa.classList.add('hide')
                mainMessageContainer.classList.remove('hide')
                conversas.classList.toggle('hide')
                main.classList.toggle('hide')

                let nome = item.querySelector('.chat-name').innerText

                document.querySelector('#main-title div').innerText = nome
            })
        })

        voltarChat.addEventListener('click', () => {
            conversas.classList.toggle('hide')
            main.classList.toggle('hide')
        })

        voltarCrop.addEventListener('click', () => {
            cropImage.classList.toggle('hide')
        })

        messagePhoto.addEventListener('change', e => {

            cropImage.classList.remove('hide')

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
                            dragMode: 'move',
                            guides: false,
                            viewMode: 1,
                        });
                    }
                };
                reader.readAsDataURL(e.target.files[0]);
            }

            messagePhoto.value = ''
        });

        const enviarMensagem = () => {
            let textoMensagem = mainMessageField.value.trim();

            if (textoMensagem != '') {
                mainMessageField.value = ''

                let msg = document.createElement('div')
                msg.setAttribute('class', 'message-myself')
                msg.innerHTML = textoMensagem

                let hora = new Date()
                let horaMin = hora.getHours().toLocaleString(undefined, {
                    minimumIntegerDigits: 2
                }) + ":" + hora.getMinutes().toLocaleString(undefined, {
                    minimumIntegerDigits: 2
                })
                let horaMsg = document.createElement('span')
                horaMsg.setAttribute('class', 'time')
                horaMsg.innerHTML = horaMin

                msg.append(horaMsg)
                chat.append(msg)

                chat.scroll({
                    top: chat.scrollHeight,
                    behavior: "smooth"
                })
            }
        }

        const enviarMensagemCrop = () => {
            let textoMensagem = cropMessageField.value.trim();

            let msg = document.createElement('div')
            msg.setAttribute('class', 'message-myself')

            let imgSrc = cropper.getCroppedCanvas({
                maxWidth: 1024,
                fillColor: 'white'
            }).toDataURL('image/jpeg');

            let img = document.createElement('img')
            img.src = imgSrc

            msg.append(img)

            if (textoMensagem != '') {
                cropMessageField.value = ''

                msg.append(textoMensagem)
            }

            let hora = new Date()
            let horaMin = hora.getHours().toLocaleString(undefined, {
                minimumIntegerDigits: 2
            }) + ":" + hora.getMinutes().toLocaleString(undefined, {
                minimumIntegerDigits: 2
            })
            let horaMsg = document.createElement('span')
            horaMsg.setAttribute('class', 'time')
            horaMsg.innerHTML = horaMin

            msg.append(horaMsg)

            chat.append(msg)
            chat.scroll({
                top: chat.scrollHeight,
                behavior: "smooth"
            })

            cropImage.classList.toggle('hide')
        }

        cropMessageButton.addEventListener('click', enviarMensagemCrop)

        mainMessageButton.addEventListener('click', enviarMensagem)
        mainMessageField.addEventListener('keypress', (event) => {
            if (event.keyCode == 13) {
                enviarMensagem()
            }
        })

        const showScrollDown = () => {
            let maxScrollTop = chat.scrollHeight - chat.clientHeight

            if (chat.scrollTop < maxScrollTop - 50) {
                desceChat.classList.remove('hide')
            } else {
                desceChat.classList.add('hide')
            }
        }

        desceChat.addEventListener('click', () => {
            chat.scroll({
                top: chat.scrollHeight,
                behavior: "smooth"
            })
        })

        chat.addEventListener('scroll', showScrollDown)
    </script>
</body>

</html>
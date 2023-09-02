var mainMessageButton = document.querySelector('#main-message-button'),
    mainMessageField = document.querySelector('#main-message-field'),
    mainMessageContainer = document.querySelector('#main-message-container'),
    chat = document.querySelector('#chat'),
    newChat = document.querySelector('#new-chat'),
    main = document.querySelector('#main'),
    conversas = document.querySelector('#conversas'),
    listaConversas = document.querySelector('#list-chats'),
    desceChat = document.querySelector('#desce-chat'),
    fotoConversa = document.querySelector('#foto-chat'),
    linkDestino = document.querySelector('#link-destino'),
    abraConversa = document.getElementById('abra-conversa'),
    nomeConversa = document.querySelector('#main-title div'),
    voltarChat = document.querySelector('#voltar-chat'),
    voltarCrop = document.querySelector('#voltar-crop'),
    messagePhoto = document.querySelector('#message-photo'),
    cropImage = document.querySelector('#crop-image'),
    result = document.querySelector('.result-crop'),
    cropMessageButton = document.querySelector('#crop-message-button'),
    cropMessageField = document.querySelector('#crop-message-field'),
    cropMessageContainer = document.querySelector('#crop-message-container'),
    optionsChat = document.querySelector('#options-chat')

var idInterval, username, type

const mostrarMensagens = (dados) => {
    dados.forEach(item => {
        let msg = document.createElement('div')

        if (item.origemMensagem == type) {
            msg.setAttribute('class', 'message-myself')
        } else {
            msg.setAttribute('class', 'message-other')
        }

        if (item.imagemMensagem) {
            let img = document.createElement('img')
            img.src = '../' + item.imagemMensagem

            msg.append(img)
        }

        msg.append(item.conteudoMensagem)

        let horaMsg = document.createElement('span')
        horaMsg.setAttribute('class', 'time')
        horaMsg.innerText = item.horaMensagem

        msg.append(horaMsg)
        chat.append(msg)
    })
}

const consultaMensagens = async (apelido) => {
    const response = await fetch(`../api/chat/?type=messages&username=${apelido}`)
    const data = await response.json()

    return data
}

const resgatarMensagens = async (nome, foto, apelido) => {

    clearTimeout(idInterval)

    mainMessageField.focus()

    chat.innerText = ''
    conversas.classList.toggle('hide')
    main.classList.toggle('hide')


    optionsChat.classList.remove('hide')
    chat.classList.remove('hide')
    mainMessageContainer.classList.remove('hide')

    fotoConversa.classList.remove('hide')
    abraConversa.classList.add('hide')

    fotoConversa.src = foto
    nomeConversa.innerText = nome
    username = apelido

    linkDestino.href = "../profile?user=" + apelido
    linkDestino.classList.remove('hide')

    var dadosAnteriores = await consultaMensagens(apelido)

    mostrarMensagens(dadosAnteriores)

    idInterval = setInterval(async () => {
        var dadosAtuais = await consultaMensagens(username)

        if (JSON.stringify(dadosAnteriores) != JSON.stringify(dadosAtuais)) {
            var mensagens = dadosAtuais.slice(dadosAnteriores.length)
            mostrarMensagens(mensagens)

            dadosAnteriores = dadosAtuais

            chat.scroll({
                top: chat.scrollHeight,
                behavior: "smooth"
            })
        }
    }, 350)
    chat.scroll({
        top: chat.scrollHeight
    })
    showScrollDown()
}

const preencherLista = async (url, elemento) => {

    elemento.innerText = ''

    const response = await fetch(url)
    const data = await response.json()

    let conversas = data

    conversas.forEach(item => {
        let conversaItem = document.createElement('div')
        conversaItem.setAttribute('class', 'chat-item')

        let foto = document.createElement('div')
        foto.setAttribute('class', 'chat-foto')

        let img = document.createElement('img')
        img.src = "../" + item.foto

        foto.append(img)

        let nome = document.createElement('div')
        nome.setAttribute('class', 'chat-name')
        nome.innerText = item.name

        let apelido = document.createElement('div')
        apelido.setAttribute('class', 'chat-username')
        apelido.innerText = '@' + item.username

        conversaItem.append(foto)
        conversaItem.append(nome)
        conversaItem.append(apelido)

        conversaItem.addEventListener('click', () => resgatarMensagens(item.name, "../" + item.foto, item.username))

        elemento.appendChild(conversaItem)
    })
}

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

        let formData = new FormData();

        formData.append('conteudo', textoMensagem)
        formData.append('username', username)

        fetch('../api/chat/index.php', {
            method: 'POST',
            header: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: formData
        })
    }
}

const enviarMensagemCrop = () => {
    let textoMensagem = cropMessageField.value.trim();

    let canvas = cropper.getCroppedCanvas({
        width: 512,
        height: 512
    })

    canvas.toBlob(function (blob) {

        cropMessageField.value = ''

        let formData = new FormData()

        formData.append('imagem', blob, 'photo.png')
        formData.append('conteudo', textoMensagem)
        formData.append('username', username)

        fetch('../api/chat/', {
            method: 'POST',
            header: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: formData
        })
        cropImage.classList.toggle('hide')
    })
}

cropMessageButton.addEventListener('click', enviarMensagemCrop)
cropMessageButton.addEventListener('keypress', (event) => {
    if (event.keyCode == 13) {
        enviarMensagemCrop()
    }
})

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

window.onload = () => {
    setTimeout(async () => {
        await preencherLista('../api/chat/?type=chats', listaConversas)

    }, 750)
}
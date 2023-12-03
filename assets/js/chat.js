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
    acessarPerfil = document.querySelector('#acessar-perfil'),
    abraConversa = document.getElementById('abra-conversa'),
    nomeConversa = document.querySelector('#main-title div'),
    voltarChat = document.querySelector('#voltar-chat'),
    messagePhoto = document.querySelector('#message-photo'),
    messageAudio = document.querySelector('#message-audio'),
    messageDocument = document.querySelector('#message-document'),
    cropImage = document.querySelector('#crop-image'),
    previewAudio = document.querySelector('#preview-audio'),
    result = document.querySelector('.result-crop'),
    cropMessageButton = document.querySelector('#crop-message-button'),
    cropMessageField = document.querySelector('#crop-message-field'),
    cropMessageContainer = document.querySelector('#crop-message-container'),
    optionsChat = document.querySelector('#options-chat'),
    recordButton = document.querySelector('#record-message-button'),
    stopButton = document.querySelector('#stop-recording-button'),
    recordMessageContainer = document.querySelector('#record-message-container'),
    previewFile = document.querySelectorAll('.preview-file'),
    previewAudioElement = previewAudio.querySelector('.audio'),
    profilePic = previewAudio.querySelector('.audio img'),
    sendAudioButton = document.querySelector('#send-audio-button')

let audio

previewFile.forEach(item => {
    item.querySelector('.voltar').addEventListener('click', () => {
        item.classList.add('hide')
    })
})

var idInterval, username, type

const mostrarMensagens = (dados) => {
    dados.forEach(item => {
        let msg = document.createElement('div')

        if (item.origemMensagem == type) {
            msg.setAttribute('class', 'message-myself')
        } else {
            msg.setAttribute('class', 'message-other')
        }

        if (item.arquivoMensagem) {

            var extension = item.arquivoMensagem.match(/\.[0-9a-z]+$/i);

            if (extension == ".mp3") {

                let fotoOrigem = document.createElement('img')
                fotoOrigem.className = "audio-photo"
                fotoOrigem.src = '../' + (item.origemMensagem == 0 ? item.fotoCliente : item.fotoVendedora)

                let start = document.createElement('div')
                start.className = "audio-options"

                let startStopButton = document.createElement('button')
                startStopButton.className = "start-stop-audio"
                startStopButton.innerHTML = "<i class='bi bi-play-fill'></i>"

                let waveform = document.createElement('div');
                waveform.className = "audio-wave"

                const wavesurfer = WaveSurfer.create({
                    container: waveform,
                    waveColor: item.origemMensagem == type ? '#ca35b0' : '#bbb',
                    height: 50,
                    progressColor: item.origemMensagem == type ? 'white' : 'gray',
                    dragToSeek: true,
                    cursorColor: 'white',
                    cursorWidth: 2,
                    barWidth: 6,
                    barGap: 2,
                    barRadius: 4,
                    url: `../${item.arquivoMensagem}`
                })

                let isPlaying = false;

                wavesurfer.on('click', () => {
                    wavesurfer.play()
                    startStopButton.innerHTML = "<i class='bi bi-pause-fill'></i>"
                    isPlaying = true
                })

                msg.classList.add('audio')

                let audioDuration = document.createElement('span')
                audioDuration.className = "duration"

                let duracao

                const audioContext = new (window.AudioContext || window.webkitAudioContext)();
                const audioUrl = `../${item.arquivoMensagem}`;

                fetch(audioUrl)
                    .then(response => response.arrayBuffer())
                    .then(data => audioContext.decodeAudioData(data))
                    .then(decodedData => {
                        duracao = decodedData.duration;
                        let duracaoSegundos = Math.floor(duracao % 60).toString().padStart(2, '0');
                        let duracaoMinutos = Math.floor(duracao / 60);

                        audioDuration.innerText = `${duracaoMinutos}:${duracaoSegundos}`
                    })

                startStopButton.addEventListener('click', (e) => {
                    wavesurfer.playPause()

                    if (!isPlaying) {
                        startStopButton.innerHTML = "<i class='bi bi-pause-fill'></i>"
                        isPlaying = true
                    } else {
                        startStopButton.innerHTML = "<i class='bi bi-play-fill'></i>"
                        isPlaying = false
                    }
                })

                start.append(startStopButton)

                msg.append(fotoOrigem)
                msg.append(start)
                msg.append(waveform)
                msg.append(audioDuration)
            } else if (extension == ".png") {
                let img = document.createElement('img')
                img.src = '../' + item.arquivoMensagem

                msg.append(img)
            } else {
                let documentElement = document.createElement('a')
                documentElement.className = "document"

                documentElement.download = "documento"

                documentElement.href = `../${item.arquivoMensagem}`

                let documentIcon = document.createElement('i')
                documentIcon.className = "bi bi-file-earmark-text-fill document-icon"

                let documentName = document.createElement('div')
                documentName.className = "document-name"

                documentName.innerText = "document" + extension

                documentElement.append(documentIcon)
                documentElement.append(documentName)

                msg.append(documentElement)
            }
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

    chat.classList.remove('hide')
    mainMessageContainer.classList.remove('hide')

    fotoConversa.classList.remove('hide')
    abraConversa.classList.add('hide')

    fotoConversa.src = foto
    nomeConversa.innerText = nome
    username = apelido

    linkDestino.classList.remove('hide')

    if (type == 0) {
        optionsChat.classList.remove('hide')
        linkDestino.href = "profile.php?user=" + apelido
        document.querySelector('#acessar-perfil') != null ? document.querySelector('#acessar-perfil').href = "profile.php?user=" + apelido : null
    }
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

        let ultimaMensagem = document.createElement('div')
        ultimaMensagem.setAttribute('class', 'chat-message')
        ultimaMensagem.innerText = item.remetente == type ? `Você: ${item.ultimaMensagem}` : `${item.username}: ${item.ultimaMensagem}`

        conversaItem.append(foto)
        conversaItem.append(nome)
        conversaItem.append(apelido)
        conversaItem.append(ultimaMensagem)

        conversaItem.addEventListener('click', () => resgatarMensagens(item.name, "../" + item.foto, item.username))

        elemento.appendChild(conversaItem)
    })
}

const preencherListaPesquisa = async (url, elemento) => {

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

        formData.append('arquivo', blob, 'photo.png')
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

mainMessageField.addEventListener('keyup', (e) => {

    if (e.target.value.length != 0) {
        mainMessageButton.classList.remove('hide')
        recordButton.classList.add('hide')
    } else {
        mainMessageButton.classList.add('hide')
        recordButton.classList.remove('hide')
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

voltarChat.addEventListener('click', () => {
    conversas.classList.toggle('hide')
    main.classList.toggle('hide')
})

let cronometro;
let recorder;
let audioChunks = [];

async function startRecording() {
    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
    recorder = new MediaRecorder(stream);

    recorder.ondataavailable = (event) => {
        if (event.data.size > 0) {
            audioChunks.push(event.data);
            const audioBlob = new Blob(audioChunks, { type: 'audio/mp3' });

            let formData = new FormData()

            formData.append('arquivo', audioBlob, 'audio.mp3')
            formData.append('username', username)

            fetch('../api/chat/', {
                method: 'POST',
                header: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: formData
            })

        }
    };

    recorder.onstop = () => {
        audioChunks = [];
        recordButton.disabled = false;

        recordMessageContainer.classList.add('hide')
        mainMessageContainer.classList.remove('hide')

        document.getElementById('time').innerText = "0:00"

        clearInterval(cronometro);
    };

    recorder.start();

    let tempoInicial = new Date().getTime();

    cronometro = setInterval(() => {

        let tempoAtual = new Date().getTime();

        let distancia = tempoAtual - tempoInicial;

        var minutos = Math.floor((distancia % (1000 * 60 * 60)) / (1000 * 60));
        var segundos = Math.floor((distancia % (1000 * 60)) / 1000).toString().padStart(2, '0');

        document.getElementById('time').innerText = `${minutos}:${segundos}`;

    }, 1000)

    recordMessageContainer.classList.remove('hide')
    mainMessageContainer.classList.add('hide')
}

function stopRecording() {
    recorder.stop();
}


stopButton.addEventListener('click', stopRecording)
recordButton.addEventListener('click', startRecording)

messageAudio.addEventListener('change', e => {
    previewAudio.classList.remove('hide')

    let wavePreview = document.createElement('div')
    wavePreview.className = 'audio-wave'

    previewAudioElement.innerHTML = ''

    if (e.target.files.length) {
        const reader = new FileReader();
        reader.onload = e => {
            if (e.target.result) {

                audio = e.target.result

                wave = WaveSurfer.create({
                    container: wavePreview,
                    waveColor: '#bbb',
                    height: 50,
                    progressColor: 'white',
                    dragToSeek: true,
                    cursorColor: 'white',
                    cursorWidth: 2,
                    barWidth: 6,
                    barGap: 2,
                    barRadius: 4,
                    url: e.target.result
                })

                isPlaying = false;

                wave.on('click', () => {
                    wave.play()
                    startStopButton.innerHTML = "<i class='bi bi-pause-fill'></i>"
                    isPlaying = true

                })

                let startStopButton = document.createElement('button')
                startStopButton.className = "start-stop-audio"
                startStopButton.innerHTML = "<i class='bi bi-play-fill'></i>"

                startStopButton.addEventListener('click', e => {
                    wave.playPause()
                    if (!isPlaying) {
                        startStopButton.innerHTML = "<i class='bi bi-pause-fill'></i>"
                        isPlaying = true
                    } else {
                        startStopButton.innerHTML = "<i class='bi bi-play-fill'></i>"
                        isPlaying = false
                    }
                })

                let audioDuration = document.createElement('span')
                audioDuration.className = "duration"

                let duracao

                const audioContext = new (window.AudioContext || window.webkitAudioContext)();

                fetch(e.target.result)
                    .then(response => response.arrayBuffer())
                    .then(data => audioContext.decodeAudioData(data))
                    .then(decodedData => {
                        duracao = decodedData.duration;
                        let duracaoSegundos = Math.floor(duracao % 60).toString().padStart(2, '0');
                        let duracaoMinutos = Math.floor(duracao / 60);

                        audioDuration.innerText = `${duracaoMinutos}:${duracaoSegundos}`
                    })

                previewAudioElement.appendChild(profilePic)
                previewAudioElement.appendChild(startStopButton)
                previewAudioElement.appendChild(wavePreview)
                previewAudioElement.appendChild(audioDuration)

            }
        };
        reader.readAsDataURL(e.target.files[0]);
    }

    messageAudio.value = ''
});


messageDocument.addEventListener('change', e => {

    if (e.target.files.length) {

        var extension = e.target.files[0].name.match(/\.[0-9a-z]+$/i);

        const reader = new FileReader();
        reader.onload = async e => {
            if (e.target.result) {

                let docBlob = await (await fetch(e.target.result)).blob()

                let formData = new FormData()

                formData.append('arquivo', docBlob, `document${extension}`)
                formData.append('username', username)

                fetch('../api/chat/', {
                    method: 'POST',
                    header: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: formData
                })

            }
        };
        reader.readAsDataURL(e.target.files[0]);
    }

    messageDocument.value = ''
});


sendAudioButton.addEventListener('click', async () => {

    previewAudio.classList.add('hide')

    let audioBlob = await (await fetch(audio)).blob()

    let formData = new FormData()

    formData.append('arquivo', audioBlob, 'audio.mp3')
    formData.append('username', username)

    fetch('../api/chat/', {
        method: 'POST',
        header: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: formData
    })
})

window.onload = () => {
    setTimeout(async () => {
        await preencherLista('../api/chat/?type=chats', listaConversas)

        const response = await fetch('../api/chat/?type=chats')
        const data = await response.json()

        var conversasAnteriores = data

        setInterval(async () => {
            const response = await fetch('../api/chat/?type=chats')
            const data = await response.json()

            var conversasAtuais = data;

            if (JSON.stringify(conversasAnteriores) != JSON.stringify(conversasAtuais)) {
                await preencherLista('../api/chat/?type=chats', listaConversas)

                conversasAnteriores = conversasAtuais
            }
        }, 3000)
    }, 750)
}
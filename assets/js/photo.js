
let photo = document.getElementById('imgPhoto');
let file = document.getElementById('filmage');
let result = document.querySelector('.result-crop');
let confirmarFoto = document.querySelector('#confirmar-foto')
let formCategoria = document.querySelector('#form-categoria')

photo.addEventListener('click', () => {
    file.click();
});

file.addEventListener('change', e => {
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

    photo.src = imgSrc;
});

formCategoria.addEventListener('submit', e => {
    e.preventDefault()
    e.stopPropagation()

    const nomeCategoria = document.querySelector('#nome-categoria').value
    document.querySelector('#nome-modal-categoria').innerText = nomeCategoria

    let canvas = cropper.getCroppedCanvas({
        width: 512,
        height: 512
    })

    canvas.toBlob(function (blob) {
        let formData = new FormData()

        formData.append('foto', blob, 'photo.png')
        formData.append('nome', nomeCategoria)

        fetch('../api/categoria/index.php', {
            method: 'POST',
            header: {
                'Accept': 'application/json',
                'Content-type': 'application/json'
            },
            body: formData
        }).then(() => {
            new bootstrap.Modal('#modalCate').toggle()
            setTimeout(() => location.reload, 2500)
        })
    })
})
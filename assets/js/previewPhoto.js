'use strict'

let photo = document.getElementById('imgPhoto');
let file = document.getElementById('filmage');

photo.addEventListener('click', () => {
    file.click();
});

file.addEventListener('change', () => { 
    if (file.files.length <= 0){
        return;
    }

    let reader = new FileReader();

    reader.onabort = () => {
        photo.src = reader.result;
    }

    reader.readAsDataURL(file.files)
});

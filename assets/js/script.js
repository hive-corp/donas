var loadingElements = document.querySelectorAll(".load"),
    placeholderElements = document.querySelectorAll(".placeholder-element"),
    alternarModo = document.querySelectorAll('[data-theme-toggle]'),
    noturnoSlider = document.querySelector('#noturno-slider'),
    html = document.querySelector('html')

alternarModo.forEach(item => {
    item.addEventListener('click', () => {
        if(localStorage.getItem('theme')!='dark'){
            localStorage.setItem('theme', 'dark')
        }else{
            localStorage.setItem('theme', 'light')
        }

        html.classList.toggle('dark')

        if(noturnoSlider != null){
            noturnoSlider.toggleAttribute('checked')
        }
    })
})

if(noturnoSlider != null){
    noturnoSlider.addEventListener('change', () => {
        if(localStorage.getItem('theme')!='dark'){
            localStorage.setItem('theme', 'dark')
        }else{
            localStorage.setItem('theme', 'light')
        }

        html.classList.toggle('dark')
    })
}

window.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        loadingElements.forEach((item) => {
            item.classList.remove("load");
        });
        placeholderElements.forEach((item) => {
            item.remove();
        });
    }, 750);
});

if (localStorage.getItem('theme') == 'dark') {
    html.classList.add('dark')
    if(noturnoSlider != null){
        noturnoSlider.setAttribute('checked', true)
    }
}
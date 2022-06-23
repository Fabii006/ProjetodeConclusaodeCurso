'use strict'

let photo = document.getElementById('imagem_preview');
let file = document.getElementById('imagem');

photo.addEventListener('click', () => {
    file.click();
});

file.addEventListener('change', () => {

    if (file.files.length <= 0) {
        return;
    }

    let reader = new FileReader();

    reader.onload = () => {
        photo.src = reader.result;
    }

    reader.readAsDataURL(file.files[0]);
});

function NovaTela() {
    let container = document.querySelector('.Container_editar');
    container.style.display = 'block';

    let container1 = document.querySelector('.Container_perfil');
    container1.style.display = 'none';
    let container2 = document.querySelector('nav');
    container2.style.display = 'none';
}

function Fechar() {
    let container = document.querySelector('.Container_editar');
    container.style.display = 'none';

    let container1 = document.querySelector('.Container_perfil');
    container1.style.display = 'block';
    let container2 = document.querySelector('nav');
    container2.style.display = 'block';
}

document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        $(".div_msg").fadeOut().empty();
    }, 3000);
}, false);
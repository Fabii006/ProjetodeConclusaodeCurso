function validar() {
    var numeros = /([0-9])/;
    var alfabeto = /([a-zA-Z])/;
    var minúscula = /([a-z])/;
    var maiúscula = /([A-Z])/;

    if ($('#password_nova').val().length < 6 && $('#password_nova').val().match(alfabeto)) {
        $('#password-status').html("<span>Insira no mínimo 6 caracteres!</span>");

    } else {
        if (!$('#password_nova').val().match(numeros)) {
            $('#password-status').html("<span>Fraca, insira pelo menos um número!</span>");
        }

        if ($('#password_nova').val().match(numeros)) {
            $('#password-status').html("<span>Fraca, insira pelo menos uma letra minúscula!</span>");
        }

        if ($('#password_nova').val().match(minúscula) && $('#password_nova').val().match(numeros)) {
            $('#password-status').html("<span>Médio, insira pelo menos uma letra maiúscula!</span>");
        }

        if ($('#password_nova').val().length > 6 && $('#password_nova').val().match(numeros) && $('#password_nova').val().match(minúscula) && $('#password_nova').val().match(maiúscula)) {
            $('#password-status').html("<span style='color:green; padding: 6px 20px;'>Senha forte!</span>");
        }
    }
}

var password = document.getElementById("password_nova");
var password_confirmar = document.getElementById("password_confirmar");

function validatePassword() {
    if (password.value != password_confirmar.value) {
        password_confirmar.setCustomValidity("Senhas diferentes!");
    } else {
        password_confirmar.setCustomValidity('');
    }
}

password.onchange = validatePassword;
password_confirmar.onkeyup = validatePassword;

document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        $(".div_msg").fadeOut().empty();
    }, 3000);
}, false);
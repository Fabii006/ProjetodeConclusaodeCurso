var btnLogar = document.querySelector("#logar");
var btnCadastrar = document.querySelector("#cadastrar");
var body = document.querySelector("body");

btnLogar.addEventListener("click", function () {
	body.className = "logar-js"
})

btnCadastrar.addEventListener("click", function () {
	body.className = "cadastrar-js"
});

var password = document.getElementById("password");
var confirm_password = document.getElementById("confirm_password");

function validatePassword() {
	if (password.value != confirm_password.value) {
		confirm_password.setCustomValidity("Senhas diferentes!");
	} else {
		confirm_password.setCustomValidity('');
	}
}

function validar() {
	var numeros = /([0-9])/;
	var alfabeto = /([a-zA-Z])/;
	var minúscula = /([a-z])/;
	var maiúscula = /([A-Z])/;

	if ($('#password').val().length < 6 && $('#password').val().match(alfabeto)) {
		$('#password-status').html("<span>Insira no mínimo 6 caracteres!</span>");

	} else {
		if (!$('#password').val().match(numeros)) {
			$('#password-status').html("<span>Fraca, insira pelo menos um número!</span>");
		}

		if ($('#password').val().match(numeros)) {
			$('#password-status').html("<span>Fraca, insira pelo menos uma letra minúscula!</span>");
		}

		if ($('#password').val().match(minúscula) && $('#password').val().match(numeros)) {
			$('#password-status').html("<span>Médio, insira pelo menos uma letra maiúscula!</span>");
		}

		if ($('#password').val().length > 6 && $('#password').val().match(numeros) && $('#password').val().match(minúscula) && $('#password').val().match(maiúscula)) {
			$('#password-status').html("<span style='color:green;'>Senha forte!</span>");
		}
	}
}

function formataCPF(cpf) {
	const elementoAlvo = cpf
	const cpfAtual = cpf.value

	let cpfAtualizado;

	cpfAtualizado = cpfAtual.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/,
		function (regex, argumento1, argumento2, argumento3, argumento4) {
			return argumento1 + '.' + argumento2 + '.' + argumento3 + '-' + argumento4;
		})
	elementoAlvo.value = cpfAtualizado;
}


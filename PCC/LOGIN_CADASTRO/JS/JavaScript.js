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

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

let campoSenha = document.querySelector('#password');
let botao = document.querySelector('#btn_cadastrar');

campoSenha.addEventListener('input', function () {
	verificaCampos();
});

campoConfirmarSenha.addEventListener('input', function () {
	verificaCampos();
});

function verificaCampos() {
	var numeros = /([0-9])/;
	var alfabeto = /([a-zA-Z])/;
	var minúscula = /([a-z])/;
	var maiúscula = /([A-Z])/;
	if (campoSenha.value.length >= 6 && campoSenha.value.match(numeros) && campoSenha.value.match(alfabeto) && campoSenha.value.match(minúscula) && campoSenha.value.match(maiúscula)) {
		botao.disabled = false;
	}
	else {
		botao.disabled = true;
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
const cardAlertaImagem = document.getElementById('card-alerta-img');
const cardAlertaTitulo = document.getElementById('card-alerta-titulo');
const cardAlertaNome = document.getElementById('card-alerta-nome');
const cardAlertaTipo = document.getElementById('card-alerta-tipo');
const cardAlertaEstado = document.getElementById('card-alerta-estado');
const cardAlertaCidade = document.getElementById('card-alerta-cidade');
const cardAlertaContato = document.getElementById('card-alerta-contato');
const cardAlertaDescricao = document.getElementById('card-alerta-descricao');

function Abrir_alerta_solicitar(idCard) {
    document.querySelector("nav").style.display = "none";
    document.querySelector(".VoceChegou").style.display = "none";
    document.querySelector(".solicitar").style.display = "none";
    document.querySelector(".card_alerta").style.display = "none";
    document.querySelector(".Abrir_alerta_solicitar").style.display = "block";

    cardAlertaImagem.src = document.querySelector(`#card__alertas-img-${idCard}`).src;
    cardAlertaTitulo.innerHTML = document.querySelector(`#card__alertas-titulo-${idCard}`).innerHTML;
    cardAlertaDescricao.innerHTML = document.querySelector(`#card__alertas-paragrafo-${idCard}`).innerHTML;
    cardAlertaNome.innerHTML = "Nome: " + document.querySelector(`#card__alertas-nome-${idCard}`).value;
    cardAlertaTipo.innerHTML = "Tipo: " + document.querySelector(`#card__alertas-tipo-${idCard}`).value;
    cardAlertaEstado.innerHTML = "Estado: " + document.querySelector(`#card__alertas-estado-${idCard}`).value;
    cardAlertaCidade.innerHTML = "Cidade: " + document.querySelector(`#card__alertas-cidade-${idCard}`).value;
    cardAlertaContato.innerHTML = "Contato: " + document.querySelector(`#card__alertas-contato-${idCard}`).value;
}

const cardAlertaImagem1 = document.getElementById('card-alerta-img1');
const cardAlertaTitulo1 = document.getElementById('card-alerta-titulo1');
const cardAlertaNome1 = document.getElementById('card-alerta-nome1');
const cardAlertaTipo1 = document.getElementById('card-alerta-tipo1');
const cardAlertaEstado1 = document.getElementById('card-alerta-estado1');
const cardAlertaCidade1 = document.getElementById('card-alerta-cidade1');
const cardAlertaContato1 = document.getElementById('card-alerta-contato1');
const cardAlertaProfissao1 = document.getElementById('card-alerta-profissao1');
const cardAlertaRegistro1 = document.getElementById('card-alerta-registro1');
const cardAlertaDescricao1 = document.getElementById('card-alerta-descricao1');

function Abrir_alerta_fornecer(idCard) {
    document.querySelector("nav").style.display = "none";
    document.querySelector(".VoceChegou").style.display = "none";
    document.querySelector(".fornecer").style.display = "none";
    document.querySelector(".card_alerta").style.display = "none";
    document.querySelector(".Abrir_alerta_fornecer").style.display = "block";

    cardAlertaImagem1.src = document.querySelector(`#card__alertas-img-${idCard}`).src;
    cardAlertaTitulo1.innerHTML = document.querySelector(`#card__alertas-titulo-${idCard}`).innerHTML;
    cardAlertaDescricao1.innerHTML = document.querySelector(`#card__alertas-paragrafo-${idCard}`).innerHTML;
    cardAlertaNome1.innerHTML = "Nome: " + document.querySelector(`#card__alertas-nome-${idCard}`).value;
    cardAlertaTipo1.innerHTML = "Tipo: " + document.querySelector(`#card__alertas-tipo-${idCard}`).value;
    cardAlertaEstado1.innerHTML = "Estado: " + document.querySelector(`#card__alertas-estado-${idCard}`).value;
    cardAlertaCidade1.innerHTML = "Cidade: " + document.querySelector(`#card__alertas-cidade-${idCard}`).value;
    cardAlertaContato1.innerHTML = "Contato: " + document.querySelector(`#card__alertas-contato-${idCard}`).value;
    cardAlertaProfissao1.innerHTML = "Profissão: " + document.querySelector(`#card__alertas-profissao-${idCard}`).value;
    cardAlertaRegistro1.innerHTML = "Registro: " + document.querySelector(`#card__alertas-registro-${idCard}`).value;
}

function Fechar_alerta_solicitar() {
    document.querySelector("nav").style.display = "block";
    document.querySelector(".VoceChegou").style.display = "flex";
    document.querySelector(".solicitar").style.display = "block";
    document.querySelector(".card_alerta").style.display = "block";
    document.querySelector(".Abrir_alerta_solicitar").style.display = "none";
}

function Fechar_alerta_fornecer() {
    document.querySelector("nav").style.display = "block";
    document.querySelector(".VoceChegou").style.display = "flex";
    document.querySelector(".fornecer").style.display = "block";
    document.querySelector(".card_alerta").style.display = "block";
    document.querySelector(".Abrir_alerta_fornecer").style.display = "none";
}

function Tipo_solicitar() {
    document.getElementById("fornecer").style.display = "none";
    document.getElementById("solicitar").style.display = "block";

    document.getElementById("tipo_solicitar").style.background = "transparent";
    document.getElementById("tipo_solicitar").style.color = "#43B996";
    document.getElementById("tipo_fornecer").style.background = "#43B996";
    document.getElementById("tipo_fornecer").style.color = "#FFFFFF";

}

function Tipo_fornecer() {
    document.getElementById("solicitar").style.display = "none";
    document.getElementById("fornecer").style.display = "block";

    document.getElementById("tipo_fornecer").style.background = "transparent";
    document.getElementById("tipo_fornecer").style.color = "#43B996";
    document.getElementById("tipo_solicitar").style.background = "#43B996";
    document.getElementById("tipo_solicitar").style.color = "#FFFFFF";

}

function pergunta() {
    return confirm('Tem certeza que deseja realizar a denúncia?');
}
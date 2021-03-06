const cardAlertaImagem = document.getElementById('card-alerta-img');
const cardAlertaTitulo = document.getElementById('card-alerta-titulo');
const cardAlertaNome = document.getElementById('card-alerta-nome');
const cardAlertaTipo = document.getElementById('card-alerta-tipo');
const cardAlertaEstado = document.getElementById('card-alerta-estado');
const cardAlertaCidade = document.getElementById('card-alerta-cidade');
const cardAlertaProfissao = document.getElementById('card-alerta-profissao');
const cardAlertaRegistro = document.getElementById('card-alerta-registro');
const cardAlertaContato = document.getElementById('card-alerta-contato');
const cardAlertaDescricao = document.getElementById('card-alerta-descricao');

function Abrir_alerta_ativo(idCard) {
    document.querySelector("nav").style.display = "none";
    document.querySelector(".alertas_ativos").style.display = "none";
    document.querySelector(".card_alerta").style.display = "none";
    document.querySelector(".Abrir_alerta_ativo").style.display = "block";

    cardAlertaImagem.src = document.querySelector(`#card__alertas-img-${idCard}`).src;
    cardAlertaTitulo.innerHTML = document.querySelector(`#card__alertas-titulo-${idCard}`).innerHTML;
    cardAlertaDescricao.innerHTML = document.querySelector(`#card__alertas-paragrafo-${idCard}`).innerHTML;
    cardAlertaNome.innerHTML = "Nome: " + document.querySelector(`#card__alertas-nome-${idCard}`).value;
    cardAlertaTipo.innerHTML = "Tipo: " + document.querySelector(`#card__alertas-tipo-${idCard}`).value;
    cardAlertaEstado.innerHTML = "Estado: " + document.querySelector(`#card__alertas-estado-${idCard}`).value;
    cardAlertaCidade.innerHTML = "Cidade: " + document.querySelector(`#card__alertas-cidade-${idCard}`).value;
    cardAlertaContato.innerHTML = "Contato: " + document.querySelector(`#card__alertas-contato-${idCard}`).value;
    cardAlertaProfissao.innerHTML = "Profissão: " + document.querySelector(`#card__alertas-profissao-${idCard}`).value;
    cardAlertaRegistro.innerHTML = "Registro: " + document.querySelector(`#card__alertas-registro-${idCard}`).value;
}

function Fechar_alerta_ativo() {
    document.querySelector("nav").style.display = "block";
    document.querySelector(".alertas_ativos").style.display = "block";
    document.querySelector(".card_alerta").style.display = "block";
    document.querySelector(".Abrir_alerta_ativo").style.display = "none";
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

function Abrir_alerta_denunciados(idCard) {
    document.querySelector("nav").style.display = "none";
    document.querySelector(".alertas_denunciados").style.display = "none";
    document.querySelector(".card_alerta").style.display = "none";
    document.querySelector(".Abrir_alerta_denunciados").style.display = "block";

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

function Fechar_alerta_denunciados() {
    document.querySelector("nav").style.display = "block";
    document.querySelector(".alertas_denunciados").style.display = "block";
    document.querySelector(".card_alerta").style.display = "block";
    document.querySelector(".Abrir_alerta_denunciados").style.display = "none";
}

function Tipo_ativo() {
    document.getElementById("denunciado").style.display = "none";
    document.getElementById("ativo").style.display = "block";

    document.getElementById("tipo_ativo").style.background = "transparent";
    document.getElementById("tipo_ativo").style.color = "#43B996";
    document.getElementById("tipo_denunciado").style.background = "#43B996";
    document.getElementById("tipo_denunciado").style.color = "#FFFFFF";
    
}

function Tipo_denunciado() {
    document.getElementById("ativo").style.display = "none";
    document.getElementById("denunciado").style.display = "block";

    document.getElementById("tipo_denunciado").style.background = "transparent";
    document.getElementById("tipo_denunciado").style.color = "#43B996";
    document.getElementById("tipo_ativo").style.background = "#43B996";
    document.getElementById("tipo_ativo").style.color = "#FFFFFF";
    
}

function pergunta() {
    return confirm('Tem certeza que deseja remover alerta?');
}
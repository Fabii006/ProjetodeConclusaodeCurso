function exibirFiguras() {
    document.getElementById("figuras").style.display = "block";
    document.getElementById("ong").style.display = "none";
}

function exibirOngs() {
    document.getElementById("figuras").style.display = "none";
    document.getElementById("ong").style.display = "block";
}

function pergunta() {
    return confirm('Para visualizar seus alertas é preciso efetuar o login.');
}
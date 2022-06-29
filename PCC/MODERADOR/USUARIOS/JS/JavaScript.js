function Tipo_ativo() {
    document.getElementById("inativo").style.display = "none";
    document.getElementById("ativo").style.display = "block";

    document.getElementById("tipo_ativo").style.background = "transparent";
    document.getElementById("tipo_ativo").style.color = "#43B996";
    document.getElementById("tipo_inativo").style.background = "#43B996";
    document.getElementById("tipo_inativo").style.color = "#FFFFFF";
    
}

function Tipo_inativo() {
    document.getElementById("ativo").style.display = "none";
    document.getElementById("inativo").style.display = "block";

    document.getElementById("tipo_inativo").style.background = "transparent";
    document.getElementById("tipo_inativo").style.color = "#43B996";
    document.getElementById("tipo_ativo").style.background = "#43B996";
    document.getElementById("tipo_ativo").style.color = "#FFFFFF";
    
}

function pergunta() {
    return confirm('Tem certeza que deseja desativar usuário?');
}
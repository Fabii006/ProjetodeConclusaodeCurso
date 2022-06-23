<?php
SESSION_start();
require "class_alerta.php";
include_once "../../CONEXAO/conexao.php";
$alerta = new alerta();
$alerta->set('titulo', $_POST['Titulo']);
$alerta->set('tipo', $_POST['Tipo']);
$alerta->set('estado', $_POST['Estado']);
$alerta->set('cidade', $_POST['Cidade']);
$alerta->set('contato', $_POST['Telefone']);
$alerta->set('descricao', $_POST['Descricao']);
$alerta->set('registro', $_POST['Registro']);
$alerta->set('profissao', $_POST['Profissao']);
$alerta->excluir_alerta();
if (!empty($_POST['Titulo']) and !empty($_POST['Tipo']) and !empty($_POST['Estado']) and !empty($_POST['Cidade']) and !empty($_POST['Telefone']) and !empty($_POST['Descricao'])) {
    if ($_POST['Tipo'] == "Fornecer ajuda") {
        if (!empty($_POST['Profissao']) and !empty($_POST['Registro'])) {
            header('location: ../index.php');
            $alerta->criar_alerta();
        } else {
            $_SESSION['msg2'] = "<p style='color: red; padding: 6px 20px;'>Preencha todos os campos!</p>";
        }
    } else {
        header('location: ../index.php');
        $alerta->criar_alerta();
    }
} else {
    $_SESSION['msg2'] = "<p style='color: red; padding: 6px 20px;'>Preencha todos os campos!</p>";
}

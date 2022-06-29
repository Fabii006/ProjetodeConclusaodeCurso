<?php
SESSION_start();
require "../CLASSE_ALERTA/class_alerta.php";
include_once "../CONEXAO/conexao.php";
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
$alerta->criar_alerta();
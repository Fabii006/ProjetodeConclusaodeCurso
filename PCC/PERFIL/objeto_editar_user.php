<?php
SESSION_start();
require "../CLASSE_USER/class_user.php";
include "../CONEXAO/conexao.php";
$usuario = new usuario();
$usuario->set('usuario', $_POST['usuario']);
$usuario->set('email', $_POST['email']);
$usuario->set('genero', $_POST['genero']);
$usuario->set('imagem_perfil', $_POST['imagem']);
$usuario->editar();
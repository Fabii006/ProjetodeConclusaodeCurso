<?php
SESSION_start();
require "../../CLASSE_USER/class_user.php";
include "../../CONEXAO/conexao.php";

$id = $_COOKIE['ID'];
$resultado = "SELECT * FROM usuario WHERE ID = '$id'";
$resultado = mysqli_query($conex, $resultado);
$row_usuario = mysqli_fetch_assoc($resultado);

if (password_verify($_POST['senha_atual'], $row_usuario['Senha'])) {
    //Verifica se a senha informada não contém uma caractere maiúscula, minúscula e pelo menos um número
    if (!preg_match('/[a-z]/', $_POST['senha_nova']) or !preg_match('/[A-Z]/', $_POST['senha_nova']) or !preg_match('/[0-9]/', $_POST['senha_nova'])) {
        header("location: ../index.php");
        $_SESSION['msg'] = "Senha fraca!";
    }
    //Verifica se as senhas são diferentes.
    elseif ($_POST['senha_nova'] !== $_POST['senha_confirmar']) {
        return true;
    } else {
        $usuario = new usuario();
        $usuario->set('senha', $_POST['senha_nova']);
        $usuario->alterar_senha();
    }
} else {
    header("location: ../index.php");
    $_SESSION['msg'] = "A senha informada não coincide com a sua senha atual!";
}

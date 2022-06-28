<?php
SESSION_start();
require "../../CLASSE_USER/class_user.php";
include_once "../../CONEXAO/conexao.php";

$user =  $_POST['usuario'];
//Buscando usuário no Banco de Dados.
$buscar_user = "SELECT ID FROM usuario WHERE Usuario='$user'";
$resultado_user = mysqli_query($conex, $buscar_user);

if ($_POST['sessao'] == 'login') {
    $usuario = new usuario();
    $usuario->set('usuario', $_POST['usuario']);
    $usuario->set('senha', $_POST['senha']);
    $usuario->logar();
} else {
    $usuario = new usuario();
    $usuario->set('nome', $_POST['nome']);
    $usuario->set('sobrenome', $_POST['sobrenome']);
    $usuario->set('nome_social', $_POST['nome_social']);
    $usuario->set('usuario', $_POST['usuario']);
    $usuario->set('email', $_POST['email']);
    $usuario->set('senha', $_POST['senha']);
    $usuario->set('senhaConfirmar', $_POST['senha2']);
    $usuario->set('nascimento', $_POST['nascimento']);
    $usuario->set('genero', $_POST['genero']);
    $usuario->set('cpf', $_POST['cpf']);

    //Passando o valor do input para a variável.
    $data = $_POST['nascimento'];
    //Separando yyyy, mm, ddd.
    list($ano, $mes, $dia) = explode('-', $data);
    //Data atual.
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    //Descobrindo a unix timestamp da data de nascimento do fulano.
    $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
    //Cálculo para descobrir a idade.
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

    //Verifica se a senha informada não contém uma caractere maiúscula, minúscula e pelo menos um número
    if (!preg_match('/[a-z]/', $_POST['senha']) OR !preg_match('/[A-Z]/', $_POST['senha']) OR !preg_match('/[0-9]/', $_POST['senha'])) {
        return true;
    }
    //Verifica se as senhas são diferentes.
    elseif ($_POST['senha'] !== $_POST['senha2']) {
        return true;
    }
    //Verifica se o usuário informado já está cadastrado 
    elseif ($resultado_user->num_rows != 0) {
        $_SESSION['msg'] = "Usuário já cadastrado!";
        header('Location: ../index.php');
    }
    //Verifica a idade do usuário.
    elseif ($idade < 18 or $idade > 100) {
        $_SESSION['msg'] = "Idade não permetida!";
        header('Location: ../index.php');
    } else {
        $usuario->cadastrar();
    }
}

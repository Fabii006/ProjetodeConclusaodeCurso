<?php
SESSION_start();
include("../../CONEXAO/conexao.php");
require "FUNCOES_PHP/functions.php";
$id = $_COOKIE['ID'];
$resultado = "SELECT * FROM usuario WHERE ID = '$id'";
$resultado = mysqli_query($conex, $resultado);
$row_usuario = mysqli_fetch_assoc($resultado);
if ($_COOKIE['continuar_logado']) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset='utf-8'>
        <title>HOME</title>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' href='CSS/Estilo.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&family=Open+Sans:wght@400;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    </head>

    <body>
        <nav>
            <div class="Div_logo">
                <img src="../../LOGO_IMG/logo.png" class="logo_site">
            </div>
            <div class="Div_titlesNav">
                <div class="div_nav">
                    <a href="../ALERTAS/index.php" class="title_nav title_cursor">ALERTAS</a>
                    <a href="./index.php" class="title_nav">USUÁRIOS</a>
                </div>
                <div class="dropdown">
                    <span>
                        <a href="../PERFIL/index.php" class="foto_perfil">
                            <img src="../../IMAGENS_PERFIL/<?= $row_usuario['Imagem_perfil'] ?>">
                        </a>
                    </span>
                    <div class="dropdown-content">
                        <p><a href="../PERFIL/index.php" class="text_drop ">Perfil</a></p>
                        <p><a href="../SENHA/index.php" class="text_drop ">Senha</a></p>
                        <p><a href="../../LOGOUT/Sair.php" class="text_drop ">Sair</a></p>
                    </div>
                </div>
            </div>
        </nav>
        <div class="card_alerta">
            <button class="button_card" id="tipo_ativo" onclick="Tipo_ativo();">ATIVOS</button>
            <button class="button_card button_card2" id="tipo_inativo" onclick="Tipo_inativo(); ">INATIVOS</button>
        </div>
        <div class="ativo" id="ativo">
            <div class="content-meusalertas">
                <?php foreach (user_ativo($conex) as $value) {  ?>
                    <div id="<?php echo $value['ID'] ?>" class="tela_user">
                        <img class="img_alerta" id="card__alertas-img-<?php echo $value['ID'] ?>" src="../../IMAGENS_PERFIL/<?php echo $value['Imagem_perfil'] ?>">
                        <div class="meusalertas-texto">
                            <h2 class="titles">ID: <?= $value['ID'] ?></h2>
                            <h2 class="titles">Nome: <?= $value['Nome'] ?> <?= $value['Sobrenome'] ?></h2>
                            <h2 class="titles">Nome social: <?= $value['Nome_social'] ?></h2>
                            <h2 class="titles">Usuário: <?= $value['Usuario'] ?></h2>
                            <h2 class="titles">Email: <?= $value['Email'] ?></h2>
                            <h2 class="titles">Nascimento: <?= $value['Nascimento'] ?></h2>
                            <h2 class="titles">Gênero: <?= $value['Genero'] ?></h2>
                            <h2 class="titles">CPF: <?= $value['CPF'] ?></h2>
                            <h2 class="titles">Status: <?= $value['Status'] ?></h2>
                        </div>
                        <form method="GET" action="./OBJETO/objeto.php" class="form_remover">
                            <input type="hidden" name="id_user" value="<?php echo $value['ID'] ?>">
                            <button type="submit" class="Excluir" name="desativar">DESATIVAR</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="inativo" id="inativo">
            <div class="content-meusalertas">
                <?php foreach (user_inativo($conex) as $value) {  ?>
                    <div id="<?php echo $value['ID'] ?>" class="tela_user">
                        <img class="img_alerta" id="card__alertas-img-<?php echo $value['ID'] ?>" src="../../IMAGENS_PERFIL/<?php echo $value['Imagem_perfil'] ?>">
                        <div class="meusalertas-texto">
                            <h2 class="titles">ID: <?= $value['ID'] ?></h2>
                            <h2 class="titles">Nome: <?= $value['Nome'] ?> <?= $value['Sobrenome'] ?></h2>
                            <h2 class="titles">Nome social: <?= $value['Nome_social'] ?></h2>
                            <h2 class="titles">Usuário: <?= $value['Usuario'] ?></h2>
                            <h2 class="titles">Email: <?= $value['Email'] ?></h2>
                            <h2 class="titles">Nascimento: <?= $value['Nascimento'] ?></h2>
                            <h2 class="titles">Gênero: <?= $value['Genero'] ?></h2>
                            <h2 class="titles">CPF: <?= $value['CPF'] ?></h2>
                            <h2 class="titles">Status: <?= $value['Status'] ?></h2>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <script src="JS/JavaScript.js"></script>
    </body>

    </html>
<?php
} else {
    header('location: ../../LOGOUT/Sair.php');
}
?>
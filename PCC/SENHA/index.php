<?php
SESSION_start();
include("../CONEXAO/conexao.php");
$id = $_COOKIE['ID'];
$resultado = "SELECT * FROM usuario WHERE ID = '$id'";
$resultado = mysqli_query($conex, $resultado);
$row_usuario = mysqli_fetch_assoc($resultado);

if ($_COOKIE['continuar_logado']) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' media='screen' href='../PERFIL/CSS/Estilo.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='CSS/Estilo.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&family=Open+Sans:wght@400;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
        <title>ALTERAR SENHA</title>
    </head>

    <body>
        <nav>
            <img src="../HOME/imagens/logo.png" class="logo">
            <div class="divNavBar">
                <a href="../ALERTAS/index.php" class="text_Nav">ALERTAS</a>
                <a href="" class="text_Nav">SAIBA MAIS</a>
                <a href="../MEUS_ALERTAS/index.php" class="text_Nav">MEUS ALERTAS</a>
                <div class="dropdown">
                    <span>
                        <a href="../PERFIL/index.php" class="foto_perfil">
                            <img src="../IMAGENS_PERFIL/<?= $row_usuario['Imagem_perfil'] ?>">
                        </a>
                    </span>
                    <div class="dropdown-content">
                        <p><a href="../PERFIL/index.php" class="text_drop ">PERFIL</a></p>
                        <p><a href="index.php" class="text_drop ">SENHA</a></p>
                        <p><a href="../LOGOUT/Sair.php" class="text_drop ">SAIR</a></p>
                    </div>
                </div>
            </div>
        </nav>
        <div class="Container">
            <h2 class="title_perfil">ALTERAR SENHA</h2>
            <div class="div_msg">
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
            </div>
            <form action="VALIDAR/objeto_senha.php" method="POST">
                <input type="password" class="password" name="senha_atual" id="password_atual" placeholder="Senha atual">
                <span id="password-status" class="Span_status"></span>
                <input type="password" name="senha_nova" id="password_nova" minlength="6" maxlength="15" onKeyUp="validar()" placeholder="Nova senha">
                <input type="password" name="senha_confirmar" id="password_confirmar" minlength="6" maxlength="15" placeholder="Confirmar nova senha">
                <button class="btn" type="submit">Confirmar</button>
            </form>
        </div>
        <script src="JS/JavaScript.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </body>

    </html>
<?php
} else {
    header('location: Sair.php');
}
?>
<?php
SESSION_start();
include("../CONEXAO/conexao.php");
$id = $_COOKIE['ID'];
$resultado = "SELECT * FROM usuario WHERE ID = '$id'";
$resultado = mysqli_query($conex, $resultado);
$row_usuario = mysqli_fetch_assoc($resultado);
//Passando o valor do input para a variável.
$data = $row_usuario['Nascimento'];
//Separando yyyy, mm, ddd.
list($ano, $mes, $dia) = explode('-', $data);
//Data atual.
$hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
//Descobrindo a unix timestamp da data de nascimento do fulano.
$nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
//Cálculo para descobrir a idade.
$idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

if ($_COOKIE['continuar_logado']) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' type='text/css' media='screen' href='CSS/Estilo.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&family=Open+Sans:wght@400;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
        <title>MEU PERFIL</title>
    </head>

    <body>
        <nav>
            <img src="../HOME/imagens/logo.png" class="logo">
            <div class="divNavBar">
                <a href="../ALERTAS/index.php" class="text_Nav">ALERTAS</a>
                <a href="../MEUS_ALERTAS/index.php" class="text_Nav">MEUS ALERTAS</a>
                <div class="dropdown">
                    <span>
                        <a href="../PERFIL/index.php" class="foto_perfil">
                            <img src="../IMAGENS_PERFIL/<?= $row_usuario['Imagem_perfil'] ?>">
                        </a>
                    </span>
                    <div class="dropdown-content">
                        <p><a href="../PERFIL/index.php" class="text_drop ">PERFIL</a></p>
                        <p><a href="../SENHA/index.php" class="text_drop ">SENHA</a></p>
                        <p><a href="../LOGOUT/Sair.php" class="text_drop ">SAIR</a></p>
                    </div>
                </div>
            </div>
        </nav>
        <div class="Container_perfil">
            <h2 class="title_perfil">MEU PERFIL</h2>
            <div class="div_msg">
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
            </div>
            <div class="div_pai">
                <img src="<?php echo "../IMAGENS_PERFIL/" . $row_usuario['Imagem_perfil']; ?>" class="Img_perfil">
            </div>
            <div class="div_filha">
                <p class="input">Nome: <?php echo $row_usuario['Nome'] . ' ' . $row_usuario['Sobrenome'] ?></p>
                <p class="input">Nome social: <?php echo $row_usuario['Nome_social'] ?></p>
                <p class="input">Usuário: <?php echo $row_usuario['Usuario'] ?></p>
                <p class="input">Email: <?php echo $row_usuario['Email'] ?></p>
                <p class="input">Idade: <?php echo $idade . ' anos' ?></p>
                <p class="input">Gênero: <?php echo $row_usuario['Genero'] ?></p>
            </div>
            <button class="btn" onclick="NovaTela()">Editar</button>
        </div>
        <div class="Container_editar">
            <h2 class="title_perfil">EDITAR PERFIL</h2>
            <form action="objeto_editar_user.php" method="POST" enctype="multipart/form-data">
                <div class="div_pai">
                    <label><img id="imagem_preview" src="<?php echo "../IMAGENS_PERFIL/" . $row_usuario['Imagem_perfil']; ?>" class="Img_perfil Img_perfil2"></label>
                    <input type="file" style="display: none;" accept="image/" name="imagem" id="imagem" />
                </div>
                <div class="div_filha">
                    <p class="input input2"><?php echo $row_usuario['Nome'] . ' ' . $row_usuario['Sobrenome'] ?></p>
                    <p class="input input2"><?php echo $row_usuario['Nome_social'] ?></p>
                    <input type="text" name="usuario" value="<?php echo $row_usuario['Usuario'] ?>">
                    <input type="email" name="email" value="<?php echo $row_usuario['Email'] ?>">
                    <p class="input input2"><?php echo $idade . ' anos' ?></p>
                    <select name="genero" id="genero" class="input select">
                        <option value=""><?php echo $row_usuario['Genero'] ?></option>
                        <option value="Mulher_cis">Mulher cis</option>
                        <option value="Homem_cis">Homem cis</option>
                        <option value="Mulher_trans">Mulher trans</option>
                        <option value="Homem_trans">Homem trans</option>
                        <option value="Não-binário">Não-binário</option>
                        <option value="N_especificar">Não especificar</option>
                    </select>
                    <button type="submit" name="btn_confirmar" id="btn_confirmar" class="btn_2">Confirmar</button>
            </form>
        </div>
        <button type="text" class="Fechar" onclick="Fechar()">X</button>
        <script src="JS/JavaScript.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
    </body>

    </html>
<?php
} else {
    header('location: Sair.php');
}
?>
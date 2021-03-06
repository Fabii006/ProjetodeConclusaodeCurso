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
        <title>Alertas</title>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' href='./CSS/Estilo.css'>
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
                    <a class="title_nav title_cursor">ALERTAS</a>
                    <a href="../USUARIOS/index.php" class="title_nav">USUÁRIOS</a>
                    <a href="../MEUS_ALERTAS/index.php" class="title_nav">MEUS ALERTAS</a>
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
            <button class="button_card" id="tipo_ativo" onclick="Tipo_ativo();">ALERTAS ATIVOS</button>
            <button class="button_card button_card2" id="tipo_denunciado" onclick="Tipo_denunciado(); ">DENUNCIADOS</button>
        </div>
        <div class="alertas_ativos" id="ativo">
            <div class="content-meusalertas">
                <?php foreach (ativos($conex) as $value) {  ?>
                    <div id="card__alertas-id-<?php echo $value['ID'] ?>" class="alertas">
                        <img class="img_alerta" id="card__alertas-img-<?php echo $value['ID'] ?>" src="../../IMAGENS_PERFIL/<?php echo $value['Imagem_perfil'] ?>">
                        <div class="meusalertas-texto" onclick="Abrir_alerta_ativo(<?php echo $value['ID'] ?>)">
                            <h2 class="title_alerta" id="card__alertas-titulo-<?php echo $value['ID'] ?>"><?= $value['Titulo'] ?></h2>
                            <input type="hidden" name="Nome" value="<?php echo $value['Nome']. ' '.$value['Sobrenome']?>" id="card__alertas-nome-<?php echo $value['ID'] ?>">
                            <input type="hidden" name="Tipo" value="<?php echo $value['Tipo'] ?>" id="card__alertas-tipo-<?php echo $value['ID'] ?>">
                            <input type="hidden" name="Estado" value="<?php echo $value['Estado'] ?>" id="card__alertas-estado-<?php echo $value['ID'] ?>">
                            <input type="hidden" name="Cidade" value="<?php echo $value['Cidade'] ?>" id="card__alertas-cidade-<?php echo $value['ID'] ?>">
                            <input type="hidden" name="Profissao" value="<?php echo $value['Profissao'] ?>" id="card__alertas-profissao-<?php echo $value['ID'] ?>">
                            <input type="hidden" name="Registro" value="<?php echo $value['Registro'] ?>" id="card__alertas-registro-<?php echo $value['ID'] ?>">
                            <input type="hidden" name="Contato" value="<?php echo $value['Contato'] ?>" id="card__alertas-contato-<?php echo $value['ID'] ?>">
                            <p class="description_alerta" id="card__alertas-paragrafo-<?php echo $value['ID'] ?>"><?php echo $value['Descricao'] ?></p>
                        </div>
                        <form method="POST" action="./OBJETO/objeto.php" class="DivExcluirAlerta">
                            <input type="hidden" name="id_alerta" value="<?php echo $value['ID'] ?>">
                            <button type="submit" class="Excluir_alerta" name="remover" onclick="return pergunta();">REMOVER</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="Abrir_alerta_ativo Abrir_alerta" id="card-alerta-id">
            <a href="#ativo"><button class="Fechar_alerta" onclick="Fechar_alerta_ativo()">X</button></a>
            <img class="img_perfil_alerta" id="card-alerta-img" src="">
            <div class="Textos_AbrirAlertas">
                <h2 class="Title_abrirAlerta" id="card-alerta-titulo"></h2>
                <h2 class="titles" id="card-alerta-nome"></h2>
                <h2 class="titles" id="card-alerta-tipo"></h2>
                <h2 class="titles" id="card-alerta-estado"></h2>
                <h2 class="titles" id="card-alerta-cidade"></h2>
                <h2 class="titles" id="card-alerta-profissao"></h2>
                <h2 class="titles" id="card-alerta-registro"></h2>
                <h2 class="titles" id="card-alerta-contato"></h2>
            </div>
            <h2 class="Title_abrirAlerta Title_abrirAlerta2">Descrição</h2>
            <p class="titles description_abrirAlerta" id="card-alerta-descricao"></p>
        </div>
        <div class="alertas_denunciados" id="denunciado">
            <div class="content-meusalertas">
                <?php foreach (denunciados($conex) as $value) {  ?>
                    <div id="card__alertas-id-<?php echo $value['ID'] ?>" class="alertas">
                        <img class="img_alerta" id="card__alertas-img-<?php echo $value['ID'] ?>" src="../../IMAGENS_PERFIL/<?php echo $value['Imagem_perfil'] ?>">
                        <div class="meusalertas-texto" onclick="Abrir_alerta_denunciados(<?php echo $value['ID'] ?>)">
                            <h2 class="title_alerta" id="card__alertas-titulo-<?php echo $value['ID'] ?>"><?= $value['Titulo'] ?></h2>
                            <input type="hidden" name="Nome" value="<?php echo $value['Nome'].' '.$value['Sobrenome']?>" id="card__alertas-nome-<?php echo $value['ID'] ?>">
                            <input type="hidden" name="Tipo" value="<?php echo $value['Tipo'] ?>" id="card__alertas-tipo-<?php echo $value['ID'] ?>">
                            <input type="hidden" name="Estado" value="<?php echo $value['Estado'] ?>" id="card__alertas-estado-<?php echo $value['ID'] ?>">
                            <input type="hidden" name="Cidade" value="<?php echo $value['Cidade'] ?>" id="card__alertas-cidade-<?php echo $value['ID'] ?>">
                            <input type="hidden" name="Contato" value="<?php echo $value['Contato'] ?>" id="card__alertas-contato-<?php echo $value['ID'] ?>">
                            <input type="hidden" name="Profissao" value="<?php echo $value['Profissao'] ?>" id="card__alertas-profissao-<?php echo $value['ID'] ?>">
                            <input type="hidden" name="Registro" value="<?php echo $value['Registro'] ?>" id="card__alertas-registro-<?php echo $value['ID'] ?>">
                            <p class="description_alerta" id="card__alertas-paragrafo-<?php echo $value['ID'] ?>"><?php echo $value['Descricao'] ?></p>
                        </div>
                        <form method="POST" action="./OBJETO/objeto.php" class="DivExcluirAlerta">
                            <input type="hidden" name="id_alerta" value="<?php echo $value['ID'] ?>">
                            <button type="submit" class="Excluir_alerta" name="remover">REMOVER</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="Abrir_alerta_denunciados Abrir_alerta" id="card-alerta-id">
            <a href="#denunciado"><button class="Fechar_alerta" onclick="Fechar_alerta_denunciados()">X</button></a>
            <img class="img_perfil_alerta" id="card-alerta-img1">
            <div class="Textos_AbrirAlertas">
                <h2 class="Title_abrirAlerta" id="card-alerta-titulo1"></h2>
                <h2 class="titles" id="card-alerta-nome1"></h2>
                <h2 class="titles" id="card-alerta-tipo1"></h2>
                <h2 class="titles" id="card-alerta-estado1"></h2>
                <h2 class="titles" id="card-alerta-cidade1"></h2>
                <h2 class="titles" id="card-alerta-profissao1"></h2>
                <h2 class="titles" id="card-alerta-registro1"></h2>
                <h2 class="titles" id="card-alerta-contato1"></h2>
            </div>
            <h2 class="Title_abrirAlerta Title_abrirAlerta2">Descrição</h2>
            <p class="titles description_abrirAlerta" id="card-alerta-descricao1"></p>
        </div>
        <script src="JS/JavaScript.js"></script>
    </body>

    </html>
<?php
} else {
    header('location: ../../LOGOUT/Sair.php');
}
?>
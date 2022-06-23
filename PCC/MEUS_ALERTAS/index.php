<?php
SESSION_start();
include_once "../CONEXAO/conexao.php";
require "VALIDAR/functions.php";
$id = @$_COOKIE['ID'];

$Buscar_usuario = "SELECT * FROM usuario WHERE ID = '$id'";
$resultado_busca = mysqli_query($conex, $Buscar_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_busca);

if (@$_COOKIE['continuar_logado']) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Meus_alertas</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='CSS/Estilo.css'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <!-- LINKS GOOGLE FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&family=Poppins:wght@600&display=swap" rel="stylesheet">
    </head>

    <body>
        <nav>
            <div class="Div_logo">
                <img src="../LOGO_IMG/logo.png" class="logo_site">
            </div>
            <div class="Div_titlesNav">
                <div class="div_nav">
                    <a href="../HOME/index.php" class="title_nav">Home</a>
                    <a href="../ALERTAS/index.php" class="title_nav">Alertas</a>
                    <a href="#" class="title_nav title_cursor">Meus alertas</a>
                </div>
                <div class="dropdown">
                    <span>
                        <a href="../PERFIL/index.php" class="foto_perfil">
                            <img src="../IMAGENS_PERFIL/<?= $row_usuario['Imagem_perfil'] ?>">
                        </a>
                    </span>
                    <div class="dropdown-content">
                        <p><a href="../PERFIL/index.php" class="text_drop ">Perfil</a></p>
                        <p><a href="../SENHA/index.php" class="text_drop ">Senha</a></p>
                        <p><a href="../LOGOUT/Sair.php" class="text_drop ">Sair</a></p>
                    </div>
                </div>
            </div>
        </nav>
        <div class="alerta_container">
            <div class="alerta_texto">
                <h2 class="Title_MeusAlertas">Meus Alertas</h2>
                <button class="Btn_AdicionarAlertas" onclick="CriarAlerta()">Adicionar</button>
                <div class="content_meusAlertas">
                    <?php foreach (getMyAlert($conex) as $value) { ?>
                        <div class="alertas" id="card__alertas-id-<?php echo $value['ID'] ?>">
                            <img class="img_alerta" id="card__alertas-img-<?php echo $value['ID'] ?>" src="../IMAGENS_PERFIL/<?php echo $row_usuario['Imagem_perfil'] ?>">
                            <div class="meusAlertas_texto" onclick="Abrir_alerta(<?php echo $value['ID'] ?>)">
                                <h2 class="title_alerta" id="card__alertas-titulo-<?php echo $value['ID'] ?>"><?= $value['Titulo'] ?></h2>
                                <input type="hidden" name="Nome" value="<?php echo $row_usuario['Nome'] ?>" id="card__alertas-nome-<?php echo $value['ID'] ?>">
                                <input type="hidden" name="Tipo" value="<?php echo $value['Tipo'] ?>" id="card__alertas-tipo-<?php echo $value['ID'] ?>">
                                <input type="hidden" name="Estado" value="<?php echo $value['Estado'] ?>" id="card__alertas-estado-<?php echo $value['ID'] ?>">
                                <input type="hidden" name="Cidade" value="<?php echo $value['Cidade'] ?>" id="card__alertas-cidade-<?php echo $value['ID'] ?>">
                                <input type="hidden" name="Contato" value="<?php echo $value['Contato'] ?>" id="card__alertas-contato-<?php echo $value['ID'] ?>">
                                <input type="hidden" name="Profissao" value="<?php echo $value['Profissao'] ?>" id="card__alertas-profissao-<?php echo $value['ID'] ?>">
                                <input type="hidden" name="Registro" value="<?php echo $value['Registro'] ?>" id="card__alertas-registro-<?php echo $value['ID'] ?>">
                                <p class="description_alertas" id="card__alertas-paragrafo-<?php echo $value['ID'] ?>"><?php echo $value['Descricao'] ?></p>
                            </div>
                            <form method="get" action="VALIDAR/objeto_alerta.php" class="DivExcluirAlerta">
                                <input type="hidden" name="id_alerta" value="<?php echo $value['ID'] ?>">
                                <button type="submit" class="Excluir_alerta" name="btn" id="btn">Excluir</button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <img src="IMAGENS/Push.gif" class="img_pus">
            </div>
        </div>
        <div class="Div_CriarAlertas">
            <div class="Primeira_coluna">
                <h2 class="Title_CriarAlerta">CRIANDO ALERTA</h2>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <form action="VALIDAR/objeto_alerta.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="Titulo" placeholder="Título" required>
                    <select name="Tipo" id="Tipo" class="select-tipo" required>
                        <option value="" disabled selected>Tipo</option>
                        <option value="Solicitar ajuda" data-id="1">Solicitar ajuda</option>
                        <option value="Fornecer ajuda" data-id="2">Fornecer ajuda</option>
                    </select>
                    <select name="Estado" class="select_menor" id="estado" onchange="buscaCidades(this.value)" required>
                        <option value="" disabled selected>Estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                    <select name="Cidade" class="select_menor" id="cidade">
                        <option value="" disabled selected>Cidade</option>
                    </select>
                    <div class="tipo_2">
                        <select name="Profissao" class="input_menor">
                            <option value="" disabled selected>Profissao</option>
                            <option value="Médico(a)">Médico(a)</option>
                            <option value="Psicólogo(a)">Psicólogo(a)</option>
                            <option value="Advogado(a)">Advogado(a)</option>
                            <option value="Enfermeiro(a)">Enfermeiro(a)</option>
                            <option value="Assistente social">Assistente social</option>
                        </select>
                        <input type="text" name="Registro" class="input_menor" placeholder="Registro profissional">
                    </div>
                    <input type="text" name="Telefone" maxlength="14" onblur="formataTel(this)" placeholder="Contato (somente números)">
                    <textarea name="Descricao" rows="10" cols="60" maxlength="1520" placeholder="Descrição" required></textarea>
                    <button type="submit" class="Button" id="btn" name="btn">CONFIRMAR</button>
                </form>
            </div>
            <div class="Segunda_coluna">
                <button class="Btn_fechar" onclick="Fechar()">X</button>
                <h2 class="Title_SegundaColuna">COMO FAÇO MEU ALERTA?</h2>
                <p class="description_alerta">
                    Preencha todas as informações corretamente de acordo com
                    as instruções dos campos, em tipo selecione Fornecer ajuda,
                    caso seu alerta almeja fornecer ajuda voluntária (é preciso
                    ser um profissional e comprovar com o respectivo registro), ou
                    solicitar ajuda, caso seja um usuário comum e necessita de ajuda. Aproveite!!!
                </p>
            </div>
        </div>
        <div class="Abrir_alerta">
            <button class="Fechar_alerta" onclick="Fechar()">X</button>
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
        <script src="JS/JavaScript.js"></script>
    </body>

    </html>
<?php
} else {
    header('location: ../LOGOUT/Sair.php');
}
?>
<?php
SESSION_start();
$containerCssAcesso = @$_GET['login'] == 'true' ? 'logar-js' : 'cadastrar-js';
if (@$_COOKIE['continuar_logado']) {
    header('location: ../ALERTAS/index.php');
    return true;
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset='utf-8'>
        <title>ACESSE ALERTE</title>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='CSS/Estilo.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&family=Open+Sans:wght@400;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
        </script>
    </head>

    <body class="<?= $containerCssAcesso ?>">
        <div class="container">
            <div class="content first-content">
                <div class="first-column">
                    <h2 class="title titulo">POR QUE EU DEVO ME CADASTR<br>AR?</h2>
                    <p class="description">
                        Aqui você pode criar alertas com pedidos de ajuda ou então, se for um profissional,
                        fornecendo ajuda, além de ficar por dentro de tudo sobre a história da comunidade
                        LGBT+ no Brasil e figuras importantes no nosso cenário atual.

                        Cadastre-se, é rápido, é fácil, é Alerte.
                    </p>
                    <p class="description">
                        Cadastre-se, é rápido, é fácil, é Alerte.
                    </p>
                    <button id="logar" class="btn btn_1">Já possuo conta</button>
                </div>
                <div class="second-column">
                    <h2 class="title title_1">CADASTRE-SE</h2>
                    <div class="div_msg">
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
                    </div>
                    <form name="cadastro" action="VALIDAR/objeto_user.php" class="form" method="POST">
                        <input type="text" name="nome" class="input_menor" placeholder="Nome" required>
                        <input type="text" name="sobrenome" class="input_menor" placeholder="Sobrenome" required>
                        <input type="text" name="nome_social" placeholder="Nome social">
                        <input type="text" name="usuario" placeholder="Usuário" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="text" name="cpf" id="btn" placeholder="CPF (SOMENTE NÚMEROS)" onblur="formataCPF(this)" pattern="[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}" required>
                        <span id="password-status" class="Span_status"></span>
                        <input type="password" name="senha" id="password" minlength="6" maxlength="15" onKeyUp="validar();" placeholder="Senha" required>
                        <input type="password" name="senha2" id="confirm_password" minlength="6" maxlength="15" placeholder="Confirmar Senha" required><br>
                        <input type="date" name="nascimento" id="nascimento" class="input_menor" placeholder="Nascimento" required>
                        <select name="genero" required>
                            <option value="" disabled selected>Gênero</option>
                            <option value="Mulher cis">Mulher cis</option>
                            <option value="Homem cis">Homem cis</option>
                            <option value="Mulher trans">Mulher trans</option>
                            <option value="Homem trans">Homem trans</option>
                            <option value="Não binário">Não-binário</option>
                            <option value="Não especificar">Não especificar</option>
                        </select>
                        <input type="hidden" name="sessao" value="cadastro">
                        <input type="submit" id="btn_cadastrar" class="btn" name="btn" value="CADASTRAR">
                    </form>
                </div>
            </div>
            <div class="content second-content">
                <div class="first-column">
                    <h2 class="title">ALERTE!</h2>
                    <p class="description description_2">Alerte. Sua plataforma de alertas online.</p>
                    <button type="submit" id="cadastrar" class="btn btn_1">Cadastre-se</button>
                </div>
                <div class="second-column">
                    <h2 class="title title_2">Login</h2>
                    <div class="div_msg">
                        <?php
                        if (isset($_SESSION['msg2'])) {
                            echo $_SESSION['msg2'];
                            unset($_SESSION['msg2']);
                        }
                        ?>
                    </div>
                    <form class="form" action="VALIDAR/objeto_user.php" name="logar" method="POST">
                        <input type="text" name="usuario" class="input_login" placeholder="Usuário" required>
                        <input type="password" name="senha" class="input_login" placeholder="Senha" required>
                        <a href="#" class="esqueci_senha">Esqueci senha</a>
                        <input type="hidden" name="sessao" value="login">
                        <button type="submit" class="btn btn_2">LOGAR</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="JS/JavaScript.js"></script>
    </body>

    </html>
<?php
}

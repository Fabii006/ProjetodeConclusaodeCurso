<?php
include("../CONEXAO/conexao.php");
require_once("FUNCAO_PHP/functions.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='CSS/Estilo.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&family=Open+Sans:wght@400;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <title>HOME</title>
</head>

<body>
    <nav>
        <img src="../LOGO_IMG/logo.png" class="logo">
        <div class="Div_titlesNav">
            <a href="index.php" class="title_nav home">HOME</a>
            <a href="../LOGIN_CADASTRO/index.php?login=true" class="title_nav">ALERTAS</a>
            <a href="#ong" onclick="exibirOngs();" class="title_nav">ONG'S</a>
            <a href="../MEUS_ALERTAS/index.php" class="title_nav">MEUS ALERTAS</a>
            <a href="../LOGIN_CADASTRO/index.php?login=true">
                <button class="btn_home">ACESSAR</button>
            </a>
        </div>
    </nav>
    <div class="div_1">
        <h2 class="hello">HELLO</h2>
        <h2 class="BemVindo">Bem vido ao Alerte!</h2>
        <p class="description">
            Este site é voltado para os interesses da comunidade LGBTQIA+,
            disponibilizando muito além de conhecimento, ajuda. Projetado
            e construído por Alessandro Gonçalves, Fabiane Carvalho e Izabella Antunes.
        </p>
        <a href="#figuras"><button class=" btn_home SaibaMais" onclick="exibirFiguras();">SAIBA MAIS</button></a>
        <img class="img_home" src="IMAGENS/imagemhome.png">
    </div>
    <div class="div_2">
        <h2 class="title_1">TUDO QUE VOCÊ IRÁ ENCONTRAR NESTE WESITE</h2>
        <h2 class="title_2">+ Conhecimento</h2>
        <div class="div_cards">
            <div class="cards" id="id_figuras" onclick="exibirFiguras();">
                <img src="IMAGENS/sr.png" class="icone_card_s">
                <h2 class="title_card">Figuras importantes</h2>
                <p class="description_card">
                    Conheça algumas personalidades da comunidade que transformam o Brasil diariamente.
                </p>
            </div>
            <a href="../LOGIN_CADASTRO/index.php?login=true">
                <div class="cards card_1">
                    <img src="IMAGENS/sd.png" class="icone_card_s">
                    <h2 class="title_card title_card2" id="id_alertas">Alertas</h2>
                    <p class="description_card description_card2">
                        Quer fazer um pedido de ajuda? Ou então, quer fornecer ajuda? Basta se cadastrar ou efetuar o login.
                    </p>
                </div>
            </a>
            <div class="cards" id="id_ong" onclick="exibirOngs();">
                <img src="IMAGENS/ere.png" class="icone_card_s">
                <h2 class="title_card">ONG’s importantes</h2>
                <p class="description_card">
                    Precisa de ajuda? Aqui listamos as principais ONG’s que auxiliam a comunidade LGBTQIA+ no Brasil.
                </p>
            </div>
        </div>
    </div>
    <div class="div_3" id="figuras">
        <h2 class="title_ONG">Figuras LGBTQIA+ importantes no cenário brasileiro</h2>
        <div class="div_cinza2">
            <img src="IMAGENS/ludmilla.png" class="img_artista">
            <div class="div_text">
                <h2 class="Subtitulo_artista">CANTORA</h2>
                <h2 class="titulo_artista">Ludmilla</h2>
                <p class="description_artista">
                    Ludmilla Oliveira da Silva, mais conhecida como Ludmilla e,
                    anteriormente, como MC Beyoncé, é uma cantora, compositora,
                    multi-instrumentista, atriz e empresária brasileira.
                    No dia 14 de janeiro de 2014, ela lançou a canção
                    "Sem Querer" sob o nome de MC Ludmilla, tornando-se
                    seu primeiro single com o novo nome artístico.
                    A artista é bissexual, tendo já se relacionado com homens
                    e mulheres. Desde outubro de 2018, tem um relacionamento
                    com a bailarina Brunna Gonçalves, elas casaram oficialmente
                    no dia 16 de dezembro de 2019, numa cerimônia realizada em
                    sua residência. Hoje a cantora tem vários hits para a conta,
                    além de um projeto muito especial, o numanice.
                </p>
            </div>
        </div>
        <div class="div_branco2">
            <div class="div_text2">
                <h2 class="Subtitulo_artista">CANTORA</h2>
                <h2 class="titulo_artista">Liniker</h2>
                <p class="description_artista">
                    Nascida em uma família de músicos, Liniker tem, pelo nome de batismo,
                    uma homenagem ao futebolista inglês Gary Lineker, artilheiro da Copa do
                    Mundo de 1986 e cresceu ouvindo samba, samba-rock e soul. Embora tenha
                    mostrado talento vocal desde cedo, possuía certa timidez justamente por
                    viver entre profissionais, e só começou a se arriscar a cantar depois de
                    iniciar a carreira teatral, na adolescência. Declara ser uma mulher trans
                    e usa pronomes femininos (ela/dela).
                </p>
            </div>
            <img src="IMAGENS/Liniker.png" class="img_artista2">
        </div>
        <div class="div_cinza2">
            <img src="IMAGENS/Glória.png" class="img_artista">
            <div class="div_text">
                <h2 class="Subtitulo_artista">CANTOR</h2>
                <h2 class="titulo_artista">Glória Groove (Daniel)</h2>
                <p class="description_artista">
                    Nascido na Vila Formosa, Zona Leste de São Paulo, o artista provém
                    de uma família humilde, tendo sido criado por sua mãe Gina Garcia com
                    ajuda de sua avó e sua tia. Começou a trabalhar com arte em 2002,
                    quando participou da nova formação do Balão Mágico. Em sua infância,
                    cantava no coral da igreja, onde teve uma forte referência de soul
                    e da black music. Isso foi determinante para a orientação do seu estilo
                    musical. O cantor tem destacado que é uma pessoa queer - termo que
                    representa pessoas que não se encaixam em padrões de gêneros
                    ou orientação sexual.
                </p>
            </div>
        </div>
        <div class="div_branco2">
            <div class="div_text2">
                <h2 class="Subtitulo_artista">CANTORA</h2>
                <h2 class="titulo_artista">Linn da Quebrada</h2>
                <p class="description_artista">
                    Lina Pereira dos Santos, mais conhecida como Linn da Quebrada, é uma
                    cantora, compositora, atriz, transformista e ativista social brasileira.
                    Linn descobriu um câncer nos testículos em 2014, necessitando retirar um
                    deles, enfrentando uma quimioterapia por três anos, alcançando a cura em
                    2017. Em 2021, aos 30 anos, Lina fez implante de próteses de silicone
                    mamária. Ela os descreveu para o UOL como um símbolo de transformação,
                    dizendo que queria que as pessoas a olhassem e a reconhecessem como
                    travesti. No mesmo ano, retificou seus documentos, passando a chamar-se
                    oficialmente Lina Pereira dos Santos.
                </p>
            </div>
            <img src="IMAGENS/Linna.png" class="img_artista2">
        </div>
        <div class="div_cinza2">
            <img src="IMAGENS/PauloG.png" class="img_artista">
            <div class="div_text">
                <h2 class="Subtitulo_artista">ARTOR/COMEDIANTE</h2>
                <h2 class="titulo_artista">Paulo Gustavo</h2>
                <p class="description_artista">
                    Nascido e criado em uma família de classe média da cidade de Niterói, na
                    Região Metropolitana do Rio de Janeiro, estudou no tradicional Colégio Salesiano
                    durante o ensino fundamental. Assumidamente bissexual desde sua adolescência,
                    casou-se em 20 de dezembro de 2015 com o dermatologista Thales Bretas. Foi escritor e
                    protagonista em inúmeros filmes importantes para o cinema nacional, bem como a
                    conhecida trilogia “Minha mãe é uma peça” e diversos projetos no Multishow.
                    No dia 05 de maio de 2021 foi constatada a sua morte em decorrência de quequelas da
                    COVID-19. Paulo ficará para sempre em nossos corações e telas.
                </p>
            </div>
        </div>
        <div class="div_branco2">
            <div class="div_text2">
                <h2 class="Subtitulo_artista">ATRIZ</h2>
                <h2 class="titulo_artista">Alice Braga</h2>
                <p class="description_artista">
                    Alice Braga Moraes foi criada por uma família católica. Sua exposição ao mundo
                    da atuação veio quando ainda era criança. Seu pai, Ninho Moraes, é jornalista,
                    e sua irmã, Rita, é produtora de cinema. Sua mãe, Ana Braga, e sua tia, Sônia
                    Braga, são atrizes, e Alice quase sempre ia com elas aos sets de filmagens
                    antes de despontar como atriz. É fluente em português, espanhol e inglês. Em
                    janeiro de 2020, Alice Braga assumiu o namoro com a também atriz Bianca
                    Comparato. As duas só deixaram o romance público após três anos de relacionamento.
                </p>
            </div>
            <img src="IMAGENS/Alice.png" class="img_artista2">
        </div>
        <div class="div_cinza2">
            <img src="IMAGENS/Laerte.png" class="img_artista">
            <div class="div_text">
                <h2 class="Subtitulo_artista">CARTUNISTA</h2>
                <h2 class="titulo_artista">Laerte</h2>
                <p class="description_artista">
                    Laerte Coutinho é uma cartunista e chargista brasileira, considerada uma das
                    artistas mais importantes da área no país. Em entrevista à Folha de S.Paulo,
                    em 2010, revelou por que abandonou alguns dos personagens antes presentes em
                    suas tiras, começou a praticar crossdressing e a se identificar como transgênero.
                    Nessa nova fase, participou de vários programas e matérias na mídia impressa e
                    eletrônica. Já em 2012, tornou-se cofundadora de uma instituição voltada a pessoas
                    com essa nuance de gênero, a ABRAT – Associação Brasileira de Transgêneros.
                </p>
            </div>
        </div>
        <div class="div_branco2">
            <div class="div_text2">
                <h2 class="Subtitulo_artista">CANTORA</h2>
                <h2 class="titulo_artista">Carol Biazin</h2>
                <p class="description_artista">
                    Aos oito anos de idade, Carol percebeu que tinha facilidade e habilidade para cantar,
                    inclusive, a música "I'm Yours", do cantor Jason Mraz, foi reproduzida pela cantora
                    infinitas vezes em cima de um balcão, e logo após começou a estudar violão. Em 2011,
                    ao vencer um festival escolar, ganhou uma participação no álbum da dupla Cléber &
                    Fernando, que eram jurados do festival. Após concluir o ensino médio, optou por cursar
                    música na Faculdade de Artes do Paraná (FAP). Em 2017, durante o The Voice Brasil,
                    Carol conheceu sua atual namorada e também cantora Day, também participante na competição.
                </p>
            </div>
            <img src="IMAGENS/Biazin.png" class="img_artista2">
        </div>
        <div class="div_cinza2">
            <img src="IMAGENS/Vittar.png" class="img_artista">
            <div class="div_text">
                <h2 class="Subtitulo_artista">CANTOR</h2>
                <h2 class="titulo_artista">Pabllo Vittar</h2>
                <p class="description_artista">
                    Sendo um sucesso sem precedentes como um artista musical drag queen, Pablo tem sido
                    creditado por influenciar o interesse do público sobre outros artistas musicais que
                    também são drag queens, além de artistas trans e travestis. A revista Time o incluiu
                    em sua lista dos Líderes da Próxima Geração, além de ser citado pela Forbes como
                    "a drag queen mais popular do mundo". É considerado um ícone gay e foi citado por Shannon
                    Sims, do The New York Times, como um "emblema de fluidez de gênero".
                </p>
            </div>
        </div>
        <div class="div_branco2">
            <div class="div_text2">
                <h2 class="Subtitulo_artista">CANTORA</h2>
                <h2 class="titulo_artista">Anitta</h2>
                <p class="description_artista">
                    Aos sete anos de idade, Anitta, na época ainda conhecida por Larissa, começou a cantar
                    em um coral de uma igreja católica no bairro Honório Gurgel, no Rio de Janeiro. Aos 16 anos,
                    cursou administração em uma escola técnica e foi chamada para estagiar na mineradora Vale.
                    Segundo a cantora, as aulas de marketing que teve durante o curso de administração lhes são
                    úteis até hoje, e se sente elogiada quando a chamam de um "caso de marketing", pois ela
                    mesma é quem planeja e executa seu próprio marketing. Anitta se intitula bissexual e vem
                    contribuindo para as lutas da comunidade há quase uma década.
                </p>
            </div>
            <img src="IMAGENS/Anitta.png" class="img_artista2">
        </div>
        <div class="div_cinza2">
            <img src="IMAGENS/Gadú.png" class="img_artista">
            <div class="div_text">
                <h2 class="Subtitulo_artista">CANTORA</h2>
                <h2 class="titulo_artista">Maria Gadú</h2>
                <p class="description_artista">
                    Aos 7 anos de idade já gravava músicas em fitas cassetes. Fez poucos meses de aulas de violão,
                    longe do suficiente para ler partituras, mas o necessário para criar suas próprias canções.
                    Fez, desde os 13 anos, shows em bares e festas de família em São Paulo. Nessa época adotou o
                    nome artístico Maria Aygadoux, porque não gostava do nome verdadeiro, Mayra, e passou a achar
                    bonito o sobrenome francês de seu produtor musical, passando a considerá-lo como um pai.
                    Assumidamente bissexual, sempre foi discreta quanto à sua vida pessoal.
                </p>
            </div>
        </div>
        <div class="div_branco2">
            <div class="div_text2">
                <h2 class="Subtitulo_artista">CANTORA</h2>
                <h2 class="titulo_artista">Cássia Eller</h2>
                <p class="description_artista">
                    Seu interesse pela música começou aos 14 anos, quando ganhou um violão de presente. Aprendeu
                    a tocar violão e falar inglês com as músicas dos Beatles. Aos 18 anos chegou a Brasília,
                    para onde sua família se mudou. Ali, cantou em coral, fez testes para musicais, trabalhou
                    em duas óperas como corista, cantou frevo, blues, rock e também tocou surdo em um grupo de samba.
                    Cássia despontou no mundo artístico em 1981, ao participar de um espetáculo de Oswaldo Montenegro.
                    Assumidamente bissexual, ela e a companheira Maria Eugênia ficaram juntas até o fim da vida da cantora.
                </p>
            </div>
            <img src="IMAGENS/Cássia.png" class="img_artista2">
        </div>
    </div>
    <div class="div_4" id="ong">
        <h2 class="title_ONG">ONG’s brasileiras que auxiliam a comunidade LGBTQIA+</h2>
        <div class="div_cinza">
            <h2 class="titulo">CASA1</h2>
            <h2 class="title_insta">INSTAGRAM: @casa1</h2>
            <p class="description_ongs">
                A casa um é um projeto que envolve centros culturais, sociais e de acolhimento e uma série
                de outras propostas e ações de saúde e diversidade. Com esse propósito, a instituição tem em
                sua base um forte trabalho voluntário e conta com doações de roupas, objetos e dinheiro – via 
                financiamento coletivo, transferência e depósito bancário, PicPay e PayPal.
            </p>
        </div>
        <div class="div_branco">
            <h2 class="titulo">EternamenteSou</h2>
            <h2 class="title_insta">INSTAGRAM: @eternamente.sou</h2>
            <p class="description_ongs">
                A ONG Eternamente Sou tem como objetivo a luta por um envelhecimento ativo, digno e acolhedor
                às minorias LGBT maiores de 60 anos. O projeto busca valorizar seus direitos e as memórias de
                sua vivência. Por isso, funciona como um centro de convivência que acolhe e integra por meio de
                voluntários (psicólogos, assistentes sociais, médicos e advogados), a fim da promoção da cidadania
                dessas pessoas. Atualmente, a instituição atua nos Estados de São Paulo, Rio de Janeiro e Santa Catarina.
            </p>
        </div>
        <div class="div_cinza">
            <h2 class="titulo">Casa Chama</h2>
            <h2 class="title_insta">INSTAGRAM: @casachama_org</h2>
            <p class="description_ongs">
                Surgiu em 2019 no estado de São Paulo com o objetivo de amparar as pessoas trans no atendimento
                de saúde, assistência jurídica e projetos culturais. A ONG acolhe pessoas transgênero e travestis
                presencialmente e dá apoio a centenas de outras remotamente. Para isso, o projeto conta com o apoio
                de voluntários e doações para manter o funcionamento.
            </p>
        </div>
        <div class="div_branco">
            <h2 class="titulo">Grupo Arco-íris</h2>
            <h2 class="title_insta">INSTAGRAM: @grupo_arco_iris</h2>
            <p class="description_ongs">
                Fundada em 1993 no Rio de Janeiro, possui foco na promoção de cidadania, direitos humanos, cultura,
                combate à violência, justiça social, prevenção de doenças e outras questões voltadas às pessoas da
                comunidade LGBTQIA+. O grupo também é fundador da ABGLT – Associação Brasileira de Gays, Lésbicas,
                Bissexuais, Travestis, Transexuais e Intersexos, além de realizar a Parada do Orgulho LGBTI – Rio.
            </p>
        </div>
        <div class="div_cinza">
            <h2 class="titulo">Casa Aurora</h2>
            <h2 class="title_insta">INSTAGRAM: @aurora_casalgbt</h2>
            <p class="description_ongs">
                Possui sede no centro de Salvador e trata-se de uma casa de acolhimento voltada ao público LGBTQI+.
                Seu foco é oferecer atendimento integral a jovens entre 18 e 29 anos que estão em situação de vulnerabilidade
                social e econômica por conta de sua identidade de gênero ou orientação sexual. Ademais, ela promove uma série
                de atividades socioeducativas, serviço jurídico, acompanhamento terapêutico e assistência psicológica, psiquiátrica
                e social. Como as demais ONGs, conta com a ajuda de voluntários e doadores pontuais e recorrentes via financiamento
                coletivo.
            </p>
        </div>
        <div class="div_branco">
            <h2 class="titulo">TransViver</h2>
            <h2 class="title_insta">INSTAGRAM: @transviver</h2>
            <p class="description_ongs">
                Possui sede em Pernambuco e nasceu para dar equilíbrio, estrutura e formação para pessoas da comunidade
                LGBTQIA+, com foco especial para homens e mulheres trans. Objetiva garantir um processo de inserção na
                sociedade por meio da formação, da empregabilidade e do acolhimento para pessoas em vulnerabilidade social.
                A TransViver deixa claro que toda doação é bem-vinda para manter as atividades da ONG em desenvolvimento.
            </p>
        </div>
        <div class="div_cinza">
            <h2 class="titulo">Casa Satine</h2>
            <h2 class="title_insta">INSTAGRAM: @casasatine</h2>
            <p class="description_ongs">
                A organização que possui origem no Mato Grosso do Sul visa acolher pessoas LGBTQIA+ através da arte, educação
                e cultura para promover seus projetos de vida pessoais. O foco são jovens e adultos maiores de 18 anos com
                vínculos familiares rompidos e em situação de vulnerabilidade social. Para continuar atendendo esse público,
                a Casa Satine precisa de voluntários e doações.
            </p>
        </div>
    </div>
    <script src="JS/JavaScript.js"></script>
    <img src="./IMAGENS/logo.png" class="logo_rodape">
    <h2 class="Footer">Copyright © 2022 Alerte.</h2>
</body>

</html>
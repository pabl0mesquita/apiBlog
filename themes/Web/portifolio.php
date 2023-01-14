<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= asset('css/boot.css') ;?>">
    <link rel="stylesheet" href="<?= asset('css/portifolio.css') ;?>">
</head>
<body>
    <!-- header -->
    <header>
        <div class="header_content">
            <span><img src="<?= asset('/img/port/downicon.svg') ;?>" alt=""></span>
            <ul>
                <li><a href="" class='active'>Portifólio</a></li>
                <li><a href="">Sobre</a></li>
                <li><a href="">Contato</a></li>
            </ul>
        </div>
    </header>

    <!-- main -->
    <main>
        <div class="content_main">
            <header>
                <h1>Projetos HTML5 & CSS3</h1>
            </header>

            <section class="projects flex">
                <article class="flex-3" style="--order: 4">
                    <img src="<?= asset('/img/port/portifolioIMG/bikcraft-1.jpg') ;?>" alt="">
                    <h2>BikCraft</h2>
                    <p>Projeto criado nos cursos de UI Design e HTML/CSS para Iniciantes. Dê uma olhada no <a href="<?= url('projeto/bikcraft') ?>" target ='__blank'>projeto</a> ou no <a href='https://github.com/Apache0001/Boot.git' target="_blank" rel="noopener noreferrer">github</a> </p>
                </article>

                <article class="flex-3" style="--order: 5">
                    <img src="<?= asset('/img/port/portifolioIMG/surfbot.jpg') ;?>" alt="">
                    <h2>Surfbot</h2>
                    <p>Projeto criado nos cursos de UI Design e HTML/CSS para Iniciantes. Dê uma olhada no <a href="">projeto</a> ou no <a href='https://github.com/Apache0001/Boot.git' target="_blank" rel="noopener noreferrer">github</a> </p>
                </article>

                <article class="flex-3" style="--order: 6">
                    <img src="<?= asset('/img/port/portifolioIMG/wildbeast.jpg') ;?>" alt="">
                    <h2>Lobos</h2>
                    <p>Projeto criado nos cursos de UI Design e HTML/CSS para Iniciantes. Dê uma olhada no <a href="<?=  url('/projeto/wildbeast') ;?>" target="_blank">projeto</a> ou no <a href='https://github.com/Apache0001/Boot.git' target="_blank" rel="noopener noreferrer">github</a> </p>
                </article>

                <article class="flex-3" style="--order: 7">
                    <img src="<?= asset('/img/port/portifolioIMG/homenew.png') ;?>" alt="">
                    <h2>Imobiliária</h2>
                    <p>Projeto criado nos cursos de UI Design e HTML/CSS para Iniciantes. Dê uma olhada no <a href="" target="_blank">projeto</a> ou no <a href='https://github.com/Apache0001/Boot.git' target="_blank" rel="noopener noreferrer">github</a> </p>
                </article>

                <article class="flex-3" style="--order: 8">
                    <img src="<?= asset('/img/port/portifolioIMG/screencapture.png') ;?>" alt="">
                    <h2>HTM5 & CSS3</h2>
                    <p>Projeto criado nos cursos de UI Design e HTML/CSS para Iniciantes. Dê uma olhada no <a href="<?= url('/projeto/html5css3') ?>" target="_blank">projeto</a> ou no <a href='https://github.com/Apache0001/Boot.git' target="_blank" rel="noopener noreferrer">github</a> </p>
                </article>

                <article class="flex-3" style="--order: 9">
                    <img src="<?= asset('/img/port/portifolioIMG/brafé.png') ;?>" alt="">
                    <h2>Brafé</h2>
                    <p>Projeto criado nos cursos de UI Design e HTML/CSS para Iniciantes. Dê uma olhada no <a href="<?= url('/projeto/brafe') ?>">projeto</a> ou no <a href='https://github.com/Apache0001/Boot.git' target="_blank" rel="noopener noreferrer">github</a> </p>
                </article>
            </section>

            

        </div>

        <div class="content_main">
            <header>
                <h1>Projetos API & WebServices</h1>
            </header>
        </div>

    </main>
</body>
</html>
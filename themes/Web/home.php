<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- style sheet-->
    <link rel="stylesheet" href="<?= asset('css/boot.css');?>">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
</head>
<body>
    <!-- content -->
    <div class="content">
        <div class="content_middle">
            <header>
                <img class='rounded' src="<?= asset('img/pabloImg.png') ?>" alt="Pablo Oliveira Mesquuita" title="Foto de Pablo Oliveira Mesquita">
                <h1>Pablo Mesquita<span>|Web Developer</span></h1>
                <!-- medial_social -->
                <div class="media_social">
                    <a href="#"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 3C8.373 3 3 8.373 3 15C3 21.016 7.432 25.984 13.206 26.852V18.18H10.237V15.026H13.206V12.927C13.206 9.452 14.899 7.927 17.787 7.927C19.17 7.927 19.902 8.03 20.248 8.076V10.829H18.278C17.052 10.829 16.624 11.992 16.624 13.302V15.026H20.217L19.73 18.18H16.624V26.877C22.481 26.083 27 21.075 27 15C27 8.373 21.627 3 15 3Z" fill="white"/>
                        </svg>
                        </a>
                    <a href="#"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.99805 0C3.13905 0 0 3.14195 0 7.00195V17.002C0 20.861 3.14195 24 7.00195 24H17.002C20.861 24 24 20.858 24 16.998V6.99805C24 3.13905 20.858 0 16.998 0H6.99805ZM19 4C19.552 4 20 4.448 20 5C20 5.552 19.552 6 19 6C18.448 6 18 5.552 18 5C18 4.448 18.448 4 19 4ZM12 6C15.309 6 18 8.691 18 12C18 15.309 15.309 18 12 18C8.691 18 6 15.309 6 12C6 8.691 8.691 6 12 6ZM12 8C10.9391 8 9.92172 8.42143 9.17157 9.17157C8.42143 9.92172 8 10.9391 8 12C8 13.0609 8.42143 14.0783 9.17157 14.8284C9.92172 15.5786 10.9391 16 12 16C13.0609 16 14.0783 15.5786 14.8284 14.8284C15.5786 14.0783 16 13.0609 16 12C16 10.9391 15.5786 9.92172 14.8284 9.17157C14.0783 8.42143 13.0609 8 12 8Z" fill="white"/>
                        </svg>
                        </a>
                </div>
            </header>
            <!-- nave menu-->
            <nav>
                <ul>
                    <a href="<?= url('/portifolio');?>" target="_blank"><li>Portifólio <span><img src="<?= asset('img/arrow.svg') ?>" alt=""></span> </li></a>
                    <a href="https://www.linkedin.com/in/pablo-oliveira-349b911b6/" target="_blank"><li>Linkedin <span><img src="<?= asset('img/arrow.svg') ?>" alt=""></span></li></a>
                    <a href="#"><li>GitHub <span><img src="<?= asset('img/arrow.svg') ?>" alt=""></span></li></a>
                    <!-- 
                    <a href="#"><li>Blog <span><img src="<?= asset('img/arrow.svg') ?>" alt=""></span></li></a>
                    -->
                    <a href="#"><li>Lattes <span><img src="<?= asset('img/arrow.svg') ?>" alt=""></span></li></a>
                </ul>
            </nav>
    
        </div>
    </div>
</body>
</html>
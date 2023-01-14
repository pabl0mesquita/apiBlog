<!DOCTYPE html>
<html>
  <head>
    <title>Wildbeast</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn:400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/projetos/wildbeast.css') ?>">

  </head>
  <body>
    
    <div class="estrutura">
      
      <header class="header">
        <a href="#" class="logo"><img src="<?= asset('/img/wildbeast/wildbeast.svg') ?>" alt="Wildbeast"></a>
        <nav>
          <ul>
            <li><a href="#">sobre</a></li>
            <li><a href="#">animais</a></li>
            <li><a href="#">contato</a></li>
          </ul>
        </nav>
      </header>
      
      <nav class="sidenav">
        <ul>
          <li><a href="#"><img src="<?= asset('/img/wildbeast/icones/cervo.svg') ?>" alt="Cervo"></a></li>
          <li><a href="#"><img src="<?= asset('/img/wildbeast/icones/leao.svg') ?>" alt="Leão"></a></li>
          <li><a href="#"><img src="<?= asset('/img/wildbeast/icones/gato.svg') ?>" alt="Gato"></a></li>
          <li><a href="#"><img src="<?= asset('/img/wildbeast/icones/vaca.svg') ?>" alt="Vaca"></a></li>
          <li><a href="#"><img src="<?= asset('/img/wildbeast/icones/ovelha.svg') ?>" alt="Ovelha"></a></li>
          <li><a href="#"><img src="<?= asset('/img/wildbeast/icones/abelha.svg') ?>" alt="Abelha"></a></li>
        </ul>
      </nav>
      
      <main class="content">
        <div class="titulo">
          <h1>Lobo Cinza</h1>
          <span>da família canis lupus</span>
        </div>
        
        <div class="caracteristicas">
          <div>
            <span class="numero">72</span>
            <span class="rotulo">kg</span>
          </div>
          <div>
            <span class="numero">13</span>
            <span class="rotulo">age</span>
          </div>
        </div>
        
        <p class="col-wide">É um sobrevivente da Era do Gelo, originário do Pleistoceno Superior, cerca de 300 mil anos atrás.[2] O sequenciamento de DNA e estudos genéticos reafirmam que o lobo cinzento é ancestral do cão doméstico.</p>
        
        <img class="imagem-1" src="<?= asset('/img/wildbeast/wolf1.jpg') ?>" alt="Wolf 1">
        
        <p class="destaque">É um sobrevivente da Era do Gelo, originário do Pleistoceno Superior, cerca de 300 mil anos atrás.[2] O sequenciamento de DNA e estudos.</p>
        
        <img class="imagem-2" src="<?= asset('/img/wildbeast/wolf2.jpg') ?>" alt="Wolf 2">
        
        <p>O peso e tamanho dos lobos variam muito em todo o mundo, tendendo a aumentar proporcionalmente com a latitude, como previsto pela teoria de Christian Bergmann. Em geral, a altura, medida a partir dos ombros, varia de 60 a 95 centímetros.</p>
        
        <p>O peso varia geograficamente. Em média, os lobos europeus pesam 38,5 kg; os lobos da América do Norte, 36 kg; os lobos indianos e árabes, 25 kg.[7] Embora raros, lobos com mais de 77 kg foram encontrados no Alasca, Canadá,[8] e na antiga União Soviética.</p>
        
        <blockquote class="citacao col-wide">
          <p>“Há algo no uivar do lobo que tira um homem do aqui e agora e o transporta para uma floresta da mente.”</p>
        </blockquote>
        
        <ul class="atributos">
          <li>Surgiu: 12.000 anos</li>
          <li>Tipo: Mamífero</li>
          <li>Idade Média: 13 anos</li>
          <li>Macho adulto: 80kg</li>
          <li>Fêmea adulta: 55kg</li>
          <li>Família: Lupus</li>
        </ul>
  
        <div class="informacoes">
          <p>É um sobrevivente da Era do Gelo, originário do Pleistoceno Superior, cerca de 300 mil anos atrás.[2] O sequenciamento de DNA e estudos genéticos reafirmam que o lobo cinzento é ancestral do cão doméstico.</p>
          <p>É um sobrevivente da Era do Gelo, originário do Pleistoceno Superior, cerca de 300 mil anos atrás.[2] O sequenciamento de DNA e estudos genéticos reafirmam que o lobo cinzento é ancestral do cão doméstico.</p>
        </div>
        
        <img class="col-wide" src="<?= asset('/img/wildbeast/wolf3.jpg') ?>" alt="Wolf 3">
        
      </main>
      
      <aside class="anuncios">
        <div class="anuncio-item">
          <img src="<?= asset('/img/wildbeast/anuncio-1.jpg') ?>" alt="Anuncio 1">
        </div>
        
        <div class="anuncio-item">
          <img src="<?= asset('/img/wildbeast/anuncio-2.jpg') ?>" alt="Anuncio 2">
        </div>
      </aside>
      
      <footer class="footer">
        <p>Origamid © 2012 - 2017. Alguns direitos reservados.</p>
      </footer>
      
    </div>
    
  </body>
</html>
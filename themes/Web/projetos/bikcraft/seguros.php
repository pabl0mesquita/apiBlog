<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Seguros | Bikcraft</title>
  <meta name="description" content="Seguros.">

  <link rel="stylesheet" href="<?= asset('/css/projetos/bikcraft/style.css')?>">
</head>

<body id="seguros">
  <!-- header -->
  <header class="header-bg">
        <div class="header container">
        <a href="<?= url('/projeto/bikcraft') ?>">
            <img src="<?= asset('/img/bikcraft/bikcraft.svg') ?>" width="136" height="32" alt="Bikcraft">
        </a>

        <nav aria-label="primaria">
            <ul class="header-menu font-1-m cor-0">
            <li><a href="<?= url('/projeto/bikcraft/bicicletas') ?>">Bicicletas</a></li>
            <li><a href="<?= url('/projeto/bikcraft/seguros') ?>">Seguros</a></li>
            <li><a href="<?= url('/projeto/bikcraft/contato') ?>">Contato</a></li>
            </ul>
        </nav>
        </div>
    </header>
    <!-- end header -->

  <main class="seguros-bg">
    <div class="titulo-bg">
      <div class="titulo container">
        <p class="font-2-l-b cor-5">Escolha o seguro</p>
        <h1 class="font-1-xxl cor-0">você seguro<span class="cor-p1">.</span></h1>
      </div>
    </div>

    <div class="seguros container">

      <div class="seguros-item">
        <h3 class="font-1-xl cor-6">PRATA</h3>
        <span class="font-1-xl cor-0">R$ 199 <span class="font-1-xs cor-6">mensal</span></span>
        <ul class="font-2-m cor-0">
          <li>Duas trocas por ano</li>
          <li>Assistência técnica</li>
          <li>Suporte 08h às 18h</li>
          <li>Cobertura estadual</li>
        </ul>
        <a class="botao secundario" href="./orcamento.html">Inscreva-se</a>
      </div>

      <div class="seguros-item">
        <h3 class="font-1-xl cor-p1">OURO</h3>
        <span class="font-1-xl cor-0">R$ 299 <span class="font-1-xs cor-6">mensal</span></span>
        <ul class="font-2-m cor-0">
          <li>Cinco trocas por ano</li>
          <li>Assistência especial</li>
          <li>Suporte 24h</li>
          <li>Cobertura nacional</li>
          <li>Desconto em parceiros</li>
          <li>Acesso ao Clube Bikcraft</li>
        </ul>
        <a class="botao" href="./orcamento.html">Inscreva-se</a>
      </div>
    </div>
  </main>

  <article class="vantagens-bg">
    <div class="vantagens container">
      <h2 class="font-1-xxl cor-0">vantagens<span class="cor-p1">.</span></h2>
      <ul>
        <li>
          <img src="<?= asset('/img/bikcraft/icones/eletrica.svg') ?>" alt="">
          <h3 class="font-1-l cor-0">Reparo Elétrico</h3>
          <p class="font-2-s cor-5">Garantimos o reparo completo do seu motor em caso de falhas. Sabemos que falhas são raras, mas estamos aqui para caso ocorra.</p>
        </li>
        <li>
          <img src="<?= asset('/img/bikcraft/icones/carbono.svg') ?>" alt="">
          <h3 class="font-1-l cor-0">Carbono</h3>
          <p class="font-2-s cor-5">Nossos quadros são feitos para durar para sempre. Mas caso algo ocorra, ficamos felizes em reparar.</p>
        </li>
        <li>
          <img src="<?= asset('/img/bikcraft/icones/sustentavel.svg') ?>" alt="">
          <h3 class="font-1-l cor-0">Sustentável</h3>
          <p class="font-2-s cor-5">Trabalhamos com a filosofia de desperdício zero. Qualquer parte defeituosa é reciclada e reutilizada em outro projeto.</p>
        </li>
        <li>
          <img src="<?= asset('/img/bikcraft/icones/rastreador.svg') ?>" alt="">
          <h3 class="font-1-l cor-0">Rastreador</h3>
          <p class="font-2-s cor-5">Utilizamos o GPS da sua Bikcraft em conjunto com especialistas em segurança para efetuarmos a recuperação.</p>
        </li>
        <li>
          <img src="<?= asset('/img/bikcraft/icones/seguro.svg') ?>" alt="">
          <h3 class="font-1-l cor-0">Segurança</h3>
          <p class="font-2-s cor-5">Com o seguro Bikcraft você pode ficar tranquilo em saber que o seu dinheiro não será perdido em casos de roubo.</p>
        </li>
        <li>
          <img src="<?= asset('/img/bikcraft/icones/velocidade.svg') ?>" alt="">
          <h3 class="font-1-l cor-0">Rapidez</h3>
          <p class="font-2-s cor-5">A sua Bikcraft ficará pronta para uso no mesmo dia, caso você traga ela para ser reparada em uma das filiais.</p>
        </li>
      </ul>
    </div>
  </article>

  <article class="perguntas container">
    <h2 class="font-1-xxl">perguntas frequentes<span class="cor-p1">.</span></h2>

    <dl>
      <div>
        <dt class="font-1-m-b">Qual forma de pagamento vocês aceitam?</dt>
        <dd class="font-2-s cor-9">Aceitamos pagamentos parcelados em todos os cartões de crédito. Para pagamentos à vista também aceitarmos PIX e Boleto através do PagSeguro.</dd>
      </div>
      <div>
        <dt class="font-1-m-b">Como posso entrar em contato?</dt>
        <dd class="font-2-s cor-9">Aceitamos pagamentos parcelados em todos os cartões de crédito. Para pagamentos à vista também aceitarmos PIX e Boleto através do PagSeguro.</dd>
      </div>
      <div>
        <dt class="font-1-m-b">Vocês possuem algum desconto?</dt>
        <dd class="font-2-s cor-9">Aceitamos pagamentos parcelados em todos os cartões de crédito. Para pagamentos à vista também aceitarmos PIX e Boleto através do PagSeguro.</dd>
      </div>
      <div>
        <dt class="font-1-m-b">Qual a garantia que possuo?</dt>
        <dd class="font-2-s cor-9">Aceitamos pagamentos parcelados em todos os cartões de crédito. Para pagamentos à vista também aceitarmos PIX e Boleto através do PagSeguro.</dd>
      </div>
      <div>
        <dt class="font-1-m-b">Posso parcelar no boleto?</dt>
        <dd class="font-2-s cor-9">Aceitamos pagamentos parcelados em todos os cartões de crédito. Para pagamentos à vista também aceitarmos PIX e Boleto através do PagSeguro.</dd>
      </div>
      <div>
        <dt class="font-1-m-b">Quantas trocas posso fazer ao ano?</dt>
        <dd class="font-2-s cor-9">Aceitamos pagamentos parcelados em todos os cartões de crédito. Para pagamentos à vista também aceitarmos PIX e Boleto através do PagSeguro.</dd>
      </div>
    </dl>
  </article>

  <!-- footer -->
  <footer class="footer-bg">
    <div class="footer container">
      <img src="<?= asset('/img/bikcraft/bikcraft.svg') ?>" width="136" height="32" alt="Bikcraft">
      <div class="footer-contato">
        <h3 class="font-2-l-b cor-0">Contato</h3>
        <ul class="font-2-m cor-5">
          <li><a href="tel:+552199999999">+55 21 9999-9999</a></li>
          <li><a href="mailto:contato@bikcraft.com">contato@bikcraft.com</a></li>
          <li>Rua Ali Perto, 42 - Botafogo</li>
          <li>Rio de Janeiro - RJ</li>
        </ul>
        <div class="footer-redes">
          <a href="./">
            <img src="<?= asset('/img/bikcraft/redes/instagram.svg') ?>" width="32" height="32" alt="Instagram">
          </a>
          <a href="./">
            <img src="<?= asset('/img/bikcraft/redes/facebook.svg') ?>." width="32" height="32" alt="Facebook">
          </a>
          <a href="./">
            <img src="<?= asset('/img/bikcraft/redes/youtube.svg') ?>" width="32" height="32" alt="Youtube">
          </a>
        </div>
      </div>
      <div class="footer-informacoes">
        <h3 class="font-2-l-b cor-0">Informações</h3>
        <nav>
          <ul class="font-1-m cor-5">
            <li><a href="./bicicletas.html">Bicicletas</a></li>
            <li><a href="./seguros.html">Seguros</a></li>
            <li><a href="./contato.html">Contato</a></li>
            <li><a href="./termos.html">Termos e Condições</a></li>
          </ul>
        </nav>
      </div>
      <p class="footer-copy font-2-m cor-6">Bikcraft © Alguns direitos reservados.</p>
    </div>
  </footer>
  <!-- end footer -->
</body>

</html>
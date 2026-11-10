<?php
/**
 * PÁGINA DE LENDAS E MITOS — lendas.php
 * Inspirada com extrema fidelidade na imagem de referência visual
 */
$pagina = 'lendas';
$titulo = 'Lendas e Mitos | Brasil & Uzbequistão';
$descricaoSeo = 'Duas culturas, histórias que atravessam gerações. Conheça as narrativas do folclore brasileiro e as lendas épicas do Uzbequistão.';

include __DIR__ . '/includes/header.php';
$lendas = get_todas_lendas();
$arquitetura = get_static_arquitetura();
?>

<!-- ===================================================================
HERO: LENDAS E MITOS DO BRASIL & UZBEQUISTÃO
==================================================================== -->
<section class="hero-lendas">
  <div class="hero-lendas-bg">
    <div class="hero-lendas-lado br" style="background-image: url('assets/img/heroes/hero-lendas.jpg');"></div>
    <div class="hero-lendas-lado uz" style="background-image: url('assets/img/galeria/samarcanda-noite.jpg');"></div>
  </div>
  <div class="container hero-lendas-conteudo">
    <span class="section-badge gold">Tradição Oral &amp; Epopeias</span>
    <h1 class="hero-lendas-titulo">
      LENDAS E MITOS
    </h1>
    <h2 class="hero-lendas-subtitulo">
      <span class="br-color">DO BRASIL</span> &amp; <span class="uz-color">UZBEQUISTÃO</span>
    </h2>
    <div class="ornamento-divisor" style="margin-bottom: 16px;">
      <span class="ornamento-linha" style="background: linear-gradient(90deg, #00A859, #D9AE58);"></span>
      <span class="ornamento-bolinha" style="background: #D9AE58;"></span>
      <span class="ornamento-linha invertida" style="background: linear-gradient(-90deg, #0875C9, #D9AE58);"></span>
    </div>
    <p class="hero-lendas-desc">
      Duas culturas, histórias que atravessam gerações. Conheça lendas que mostram os valores, as crenças e a imaginação dos povos brasileiro e uzbeque.
    </p>
  </div>
</section>

<!-- ===================================================================
SEÇÃO: PRINCIPAIS LENDAS (Cards com Modal de Leitura)
==================================================================== -->
<section class="section" id="principais-lendas">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Principais Lendas
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        Clique no card ou no botão circular para abrir a narrativa completa e entender a simbologia de cada personagem mítico.
      </p>
    </div>
    <div class="lendas-grid">
      <?php foreach ($lendas as $id => $l): 
        $isBr = ($l['pais'] === 'br');
        $bandeiraImg = $isBr ? 'assets/img/logos/bandeira-brasil.png' : 'assets/img/logos/bandeira-uzbequistao.png';
        $origemTexto = $isBr ? 'Brasil 🇧🇷' : 'Uzbequistão 🇺🇿';
      ?>
        <article class="lenda-card abrir-modal"
                  tabindex="0"
                  role="button"
                  data-titulo="<?= e($l['titulo']) ?>"
                  data-subtitulo="<?= e($l['subtitulo']) ?>"
                  data-categoria="Folclore &amp; Mitologia"
                  data-origem="<?= e($origemTexto) ?>"
                  data-img="<?= e($l['img']) ?>"
                  data-intro="<?= e($l['intro']) ?>"
                  data-itens="<?= e(json_encode($l['itens'] ?? [])) ?>"
                  data-narrativa="<?= e($l['narrativa'] ?? '') ?>"
                  data-extra="<?= e($l['extra'] ?? '') ?>"
                  aria-label="Ler lenda completa: <?= e($l['titulo']) ?>">
          
          <div class="lenda-card-img-wrap">
            <img src="<?= e($l['img']) ?>" alt="<?= e($l['titulo']) ?>" class="lenda-img" loading="lazy">
            <div class="lenda-bandeira-badge" title="<?= e($origemTexto) ?>">
              <img src="<?= e($bandeiraImg) ?>" alt="Bandeira">
            </div>
          </div>

          <div class="lenda-card-corpo">
            <h3><?= e($l['titulo']) ?></h3>
            <p><?= e($l['intro']) ?></p>

            <div class="lenda-card-rodape">
              <span style="font-size: 0.8rem; font-weight: 700; color: <?= $isBr ? 'var(--color-accent-green)' : 'var(--color-primary-accent)' ?>;">
                Ler narrativa completa
              </span>
              <span class="btn-circulo-acao <?= $isBr ? 'br' : 'uz' ?>" aria-hidden="true">&rarr;</span>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===================================================================
     SEÇÃO: ARQUITETURA TÍPICA COMPARADA
     (Exatamente conforme a parte inferior da imagem de referência)
==================================================================== -->
<section class="section section-bg-white" id="arquitetura-comparada">
  <div class="container">
    <div class="section-header">
      <span class="section-badge blue">Patrimônio Material</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Arquitetura Típica
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        A monumentalidade histórica expressa nas igrejas e cidades brasileiras e nas madraças e cúpulas turquesas da Rota da Seda.
      </p>
    </div>

    <div class="arquitetura-grid">
      <!-- Painel Brasil (Verde Escuro) -->
      <div class="arquitetura-painel brasil">
        <div class="arquitetura-cabecalho">
          <div style="width: 38px; height: 38px; border-radius: 50%; background: #fff; display:flex; align-items:center; justify-content:center; overflow:hidden; border:2px solid #fff;">
            <img src="assets/img/logos/bandeira-brasil.png" alt="Brasil" style="width:100%; height:100%; object-fit:cover;">
          </div>
          <h3>Arquitetura do Brasil</h3>
        </div>
        <p class="intro-arq">
          A arquitetura brasileira é marcada pela mistura de estilos indígenas, africanos e europeus. Possui igrejas coloniais, cidades históricas com casarões coloridos e obras modernas célebres, como o Congresso Nacional e o Cristo Redentor.
        </p>
        <div class="arquitetura-thumbs-grid">
          <?php foreach ($arquitetura['brasil'] as $m): ?>
            <div class="thumb-monumento"
                  data-lightbox="true"
                  data-img="<?= e($m['img']) ?>"
                  data-titulo="<?= e($m['nome']) ?>"
                  data-desc="<?= e($m['cidade'] . ' — ' . $m['desc']) ?>"
                  tabindex="0"
                  role="button"
                  aria-label="Ampliar foto de <?= e($m['nome']) ?>">
              <img src="<?= e($m['img']) ?>" alt="<?= e($m['nome']) ?>" loading="lazy">
              <h5><?= e($m['nome']) ?></h5>
              <small><?= e($m['cidade']) ?></small>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <!-- Painel Uzbequistão (Azul Escuro) -->
      <div class="arquitetura-painel uzbequistao">
        <div class="arquitetura-cabecalho">
          <div style="width: 38px; height: 38px; border-radius: 50%; background: #fff; display:flex; align-items:center; justify-content:center; overflow:hidden; border:2px solid #fff;">
            <img src="assets/img/logos/bandeira-uzbequistao.png" alt="Uzbequistão" style="width:100%; height:100%; object-fit:cover;">
          </div>
          <h3>Arquitetura do Uzbequistão</h3>
        </div>
        <p class="intro-arq">
          A arquitetura uzbeque é mundialmente reverenciada por suas mesquitas, madraças e mausoléus com cúpulas azuis, azulejos detalhados e praças suntuosas. Esses edifícios refletem a rica história da Rota da Seda e a florescente arte islâmica.
        </p>
        <div class="arquitetura-thumbs-grid">
          <?php foreach ($arquitetura['uzbequistao'] as $m): ?>
            <div class="thumb-monumento"
                 data-lightbox="true"
                 data-img="<?= e($m['img']) ?>"
                 data-titulo="<?= e($m['nome']) ?>"
                 data-desc="<?= e($m['cidade'] . ' — ' . $m['desc']) ?>"
                 tabindex="0"
                 role="button"
                 aria-label="Ampliar foto de <?= e($m['nome']) ?>">
              <img src="<?= e($m['img']) ?>" alt="<?= e($m['nome']) ?>" loading="lazy">
              <h5><?= e($m['nome']) ?></h5>
              <small><?= e($m['cidade']) ?></small>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<?php
/**
 * PÁGINA SOBRE OS PAÍSES — sobre-paises.php
 * Apresentação comparativa factual e integrada entre Brasil e Uzbequistão
 */
$pagina = 'sobre';
$titulo = 'Sobre os Países | Brasil & Uzbequistão';
$descricaoSeo = 'Descubra a história, geografia, economia, tradições, festas e patrimônio que caracterizam o Brasil e o Uzbequistão.';

include __DIR__ . '/includes/header.php';
?>

<!-- ===================================================================
     HERO: SOBRE OS PAÍSES
==================================================================== -->
<section class="hero-panoramico" style="background: linear-gradient(135deg, #082B50 0%, #004D25 100%);">
  <div class="container hero-grid">
    <div class="hero-conteudo">
      <span class="section-badge gold">Geografia &amp; Identidade</span>
      <h1 class="hero-super-titulo">
        BRASIL &amp;
        <span class="destaque-verde">UZBEQUISTÃO</span>
      </h1>
      <hr class="hero-divisor-linha">
      <p class="hero-subtitulo">Duas nações, encontros históricos e culturais.</p>
      <p class="hero-descricao">
        Uma experiência imersiva e comparativa para compreender a grandiosidade geopolítica, a herança civilizatória e a alma vibrante das populações brasileira e uzbeque.
      </p>
      <div class="hero-botoes">
        <a href="#uzbequistao-detalhe" class="btn btn-secondary">Conhecer o Uzbequistão</a>
        <a href="#brasil-detalhe" class="btn btn-primary">Conhecer o Brasil</a>
      </div>
    </div>

    <div class="hero-visual">
      <div class="hero-foto-panoramica">
        <img src="assets/img/heroes/hero-sobre.jpg" alt="Mapa e símbolos culturais do Brasil e Uzbequistão" width="800" height="400">
      </div>
    </div>
  </div>
</section>

<!-- ===================================================================
     SEÇÃO: QUADRO COMPARATIVO GERAL (Fatos Rápidos)
==================================================================== -->
<section class="section">
  <div class="container">
    <div class="section-header">
      <span class="section-badge">Visão Geral</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Indicadores Gerais Comparados
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        Dados oficiais e factuais para compreender as dimensões territoriais, populacionais e geopolíticas.
      </p>
    </div>

    <div class="admin-tabela-card" style="box-shadow: var(--shadow-lg);">
      <table class="tabela-dados" style="font-size: 0.95rem;">
        <thead>
          <tr>
            <th style="width: 25%;">Indicador</th>
            <th style="width: 37.5%; color: var(--color-accent-emerald);">🇧🇷 Brasil</th>
            <th style="width: 37.5%; color: var(--color-primary-accent);">🇺🇿 Uzbequistão</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>Capital</strong></td>
            <td>Brasília (Distrito Federal)</td>
            <td>Tashkent (maior metrópole da Ásia Central)</td>
          </tr>
          <tr>
            <td><strong>Localização</strong></td>
            <td>América do Sul (Costeira ao Atlântico)</td>
            <td>Ásia Central (Coração da Rota da Seda)</td>
          </tr>
          <tr>
            <td><strong>Área Territorial</strong></td>
            <td>8.515.767 km² (5º maior país do mundo)</td>
            <td>448.978 km² (País duplamente encravado)</td>
          </tr>
          <tr>
            <td><strong>População</strong></td>
            <td>Aprox. 203 milhões de habitantes (IBGE)</td>
            <td>Aprox. 37,7 milhões de habitantes</td>
          </tr>
          <tr>
            <td><strong>Idioma Oficial</strong></td>
            <td>Português</td>
            <td>Uzbeque (família linguística túrquica)</td>
          </tr>
          <tr>
            <td><strong>Moeda Oficial</strong></td>
            <td>Real (BRL - R$)</td>
            <td>Som Uzbeque (UZS)</td>
          </tr>
          <tr>
            <td><strong>Grande Celebração</strong></td>
            <td>Carnaval &amp; Festas Juninas</td>
            <td>Navruz (Ano Novo da Primavera) &amp; Eid</td>
          </tr>
          <tr>
            <td><strong>Prato Símbolo</strong></td>
            <td>Feijoada, Pastel e Moqueca</td>
            <td>Plov (Osh), Samsa e Shashlik</td>
          </tr>
          <tr>
            <td><strong>Patrimônios UNESCO</strong></td>
            <td>23 sítios culturais e naturais</td>
            <td>Samarcanda, Bukhara, Khiva e Shahrisabz</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ===================================================================
     SEÇÃO: UZBEQUISTÃO EM DETALHES (Inspirado na Captura 1)
==================================================================== -->
<section class="section section-bg-white" id="uzbequistao-detalhe">
  <div class="container">
    <div class="section-header">
      <span class="section-badge blue">Coração da Rota da Seda</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Uzbequistão: Tradição &amp; Monumentalidade
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        Berço de civilizações antiquíssimas, cientistas como Avicena e Al-Biruni e a arquitetura espetacular timúrida.
      </p>
    </div>

    <!-- 5 Tópicos com Fotos e Destaque Samsa -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)) 300px; gap: 16px; margin-bottom: 2rem;">
      <!-- Tópico 1: História -->
      <div class="cardapio-card" style="text-align: left; padding: 16px;">
        <div style="font-size: 1.4rem; color: var(--color-primary-accent); margin-bottom: 6px;">📖</div>
        <h4 style="font-family: var(--font-family-display); font-weight:800; font-size: 0.95rem; margin-bottom: 6px;">História Milenar</h4>
        <p style="font-size: 0.8rem; color: var(--color-text-muted); line-height: 1.5; margin-bottom: 10px;">
          Entroncamento das principais rotas caravaneiras da Rota da Seda, com grandes impérios como o de Tamerlão.
        </p>
        <img src="assets/img/feiras/historia-uz.jpg" alt="História do Uzbequistão" style="width:100%; height:75px; object-fit:cover; border-radius: var(--radius-sm);">
      </div>

      <!-- Tópico 2: Economia -->
      <div class="cardapio-card" style="text-align: left; padding: 16px;">
        <div style="font-size: 1.4rem; color: var(--color-accent-emerald); margin-bottom: 6px;">📊</div>
        <h4 style="font-family: var(--font-family-display); font-weight:800; font-size: 0.95rem; margin-bottom: 6px;">Economia (PIB)</h4>
        <p style="font-size: 0.8rem; color: var(--color-text-muted); line-height: 1.5; margin-bottom: 10px;">
          PIB nominal superior a US$ 115 bilhões, impulsionado por ouro, gás natural, algodão, indústria automobilística e turismo.
        </p>
        <img src="assets/img/feiras/economia-uz.jpg" alt="Economia e Tashkent" style="width:100%; height:75px; object-fit:cover; border-radius: var(--radius-sm);">
      </div>

      <!-- Tópico 3: Relevo -->
      <div class="cardapio-card" style="text-align: left; padding: 16px;">
        <div style="font-size: 1.4rem; color: #0288D1; margin-bottom: 6px;">⛰️</div>
        <h4 style="font-family: var(--font-family-display); font-weight:800; font-size: 0.95rem; margin-bottom: 6px;">Relevo &amp; Paisagem</h4>
        <p style="font-size: 0.8rem; color: var(--color-text-muted); line-height: 1.5; margin-bottom: 10px;">
          Planícies desérticas (Kyzylkum), vales férteis como o Vale de Fergana e as cordilheiras nevadas de Tian Shan a leste.
        </p>
        <img src="assets/img/feiras/relevo-uz.jpg" alt="Montanhas Tian Shan" style="width:100%; height:75px; object-fit:cover; border-radius: var(--radius-sm);">
      </div>

      <!-- Tópico 4: Cultura -->
      <div class="cardapio-card" style="text-align: left; padding: 16px;">
        <div style="font-size: 1.4rem; color: var(--color-ornamental-gold); margin-bottom: 6px;">🎨</div>
        <h4 style="font-family: var(--font-family-display); font-weight:800; font-size: 0.95rem; margin-bottom: 6px;">Cultura &amp; Artes</h4>
        <p style="font-size: 0.8rem; color: var(--color-text-muted); line-height: 1.5; margin-bottom: 10px;">
          Música clássica Shashmaqom, cerâmica vidrada de Rishtan, tecelagem manual de seda ikat e hospitalidade lendária.
        </p>
        <img src="assets/img/feiras/cultura-uz.jpg" alt="Artesanato Uzbeque" style="width:100%; height:75px; object-fit:cover; border-radius: var(--radius-sm);">
      </div>

      <!-- Card Especial Destaque Samsa (Conforme Captura 1) -->
      <div style="background: linear-gradient(135deg, #004D25 0%, #007038 100%); border-radius: var(--radius-lg); padding: 20px; color: #fff; display: flex; flex-direction: column; justify-content: space-between; box-shadow: var(--shadow-lg);">
        <div>
          <span style="display:inline-block; font-size:0.7rem; font-weight:700; background: rgba(255,255,255,0.2); padding: 3px 10px; border-radius: 9999px; text-transform:uppercase; margin-bottom: 8px;">Destaque Gastronômico</span>
          <h3 style="font-family: var(--font-family-display); font-size: 1.4rem; font-weight:900;">Samsa</h3>
          <p style="font-size: 0.84rem; line-height: 1.45; color: rgba(255,255,255,0.9); margin-top: 6px;">
            Prato típico uzbeque: massa folhada crocante recheada com carne nobre temperada com especiarias da Rota da Seda.
          </p>
        </div>
        <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 14px;">
          <div style="width: 75px; height: 75px; border-radius: 50%; overflow: hidden; border: 3px solid rgba(255,255,255,0.4);">
            <img src="assets/img/gastronomia/samsa.jpg" alt="Samsa uzbeque" style="width:100%; height:100%; object-fit:cover;">
          </div>
          <a href="feiras.php#cardapio-gastrobar" class="btn-circulo-acao" style="background:#fff; color: var(--color-accent-green);">&rarr;</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================================================================
     SEÇÃO: BRASIL EM DETALHES
==================================================================== -->
<section class="section" id="brasil-detalhe">
  <div class="container">
    <div class="section-header">
      <span class="section-badge">Terra de Contrastes e Alegria</span>
      <h2 class="section-title">
        <span class="ornamento-divisor"><span class="ornamento-bolinha"></span><span class="ornamento-linha"></span></span>
        Brasil: Diversidade &amp; Criatividade
        <span class="ornamento-divisor"><span class="ornamento-linha invertida"></span><span class="ornamento-bolinha"></span></span>
      </h2>
      <p class="section-desc">
        A confluência cultural de povos originários indígenas, matrizes africanas e imigrantes de todos os cantos do mundo.
      </p>
    </div>

    <div class="feiras-principais-grid">
      <!-- Card Brasil 1: História -->
      <div class="feira-destaque-card">
        <div class="feira-card-cabecalho">
          <div class="feira-card-icone" style="background: rgba(0, 136, 68, 0.15); color: var(--color-accent-green);">📜</div>
          <div>
            <h3 class="feira-card-titulo">Formação Histórica</h3>
            <small style="color: var(--color-text-muted);">Tradição &amp; Resistência</small>
          </div>
        </div>
        <p class="feira-card-tag">
          Mais de 300 etnias indígenas nativas somadas à imigração e ao legado afro-brasileiro forjaram uma identidade sociocultural única no planeta.
        </p>
      </div>

      <!-- Card Brasil 2: Biomas -->
      <div class="feira-destaque-card">
        <div class="feira-card-cabecalho">
          <div class="feira-card-icone" style="background: rgba(0, 155, 112, 0.15); color: var(--color-accent-emerald);">🌿</div>
          <div>
            <h3 class="feira-card-titulo">Biodiversidade Única</h3>
            <small style="color: var(--color-text-muted);">6 Biomas Nacionais</small>
          </div>
        </div>
        <p class="feira-card-tag">
          Amazônia, Cerrado, Mata Atlântica, Caatinga, Pantanal e Pampa formam a maior reserva biológica e de água doce da Terra.
        </p>
      </div>

      <!-- Card Brasil 3: Ritmos -->
      <div class="feira-destaque-card">
        <div class="feira-card-cabecalho">
          <div class="feira-card-icone" style="background: rgba(217, 174, 88, 0.15); color: var(--color-ornamental-gold);">🥁</div>
          <div>
            <h3 class="feira-card-titulo">Expressão Musical</h3>
            <small style="color: var(--color-text-muted);">Sons que Movem o Mundo</small>
          </div>
        </div>
        <p class="feira-card-tag">
          Do choro e samba à bossa nova, baião, maracatu e forró, a música brasileira é celebrada globalmente por sua sofisticação harmônica.
        </p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>


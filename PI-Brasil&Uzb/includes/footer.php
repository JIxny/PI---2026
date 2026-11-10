</main>

<!-- ===================================================================
     MODAL UNIVERSAL PARA DETALHES (Gastronomia, Lendas e Feiras)
==================================================================== -->
<div class="modal-overlay" id="modal-universal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="modal-titulo">
  <div class="modal-dialog">
    <button type="button" class="modal-btn-fechar" id="modal-btn-fechar" aria-label="Fechar janela de detalhes">&times;</button>
    <div class="modal-cabecalho-img">
      <img id="modal-img" src="" alt="" loading="lazy">
      <span class="modal-badge-origem" id="modal-badge-origem"></span>
    </div>
    <div class="modal-corpo">
      <div class="modal-cabecalho-texto">
        <span class="modal-categoria-tag" id="modal-categoria-tag"></span>
        <h2 id="modal-titulo" class="modal-titulo"></h2>
        <p class="modal-subtitulo" id="modal-subtitulo"></p>
      </div>
      <div class="modal-conteudo-texto">
        <p class="modal-intro" id="modal-intro"></p>
        <ul class="modal-lista-itens" id="modal-lista-itens"></ul>
        <div class="modal-narrativa" id="modal-narrativa"></div>
        <div class="modal-extra-box" id="modal-extra-box">
          <strong>Curiosidade &amp; Destaque:</strong>
          <p id="modal-extra"></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ===================================================================
     LIGHTBOX UNIVERSAL (Galeria e Imagens Ampliadas)
==================================================================== -->
<div class="lightbox-overlay" id="lightbox-overlay" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Visualizador de imagens">
  <button type="button" class="lightbox-btn-fechar" id="lightbox-btn-fechar" aria-label="Fechar galeria">&times;</button>
  <button type="button" class="lightbox-nav-btn prev" id="lightbox-prev" aria-label="Imagem anterior">&#10094;</button>
  <button type="button" class="lightbox-nav-btn next" id="lightbox-next" aria-label="Próxima imagem">&#10095;</button>
  
  <div class="lightbox-container">
    <div class="lightbox-midia">
      <img id="lightbox-img" src="" alt="" class="lightbox-imagem">
    </div>
    <div class="lightbox-legenda">
      <h3 id="lightbox-titulo"></h3>
      <p id="lightbox-desc"></p>
      <span class="lightbox-contador" id="lightbox-contador">1 / 1</span>
    </div>
  </div>
</div>

<!-- ===================================================================
     RODAPÉ INSTITUCIONAL
==================================================================== -->
<footer class="rodape-institucional" role="contentinfo">
  <div class="container rodape-grid">
    <!-- Coluna 1: Identidade -->
    <div class="rodape-coluna brand">
      <div class="rodape-logo">
        <img src="assets/img/logos/brasao-brasil.png" alt="Brasil" width="34" height="42">
        <div>
          <h4>Uzbequistão &amp; Brasil</h4>
          <small>Conexões que transformam</small>
        </div>
        <img src="assets/img/logos/brasao-uzbequistao.png" alt="Uzbequistão" width="36" height="42">
      </div>
      <p class="rodape-sobre">
        Um projeto cultural e acadêmico integrador dedicado à valorização do patrimônio, gastronomia, arquitetura e histórias que unem dois povos fascinantes.
      </p>
    </div>

    <!-- Coluna 2: Navegação Rápida -->
    <div class="rodape-coluna">
      <h5 class="rodape-titulo">Navegação</h5>
      <ul class="rodape-links">
        <li><a href="index.php">Página Inicial</a></li>
        <li><a href="feiras.php">Feiras Culturais</a></li>
        <li><a href="projeto-integrador.php">Projeto Integrador</a></li>
        <li><a href="sobre-paises.php">Sobre os Países</a></li>
        <li><a href="lendas.php">Lendas e Mitos</a></li>
        <li><a href="galeria.php">Galeria Fotográfica</a></li>
        <li><a href="contato.php">Fale Conosco</a></li>
      </ul>
    </div>

    <!-- Coluna 3: As Feiras -->
    <div class="rodape-coluna">
      <h5 class="rodape-titulo">Atividades &amp; Feiras</h5>
      <ul class="rodape-links">
        <li><a href="feiras.php#semana-cultural">Semana Cultural Uzbeque</a></li>
        <li><a href="feiras.php#feira-empreendedorismo">Feira do Empreendedorismo</a></li>
        <li><a href="feiras.php#feira-conhecimento">Feira do Conhecimento</a></li>
        <li><a href="feiras.php#cardapio-gastrobar">Cardápio Paraíso Brazuca</a></li>
        <li><a href="lendas.php#arquitetura-comparada">Arquitetura Típica</a></li>
      </ul>
    </div>

    <!-- Coluna 4: Institucional & Admin -->
    <div class="rodape-coluna">
      <h5 class="rodape-titulo">Área Técnica</h5>
      <p class="rodape-info-tec">
        Desenvolvido com padrões modernos W3C em HTML5 semântico, CSS3 puro, Vanilla JavaScript e PHP 8.2+.
      </p>
      <div class="rodape-admin-link">
        <a href="admin/login.php" class="btn-link-admin" title="Acesso administrativo restrito">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
          Área Administrativa
        </a>
      </div>
    </div>
  </div>

  <div class="rodape-inferior">
    <div class="container rodape-inferior-flex">
      <p>&copy; <?= date('Y') ?> Projeto Integrador: Uzbequistão &amp; Brasil — Todos os direitos reservados.</p>
      <p class="rodape-creditos">Duas culturas. Infinitas conexões.</p>
    </div>
  </div>
</footer>

<!-- Scripts Vanilla JavaScript (sem frameworks, carregamento modular) -->
<script src="assets/js/main.js"></script>
<script src="assets/js/modals.js"></script>
<script src="assets/js/gallery.js"></script>
<script src="assets/js/filters.js"></script>
</body>
</html>

/**
 * =====================================================================
 * MAIN.JS — NAVEGAÇÃO, MENU MOBILE E COMPORTAMENTOS GERAIS
 * JavaScript Puro (Vanilla JS) — Padrão ES6+
 * =====================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
  initMobileMenu();
  initHeaderScroll();
  initScrollLinks();
});

/**
 * Controle de Menu Mobile com Acessibilidade (ARIA + Teclado)
 */
function initMobileMenu() {
  const toggleBtn = document.getElementById('menu-toggle');
  const navPrincipal = document.getElementById('nav-principal');

  if (!toggleBtn || !navPrincipal) return;

  const fecharMenu = () => {
    toggleBtn.classList.remove('ativo');
    toggleBtn.setAttribute('aria-expanded', 'false');
    toggleBtn.setAttribute('aria-label', 'Abrir menu de navegação');
    navPrincipal.classList.remove('aberto');
    document.body.classList.remove('menu-aberto');
    document.body.style.overflow = '';
  };

  const abrirMenu = () => {
    toggleBtn.classList.add('ativo');
    toggleBtn.setAttribute('aria-expanded', 'true');
    toggleBtn.setAttribute('aria-label', 'Fechar menu de navegação');
    navPrincipal.classList.add('aberto');
    document.body.classList.add('menu-aberto');
    document.body.style.overflow = 'hidden';

    // Foca o primeiro link para acessibilidade
    const primeiroLink = navPrincipal.querySelector('a');
    if (primeiroLink) primeiroLink.focus();
  };

  toggleBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    const aberto = toggleBtn.getAttribute('aria-expanded') === 'true';
    if (aberto) {
      fecharMenu();
    } else {
      abrirMenu();
    }
  });

  // Fechar ao clicar fora (backdrop)
  document.addEventListener('click', (e) => {
    if (document.body.classList.contains('menu-aberto')) {
      if (!navPrincipal.contains(e.target) && e.target !== toggleBtn) {
        fecharMenu();
      }
    }
  });

  // Fechar com tecla Escape
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && document.body.classList.contains('menu-aberto')) {
      fecharMenu();
      toggleBtn.focus();
    }
  });

  // Fechar ao clicar em um link interno
  navPrincipal.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      if (window.innerWidth <= 992) {
        fecharMenu();
      }
    });
  });

  // Redimensionamento de janela
  window.addEventListener('resize', () => {
    if (window.innerWidth > 992 && document.body.classList.contains('menu-aberto')) {
      fecharMenu();
    }
  });
}

/**
 * Efeito visual de sombra no cabeçalho durante a rolagem
 */
function initHeaderScroll() {
  const header = document.getElementById('topo-site');
  if (!header) return;

  let ticking = false;
  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        if (window.scrollY > 20) {
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }
        ticking = false;
      });
      ticking = true;
    }
  }, { passive: true });
}

/**
 * Rolagem suave para links de âncoras na mesma página
 */
function initScrollLinks() {
  document.querySelectorAll('a[href^="#"]:not([href="#"]):not([href="#conteudo-principal"])').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        e.preventDefault();
        const headerOffset = 90;
        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
}


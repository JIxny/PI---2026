/**
 * =====================================================================
 * GALLERY.JS — LIGHTBOX MODERNA E NAVEGAÇÃO DE IMAGENS
 * JavaScript Puro (Vanilla JS)
 * =====================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
  initLightbox();
});

function initLightbox() {
  const overlay = document.getElementById('lightbox-overlay');
  const imgEl = document.getElementById('lightbox-img');
  const tituloEl = document.getElementById('lightbox-titulo');
  const descEl = document.getElementById('lightbox-desc');
  const contadorEl = document.getElementById('lightbox-contador');
  const btnFechar = document.getElementById('lightbox-btn-fechar');
  const btnPrev = document.getElementById('lightbox-prev');
  const btnNext = document.getElementById('lightbox-next');

  if (!overlay || !imgEl || !btnFechar) return;

  let itensVisiveis = [];
  let indiceAtual = 0;
  let touchStartX = 0;
  let touchEndX = 0;

  const atualizarListaItens = () => {
    // Coleta apenas itens visíveis (compatível com filtros de categoria)
    const todosItens = Array.from(document.querySelectorAll('.galeria-item, .thumb-monumento, [data-lightbox]'));
    itensVisiveis = todosItens.filter(el => {
      return el.offsetParent !== null && (el.getAttribute('data-img') || el.querySelector('img'));
    });
  };

  const renderizarImagem = (index) => {
    if (index < 0) index = itensVisiveis.length - 1;
    if (index >= itensVisiveis.length) index = 0;
    indiceAtual = index;

    const el = itensVisiveis[indiceAtual];
    if (!el) return;

    const src = el.getAttribute('data-img') || (el.querySelector('img') ? el.querySelector('img').src : '');
    const titulo = el.getAttribute('data-titulo') || (el.querySelector('h4, h5') ? el.querySelector('h4, h5').textContent : '');
    const desc = el.getAttribute('data-desc') || (el.querySelector('p, small') ? el.querySelector('p, small').textContent : '');

    imgEl.style.opacity = '0';
    imgEl.src = src;
    imgEl.alt = titulo || 'Fotografia em exibição';

    imgEl.onload = () => {
      imgEl.style.transition = 'opacity 0.25s ease';
      imgEl.style.opacity = '1';
    };

    if (tituloEl) tituloEl.textContent = titulo;
    if (descEl) descEl.textContent = desc;
    if (contadorEl) contadorEl.textContent = `${indiceAtual + 1} / ${itensVisiveis.length}`;
  };

  const abrirLightbox = (elementoClicado) => {
    atualizarListaItens();
    const index = itensVisiveis.indexOf(elementoClicado);
    indiceAtual = index >= 0 ? index : 0;

    renderizarImagem(indiceAtual);

    overlay.classList.add('aberto');
    overlay.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    btnFechar.focus();
  };

  const fecharLightbox = () => {
    overlay.classList.remove('aberto');
    overlay.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  };

  const avancar = () => renderizarImagem(indiceAtual + 1);
  const voltar = () => renderizarImagem(indiceAtual - 1);

  // Delegação de clique para abrir
  document.addEventListener('click', (e) => {
    const trigger = e.target.closest('.galeria-item, [data-lightbox]');
    if (!trigger) return;

    e.preventDefault();
    abrirLightbox(trigger);
  });

  if (btnNext) btnNext.addEventListener('click', avancar);
  if (btnPrev) btnPrev.addEventListener('click', voltar);
  btnFechar.addEventListener('click', fecharLightbox);

  // Fechar ao clicar no overlay de fundo
  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) {
      fecharLightbox();
    }
  });

  // Navegação por teclado
  document.addEventListener('keydown', (e) => {
    if (!overlay.classList.contains('aberto')) return;

    if (e.key === 'ArrowRight') {
      avancar();
    } else if (e.key === 'ArrowLeft') {
      voltar();
    } else if (e.key === 'Escape') {
      fecharLightbox();
    }
  });

  // Suporte a gestos touch swipe para celulares
  overlay.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
  }, { passive: true });

  overlay.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    const diff = touchStartX - touchEndX;
    if (Math.abs(diff) > 45) {
      if (diff > 0) {
        avancar(); // Swipe esquerda -> próxima
      } else {
        voltar();  // Swipe direita -> anterior
      }
    }
  }, { passive: true });
}


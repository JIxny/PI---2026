/**
 * =====================================================================
 * MODALS.JS — GERENCIAMENTO DE MODAIS DINÂMICAS E ACESSIBILIDADE
 * JavaScript Puro (Vanilla JS)
 * =====================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
  initUniversalModal();
});

function initUniversalModal() {
  const overlay = document.getElementById('modal-universal');
  const btnFechar = document.getElementById('modal-btn-fechar');
  if (!overlay || !btnFechar) return;

  const elImg = document.getElementById('modal-img');
  const elBadgeOrigem = document.getElementById('modal-badge-origem');
  const elCategoria = document.getElementById('modal-categoria-tag');
  const elTitulo = document.getElementById('modal-titulo');
  const elSubtitulo = document.getElementById('modal-subtitulo');
  const elIntro = document.getElementById('modal-intro');
  const elLista = document.getElementById('modal-lista-itens');
  const elNarrativa = document.getElementById('modal-narrativa');
  const elExtraBox = document.getElementById('modal-extra-box');
  const elExtra = document.getElementById('modal-extra');

  let elementoDisparador = null;

  const fecharModal = () => {
    overlay.classList.remove('aberto');
    overlay.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    if (elementoDisparador) {
      elementoDisparador.focus();
    }
  };

  const abrirModal = (dados, triggerEl) => {
    elementoDisparador = triggerEl;

    // Imagem
    if (dados.img) {
      elImg.src = dados.img;
      elImg.alt = dados.titulo || 'Imagem ilustrativa';
      elImg.parentElement.style.display = 'block';
    } else {
      elImg.parentElement.style.display = 'none';
    }

    // Origem
    if (dados.origem) {
      elBadgeOrigem.textContent = dados.origem;
      elBadgeOrigem.style.display = 'inline-block';
    } else {
      elBadgeOrigem.style.display = 'none';
    }

    // Categoria
    if (dados.categoria) {
      elCategoria.textContent = dados.categoria;
      elCategoria.style.display = 'inline-block';
    } else {
      elCategoria.style.display = 'none';
    }

    // Título e Subtítulo
    elTitulo.textContent = dados.titulo || '';
    elSubtitulo.textContent = dados.subtitulo || '';

    // Intro
    if (dados.intro) {
      elIntro.textContent = dados.intro;
      elIntro.style.display = 'block';
    } else {
      elIntro.style.display = 'none';
    }

    // Lista de Itens (se houver)
    elLista.innerHTML = '';
    if (Array.isArray(dados.itens) && dados.itens.length > 0) {
      dados.itens.forEach(item => {
        const li = document.createElement('li');
        li.textContent = item;
        elLista.appendChild(li);
      });
      elLista.style.display = 'flex';
    } else {
      elLista.style.display = 'none';
    }

    // Narrativa / Texto Completo
    if (dados.narrativa) {
      elNarrativa.innerHTML = `<p>${dados.narrativa}</p>`;
      elNarrativa.style.display = 'block';
    } else {
      elNarrativa.style.display = 'none';
    }

    // Informação Extra / Curiosidade
    if (dados.extra) {
      elExtra.textContent = dados.extra;
      elExtraBox.style.display = 'block';
    } else {
      elExtraBox.style.display = 'none';
    }

    // Exibir Modal
    overlay.classList.add('aberto');
    overlay.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';

    // Focar no botão fechar para acessibilidade
    btnFechar.focus();
  };

  // Escuta cliques em qualquer disparador com classe .abrir-modal
  document.addEventListener('click', (e) => {
    const trigger = e.target.closest('.abrir-modal');
    if (!trigger) return;

    e.preventDefault();

    // Extrai dados dos atributos data-*
    let itensArray = [];
    const rawItens = trigger.getAttribute('data-itens');
    if (rawItens) {
      try {
        itensArray = JSON.parse(rawItens);
      } catch (err) {
        itensArray = rawItens.split(';').map(s => s.trim()).filter(Boolean);
      }
    }

    const dados = {
      titulo: trigger.getAttribute('data-titulo') || '',
      subtitulo: trigger.getAttribute('data-subtitulo') || '',
      categoria: trigger.getAttribute('data-categoria') || '',
      origem: trigger.getAttribute('data-origem') || '',
      img: trigger.getAttribute('data-img') || '',
      intro: trigger.getAttribute('data-intro') || '',
      narrativa: trigger.getAttribute('data-narrativa') || '',
      extra: trigger.getAttribute('data-extra') || '',
      itens: itensArray
    };

    abrirModal(dados, trigger);
  });

  // Fechar pelo botão
  btnFechar.addEventListener('click', fecharModal);

  // Fechar ao clicar no fundo escuro
  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) {
      fecharModal();
    }
  });

  // Fechar com Escape
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && overlay.classList.contains('aberto')) {
      fecharModal();
    }
  });
}


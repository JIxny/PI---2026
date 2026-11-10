/**
 * =====================================================================
 * FILTERS.JS — FILTRAGEM DINÂMICA POR CATEGORIA E BUSCA
 * JavaScript Puro (Vanilla JS) — Sem recarregar a página
 * =====================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
  initFiltros();
});

function initFiltros() {
  const botoesFiltro = document.querySelectorAll('.filtro-btn');
  const itensParaFiltrar = document.querySelectorAll('.filtrar-item');
  const msgVazio = document.querySelector('.filtros-vazio');
  const inputBusca = document.getElementById('busca-filtro');

  if (botoesFiltro.length === 0 && !inputBusca) return;

  let categoriaAtiva = 'todos';
  let termoBusca = '';

  const aplicarFiltros = () => {
    let visiveis = 0;

    itensParaFiltrar.forEach(item => {
      const categoriasItem = (item.getAttribute('data-categoria') || '').toLowerCase().split(' ');
      const textoItem = (item.textContent || '').toLowerCase();

      const bateuCategoria = (categoriaAtiva === 'todos') || categoriasItem.includes(categoriaAtiva.toLowerCase());
      const bateuBusca = (termoBusca === '') || textoItem.includes(termoBusca);

      if (bateuCategoria && bateuBusca) {
        item.style.display = '';
        item.classList.add('anim-fade-in');
        visiveis++;
      } else {
        item.style.display = 'none';
        item.classList.remove('anim-fade-in');
      }
    });

    // Exibe ou oculta estado vazio
    if (msgVazio) {
      if (visiveis === 0) {
        msgVazio.classList.add('visivel');
      } else {
        msgVazio.classList.remove('visivel');
      }
    }
  };

  // Clique nos botões de categoria
  botoesFiltro.forEach(btn => {
    btn.addEventListener('click', () => {
      botoesFiltro.forEach(b => b.classList.remove('ativo'));
      btn.classList.add('ativo');

      categoriaAtiva = btn.getAttribute('data-filtro') || 'todos';
      aplicarFiltros();
    });
  });

  // Busca em tempo real
  if (inputBusca) {
    inputBusca.addEventListener('input', (e) => {
      termoBusca = e.target.value.trim().toLowerCase();
      aplicarFiltros();
    });
  }

  // Botão de limpar filtro no estado vazio
  const btnLimpar = document.querySelector('.btn-limpar-filtro');
  if (btnLimpar) {
    btnLimpar.addEventListener('click', () => {
      categoriaAtiva = 'todos';
      termoBusca = '';
      if (inputBusca) inputBusca.value = '';

      botoesFiltro.forEach(b => {
        if (b.getAttribute('data-filtro') === 'todos') {
          b.classList.add('ativo');
        } else {
          b.classList.remove('ativo');
        }
      });

      aplicarFiltros();
    });
  }
}


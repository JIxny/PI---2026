document.addEventListener('DOMContentLoaded', () => {
  // Menu mobile
  const toggle = document.querySelector('.menu-toggle');
  const menu = document.querySelector('.menu');
  toggle?.addEventListener('click', () => menu.classList.toggle('aberto'));

  // Pop-up informativo (cardápio e lendas)
  const modal = document.getElementById('modal');
  if (!modal) return;
  const el = id => document.getElementById(id);

  function abrir(grupo, id) {
    const dado = window.DADOS?.[grupo]?.[id];
    if (!dado) return;
    el('modal-img').src = dado.img;
    el('modal-img').alt = dado.titulo;
    el('modal-titulo').textContent = dado.titulo;
    el('modal-sub').textContent = dado.subtitulo || '';
    el('modal-intro').textContent = dado.intro || '';
    el('modal-extra').textContent = dado.extra || '';

    const lista = el('modal-itens');
    lista.innerHTML = '';
    (dado.itens || []).forEach(txt => {
      const li = document.createElement('li');
      li.textContent = txt;
      lista.appendChild(li);
    });

    modal.classList.add('aberto');
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }

  function fechar() {
    modal.classList.remove('aberto');
    modal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  document.querySelectorAll('.abrir-modal').forEach(card => {
    const acionar = () => abrir(card.dataset.grupo, card.dataset.id);
    card.addEventListener('click', acionar);
    card.addEventListener('keydown', e => {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); acionar(); }
    });
  });

  modal.querySelector('.modal-fechar').addEventListener('click', fechar);
  modal.addEventListener('click', e => { if (e.target === modal) fechar(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') fechar(); });
});
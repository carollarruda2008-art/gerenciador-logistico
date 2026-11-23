document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('form[data-confirm]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            if (!window.confirm(form.dataset.confirm || 'Confirmar esta ação?')) event.preventDefault();
        });
    });

    const list = document.getElementById('lista-produtos');
    const addButton = document.getElementById('adicionar-produto');
    const template = document.getElementById('modelo-produto');
    if (list && addButton && template) {
        addButton.addEventListener('click', () => {
            list.appendChild(template.content.cloneNode(true));
        });
        list.addEventListener('click', (event) => {
            const button = event.target.closest('.remover-produto');
            if (!button) return;
            const rows = list.querySelectorAll('.produto-row');
            if (rows.length <= 1) {
                window.alert('O frete precisa ter pelo menos um produto.');
                return;
            }
            button.closest('.produto-row').remove();
        });
    }
});

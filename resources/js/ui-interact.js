// resources/js/ui-interact.js

document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.btn-order');
    
    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Efek suara atau konfirmasi mewah
            console.log('Pesanan diproses...');
        });
    });
});
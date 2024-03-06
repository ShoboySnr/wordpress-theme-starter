document.addEventListener('DOMContentLoaded', () => {

    let videoModals = [];
    
    document.querySelectorAll('.custom-modal-trigger').forEach( el => {
        el.addEventListener('click', e => {
            e.preventDefault();
            let clicked = e.target;
            let targetModal = clicked.getAttribute('data-modal');
            document.querySelectorAll('.custom-modal').forEach( el => {
                el.getAttribute('data-modal') == targetModal ? el.classList.add('show') : null;
            });
        });
    });

    document.querySelectorAll('.custom-modal').forEach((el) => {
        document.body.appendChild(el);
        let player = el.querySelector('iframe');
        let src = null;
        if(player){
            src = player.getAttribute('src'); 
            if(videoModals.includes(src)){
                el.remove();
                return;
            }
            videoModals.push(src);
        }
        el.addEventListener('click', (e) => {
            let clicked = e.target;
            if(!clicked.closest('.custom-modal-inner') || clicked.classList.contains('custom-modal-close')){
                el.classList.remove('show');
                if(src) player.setAttribute('src', src);
            }
        });
    });
});
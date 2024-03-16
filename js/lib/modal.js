let overlay = document.querySelector('.nav-overlay');
let modalAut = document.querySelector('.nav-modal');
let modalReg = document.querySelector('.nav-modal2');
let openModalAut = document.querySelectorAll('.nav-modal-open');
let openModalReg = document.querySelectorAll('.nav-modal2-open');
let closeModalAut = document.querySelector('.nav-modal-cross');
let closeModalReg = document.querySelector('.nav-modal2-cross');

openModalAut.forEach((button) => { 
    button.addEventListener('click', (e) => { 
        e.preventDefault(); 
        overlay.classList.add('active'); 
        modalAut.classList.add('active'); 
    })
});

openModalReg.forEach((button) => { 
    button.addEventListener('click', (e) => { 
        e.preventDefault(); 
        overlay.classList.add('active'); 
        modalReg.classList.add('active'); 
    })
});

closeModalAut.addEventListener('click',() => { 
    overlay.classList.remove('active');
    modalAut.classList.remove('active');
});

closeModalReg.addEventListener('click',() => { 
    overlay.classList.remove('active');
    modalReg.classList.remove('active');
});

document.addEventListener('click', (e) => { 
    if(e.target === overlay) { 
        overlay.classList.remove('active');
        modalAut.classList.remove('active');
        modalReg.classList.remove('active'); 
    }
});
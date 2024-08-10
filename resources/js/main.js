(function() {
    var header = new Headroom(document.querySelector("header"), {
        tolerance: 5,
        offset : 205,
        classes: {
          initial: "animate__animated",
          pinned: "animate__slideInDown",
          unpinned: "animate__slideOutUp"
        }
    });
    header.init();
}());

document.querySelector('.menu-toggle').addEventListener('click', function() {
    document.querySelector('.menu').classList.toggle('menu-open');
    document.querySelector('.search').classList.toggle('search-open');
});

if(document.querySelector('.profile-holder')) {
    document.querySelector('.profile').addEventListener('click', function() {
        document.querySelector('.profile-holder').classList.toggle('show');
    });
}


function $(query){
    return document.querySelector(query)
}

function $$(query){
    return document.querySelectorAll(query)
}

/* 

Modal

*/

if($('.modal-btn')){

    function hideModal(id){

        let modal = $('#'+String(id))
        let modalInner = $('#'+String(id) + ' .modal-content')

        if(modalInner.classList.contains('slidein')){
            modalInner.classList.remove('slidein')
        }
        modalInner.classList.add('slideout')
        modal.style.opacity = '0'

        setTimeout(()=>{
            modal.style.display = "none";
            modal.style.opacity = 1;
            $('body').classList.remove('overlay')
        }, 300)

    }

    $$('.modal-btn').forEach(e=>{

        let id = e.dataset.modal

        let modal = $('#'+String(id))
        let modalInner = $('#'+String(id) + ' .modal-content')

        e.onclick = (e) => {

            $('body').classList.add('overlay')
    
            if(modalInner.classList.contains('slideout')){
                modalInner.classList.remove('slideout')
            }
            modalInner.classList.add('slidein')
            modal.style.display = "block";

            window.onclick = (ei) => {
                if (ei.target.classList.contains('modal')) {
                    hideModal(id)
                }
            }
        }
    
        $$('.modal-close').forEach(el => {
            el.addEventListener('click',()=>{
                hideModal(id)
            })
        });
    
    })
}

/* 

    | Focus

*/

if($('.focus-search')){
    $('.focus-search').addEventListener('click',()=>{
        $('#color-hex').focus();
    })
}
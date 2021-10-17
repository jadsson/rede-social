const heart = document.querySelectorAll('.coracao');
const comment = document.querySelectorAll('.balao');
const img = document.querySelectorAll('.picture');
const modal = document.querySelector('.modalPicture');
const picModal = document.querySelector('.pictureInModal');
let url = '';

heart.forEach((element, i)=>{
    element.addEventListener('click', ()=>{
        element.classList.toggle('like');

        element.classList.contains('like') ? element.setAttribute('title', 'descurtir') : element.setAttribute('title', 'curtir');
    })
})


comment.forEach((element)=>{
    element.addEventListener('click', ()=>{
        element.classList.toggle('commented');
    })
})

img.forEach((element)=>{
    element.addEventListener('click', (e)=>{
        url = e.path[0].attributes[1].nodeValue;
        modal.style.display = 'block';
        picModal.setAttribute('src', url);

        e.path[0].clientHeight > e.path[0].clientWidth ? (
            picModal.style.maxWidth = '700px'
        ):(
            picModal.style.maxWidth = '90vw'
        ) 
    })
})

function close(e) {
    const tecla = e.keyCode;
    if(tecla == 27) {
        modal.style.display = 'none';
    }
}
window.addEventListener('keyup', close);

document.querySelector('.closeModal')
.addEventListener('click', ()=>{
    modal.style.display = 'none';
});

const options = document.querySelectorAll('.container-options');
const modalMenu = document.querySelectorAll('.modalMenu');
for(let i=0; i<options.length; ++i) {
    options[i].addEventListener('click', (e)=>{
        console.log(e);
        modalMenu[i].style.display = 'block';
        
    })
}

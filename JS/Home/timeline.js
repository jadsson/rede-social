const heart = document.querySelectorAll('.coracao');
const comment = document.querySelectorAll('.balao');
const img = document.querySelectorAll('.picture');
const modal = document.querySelector('.modalPicture');
const picModal = document.querySelector('.pictureInModal');
let url = '';

// for(let i=0; i<heart.length; i++) {
//     heart[i].addEventListener('click', ()=>{
//         heart[i].classList.toggle('like');

//         if(heart[i].classList.contains('like')) {
//             heart[i].setAttribute('title', 'descurtir');
//         } else {
//             heart[i].setAttribute('title', 'curtir');
//         };
//     })
// }

heart.forEach((element, i)=>{
    element.addEventListener('click', ()=>{
        element.classList.toggle('like');

        element.classList.contains('like') ? element.setAttribute('title', 'descurtir') : element.setAttribute('title', 'curtir');
    })
})

// for(let i=0; i<comment.length; i++) {
//     comment[i].addEventListener('click', ()=> {
//         comment[i].classList.toggle('commented');
//     })
// }

comment.forEach((element, i)=>{
    element.addEventListener('click', ()=>{
        element.classList.toggle('commented');
    })
})

// for(let i=0; i<img.length; i++) {
//     img[i].addEventListener('click', (e)=>{
//         url = e.path[0].attributes[1].nodeValue;
//         modal.style.display = 'block';
//         picModal.setAttribute('src', url);
//     })
// }

img.forEach((element, i)=>{
    element.addEventListener('click', (e)=>{
        url = e.path[0].attributes[1].nodeValue;
        modal.style.display = 'block';
        picModal.setAttribute('src', url);
        e.path[0].clientHeight > e.path[0].clientWidth ? picModal.style.maxWidth = '700px' : picModal.style.maxWidth = '90vw'; 
    })
})

function close() {
    const tecla = event.keyCode;
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
for(let i=0; i<options.length; ++i) {
    let position = [
        'primeira',
        'segunda',
        'terceira',
        'quarta',
        'quinta',
        'sexta',
        'sétima',
        'oitava',
        'nona',
        'décima',
        'décima-primeira',
        'décima-segunda',
        'décima-terceira'
    ];
    options[i].addEventListener('click', ()=>{
        alert(`clicou nas opções da ${position[i]} publicação`);
    })
}

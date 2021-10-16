'use strict'


const menu = document.getElementById('toggle');
let item =  document.querySelectorAll('.item');
let left_menu = document.getElementById('side-bar');
// let left_menu = document.querySelector('.side-bar');


menu.addEventListener('click', function(){
    for(let i=0; i < item.length; i++){
        item[i].classList.toggle('active');
        // console.log('hello');
    }
   left_menu.classList.toggle('hide');
   console.log(left_menu);
})

function add(){
    console.log(2+4);
}
add();
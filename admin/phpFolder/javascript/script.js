'use strict'


const menu = document.getElementById('toggle');
let item =  document.querySelectorAll('.item');


menu.addEventListener('click', function(){
    for(let i=0; i < item.length; i++){
        item[i].classList.toggle('active');
        // console.log('hello');
    }
   
})

function add(){
    console.log(2+4);
}
add();
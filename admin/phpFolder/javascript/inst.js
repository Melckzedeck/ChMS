'use strict'

const open = document.getElementById('add-data-btn');
const close = document.getElementById('close-btn');
let save = document.getElementById('save-btn');
let form = document.querySelector('.form-content');

open.addEventListener('click', () => {
    form.classList.remove('hidden');
})

close.addEventListener('click', () => {
    form.classList.add('hidden');
})


// ================ FETCHING  INPUT DATA =================
// =======================================================

let inst_name = document.getElementById('inst-name');
let inst_address = document.getElementById('inst-address');
let inst_phone = document.getElementById('inst-phone');
let inst_loc = document.getElementById('inst-loc');
let inst_email = document.getElementById('inst-email');

const saveData = (e) => {
   let list = document.getElementById('list');
   let row = document.createElement('tr');
   row.innerHTML = `
     <td>${inst_name.value} </td>
     <td>${inst_address.value} </td>
     <td>${inst_phone.value} </td>
     <td>${inst_email.value} </td>
     <td>${inst_loc.value} </td>
   `
   list.appendChild(row);
   e.preventDefault();
   form.classList.add('hidden');
   setTimeout(function(){
     clearAlert();
   }, 3000);
}
save.addEventListener('click', saveData);


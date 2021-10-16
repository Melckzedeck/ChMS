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

let branch_name = document.getElementById('branchName');
let branch_code = document.getElementById('branchCode');
let branch_status = document.getElementById('branchStatus');
// let inst_loc = document.getElementById('inst-loc');
// let inst_email = document.getElementById('inst-email');

const saveData = (e) => {
   let list = document.getElementById('list');
   let row = document.createElement('tr');
   row.innerHTML = `
     <td> </td>
     <td>${branch_name.value} </td>
     <td>${branch_code.value} </td>
     <td>${branch_status.value} </td>
     <td>
     <button id="inner-btn">Edit</button>
     <button id="inner-btn">Delete</button>
     </td>
   `
   list.appendChild(row);

    //  =========== THIS FUNCTION MAKE THE ALERT TEXT DISSAPEAR AFTER 3 SECS =================
    const clearAlert = () => {
        const currentAlert = document.querySelector('.alert');
        if(currentAlert){
          currentAlert.remove();
        }
    }

    // ======= THIS FUNCTION MAKE ALL THE FIELDS EMPTY AFTER SUBMITTING THE DATA ===========
    const clearText = () => {
        let branch_name = document.getElementById('branchName').value= '';
        let branch_code = document.getElementById('branchCode').value = '';
        let branch_status = document.getElementById('branchStatus').value = '';
    }


   if(branch_name.value != '' && branch_code.value != '' && branch_status != ''){
       const div = document.createElement('div');
       div.className = 'alert success';
       const cont = document.querySelector('.table-container');
       const head = document.querySelector('#table');
       div.appendChild(document.createTextNode("Branch succesfull registered"));
       cont.insertBefore(div,head);

    //    CALLING THE DEFINED FUNCTIONS 
       setTimeout( () => {
        clearAlert();
    }, 3000)
    clearText();
   }
   
   else{
    const div = document.createElement('div');
    div.className = 'alert err';
    const cont = document.querySelector('.table-container');
    const head = document.querySelector('#table');
    div.appendChild(document.createTextNode("Please fill in all fields are required!"));
     
    cont.insertBefore(div,head);

    setTimeout( () =>{
       clearAlert();
    },3000 ) 
       
      }
      clearText();
   e.preventDefault();
   form.classList.add('hidden');

   
  
}
save.addEventListener('click', saveData);


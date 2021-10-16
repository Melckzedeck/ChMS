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

let fname = document.getElementById('fName');
let lname = document.getElementById('lName');
let dob = document.getElementById('dob');
let phone = document.getElementById('dptH-phone');
let email = document.getElementById('email');
let address = document.getElementById('address');
let city = document.getElementById('city');
let country = document.getElementById('counry');
let dept = document.getElementById('dept');
let regDate = document.getElementById('regDate');
let jobType = document.getElementById('jjob-type');
let photo = document.getElementById('photo');
// let inst_loc = document.getElementById('inst-loc');
// let inst_email = document.getElementById('inst-email');

const saveData = (e) => {
   let list = document.getElementById('list');
   let row = document.createElement('tr');
   row.innerHTML = `
     <td> </td>
     <td>${photo.value} </td>
     <td>${fname.value + " " + lname.value } </td>
     <td>${dob.value} </td>
     <td>${phone.value} </td>
     <td>${email.value} </td>
     <td>${dept.value} </td>
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
        let fname = document.getElementById('fName').value = '';
        let lname = document.getElementById('lName').value = '';
        let dob = document.getElementById('dob').value = '';
        let phone = document.getElementById('dptH-phone').value = '';
        let dept = document.getElementById('dept').value = '';
    }


   if(fname.value != '' && lname.value != '' && phone != '' && dob != '' && dept != ''){
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


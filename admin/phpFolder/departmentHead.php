<?php
        $fname = $lname = $dob = $phone = $username = $email = $city = $nationality = $department = $gender = $regDate = $branchName = '';
        $fnameErr = $lnameErr = $dobErr = $phoneErr = $usernameErr = $emailErr = $cityErr = $cityErr = $nationalityErr = $departmentErr = $genderErr = $regDateErr = $branchNameErr = $photoErr ='';
        require_once('../../config/connection.php');
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Head</title>
    <link rel="stylesheet" href="css/all.min.css">
    <script src="css/all.min.js"></script>

    <style>
        /** @format */

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  /* padding-left: 0.6em; */
  /* text-align: center; */
}
.form-content{
  width: 60%;
  margin: auto;
  border: 1px solid grey;
  padding: 1em 2em;
  border-radius: 10px;
  background: white;
  /* position: absolute;
  left: 50%;
  top : 80%;
  transform : translate(-50%, -50%); */
  /* background-image: url(../../images/church5.jpg); */
  background-size: cover;
  background-repeat: no-repeat;
  margin-bottom: 1em;
}
.branch{
    font-size: 1.2em;
    font-weight:600;
}
.top {
  padding: 0.5em;
  box-shadow: 2px 8px 16px grey;
}
input[type="text"],input[type="tel"],input[type="date"], input[type="email"],input[list="country"],input[list="branch"]  {
  width: 90%;
  padding: 0.5em;
  margin: 0.4em;
  border-radius: 5px;
  border: 1px solid grey;
  outline: none;
}
.alert {
  padding: 0.5em;
  margin: auto;
  border-radius: 5px;
  width: 50%;
  margin-bottom: 0.4em;
}
.success {
  background-color: green;
  color: white;
}
.err {
  background-color: red;
  color: white;
}
.btn {
  padding: 0.5em 1.5em;
  background-color: orangered;
  color: white;
  border: none;
  outline: none;
  margin: 1em 0.5em;
  border-radius: 5px;
}
#inner-btn {
  padding: 0.5em 1.5em;
  background-color: orangered;
  color: white;
  border: none;
  outline: none;
  margin: 0 0.2em;
  border-radius: 5px;
}
.hidden {
  display: none;
}
.form-container > p,
.table-container > p {
  background-color:teal;
  margin-bottom: 0.8em;
  color: #fff;
  /* padding: 0.5; */
  padding: 0.5em;
  box-shadow: 2px 8px 16px grey;
  text-align: center;
  font-size: 1.2em;
}
.table-container {
  text-align: center;
  overflow-x: auto;
}
table {
  width: 95%;
  margin: auto;
  margin-bottom: 1em;
}
table,
td,
th {
  border: 1px solid gray;
  border-collapse: collapse;
  padding: 0.3em 0.01em;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
.bottom-footer{
  background-color:teal;
  /* margin-bottom: 0.8em; */
  width: 100%;
  /* padding: 0.5; */
  padding: 0.5em;
  color: white;
  box-shadow: 2px 8px 16px grey;
  text-align: center;
  font-size: 1.2em;
}
.Err{
     color: red;
}
    </style>
</head>
<body>
    

<?php

     if($_SERVER['REQUEST_METHOD'] === 'POST'){
       function validate ($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
                 if(isset($_POST["save"])){

                   if(empty($_POST["fname"])){
                     $fnameErr = 'Error firstname is required';
                   }
                   else{
                     $fname = validate($_POST["fname"]);
                   }

                   if(empty($_POST["lname"])){
                     $lnameErr = 'Error lastname is required';
                   }
                   else{
                       $lname = validate($_POST["lname"]);
                   }

                   if(empty($_POST["dob"])){
                     $dobErr = 'Error date of birth is required';
                   }
                   else{
                     $dob = validate($_POST['dob']);
                   }

                   if(empty($_POST["tel"])){
                     $phoneErr = 'Error phone number is required';
                   }
                   else{
                     $phone = validate($_POST["tel"]);
                   }

                   if(empty($_POST["email"])){
                     $emailErr = 'Error email is required';
                   }
                   else{
                     $email = validate($_POST["email"]);
                   }

                  //  if(empty($_POST["username"])){
                  //    $usernameErr = '';
                  //  }
                  //  else{
                  //    $username = validate($_POST["username"]);
                  //  }

                   if(empty($_POST["city"])){
                      $cityErr = '';
                   }
                   else{
                     $city = validate($_POST["city"]);
                   }

                   if(empty($_POST["country"])){
                     $nationalityErr = 'Error nationality is required';
                   }
                   else{
                     $nationality = validate($_POST["country"]);
                   }
                   if(empty($_POST["gender"])){
                    $genderErr = "Error gender is required";
                  }
                  else{
                    $gender = validate($_POST["gender"]);
                  }

                   if(empty($_POST["branch"])){
                     $branchNameErr = 'Error branch name is required';
                   }
                   else{
                     $branchName = validate($_POST["branch"]);
                   }
                   if(empty($_POST['photo'])){
                     $photoErr = "Error profile photo is required";
                   }
                   else{
                     $photo = $_POST["photo"];
                   }

                //    if(empty($_POST["regDate"])){
                //      $regDateErr = 'Error register date is required';
                //    }
                //    $regDate = validate($_POST["regDate"]);
                //  }

                //  if(empty($_POST["jobType"])){
                //    $jobErr = '';
                //  }
                //  else{
                //    $job = validate($_POST["jobType"]);
                //  }

                //  if(empty($_POST["photo"])){
                //    $phoneErr = '';
                //  }
                //  else{
                //    $photo = validate($_POST["photo"]);
                 }

                }

            ?>

<div class="form-container">
    <p><b>Manage: </b> Department Head Information</p>
<form method="POST" action="" class="hidden form-content" enctype="multipart/form-data">
      <p class="branch">Manage Institution Information</p> <br>
      First Name : <br>
                <input type="text" name="fname" placeholder="First name" id="fName" required> <br>
                 <span class="Err"><?php echo $fnameErr ?></span> <br>
                Last Name : <br>
                <input type="text" name="lname" placeholder="Last Name" id="lName"> *<br>
                <span class="Err"><?php echo $lnameErr ?></span> <br>
                Gender <br>
                 <input type="radio" name="gender" value="Male" > Male 
                  <input type="radio" name="gender" value="Female"> Female *<br>
                   <span class="Err"><?php echo $genderErr ?></span><br>
                Date of Birth : <br>
                 <input type="date" name="dob"> * <br>
                  <span class="Err"><?php echo $dobErr ?></span> <br>
                  Phone <br>
                  <input type="tel" name="tel" placeholder="Telephone" id="phone"> *<br>
                  <span class="Err"><?php echo $phoneErr ?></span><br>
                  Email <br>
                  <input type="email" name="email" placeholder="Email" id="email"> *<br>
                  <span class="Err"><?php echo $emailErr ?></span><br>
                  City <br>
                  <input type="text" name="city" placeholder="City" id="city"> *<br>
                  <span class="Err"><?php echo $cityErr ?></span><br>
                  Nationality <br>

                      <input list="country" name="country" placeholder="Select country" id="country">
                      <datalist id="country">
                      <option value="Australia"></option>
        <option value="ALBANI"></option>
        <option value="AMERICA"></option>
       <option value="BRAZIL"></option>
        <option value="DENMARK"></option>
        <option value="CHINA"></option>
        <option value="ENGLAND"></option>
        <option value="ITALY"></option>
         <option value="TANZANIA"></option>
         <option value="KENYA"></option>
         <option value="UGANDA"></option>
         <option value="RWANDA"></option>
         <option value="BURUNDI"></option>
        <option value="EGYPT"></option>
         <option value="NIGERIA"></option>
         <option value="ALGERIA"></option>
         <option value="IVORY COAST"></option>
         <option value="TURKEY"></option>
        <option value="LESOTHO"></option>
        <option value="GERMANY"></option>
                  </datalist> * <br>
                      <span class="Err"><?php echo $nationalityErr ?></span><br>
                      Branch Name<br>
                      <input list="branch" name="branch" placeholder="select department name">
                      <datalist id="branch">
                        <?php
                          $option_query  = "SELECT branch_name FROM branches";
                          $branch_Name = mysqli_query($conn, $option_query);
                          if(mysqli_num_rows($branch_Name) > 0){
                            while($row = mysqli_fetch_assoc($branch_Name)){
                              $branch_ref = $row['branch_name'];
                               echo "<option value='$branch_ref'></option>";
                            }
                          }
                            else{
                              echo ("fetch failed");
                            }
                          
                        ?>
              </datalist>* <br>
                      <span class="Err"><?php echo $branchNameErr ?></span><br>
                      Profile Image <br>
                      <input type="file" name="photo" placeholder="Upload profile photo" required> <br>
                      <span class="Err"><?php echo "$photoErr" ?></span><br>
                      <!-- Department <br>
                      <input type="text" name="dept" placeholder="Department" id="dept"> *<br> -->
                      
                      <!-- Register Date <br>
                      <input type="text" name="regDate" placeholder="Register Date" id="regDate"> *<br> -->
                      
                      <!-- Job Type <br>
                      <input type="text" name="jobType" placeholder="Job Type" id="jpb-type"> *<br>
                      
                      Photo <br>
                      <input type="textarea" name="photo" placeholder="Upload a picture" id="photo"> * <br> -->
                     
         
         <button id="close-btn" class="btn"  name="close">Close</button>
               <button id="save-btn" class="btn" name="save">Save Changes</button>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
      </form>


            


        <div class="table-container" >
            <button id="add-data-btn" class="btn"  style="float: right; margin-bottom:1em ;" ><b><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Data</b></button> <br><br><br>
    
            <p id="table"><b>Department Heads Information</b></p>
            <table >
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Branch</th>
                    <th>Username</th>
                    <th>Contacts</th>
                    <th>City</th>
                     <th>Action</th>
                    <!-- <th>Location</th> -->
               
                    <?php
                 if(!empty($fname) && !empty($lname) && !empty($dob) /*&& !empty($department)*/ && !empty($nationality) && !empty($phone) && !empty($email) && !empty($city) && !empty($gender)/*  && !empty($regDate)*/ && !empty($branchName) && !empty($photo)){
                  
                  $insert_query = "INSERT INTO department_head (fname, lname, gender, dob,phone, email, branch_name, city, country,image) values( '$fname', '$lname', '$gender', '$dob', '$phone', '$email','$branchName', '$city','$nationality','$photo')";

                  $result = mysqli_query($conn, $insert_query);
                  if($result == TRUE){
                    echo "<script>
                    alert('New head of department has been added');
                    </script>";
                  }
                  else{
                    die("connection failed: ");
                  }
                }
                ?>
               
                </tr>
              <tbody id="list">
                <?php
                   $fetch_query = "SELECT * FROM department_head";
                   $details = mysqli_query($conn, $fetch_query);
                    if(mysqli_num_rows($details) > 0){
                          
                      while($row = mysqli_fetch_assoc($details)){
                           $head_id = $row['dept_head_id'];
                           $head_fname = $row['fname'];
                           $head_lname = $row['lname'];
                           $head_gender = $row['gender'];
                           $head_phone = $row['phone'];
                           $head_email = $row['email'];
                           $head_branch = $row['branch_name'];
                           $head_city = $row['city'];
                           $profile = $row['image'];

                           echo "<tr>";
                           echo "<td>$head_id</td>";
                           echo "<td>$profile</td>";
                           echo "<td>$head_fname  $head_lname</td>";
                           echo "<td>$head_gender</td>";
                           echo "<td>$head_branch</td>";
                           echo "<td>$head_phone</td>";
                           echo "<td>$head_email</td>";
                           echo "<td>$head_city</td>";
                           echo "<td>
                           <button id='inner-btn' name='edit'> Edit</button>
                           <button id='inner-btn' name='delete'><i class='fa fa-trash' aria-hidden='true'></i></button>
                           </td>";
                           echo "</tr>";
                      }
                    }
                    else{
                      die("retrieve failed");
                    }
                 ?>
                    
                   
              </tbody>
              
            </table>
                  </div>

          </div>
          <footer>
          <div class="bottom-footer">
           &copy  <?php echo date("Y");?> Church Ministry  ||  All rights are reserved
          </div>
          </footer>
        <script>
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


// // ================ FETCHING  INPUT DATA =================
// // =======================================================
let fname = document.getElementById('fName');
let lname = document.getElementById('lName');
let dob = document.getElementById('dob');
let phone = document.getElementById('phone');
let email = document.getElementById('email');
let address = document.getElementById('address');
let city = document.getElementById('city');
let country = document.getElementById('country');
let dept = document.getElementById('department');

const saveData = (e) => {
//     //  =========== THIS FUNCTION MAKE THE ALERT TEXT DISSAPEAR AFTER 3 SECS =================
    const clearAlert = () => {
        const currentAlert = document.querySelector('.alert');
        if(currentAlert){
          currentAlert.remove();
        }
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
  //  e.preventDefault();
   form.classList.add('hidden');

   
  
}


        </script>
</body>
</html>
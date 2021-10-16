<?php
ob_start();
session_start();
// include('../../config/security.php');
?>
<?php
  $fname = $lname = $gender = $dob = $phone = $email = $nationality = $branchName = $photo = $address = $userRole = $password = $success = '';
  $fnameErr = $lnameErr = $genderErr= $dobErr = $phoneErr = $emailErr = $nationalityErr = $branchNameErr = $deptNameErr = $photoErr= $addressErr = $passwordErr = $userRoleErr = '';
 
  
        include('../config/topNav.php');
        require_once('../config/connection.php');
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Member</title>
    <link rel="stylesheet" href="./Css/all.min.css">
    <script src="./Css/all.min.js"></script>

    <style>
        
        * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  /* padding-left: 0.6em; */
  /* text-align: center; */
  background-image: url(../admin/phpFolder/images/church4.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  z-index: -2;
}
.form-content{
  /* width: 50%; */
  margin: auto;
  margin-left: 1em;
  /* border: 1px solid grey; */
  padding: 1em 1em;
  border-radius: 10px;
  background: white;
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
#info{
    width: 30%;
  /* margin: auto; */
  padding: 1em 2em;
}
.home{
    border: 1px solid grey;
    padding: 0.5em;
}
input[type="text"],input[type="tel"], input[type="email"],input[list="country"],input[type="date"],input[list="branch"],input[list="role"],input[type="password"]  {
  width: 90%;
  padding: 0.5em;
  /* margin: 0.1em; */
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
.hidden{
  /* display: none; */
}
.form-container > p,
.table-container > p {
  background-color:teal;
  color:white;
  margin-bottom: 0.8em;
  /* padding: 0.5; */
  padding: 0.5em;
  box-shadow: 2px 8px 16px grey;
  text-align: center;
  font-size: 1.2em;
}
.table-container {
  text-align: center;
}
table {
  width: 95%;
  margin: auto;
  margin-bottom:1em;
}
table,
td,
th {
  border: 1px solid gray;
  border-collapse: collapse;
  padding: 0.5em 0.1em;
}
th{
  background: teal;
  color: white;
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
.success{
  background: green;
  color: white;
  padding: 0.3em;
  text-align: center;
  border-radius: 5px;
  width: 40%;
  margin: auto;
}
.error{
  background: red;
  color: white;
  padding: 0.3em;
  text-align: center;
  border-radius: 5px;
  width: 40%;
  margin: auto ;
  margin-left: -10;
}
input:focus-visible {
  border: 1px solid lightblue;
}
.not-valid {
  border: 1px solid red;
}
.invalid-feedback {
  color: red;
}
.hidden{
  display: none;
}
.form{
  display: grid;
grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
grid-gap: 1.5em;
width: 75%;
margin: auto;
background: white;
border: 1px solid grey;
border-radius: 10px;
box-shadow: 2px 3px 3px grey;
/* margin-top: 2em; */
}
    </style>
</head>
<body>
  <?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if(isset($_POST["save"])){
    if(empty($_POST["fname"])){
      $fnameErr = "Error department name is required";
    }
    else{
      $fname = validate($_POST["fname"]);
    //  $deptName = $_POST["deptName"];
    //  //  echo $branchName;
    }
    if(empty($_POST["lname"])){
      $lnameErr = "Error branch code is required";
     }
     else{
      $lname  = validate( $_POST["lname"]);
      //  $deptHead = $_POST["deptHead"];
       // echo $branchCode;
    }
    if(empty($_POST["country"])){
      $nationalityErr = "Error nationality is required";
    }
    else{
       $nationality = validate($_POST["country"]);
    }
    if(empty($_POST["tel"])){
      $phoneErr = "Error phone is required";
    }
    else{
      $phone = validate($_POST["tel"]);
    }
    if(empty($_POST["gender"])){
      $genderErr = "Error gender is required";
    }
    else{
      $gender = validate($_POST["gender"]);
    }
    if(empty($_POST["email"])){
      $emailErr = "Error email is required";
    }
    else{
       $email = validate($_POST["email"]);
    }
    if(empty($_POST["deptName"])){
      $deptNameErr = "Error department name is required";
    }
    else{
      $deptName = validate($_POST["deptName"]);
    }
    if(empty($_POST["branch"])){
      $branchNameErr = "Error branch name is required";
    }
    else{
      $branchName = validate($_POST["branch"]);
    }
    if(empty($_POST["dob"])){
      $dobErr = "Error date of birth is required";
    }
    else{
      $dob = validate($_POST["dob"]);
    }
    if(empty($_FILES['photo']['name'])){
      $photoErr = "Error profile Photo is required";
    }
    else{
      $photo = $_FILES['photo']['name'];
      echo $photo;
    }
    if(empty($_POST['address'])){
      $addressErr = "Error address is required";
  }
  else{
    $address = validate($_POST['address']);
  }
  if(empty($_POST['password'])){
    $passwordErr = "Error strong password is required";
  }
  else{
    $password = validate($_POST['password']);
  }
  if(empty($_POST['role'])){
    $userRoleErr = "Error user role is required";
  }
  else{
    $userRole = validate($_POST['role']);
  }
}
}
?>


    <div class="form-container">
    <!-- <p><b>Manage: Member Information</b></p>s -->
    <p class="branch">Fill the form below to register</p> <br>
    <div class="form">

       <div class="phase1">

       <form method="POST" action="" class="form-content"  enctype="multipart/form-data">
        
          First Name <br>
          <input type="text" name="fname" placeholder="first name" id="fname" required> <br>
          <span class="invalid-feedback message1 hidden">Name must be 2 to 20 characters</span>
          <span class="Err"><?php echo $fnameErr ?></span><br>
          Last Name<br>
          <input type="text" name="lname" placeholder="Last name" id="lname" required> <br>
          <span class="invalid-feedback message2 hidden">Name must be 2 to 20 characters</span>
          <span class="Err"><?php echo $lnameErr ?></span><br>
          Gender <br>
          <input type="radio" name="gender" value="Male" > Male 
          <input type="radio" name="gender" value="Female"> Female <br>
          <span class="Err"><?php echo $genderErr ?></span><br>
          Date of Birth <br>
              <input type="date" name="dob" placeholder="Select date of birth" required>  <br>
                    <span class="Err"><?php echo $dobErr ?></span> <br>
          Telephone <br>
          <input type="tel" name="tel" placeholder="Telephone" id="phone" required> <br>
          <span class="invalid-feedback message3 hidden">Enter a valid phone number</span>
          <span class="Err"><?php echo $phoneErr ?></span><br>
          
                  </div>  
                  
                  <div class="phase2" style="margin-top: 1em;">
         Email <br>
         <input type="email" name="email" placeholder="example12@gmail.com" id="email" required> <br>
         <span class="invalid-feedback message4 hidden">Enter a valid Email</span>
         <span class="Err"><?php echo $emailErr ?></span><br>

                 Address<br>
                 <input type="text" name="address" placeholder="your home address" id="inst-name" required> <br>
                 <span class="Err"><?php echo $addressErr ?></span><br>

              Branch Name <br>
             <input list="branch" name="branch" placeholder="Select your branch" required>
             <datalist id="branch">
                <!-- ============== FETCH BRANCHES DATA FROM TABLE BRANCHES ===================  -->
                <?php
                 $select_query = "SELECT branch_name, branch_id FROM branches ";
                  $output = mysqli_query($conn, $select_query);
                  if(mysqli_num_rows($output) > 0){
                     while($rows = mysqli_fetch_assoc($output)){
                       $branch_name = $rows['branch_name'];
                       echo "<option value='$branch_name'></option>" ;
                     }
                  }
                ?>
             </datalist> <br>
             <span class="Err"><?php echo $branchNameErr ?></span><br>
            <!-- Nationality <br> -->
             <input type="hidden" name="country" value="Tanzania">
                     

                      <!-- User Role <br> -->
                      <input type="hidden"  name="role" value="user" placeholder="select user role" required>
                      
                
        Password <br>
        <input type="password" name="password" id="password" placeholder = "Password must contain atleast 8 characters" id="password" required> <br>
        <span class="invalid-feedback message5 hidden">Enter a strong password with atleast 1 numeric and uppercase letter</span>
        <span class="Err"><?php echo $passwordErr ?></span><br>
        
        Profile Photo <br>
        <input type="file" name="photo"> <br>
        <span class="Err"><?php echo $photoErr ?></span><br>
       
         <!-- <button id="close-btn" class="btn"  name="close">Close</button> -->
               <button id="save-btn" class="btn" name="save">Register</button>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
      </form>

      </div>
       </div>
    
          <?php
                   if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
                      echo "<div class='success'>" .$_SESSION['success'] . "</div>";
                      unset($_SESSION['success']);
                   }
                   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<div class='error'>" .$_SESSION['status'] . "</div>";
                    unset($_SESSION['status']);
                 }
          ?>
    <div class="table-container">
     
    <?php
                  if(!empty($fname) && !empty($lname) && !empty($gender) && !empty($phone) && !empty($dob) && !empty($nationality) && !empty($branchName) && !empty($email) && !empty($photo) && !empty($password) && !empty($userRole)){ 
                  
                    // ================= FETCHING BRANCH ID FROM TABLE BRANCHES  ========== 
                    if(isset($_POST['save'])){
                      $select_id_query = "SELECT branches.branch_id, branches.branch_name FROM branches 
                      LEFT JOIN members ON branches.branch_id = members.branch_id WHERE branch_name = '$branchName'";
                       
                      $branch_details = mysqli_query($conn, $select_id_query);
                      if(mysqli_num_rows($branch_details) > 0){
                         while($row = mysqli_fetch_assoc($branch_details)){
                           $branch_id = $row['branch_id'];
                          //  die($branch_id);
                         }
                      }
                      else{
                        // die("Data fetch failed");
                      }

                      if(file_exists("../admin/phpFolder/upload/" .$_FILES['photo']['name'])){
                        $store = $_FILES['photo']['name'];
                        $_SESSION['status'] = "Image already exists ' .$store. '";
                        header('Location: index.php');
                      }
                      else{
                        //    ============= CHECKING IF EMAIL EXISTS ======================== 
                    
                        $select_email_query = "SELECT email FROM members WHERE email = '$email'";
                        $output = mysqli_query($conn, $select_email_query);
                         if(mysqli_num_rows($output) > 0){
                             while($row = mysqli_fetch_assoc($output)){
                                
                                  $_SESSION['status'] = "username or email already exists";
                                  header('Location: index.php');
                         }
                         
                     }
                     else if(isset($_POST['save'])){
                       $insert_query = "INSERT INTO members(fname, lname, gender, dob, phone, email, address,user_role, password, country,photo, branch_id) VALUES ('$fname', '$lname', '$gender', '$dob', '$phone', '$email','$address', '$userRole', '$password','$nationality','$photo','$branch_id')";

                       $results = mysqli_query($conn, $insert_query);
                      if($results == TRUE){
                        move_uploaded_file($_FILES['photo']['tmp_name'], "../admin/phpFolder/upload/".$_FILES['photo']['name']);
                         $_SESSION['username'] = $email;
                         header('Location: ../admin/pages/index.php');
                      }
                      else{
                        
                        $_SESSION['status'] = "New member not added";
                        header('Location: index.php');
                      }
                    }
                  }
                }
                  
                    // ============== INSERTING DATA TO THE DATABASE ===== 
                  
                  }
                  else{
                    // echo "fill all the inputs";
                  }
                    ?>


                        
                 

                    
                
<?php
                    //   }
                    // }  
                    // ob_flush();   
                ?>
          </tbody>
        </table>
    </div>
    
</div>
<script>
//  const open = document.getElementById('add-data-btn');
// const close = document.getElementById('close-btn');
// var save = document.getElementById('save-btn');
// let form = document.querySelector('.form-content');

// open.addEventListener('click', () => {
//     form.classList.remove('hidden');
// })

// close.addEventListener('click', (e) => {
//     form.classList.add('hidden');
//     e.preventDefault();
// })

// ================FORM VALIDATION =================== 
document.getElementById('fname').addEventListener('blur', validatefName);
document.getElementById('lname').addEventListener('blur', validatelName);
document.getElementById('phone').addEventListener('blur', validatePhone);
document.getElementById('email').addEventListener('blur', validateEmail);
document.getElementById('password').addEventListener('blur', validatePassword);

function validatefName(){
const fname = document.getElementById('fname');
const re = /^[a-zA-Z]{2,20}$/;
  if(!re.test(fname.value)){
    fname.classList.add('not-valid');
    document.querySelector('.message1').classList.remove('hidden');
  }
  else{
    fname.classList.remove('not-valid');
    document.querySelector('.message1').classList.add('hidden');
  }
}

function validatelName(){
const lname = document.getElementById('lname');
const re = /^[a-zA-Z]{2,20}$/;
  if(!re.test(lname.value)){
    lname.classList.add('not-valid');
    document.querySelector('.message2').classList.remove('hidden');
  }
  else{
    lname.classList.remove('not-valid');
    document.querySelector('.message2').classList.add('hidden');
  }
}

function validatePhone(){
  const phone = document.getElementById('phone');
// const re =/^\(?+?\d{3}\)?[-. ]?\d{3}[-. ]?\d{4}$/;
const re = /^\(?\d{3}\)?[-. ]?\d{3}[-. ]?\d{4}$/;
  if(!re.test(phone.value)){
    phone.classList.add('not-valid');
    document.querySelector('.message3').classList.remove('hidden');
  }
  else{
    phone.classList.remove('not-valid');
    document.querySelector('.message3').classList.add('hidden');
  }
}
function validateEmail(){
  const email = document.getElementById('email');
const re = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
  if(!re.test(email.value)){
    email.classList.add('not-valid');
    document.querySelector('.message4').classList.remove('hidden');
  }
  else{
    email.classList.remove('not-valid');
    document.querySelector('.message4').classList.add('hidden');
  }
}
function validatePassword(){
  const password = document.getElementById('password');
const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
  if(!re.test(password.value)){
    password.classList.add('not-valid');
    document.querySelector('.message5').classList.remove('hidden');
  }
  else{
    password.classList.remove('not-valid');
    document.querySelector('.message5').classList.add('hidden');
  }
}




</script>
</body>
</html>
<?php
// include('../../config/footer.php');
// require_once('../../config/connection.php');
?>
<?php
ob_start();
// session_start();
include('../../config/security.php');
include('../../config/admin.php');
?>

<?php
  $fname = $lname = $gender = $dob = $phone = $email = $nationality = $branchName = $photo = $address = $userRole = $password = $success = '';
  $fnameErr = $lnameErr = $genderErr= $dobErr = $phoneErr = $emailErr = $nationalityErr = $branchNameErr = $deptNameErr = $photErr= $addressErr = $passwordErr = $userRoleErr = '';
  include('../../config/header.php');
  require_once('../../config/connection.php');
 
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
}
.form-content {
  width: 60%;
  margin: auto;
  border: 1px solid grey;
  padding: 0.7em 2em;
  border-radius: 10px;
  /* position: absolute;
  left: 50%;
  top : 40%;
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
  margin: 0.2em;
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
a{
    text-decoration: none;
    color: white;
    padding: 0.4em;
}
.Err{
  color: red;
}
.success{
  background: green;
  color: white;
  padding: 0.3em;
  border-radius: 5px;
  width: 40%;
  margin: auto;
}
.error{
  background: green;
  color: white;
  padding: 0.3em;
  border-radius: 5px;
  width: 40%;
  margin: auto; 
}
    </style>
</head>
<body>
   <!-- =============== DELETING DATA FROM THE DATABASE  ===================================== 
  ============================================================================================ -->
  <?php
  if(isset($_POST['delete'])){
    $member_id = $_POST['delete_id'];
    $delete_query = "DELETE FROM members WHERE member_id = '$member_id'";
    $result = mysqli_query($conn, $delete_query);
    if($result == TRUE){
      echo " <script>
      confirm('Are sure you want to delete the record');
    </script>";
      $_SESSION['success'] = "Successfully deleted";
     header("Location: addMember.php");
  }
  else{
    $_SESSION['success'] = "Failed to delete";
    header("Location: addMember.php");
  }
  }
?>
 <!-- ======================= QUERY TO UPDATE THE DATA AND SEND THEM BACK TO THE DATABASE  =========== 
======================================================================================================== -->
  <?php

if(isset($_POST['update'])){
  $edit_id = $_POST['id_edit'];
  $fname_edit = $_POST['fname_edit'];
  $lname_edit = $_POST['lname_edit'];
  $gender_edit = $_POST['gender_edit'];
  $dob_edit = $_POST['dob_edit'];
  $phone_edit = $_POST['tel_edit'];
  $email_edit = $_POST['email_edit'];
  $address_edit = $_POST['address_edit'];
  $nationality_edit = $_POST['country_edit'];
  $role_edit = $_POST['role_edit'];
  $password_edit = $_POST['password_edit'];
  $photo_edit = $_POST['photo_edit'];

  $update_query = "UPDATE members SET fname='$fname_edit', lname='$lname_edit', gender='$gender_edit', dob='$dob_edit', phone='$phone_edit', email='$email_edit',address='$address_edit', user_role='$role_edit',password='$password_edit', country='$nationality_edit', photo='$photo_edit' WHERE member_id= '$edit_id'";

  $output = mysqli_query($conn, $update_query);
  if($output == TRUE){
       $_SESSION['success'] = "Your data has been updated";
      header("Location: addMember.php");
   }
   else{
     $_SESSION['success'] = "Your has not been updated";
     header("Location: addMember.php");
   }
}
?>
       <!-- ============= FETCHING DATA FROM THE DATABASE FOR THE PURPOSE OF EDITING  ===========
      ================================&&&&&&&&&&&&&&&&&&&&&&&&=================================== -->
 <?php
if(isset($_POST['edit'])){
    $member_id = $_POST['edit_id'];
    
    $select_query = "SELECT * FROM members WHERE member_id= '$member_id'";
    $result = mysqli_query($conn, $select_query);
    foreach($result as $row){
        ?>

<div class="form-container">
    <p><b>Manage: </b> Department Information</p>
           
      <form method="POST" action="" class="hidden form-content">
        
      <p class="branch">Add Department</p> <br>
       <h5>All * inputs are required</h5> <br>
         <input type="hidden" name='id_edit' value="<?php echo $row['member_id'] ?>">
        First Name <br>
        <input type="text" name="fname_edit" placeholder="first name" value="<?php echo $row['fname'] ?>" id="inst-name" required> *<br>
        
        Last Name<br>
        <input type="text" name="lname_edit" placeholder="Last name" value="<?php echo $row['lname'] ?>" id="inst-add" required> *<br>
       
        Gender <br>
          <input type='radio' name='gender_edit' value='Male' checked> Male
         <input type='radio' name='gender_edit' value='Female'> Female <br>
     
        
        Date of Birth <br>
            <input type="date" name="dob_edit" value="<?php echo $row['dob'] ?>" placeholder="Select date of birth" required> * <br>
                  
                  Telephone <br>
                  <input type="tel" name="tel_edit" value="<?php echo $row['phone'] ?>" placeholder="Telephone" required> <br>
                  
                  Email <br>
                  <input type="email" name="email_edit" value="<?php echo $row['email'] ?>" placeholder="Email" required> *<br>
                  
                 Address<br>
                 <input type="text" name="address_edit" value="<?php echo $row['address'] ?>" placeholder="your home address" id="inst-name" required> *<br>
                

            
             
            Nationality <br>
             <input list="country" name="country_edit" value="<?php echo $row['country'] ?>" placeholder="Select country" required>
                      

                      User Role <br>
                      <input list="role"  name="role_edit" value="<?php echo $row['user_role'] ?>" placeholder="select user role" required>
                      <datalist id="role">
                        <option value="admin"></option>
                        <option value="user"></option>
                </datalist> <br>
                
        Password <br>
        <input type="password" name="password_edit" value="<?php echo $row['password'] ?>" id="password" placeholder = "Enter a strong password" required> <br>
      
        
        Profile Photo <br>
        <input type="file" value="<?php echo $row['photo'] ?>" name="photo_edit"> <br>
        
         <button id="close-btn" class="btn"  name="close"><a href="addMember.php">Cancel</a></button>
               <button id="save-btn" class="btn" name="update">Save Changes</button>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
      </form>

   <?php

    }
}
ob_flush();
?>

</body>
</html>  
<?php
 ob_start(); 
 ?>
<?php
include('../../config/security.php');
include('../../config/admin.php');
require_once('../../config/connection.php');
include('../../config/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit institution</title>

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
.form-content {
  width: 55%;
  margin: auto;
  border: 1px solid grey;
  padding: 1em 2em;
  border-radius: 10px;
  position: absolute;
  left: 55%;
  top : 55%;
  transform : translate(-50%, -50%);
  /* background-image: url(../../images/church5.jpg); */
  background: white;
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
a{
    text-decoration: none;
    color: white;
    padding: 0.2em;
}
input {
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
  overflow-x: auto;
}
tr:nth-child(even) {
  background-color: #dddddd;
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
   <!-- ============================ DELETING THE DATA FROM THE DATABASE  =============== -->
   <?php
   if(isset($_POST['delete'])){
     $inst_id = $_POST['delete_id'];
     $delete_query = "DELETE FROM institution WHERE inst_id = '$inst_id'";
     $result = mysqli_query($conn, $delete_query);
     if($result == TRUE){
      // echo "<script>alert('New Institution has been submitted succesfull')</script>";
      $_SESSION['success'] = "Succesfull deleted";
      header('Location: institution.php');
  }
  else{
    $_SESSION['status'] = "Failed to delete";
      header('Location:institution.php');
  }
   }

   ?>

 <!-- ============= EDITING THE DATA AND SEND THEM BACK TO THE DATABASE ================== 
========================================================================================== -->
<?php
 if(isset($_POST['update'])){
     $inst_id = $_POST['id_edit'];
     $inst_name = $_POST['edit_name'];
     $inst_address = $_POST['edit_address'];
     $inst_email = $_POST['edit_email'];
     $inst_phone = $_POST['edit_phone'];
     $inst_loc = $_POST['edit_loc'];

     $update_query = "UPDATE institution SET inst_name='$inst_name', inst_address='$inst_address', inst_email='$inst_email', inst_phone='$inst_phone',  inst_loc='$inst_loc' WHERE inst_id='$inst_id'";

     $result = mysqli_query($conn, $update_query);
     if($result == TRUE){
            // echo "<script>alert('New Institution has been submitted succesfull')</script>";
            $_SESSION['success'] = "Your data has been updated";
            header('Location: institution.php');
        }
        else{
          $_SESSION['status'] = "Your data has not been updated";
            header('Location:institution.php');
        }
 }

?>


<!-- <main style="margin-left: 25%;"> -->

 <!-- ===================== fetching the data from the database and keeping them ready for editing  ========== 
============================================================================================================= -->
    <?php

if(isset($_POST['edit'])){
    $id = $_POST['edit_id'];
    $fetch_query = "SELECT * FROM institution WHERE inst_id = $id";
    $output = mysqli_query($conn, $fetch_query);
      foreach($output as $row){
          ?>



<div class="form-container">
    <p style="margin-left: -35%;"><b>Edit: Institution Information</b> </p>

<form method="POST" action="" class="hidden form-content">
      <p class="branch">Manage Institution Information</p> <br>

      <input type="hidden" name="id_edit" value="<?php echo $row['inst_id'] ?>">
        Institution Name <br>
        <input type="text" name="edit_name" placeholder="Institution name" value="<?php echo $row['inst_name'] ?>" id="inst-name" > *<br>
        
        Address <br>
        <input type="text" name="edit_address" placeholder="institution address" value="<?php echo $row['inst_address'] ?>" id="inst-add" > *<br>
        
         Telephone <br>
         <input type="tel" name="edit_phone" placeholder="Phone Number" value="<?php echo $row['inst_phone'] ?>" id="inst-phone" required> * <br>
         Email <br>
         <input type="email" name="edit_email" placeholder="Email" value="<?php echo $row['inst_email'] ?>" id="inst-email" required> * <br> 
         Location <br>
         <input type="text" name="edit_loc" placeholder="location" value="<?php echo $row['inst_loc'] ?>" id="inst-loc" required> *  <br> 
         
         
         <button  id="close-btn" class="btn"  name="Cancel"><a href="institution.php"> Cancel</a></button>
               <button id="save-btn" class="btn" name="update">Update</button>
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
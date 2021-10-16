<?php
ob_start();
// session_start();
include('../../config/security.php');
include('../../config/header.php');
include('../../config/connection.php');
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
  /* border: 1px solid grey; */
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
p{
  box-shadow: 1px 1px 2px grey;
  border-bottom: 1px solid grey;
  /* width: 30%; */
}
.profile{
  box-shadow: 2px 3px 4px grey;
  padding-left: 3em;
  text-align: center;
  z-index: -2;
  font-weight: lighter:
}
@media print{
  body *{
    visibility: hidden;
  }
  .print-conatainer, .print-container * {
    visibility: visible;
  }
}
    </style>
</head>
<body> 
  <div class="print-container">
       <!-- ============= FETCHING DATA FROM THE DATABASE FOR THE PURPOSE OF EDITING  ===========
      ================================&&&&&&&&&&&&&&&&&&&&&&&&=================================== -->
 <?php
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    
    $select_query = "SELECT * FROM members WHERE email= '$username'";
    $result = mysqli_query($conn, $select_query);
    foreach($result as $row){
        ?>

<div class="form-container">
    <p><b>Manage profile Information</p> </div>
         
    <!-- </div> -->
      <form method="POST" action="" class="hidden form-content">
        
      
                   <div class="profile">
                     <?php
               echo '<img style="border-radius: 10px; border: 1px solid teal;" src="../phpFolder/images/'.$row['photo'].'"  width="160;" height="180;" alt=""> <br>'
                     ?>
                   <h4>First Name</h4>
                  <p> <?php echo $row['fname'] ?> </p> <br>

                   <h4>Last Name </h4>
                   <p><?php echo $row['lname'] ?></p> <br> 
                   <h4>Gender</h4>
                   <p><?php echo $row['gender'] ?></p> <br>
                   <h4>Date of Birth</h4>
                  <p> <?php echo $row['dob'] ?> </p><br>
                   <h4>Telephone</h4>
                  <p> <?php echo $row['phone'] ?> </p><br>
                   <h4>Email</h4>
                  <p> <?php echo $row['email'] ?> </p><br>
                   <h4>Address</h4>
                  <p><?php echo $row['address'] ?> </p>  <br>
                   <h4>Nationality</h4>
                  <p> <?php echo $row['country'] ?></p>  <br>
                   <h4>Role</h4>
                  <p> <?php echo $row['user_role'] ?> </p><br>
                 </p>
               </div>
         
     
      </div>
    </form>
    </div>
   <?php

    }
}
ob_flush();
include('../../config/footer.php');
?>

</body>
</html>  

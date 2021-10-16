<?php
ob_start();
// session_start();
include('../../config/security.php');
// include('../../config/topNav.php');
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
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  /* background-color: red; */
}
#nav-top {
  background-color:rgb(10, 10, 41);
  padding: 0.1em 0.5em;
  z-index: 2;
  position: sticky;
  top: 0;
}

ul {
  list-style: none;
}
a {
  text-decoration: none;
  color: white;
}
a:hover {
  /* background-color: blue; */
  /* color: white; */
  text-decoration: underline;
}
.menu li {
  font-size: 1em;
  padding: 0.5em 0.2em;
  display: block;
}
.logo a {
  font-size: 1.8em;
  font-weight: 600;
  color: orangered;
  text-decoration: none;
  font-weight: 500;
}
.button.secondary {
  border-bottom: 1px solid #444;
}

/* mobile menu  */
.menu {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}

.toggle {
  order: 1;
}
.item.button {
  order: 2;
}
.item.link {
  width: 100%;
  text-align: center;
  /* order: 3; */
  display: none;
}
.item.show {
  order: 3;
}
.item.active {
  display: block;
}

.toggle {
  cursor: pointer;
}
.bars {
  background-color: orangered;
  display: inline-block;
  height: 2px;
  position: relative;
  width: 18px;
}
.bars::before,
.bars::after {
  background-color: orangered;
  display: inline-block;
  content: "";
  height: 2px;
  position: absolute;
  width: 18px;
}
.bars::before {
  top: 5px;
}
.bars::after {
  top: -5px;
}

/* for tablet menu  */

@media all and (min-width: 468px) {
  .menu {
    justify-content: center;
  }
  .logo {
    flex: 1;
  }
  .item.button {
    display: block;
    order: 1;
    width: auto;
  }
  .toggle {
    order: 2;
  }
  .button.secondary {
    border: none;
  }
  .button.col a {
    padding: 0.3em 0.58em;
    background-color: teal;
    border: 1px solid #006d6d;
    border-radius: 50em;
  }
  .button.secondary {
    background: transparent;
    padding: 0.3em 0.4em;
    border-radius: 50em;
  }
  .button a:hover {
    transition: all 0.25s;
    text-decoration: none;
  }
  .button:not(.secondary) a:hover {
    background-color: orangered;
    border-color: #005959;
    padding: 0.3em 0.58em;
  }
  .button.secondary :hover {
    border: 2px solid #005959;
    color: white;
    padding: 0.3em 0.52em;
    border-radius: 50em;
  }

  /* for desktop  */
  @media all and (min-width: 768px) {
    .item.show {
      display: block;
      width: auto;
      order: 1;
    }
    .toggle.show {
      display: none;
    }
    .logo {
      order: 0;
    }
    .item {
      order: 1;
    }
    .button {
      order: 2;
    }
    .menu li {
      padding: 0.8em 0.5em;
    }
    .menu li.button {
      padding-right: 0;
    }
  }
}

.form-content {
  width: 60%;
  margin: auto;
  /* border: 1px solid grey; */
  padding: 0.7em 2em;
  border-radius: 10px;
 
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
  border: none;
  outline: none;
  font-size: 1.2em;
  color: blue;
  border-bottom: 1px solid grey;
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
.btn1 {
  padding: 0.5em 1.5em;
  background-color: transparent;
  color: white;
  border: 1px solid teal;
  outline: none;
  margin: 1em 0.5em;
  border-radius: 5px;
}
.btn1:hover{
 background: orangered;
 border:none;
}
.btn{
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
.profile{
  display:grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  grid-gap: 1em;
  width: 80%;
  margin: auto;
}
    </style>
</head>
<body>

<nav id="nav-top">
                <ul class="menu" id="menu">
                <li class="logo"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Christ Ministry</a></li>
                <li style="color: white;"><?php echo "<h4 style='color:orangered;'>Loged in as </h4>". $_SESSION['username'];?></li>
                <li id="item" class="item link show"><a href="index.php">Home</a></li>
                <li id="item" class="item link show"><a href="about.php">About</a></li>
                <li id="item" class="item link show"><a href="#">Sermons</a></li>
                <!-- <li id="item" class="item link show"><a href="#">Ministries</a></li> -->
                <li id="item" class="item link show"><a href="gallery.php">Gallery</a></li>
                <li id="item" class="item link show"><a href="userProfile.php">profile</a></li>
                <!-- <li id="item" class="item link  button secondary trans"><a href="#">Sign Up</a></li> -->
                <form action="../../config/logout.php" method="post">
                <li id="item" class="item link button col"><button onClick="javascript: return confirm('You want to leave this page')" class="btn1" name="logout_user"> Logout</button></li>
                </form>
                <!-- <li id="item" class="item link button col"><a href="">logout</a></li> -->
                <li id="toggle" class="toggle show"><span class="bars"></span></li>
            </ul>
            </nav>


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
       $_SESSION['success'] = "Your profile has been updated";
      header("Location: profile.php");
   }
   else{
     $_SESSION['success'] = "Your profile not been updated";
     header("Location: profile.php");
   }
}
?>
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

<div class="profile">
        <div class="photo">
        <form style="margin-top: 1em;" method="POST" action="" class="hidden form-content">
        
           <input type="hidden" name='id_edit' value="<?php echo $row['member_id'] ?>">
              <?php
                 echo '<img style="border-radius: 1px; border: 1px solid teal;" src="../phpFolder/images/'.$row['photo'].'"  width="260;" height="190;" alt=""> <br>'
              ?> <br>
              Profile Photo <br>
        <input type="file" value="<?php echo $row['photo'] ?>" name="photo_edit"> <br>
           
          First Name <br>
          <input type="text" name="fname_edit" placeholder="first name" value="<?php echo $row['fname'] ?>" id="inst-name" required> <br>
          
          Last Name<br>
          <input type="text" name="lname_edit" placeholder="Last name" value="<?php echo $row['lname'] ?>" id="inst-add" required> <br>
         
          Gender <br>
            <input type='radio' name='gender_edit' value='Male' checked> Male
           <input type='radio' name='gender_edit' value='Female'> Female <br>
        </div>

        
        <div class="content">

        
        Date of Birth <br>
            <input type="date" name="dob_edit" value="<?php echo $row['dob'] ?>" placeholder="Select date of birth" required>  <br>
                  
                  Telephone <br>
                  <input type="tel" name="tel_edit" value="<?php echo $row['phone'] ?>" placeholder="Telephone" required> <br>
                  
                  Email <br>
                  <input type="email" name="email_edit" value="<?php echo $row['email'] ?>" placeholder="Email" required> <br>
                  
                 Address<br>
                 <input type="text" name="address_edit" value="<?php echo $row['address'] ?>" placeholder="your home address" id="inst-name" required> <br>
                

            
             
            Nationality <br>
             <input list="country" name="country_edit" value="<?php echo $row['country'] ?>" placeholder="Select country" required>  <br>
              
                
        Password <br>
        <input type="password" name="password_edit" value="<?php echo $row['password'] ?>" id="password" placeholder = "Enter a strong password" required> <br>
      
        
        
        
             <button id="close-btn" class="btn"  name="close"><a href="index.php">Cancel</a></button>
               <button id="save-btn" class="btn" name="update">Save Changes</button>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
      </form>
      </div>
      </div>

      <div class="message">
      <?php
                   if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
                      echo "<h3 class='success'>" .$_SESSION['success'] . "</h3>";
                      unset($_SESSION['success']);
                   }
                   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<h3 class='error'>" .$_SESSION['staus'] . "</h3>";
                    unset($_SESSION['status']);
                 }
          ?>
      </div>

   <?php

    }
}
ob_flush();
include('../../config/footer.php');
?>

</body>
</html>  
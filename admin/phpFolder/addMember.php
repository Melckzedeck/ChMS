<?php
ob_start();
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
  display: none;
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
  overflow-x : auto;
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
th{
  /* background: rgb(3, 3, 49); */
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
}
.new{
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
  grid-gap: 1em;
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
      $photErr = "Error profile Photo is required";
    }
    else{
      $photo = $_FILES['photo']['name'];
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
<p style="text-align: left;"><b>Manage: Member Information</b></p>

           
      <form method="POST" action="" class="hidden form-content" enctype="multipart/form-data">
        
      <p class="branch">Add Member</p> <br>
       <h5>All * inputs are required</h5> <br>
        First Name <br>
        <input type="text" name="fname" placeholder="first name" id="inst-name" required> *<br>
        <span class="Err"><?php echo $fnameErr ?></span><br>
        Last Name<br>
        <input type="text" name="lname" placeholder="Last name" id="inst-add" required> *<br>
        <span class="Err"><?php echo $lnameErr ?></span><br>
        Gender <br>
        <input type="radio" name="gender" value="Male" > Male 
        <input type="radio" name="gender" value="Female"> Female *<br>
        <span class="Err"><?php echo $genderErr ?></span><br>
        Date of Birth <br>
            <input type="date" name="dob" placeholder="Select date of birth" required> * <br>
                  <span class="Err"><?php echo $dobErr ?></span> <br>
                  Telephone <br>
                  <input type="tel" name="tel" placeholder="Telephone" required> <br>
                  <span class="Err"><?php echo $phoneErr ?></span><br>
                  Email <br>
                  <input type="email" name="email" placeholder="Email" required> *<br>
                  <span class="Err"><?php echo $emailErr ?></span><br>
                 Address<br>
                 <input type="text" name="address" placeholder="your home address" id="inst-name" required> *<br>
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
             </datalist> *<br>
             <span class="Err"><?php echo $branchNameErr ?></span><br>
            Nationality <br>
             <input list="country" name="country" placeholder="Select country" required>
                      <datalist id="country">
                      <option value="Australia"></option>
                      <option value="Albania"></option>
        <option value="America"></option>
       <option value="Brazil"></option>
        <option value="Denmark"></option>
        <option value="China"></option>
        <option value="England"></option>
        <option value="Italy"></option>
        <option value="Tanzania"></option>
         <option value="Kenya"></option>
         <option value="Uganda"></option>
         <option value="Rwanda"></option>
         <option value="Burundi"></option>
        <option value="Egypt"></option>
         <option value="Nigeria"></option>
         <option value="Algeria"></option>
         <option value="Ivory Coast"></option>
         <option value="Turkey"></option>
        <option value="Lesotho"></option>
        <option value="Germany"></option>
                  </datalist> * <br>
                      <span class="Err"><?php echo $nationalityErr ?></span><br>

                      User Role <br>
                      <input list="role"  name="role" placeholder="select user role" required>
                      <datalist id="role">
                        <option value="admin"></option>
                        <option value="user"></option>
                </datalist> <br>
                <span class="Err"><?php echo $userRoleErr ?></span><br>
        Password <br>
        <input type="password" name="password" id="password" placeholder = "Enter a strong password" required> <br>
        <span class="Err"><?php echo $passwordErr ?></span><br>
        
        Profile Photo <br>
        <input type="file" name="photo"> <br>
        <span class="Err"><?php echo $photErr ?></span><br>
       
         <button id="close-btn" class="btn"  name="close">Close</button>
               <button id="save-btn" class="btn" name="save">Save Data</button>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
      </form>
    
           <?php
                    //  if(isset($_POST['save'])){
                    //   $select_id_query = "SELECT branches.branch_id, branches.branch_name FROM branches 
                    //   LEFT JOIN members ON branches.branch_id = members.branch_id WHERE branch_name = '$branchName'";
                       
                    //   $branch_details = mysqli_query($conn, $select_id_query);
                    //   if(mysqli_num_rows($branch_details) > 0){
                    //      while($row = mysqli_fetch_assoc($branch_details)){
                    //        $branch_id = $row['branch_id'];
                    //        die($branch_id);
                    //      }
                    //   }
                    //   else{
                    //     die("Data fetch failed");
                    //   }
 
                    //  }
                   
           ?>
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
        <button id="add-data-btn" class="btn"  style="float: right; margin-bottom:1em ;" ><b><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Data</b></button> <br><br><br>
        <!-- <p><b>Users Information</b> <button onClick ="window.print()"  class="btn"  name="print">GENERATE REPORT</button></p> -->
        <button onClick ="window.print()"  class="btn"  style=" margin-bottom:1em ;" ><b><i class="fa fa-print" aria-hidden="true"></i> GENERATE REPORT</b></button> <br>
        <div class="print-container">

        
        <table style="overflow-x : auto;">
            <tr>
                 <th>ID</th>
                 <th>Name</th>
                 <th>Gender</th>
                 <th>Email</th>
                 <th>Address</th>
                 <th>Phone</th>
                 <th>User Type</th>
                <th>DOB</th>
                <th>Nationality</th>
                <th></th>
                <th></th>
                <!-- <th>Action</th> -->
            </tr>
          <tbody id="list">
            <tr>
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
 
                     
                  
                    // ============== INSERTING DATA TO THE DATABASE ===== 
                    if(file_exists("upload/" .$_FILES['photo']['name'])){
                      $store = $_FILES['photo']['name'];
                      $_SESSION['status'] = "Image already exists ' .$store. '";
                      // header('Location: register.php');
                    }
                    else{
                      $select_email_query = "SELECT email FROM members WHERE email = '$email'";
                      $output = mysqli_query($conn, $select_email_query);
                       if(mysqli_num_rows($output) > 0){
                           while($row = mysqli_fetch_assoc($output)){
                              
                                $_SESSION['status'] = "username or email already exists";
                                header('Location: addMember.php');
                       }
                      }
                      else if(isset($_POST['save'])){
                   $insert_query = "INSERT INTO members(fname, lname, gender, dob, phone, email, address,user_role, password, country,photo, branch_id) VALUES ('$fname', '$lname', '$gender', '$dob', '$phone', '$email','$address', '$userRole', '$password','$nationality','$photo','$branch_id')";

                     $results = mysqli_query($conn, $insert_query);
                    if($results == TRUE){
                      move_uploaded_file($_FILES['photo']['tmp_name'], "upload/".$_FILES['photo']['name']);
                       $_SESSION['success'] = "New member succesfull added";
                       header('Location: addMember.php');
                    }
                    else{
                      
                      $_SESSION['status'] = "New member not added";
                      header('Location: addMember.php');
                    }
                  }
                }
                  }
                  else{
                    // echo "fill all the inputs";
                  }
                }
                    ?>

                        
                 

                    
                <?php
                    //  DISPLAYING DATA FROM THE DATABASE 
                    $fetch_query = "SELECT * FROM members";
                    $members_details = mysqli_query($conn, $fetch_query);
                    if(mysqli_num_rows($members_details) > 0){
                      while($row = mysqli_fetch_assoc($members_details)){
                        ?>
                        <tr>
                        <td><?php echo $row['member_id'] ?></td>
                        <td> <?php echo $row['fname'] . " " .$row['lname']?> </td>
                        <td> <?php echo $row['gender'] ?> </td>
                        <td> <?php echo $row['email'] ?> </td>
                        <td> <?php echo $row['address'] ?> </td>
                        <td> <?php echo $row['phone'] ?> </td>
                        <td> <?php echo $row['user_role'] ?> </td>
                        <td> <?php echo $row['dob'] ?> </td>
                        <td> <?php echo $row['country'] ?> </td>
                        <td>
                           <form action="addMemberEdit.php" method="post">
                             <input type="hidden" name="edit_id" value="<?php echo $row['member_id'] ?>">
                         <button id='inner-btn' name='edit'> Edit</button>
                        </form>
                      </td>
                      <td>
                        <form action="addMemberEdit.php" method="post">
                          <input type="hidden" name="delete_id" value="<?php echo $row['member_id'];?>">
                        <button id='inner-btn' name='delete' onClick='javascript: return confirm("Are you sure you want to delete this record");'><i class='fa fa-trash' aria-hidden='true'></i></button>
                        </form>
                      </td>
                         </tr>
                <?php
                      }
                    }  
                    ob_flush();   
                ?>
          </tbody>
        </table>
        </div>
       
    </div>
    
</div>
<script>
 const open = document.getElementById('add-data-btn');
const close = document.getElementById('close-btn');
var save = document.getElementById('save-btn');
let form = document.querySelector('.form-content');

open.addEventListener('click', () => {
    form.classList.remove('hidden');
})

close.addEventListener('click', (e) => {
    form.classList.add('hidden');
    e.preventDefault();
})


// // ================ FETCHING  INPUT DATA =================
// // =======================================================
// let fname = document.getElementById('fName');
// let lname = document.getElementById('lName');
// let dob = document.getElementById('dob');
// let phone = document.getElementById('phone');
// let email = document.getElementById('email');
// let address = document.getElementById('address');
// let city = document.getElementById('city');
// let country = document.getElementById('country');
// let dept = document.getElementById('department');

// const saveData = (e) => {
// //     //  =========== THIS FUNCTION MAKE THE ALERT TEXT DISSAPEAR AFTER 3 SECS =================
//     const clearAlert = () => {
//         const currentAlert = document.querySelector('.alert');
//         if(currentAlert){
//           currentAlert.remove();
//         }
//     }
    
//    if(fname.value != '' && lname.value != '' && phone.value != '' && dob.value != '' && dept.value != ''){
//        const div = document.createElement('div');
//        div.className = 'alert success';
//        const cont = document.querySelector('.table-container');
//        const head = document.querySelector('#table');
//        div.appendChild(document.createTextNode("Branch succesfull registered"));
//        cont.insertBefore(div,head);

//     //    CALLING THE DEFINED FUNCTIONS 
//        setTimeout( () => {
//         clearAlert();
//     }, 3000)
//     clearText();
//    }
   
//    else{
//     const div = document.createElement('div');
//     div.className = 'alert err';
//     const cont = document.querySelector('.table-container');
//     const head = document.querySelector('#table');
//     div.appendChild(document.createTextNode("Please fill in all fields are required!"));
     
//     cont.insertBefore(div,head);

//     setTimeout( () =>{
//        clearAlert();
//     },3000 ) 
       
//       }
//       clearText();
//    e.preventDefault();
//    form.classList.add('hidden');

   
  

</script>
</body>
</html>
<?php
include('../../config/footer.php');
?>
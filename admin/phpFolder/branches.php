<?php
ob_start();
 //session_start();
include('../../config/security.php');
include('../../config/admin.php');
  $branchName = $branchCode = $branchStatus= '';
  $branchNameErr = $branchCodeErr = $branchStatusErr= '';

  include('../../config/header.php');
  require_once('../../config/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branches</title>
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
  padding: 1em 2em;
  border-radius: 10px;
  /* position: absolute;
  left: 60%;
  top : 50%;
  transform : translate(-50%, -50%); */
  background: white;
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
  if(isset($_POST["save"])){
    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    // echo "melckzedeck";
    if(empty($_POST["branchName"])){
      $branchNameErr = "Error branch name is required";
    }
    else{
      $branchName = validate($_POST["branchName"]);
    //  $deptName = $_POST["deptName"];
    //  //  echo $branchName;
    }
    if(empty($_POST["branchCode"])){
      $branchCodeErr = "Error branch code is required";
     }
     else{
      $branchCode  = validate( $_POST["branchCode"]);
      //  $deptHead = $_POST["deptHead"];
       // echo $branchCode;
    }
    if(empty($_POST["branchStatus"])){
      $branchStatusErr = "Error branch status is required";
    }
    else{
      $branchStatus = validate($_POST["branchStatus"]);
    //  $deptStatus = $_POST["deptStatus"];
     //  echo $branchStatus;
    }
  }
}
?>

    <!-- <div class="form-container">
        <p class="top"><span><b>Manage:</b></span> Department Information</p>
        <div id="info">
            <h4>Branch</h4>  -->
              <!-- <p class="home">Moshono</p>  -->
          <!-- <form action=""> -->
            <!-- <input list="branch" name="branch">
            <datalist id="branch">
                <option value="Morombo"></option>
                <option value="Dampo"></option>
                <option value="Sakina"></option>
                <option value="Kijenge"></option>
                <option value="Moshono"></option>
                <option value="Ungalimited"></option>
                <option value="Sanawali"></option>
                <option value="Uzunguni"></option>
                <option value="Samunge"></option>
            </datalist>
         </form>
    </div>  
         -->

    <div class="form-container">
    <p><b>Manage: </b> Branches Information</p>
          
      <form method="POST" action="" class="hidden form-content">
      <p class="branch">Add Branch</p> <br>
        Branch Name <br>
        <input type="text" name="branchName" placeholder="Branch Name" id="inst-name"> <br>
        <span class="Err"><?php echo $branchNameErr ?></span><br>
        Branch Code <br>
        <input type="text" name="branchCode" placeholder="Branch Code" id="inst-add"> <br>
        <span class="Err"><?php echo $branchCodeErr ?></span><br>
         Status <br>
         <input list="branchStatus" name="branchStatus" placeholder="Select Branch Status" id="inst-status"> 
         <datalist id="branchStatus">
           <option style="background:green; color:white;" value="Active"></option>
           <option style="background:red; color:white; value="Inactive"></option>
         </datalist> <br>
          <br>
         <span class="Err"><?php echo $branchStatusErr ?></span><br>
       
         <button id="close-btn" class="btn"  name="close">Close</button>
               <button id="save-btn" class="btn" name="save">Save Data</button>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
      </form>
    
            
      <?php
                   if(isset($_SESSION['success']) && $_SESSION['success'] != ''){
                      echo "<div class='success'>" .$_SESSION['success'] . "</div>";
                      unset($_SESSION['success']);
                   }
                   if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<div class='error'>" .$_SESSION['staus'] . "</div>";
                    unset($_SESSION['status']);
                 }
          ?>


    <div class="table-container">
        <button id="add-data-btn" class="btn"  style="float: right; margin-bottom:1em ;" ><b><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Data</b></button> <br><br><br>
        <button onClick ="window.print()"  class="btn"  style=" margin-bottom:1em ;" ><b><i class="fa fa-print" aria-hidden="true"></i> GENERATE REPORT</b></button> <br>
        <!-- <p><b>Branch Information</b></p> -->
        <div class="print-container">

       
        <table>
            <tr>
                 <th>ID</th>
                <th>Branch Name</th>
                <th>Branch Code</th>
                <th>Status</th>
                <th></th>
                <th></th>
                <!-- <th>Action</th> -->
            </tr>
          <tbody id="list">
            <tr>
          <?php
                  if(!empty($branchName) && !empty($branchCode) && !empty($branchStatus)){
                     
                    $insert_query = "INSERT INTO branches (branch_name, branch_code, status) values ( '$branchName', '$branchCode', '$branchStatus')";

                    $result = mysqli_query($conn, $insert_query);

                    if($result == TRUE){
                    
                      $_SESSION['success'] = "New branch successful added";
                      header('Location: branches.php');
                    }
                    else{
                      $_SESSION['status'] = "Failed to add new branch";
                      header('Location: branches.php');
                    }
                   
                  }
                  // else{
                  //   echo "<script> alert('All the inputs are required! please try again')</script>";
                  // }
                    ?>

                  <!-- ============= FETCHING DATA FROM THE DATABASE ===========  -->
                    <?php
                      $fetch_query = "SELECT * FROM branches";
                            
                      $data = mysqli_query($conn, $fetch_query);
                      if(mysqli_num_rows($data) > 0){

                        while($row = mysqli_fetch_assoc($data)){
                        
                             ?>
                                <tr>
                                  <td> <?php echo $row['branch_id']; ?></td>
                                  <td> <?php echo  $row['branch_name'];?></td>
                                  <td> <?php echo  $row['branch_code'];?></td>
                                  <td> <?php echo $row['status'];?></td>
                                  <td>
                                    <form action="branchesEdit.php" method="post">
                                      <input type="hidden" name="branches_edit" value="<?php echo $row['branch_id']; ?> ">
                                  <button id='inner-btn' name='edit'> Edit</button>
                                  </form>
                                  </td>
                                  <td>
                                    <form action="branchesEdit.php" method="post">
                                      <input type="hidden" name="delete_id" value="<?php echo $row['branch_id'];?> ">
                                 <button id='inner-btn' name='delete' onClick='javascript:return confirm("are you sure you want to delete");'> <i class='fa fa-trash' aria-hidden='true'></i></button> </form>
                                 </td>
                                </tr>
                             <?php
                           
                        }
                      }
                   ?>

          </tbody>
        </table>
        </div>
    </div>
    
</div>

<script>
 const open = document.getElementById('add-data-btn');
const close = document.getElementById('close-btn');
let save = document.getElementById('save-btn');
let form = document.querySelector('.form-content');

open.addEventListener('click', () => {
    form.classList.remove('hidden');
})

close.addEventListener('click', () => {
    console.log('close button clicked');
})
</script>
</body>
</html>
<?php
 ob_flush();
include('../../config/footer.php');
?>
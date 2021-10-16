<?php
ob_start();
include('../../config/security.php');
include('../../config/admin.php');
$branchName = $date = $male = $female = $kids =  '';

$branchNameErr = $dateErr = $femaleErr = $maleErr = $kidsErr =''; 
include('../../config/header.php');
require_once('../../config/connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Take Attendance</title>
</head>
<body>

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
  width: 50%;
  margin: auto;
  border: 1px solid grey;
  padding: 1em 2em;
  border-radius: 10px;
  /* position: absolute; */
  background: white;
  left: 50%;
  top : 55%;
  /* transform : translate(-50%, -50%); */
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
  text-align: center;
  padding: 0.3em;
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

              if(empty($_POST["branchName"])){
                $branchNameErr = "Error branch name is required";
              }
              else{
                $branchName = validate($_POST["branchName"]);
              }
              if(empty($_POST["date"])){
                $dateErr = "Error date is required";
               }
               else{
                $date  = validate( $_POST["date"]);
              }
               if(empty($_POST["male"])){
                   $maleErr = "Error number of male present is required";
               }
               else{
                   $male = validate($_POST["male"]);
               }
               if(empty($_POST["female"])){
                 $femaleErr = "Error number of female present is required";
               }
               else{
                 $female = validate($_POST["female"]);
               }
               if(empty($_POST["kids"])){
                 $kidsErr = "Error number of kids present is required";
               }
               $kids = validate($_POST["kids"]);
            

            }
          }
      ?>


<div class="form-container">
    <p><b>Manage: </b> Attendance Information</p>
          
      <form method="POST" action="" class="hidden form-content">
          <h5>    All inputs with * are required    </h5> <br>
        Branch Name <br>
        <input list="branchName" name="branchName" placeholder=" Select branch Name" id="inst-name">
          <datalist id="branchName">

<?php
                          $option_query  = "SELECT branch_name,branch_id FROM branches";
                          $branch_Name = mysqli_query($conn, $option_query);
                          if(mysqli_num_rows($branch_Name) > 0){
                            while($row = mysqli_fetch_assoc($branch_Name)){
                              $branch_name = $row['branch_name'];
                              $branch_id = $_row['branch_id'];
                               echo "<option value='$branch_name'></option>";
                            }
                          }
                            else{
                              echo ("fetch failed");
                            }
                          
                        ?>
                          
        </datalist>
        *<br>
        <span class="Err"><?php echo $branchNameErr ?></span><br>
        Date <br>
        <input type="date" name="date" required>  * <br>
        <span class="Err"><?php echo $dateErr ?></span><br>
        Male <br>
        <input type="number" name="male" placeholder="Number of male present" required> * <br>
        <span class="Err"><?php echo $maleErr ?></span><br>
        Female <br>
        <input type="number" name="female" placeholder="Number of female present" required> * <br>
        <span class="Err"><?php echo $femaleErr ?></span><br>
        Children <br>
        <input type="number" name="kids" placeholder="number of children present" required> * <br>
        <span class="Err"><?php echo $kidsErr ?></span><br>
         <!-- Date <br>
         <input type="text" > -->
         
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

        <!-- <p id="table"><b>Branches Information</b></p> -->
        <button onClick ="window.print()"  class="btn"  style=" margin-bottom:1em ;" ><b><i class="fa fa-print" aria-hidden="true"></i> GENERATE REPORT</b></button> <br>
        <div class="print-container">
        <table>
          
          <tr>
          <th>ID</th>
          <th>Male</th>
          <th>Female</th>
          <th>Kids</th>
          <th>Total</th>
          <th>Date</th>
          <th></th>
          <th></th>
          <!-- <th>Telephone</th>
          <th>Location</th>  -->
          <!-- <th>Location</th> -->
          <!-- $instName = $instAdd = $instPhone = $instEmail = $instLoc = ''; -->
        </tr>
               

        <!-- ============== QUERY TO FETCH DATA FROM TABLE BRANCHES ===========  -->
       
        <tbody id="list">
            <?php

if(!empty($branchName) && !empty($date)  && !empty($female) && !empty($male) && !empty($kids)){
  if(isset($_POST['save'])){
    $branch_id_query = "SELECT branches.branch_id, branches.branch_name,branches.branch_code FROM branches LEFT JOIN attendance ON branches.branch_id = attendance.branch_id  WHERE branch_name= '$branchName'";
  $output = mysqli_query($conn,$branch_id_query);
    if(mysqli_num_rows($output)>0){
  
           while($row = mysqli_fetch_assoc($output)){
            $branch_id = $row['branch_id'];
            // echo $branch_id;
           }
    }
    else{
      die("fetching data from table branches failed");
    }
  }
  $total = ($male + $female + $kids);
  echo $total . "<br>";

                      //  QUERY TO INSERT ATTENDANCE DATA TO THE DATABASE 
                      $insert_query = "INSERT INTO attendance (male_number, female_number, kids_number, total_number, branch_id) 
                             values('$male', '$female','$kids', '$total','$branch_id')";

                             $result = mysqli_query($conn, $insert_query);
                             if($result == TRUE){
                              // echo "<script>alert('New Institution has been submitted succesfull')</script>";
                              $_SESSION['success'] = "New attendance record has been added";
                              header('Location:  takeAttendance.php');
                          }
                          else{
                            $_SESSION['status'] = "Filed to add new attendance record";
                              header('Location: takeAttendance.php');
                          }
                          }
                             ?>
                           
                   
                    <h4><?php echo $branchName  ?></h4>
                    <h4><?php echo date("Y/M/D");?></h4>
                    <?php
                    $fetch = "SELECT * FROM attendance";
                    $result = mysqli_query($conn,$fetch);
                    if(mysqli_num_rows($result) > 0 ){

                      while($row=mysqli_fetch_array($result)){
                           
                              ?>
                               <tr>
                                 <td><?php echo $row['attendance_id'];?> </td>
                                 <td><?php echo $row['male_number'];?> </td>
                                 <td><?php echo $row['female_number'];?> </td>
                                 <td><?php echo $row['kids_number'];?> </td>
                                 <td><?php echo $row['total_number'];?> </td>
                                 <td><?php echo $row['date_created'];?> </td>
                                 <td>
                                   <form action="takeAttendanceEdit.php" method="post">
                                     <input type="hidden" name="edit_id" value="<?php echo $row['attendance_id'];?>">
                           <button id='inner-btn' name='edit'> Edit</button>
                           </form>
                                   </td>
                                   <td>
                                     <form action="takeAttendanceEdit.php" method="post">
                                       <input type="hidden" name="delete_id" value="<?php echo $row['attendance_id']; ?>">
                           <button onClick="javascript: return confirm('Are you sure you want to delete this record');" id='inner-btn' name='delete'><i class='fa fa-trash' aria-hidden='true'></i></button>
                           </form>
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
   


<!-- </div> -->
<script>
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


</script>
</body>
</html>
<?php
ob_flush();
 include('../../config/footer.php');
?>
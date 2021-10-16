<?php
include('../../config/security.php');
$branchName = $branchCode = $attendance = $date =  '';

$branchNameErr = $branchCodeErr = $attendanceErr = $dateErr =''; 
include('../../config/header.php');
require_once('../../config/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance Repoet</title>
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
  width: 60%;
  margin: auto;
  border: 1px solid grey;
  padding: 1em 2em;
  border-radius: 10px;
  position: absolute;
  background: white;
  left: 60%;
  top : 40%;
  transform : translate(-50%, -50%);
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
              if(empty($_POST["branchCode"])){
                $branchCodeErr = "Error branch code is required";
               }
               else{
                $branchCode  = validate( $_POST["branchCode"]);
              }
               if(empty($_POST["attendance"])){
                   $attendanceErr = "Error attendance type is required";
               }
               else{
                   $attendance = validate($_POST["attendance"]);
               }
               if(empty($_POST["date"])){
                $dateErr = "Date is required";
              }
              else{
                $date = validate($_POST["date"]);
              }
            

            }
          }
      ?>


<div class="form-container">
    <p><b>Manage: </b> Attendance Information</p>
          
      <form method="POST" action="" class="hidden form-content">
      <p class="branch">Attendance Report</p> <br>
       
        Branch Name <br>
        <input type="text" name="branchName" placeholder="Branch Name" id="inst-name"> *<br>
        <span class="Err"><?php echo $branchNameErr ?></span><br>
        Branch Code <br>
        <input type="text" name="branchCode" placeholder="Branch code"> * <br>
        <span class="Err"><?php echo $branchCodeErr ?></span><br>
        Date <br>
        <input type="date" name="date" placeholder="select date"> *<br>
        <span class="Err"><?php echo $dateErr ?></span><br>
         
         <button id="close-btn" class="btn"  name="close">Close</button>
               <button id="save-btn" class="btn" name="save">Submit</button>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
      </form>
    


<div class="table-container">
        <button id="add-data-btn" class="btn"  style="float: right; margin-bottom:1em ;" ><b><i class="fa fa-plus-circle" aria-hidden="true"></i>Generate Report</b></button> <br><br><br>
      

        <p id="table"><b>Branch Name: <?php echo $branchName  ?></b></p>
        <table>
          
          <tr>
           <th>Day</th>
           <th>Men</th>
           <th>Women</th>
           <th>Kids</th>
           <th>Total</th>
          
        </tr>
        <tbody id="list">
        <?php
           if(!empty($branchName) && !empty($branchCode) && !empty($date)){

                 ?>
                      <tr>
                        <td><?php  echo $date ?> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                 <?php
                  }
                  ?>
          </tbody>
          <?php
                    $fetch = "SELECT * FROM attendance";
                    $result = mysqli_query($conn,$fetch);
                    if(mysqli_num_rows($result) > 0 ){

                      while($row=mysqli_fetch_array($result)){
                             $id = $row['attendance_id'];
                             $male = $row['male_number'];
                             $female = $row['female_number'];
                             $kids = $row['kids_number'];
                            $branch = $row['branch_id'];
                            $total = $row['total_number'];
                             $cdate = $row['date_created'];
                        echo "<tr>";

                        echo "<td>$cdate</td>";
                        echo "<td> $male</td>";
                        echo "<td>$female </td>";
                        echo "<td>$kids </td>";
                        // echo "<td>$branchName</td>";
                        echo "<td>$total </td>";
                        echo "</td>";

                    }
                  }
                    ?>
        </table>
    </div>
    <footer>
          <div class="bottom-footer">
           &copy  <?php echo date("Y");?> Church Ministry  ||  All rights are reserved
          </div>
          </footer>


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
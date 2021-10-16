<?php
ob_start();
include('../../config/security.php');
include('../../config/admin.php');
include('../../config/header.php');
require_once('../../config/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Attendance</title>
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
         <!-- =================== DELETING RECORF FROM THE DATABASE ========================  -->
         <?php
             if(isset($_POST['delete'])){
               $delete_id = $_POST['delete_id'];
               $delete_query = "DELETE FROM attendance WHERE attendance_id = '$delete_id'";

               $output = mysqli_query($conn, $delete_query);
               if($output == TRUE){
                 $_SESSION['success'] = "Attendance record successful deleted";
                 header('Location: takeAttendance.php');
               }
               else{
                $_SESSION['status'] = "Failed to delete attendance record";
                header('Location: takeAttendance.php');
               }
             }
         ?>



 <!-- ==================== UPDATING DATA FROM THE DATABASE   ========================   -->
 <?php
 if(isset($_POST['update'])){
   $attendance_id = $_POST['id_edit'];
   $male_number = $_POST['male'];
   $female_number = $_POST['female'];
   $kids_number = $_POST['kids'];
   $total = $_POST['total'];
  
   $update_query = "UPDATE attendance SET male_number='$male_number', female_number='$female_number', kids_number='$kids_number', total_number ='$total' WHERE attendance_id = $attendance_id";

   $output = mysqli_query($conn, $update_query);
   if($output == TRUE){
     $_SESSION['success'] = "Attendance record successful updated";
     header('Location: takeAttendance.php');
   }
   else{
    $_SESSION['status'] = "Failed to update attendance record";
    header('Location: takeAttendance.php');
   }
 }

 ?>
<!-- ====================== FETCHING DATA TO BE UPDATED =========================  -->
<?php
if(isset($_POST['edit'])){

    $edit_id = $_POST['edit_id'];
    $select_query = "SELECT * FROM attendance WHERE attendance_id = '$edit_id'";
    $output = mysqli_query($conn, $select_query);
 foreach ($output as $row){
     ?>
 
 
<div class="form-container">
    <p><b>Edit Attendance Information </b> </p>
          
      <form method="POST" action="" class="hidden form-content">
          <h5>    All inputs with * are required    </h5> <br>
       
          <input type="hidden" name="id_edit" value = "<?php echo $row['attendance_id'] ;?>">
        Male <br>
        <input type="number" name="male"  value = "<?php echo $row['male_number'] ;?>" placeholder="Number of male present" required> * <br>
        
        Female <br>
        <input type="number" name="female" value = "<?php echo $row['female_number'] ;?>" placeholder="Number of female present" required> * <br>
       
        Children<br>
        <input type="number" name="kids" value = "<?php echo $row['kids_number'] ;?>" placeholder="number of children present" required> * <br>


        Total<br>
        <input type="number" name="total" value = "<?php echo $row['total_number'] ;?>" placeholder="number of children present" required> * <br>

        
    
         
         <button id="close-btn" class="btn"  name="close"><a href="takeAttendance.php">Cancel </a> </button>
               <button id="save-btn" class="btn" name="update">Update</button>
    
      </form>

<?php
 }

}

?>


</body>
</html>
<?php
ob_flush();
include('../../config/footer.php');
?>
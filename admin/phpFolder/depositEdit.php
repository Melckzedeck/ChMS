<?php
ob_start();
// session_start();
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
    <title>Depoist</title>
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
  width: 50%;
  margin: auto;
  border: 1px solid grey;
  padding: 1em 2em;
  border-radius: 10px;
  position: absolute;
  left: 55%;
  top : 55%;
  transform : translate(-50%, -50%);
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
tr:nth-child(even) {
  background-color: #dddddd;
}
.Err{
  color: red;
}
    </style>
    </head>
    <body>
  <?php
      if(isset($_POST['delete'])){
          $deposit_edit_id = $_POST['deposit_edit'];
         $delete_query = "DELETE FROM deposit WHERE deposit_id = '$deposit_edit_id'";
         $output = mysqli_query($conn, $delete_query);
         if($output == TRUE){
             echo " <script>
             confirm('Are sure you want to delete the record');
           </script>";
            $_SESSION['success'] = "Succesfully deleted";
           header("Location: deposit.php");
        }
        else{
          $_SESSION['success'] = "Failed to delete";
          header("Location: deposit.php");
        }
      }
  ?>
    <!-- ============= UPDATING DATA AND SEND THEM BACK TO THE DATABASE =============== 
====================================================================================== -->
<?php
if(isset($_POST['update'])){
    $deposit_id = $_POST['deposit_edit'];
    $deposit_acc = $_POST['account_edit'];
    $deposit_for = $_POST['depositFor_edit'];
    $deposit_amount = $_POST['depositAmount_edit'];

    $update_query = "UPDATE deposit SET deposit_account = '$deposit_acc', deposit_name='$deposit_for', deposit_amount='$deposit_amount' WHERE deposit_id = '$deposit_id'";
    $output = mysqli_query($conn, $update_query);
    if($output == TRUE){
        $_SESSION['success'] = "Succesfully updated";
       header("Location: deposit.php");
    }
    else{
      $_SESSION['success'] = "Failed to update";
      header("Location: deposit.php");
    }
    
}

?>
    
 <!-- ============== FETCHING DATA FROM THE DATABASE FOR EDITING PURPOSE   ============= 
=============================================================================================== -->
<?php
if(isset($_POST['edit'])){
    $deposit_id = $_POST['edit_id'];
      $select_query = "SELECT * FROM deposit WHERE deposit_id = '$deposit_id'";
      $result = mysqli_query($conn, $select_query);
       foreach($result as $row){
           ?>
         
         <div class="form-container">
    <p><b>Manage: </b> Payment Information</p>
          
      <form method="POST" action="" class="hidden form-content">
      <p class="branch">Create Payment</p> <br>
      <input type="hidden" name="deposit_edit" id="update" value="<?php echo $row['deposit_id'];?>">
        Deposit Account <br>
        <input list="account" name="account_edit" value="<?php echo $row['deposit_account']; ?>" placeholder="Select account to deposit" id="inst-name" required>
        <datalist id="account">
             <option value="Offering"></option>
             <option value="Thanksgiving"></option>
             <option value="Tenths"></option>
             <option value="Other"></option>
            </datalist> *<br>
        
        Deposit For <br>
        <input type="text" name="depositFor_edit" value="<?php echo $row['deposit_name']; ?>" placeholder="Deposit for" id="inst-add" required> *<br>
        
        Deposit Amount <br>
        <input type="number" name="depositAmount_edit" value="<?php echo $row['deposit_amount']; ?>" placeholder= "Amount deposited" required> * <br>
        
             <button id="close-btn" class="btn"  name="close"><a href="deposit.php">Cancel</button>
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
  
    
<?php
 ob_start();
//  session_start();
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
    <title>Expenses</title>
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
  top : 55%;
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
    </style>
</head>
<body>
<!-- ============= QUERY TO UPDATE DATA IN THE DATABASE ============================= 
============================================================================================ -->
<?php
  if(isset($_POST['delete'])){
      $expense_id_delete = $_POST['delete_id'];
      $delete_query = "DELETE FROM expenses WHERE expense_id = '$expense_id_delete'";
      $output = mysqli_query($conn , $delete_query);
      if($output == TRUE){
          $_SESSION['success'] = "Expense succesful deleted";
          header('Location: expenses.php');
      } 
      else{
          $_SESSION['status'] = "Failed to delete expense";
          header('Location: expenses.php');
      }
  }
?>


 <!-- ============= QUERY TO UPDATE DATA IN THE DATABASE ============================= 
============================================================================================ -->
<?php
if(isset($_POST['update'])){
    $expense_edit_id = $_POST['edit_id'];
    $expenseName = $_POST['expName'];
    $expenseAmout = $_POST['expAmount'];
    $expenseCost = $_POST['cost'];

    //  ============= QUERY TO UPDATE THE DATA  
    $update_query = "UPDATE expenses SET expense_name='$expenseName', item_amount= '$expenseAmout', total_cost= '$expenseCost' WHERE expense_id = '$expense_edit_id'";
    $output = mysqli_query($conn, $update_query);
    if($output == TRUE){
           $_SESSION['success'] = "Expense successful updated";
           header('Location: expenses.php');
    }
    else{
        $_SESSION['status'] = "Failed to update expense";
        header("Location: expenses.php");
    }
}
?>
 
 <!-- ============= SELECTING DATA FROM FOR EDITING PURPOSE ============================= 
============================================================================================ -->

<?php
 if(isset($_POST['edit'])){
     $expense_id= $_POST['expense_edit'];
     $select_query = "SELECT * FROM expenses WHERE expense_id = '$expense_id'";
     $results = mysqli_query($conn, $select_query);
     foreach( $results as $row){

         ?>

<div class="form-container">
    <p><b>Manage: </b> Expenses Information</p>
          
      <form method="POST" action="" class="hidden form-content">
      <p class="branch">Edit Expenses</p> <br>
            
       <input type="hidden" name="edit_id" value ="<?php echo $row['expense_id'];?>">
        Expense Name <br>
        <input type="text" name="expName" value="<?php echo $row['expense_name'] ?>" placeholder="Expense Name" id="inst-name" required> <br>
       
         Amount <br>
        <input type="number" name="expAmount" value="<?php echo $row['item_amount'] ?>"  placeholder="Item amount" id="inst-add" required> <br>
      
        Total Cost <br>
        <input type="number" name="cost" value="<?php echo $row['total_cost'] ?>"  placeholder="cost used per item" required> <br>
        
       
       
         <button id="close-btn" class="btn"  name="close"><a href="expenses.php">Cancel</a> </button>
               <form action="" method="post">
               <button id="save-btn" class="btn" name="update">Update</button>
               </form>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
      </form>

         <?php
     }
 }
?>

    
     
    
               
    </div>
    
</div>

</body>
</html>
<?php
ob_flush();
include('../../config/footer.php');
?>
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
 <!-- ==================== DELETING DATA FROM THE DATABASE ====================== ============== 
================================================================================================== -->
<?php
  if(isset($_POST['delete'])){
    $branch_id = $_POST['delete_id'];
    
    $delete_query = "DELETE FROM branches WHERE branch_id='$branch_id'";
    $output = mysqli_query($conn, $delete_query);
    if($output == TRUE){
      $_SESSION['success'] = "branch successfull deleted";
      header('Location: branches.php');
    }
    else{
      $_SESSION['status'] = "Failed to delete branch";
      header('Location: branches.php');
    }
  }
?>
<!-- ==================== UPDATING DATA FROM THE DATABASE ========= ============== 
================================================================================================== -->
<?php
 if(isset($_POST['update'])){
    $update_id = $_POST['update_id'];
    $branchName = $_POST['branchName'];
    $branchCode = $_POST['branchCode'];
    $branchStatus = $_POST['branchStatus'];
    

    $update_query = "UPDATE branches SET branch_name= '$branchName', branch_code = '$branchCode', status = '$branchStatus' WHERE branch_id = '$update_id'";

    $output = mysqli_query($conn, $update_query);
    if($output ==TRUE){
      $_SESSION['success'] = "Branch successful updated";
      header('Location: branches.php');
    }
    else{
      $_SESSION['status'] = "Failed to update branch";
      header('Location: branches.php');
    }
 }
?>


<!-- ==================== SELECTING DATA FROM THE DATABASE FRO EDITING PURPOSE ============== 
================================================================================================== -->
<?php
if(isset($_POST['edit'])){
    $branch_id = $_POST['branches_edit'];
    
    $select_query = "SELECT * FROM branches WHERE branch_id = '$branch_id'";
    $results = mysqli_query($conn, $select_query);
    foreach($results as  $row){
        ?>
    
    <div class="form-container">
    <p><b>Manage: </b> Branches Information</p>
          
      <form method="POST" action="" class="hidden form-content">
      <p class="branch">Edit Branch</p> <br>
         <input type="hidden" name="update_id" value= "<?php echo $row['branch_id']; ?> ">
        Branch Name <br>
        <input type="text" name="branchName" value="<?php echo  $row['branch_name'];  ?> " placeholder="Branch Name" id="inst-name" required> <br>
        
        Branch Code <br>
        <input type="text" name="branchCode" value="<?php echo  $row['branch_code']; ?> "  placeholder="Branch Code" id="inst-add" required> <br>
        
         Status <br> 
         <input type="text" name="branchStatus" value="<?php echo  $row['status'];?> " required>
       
         <button id="close-btn" class="btn"  name="close"> <a href="branches.php">Cancel</a> </button>
               <button id="save-btn" class="btn" name="update">Update</button>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
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
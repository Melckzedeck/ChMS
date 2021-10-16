<?php
ob_start();
// session_start();
include('../../config/security.php');
include('../../config/admin.php');
  $expName = $expAmount = $date= $item= $cost = $branchName = $user =  '';
  $expNameErr = $itemAmountErr = $dateErr= $itemErr = $costErr = $branchNameErr = $userErr ='';
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
tr:nth-child(even) {
  background-color: #dddddd;
}
th{
  background: teal;
  color: white;
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
    if(empty($_POST["expName"])){
      $expNameErr = "Error branch name is required";
    }
    else{
      $expName = validate($_POST["expName"]);
    //  $deptName = $_POST["deptName"];
    //  //  echo $branchName;
    }
    if(empty($_POST["expAmount"])){
      $itemAmountErr = "Error branch code is required";
     }
     else{
      $itemAmount  = validate( $_POST["expAmount"]);
      //  $deptHead = $_POST["deptHead"];
       // echo $branchCode;
    }
    if(empty($_POST["date"])){
      $dateErr = "Error branch status is required";
    }
    else{
      $date = validate($_POST["date"]);
    //  $deptStatus = $_POST["deptStatus"];
     //  echo $branchStatus;
    }
    if(empty($_POST["item"])){
        $itemErr = "Item is required";
    }
    else{
        $item = validate($_POST["item"]);
    }
    if(empty($_POST['cost'])){
      $costErr = "Error cost used is required";
    }
    else{
      $cost = validate($_POST['cost']);
    }
    if(empty($_POST["branch"])){
      $branchNameErr = "Error branch name is required";
    }
    else{
      $branchName = validate($_POST["branch"]);
    }
  }
}
?>


    <div class="form-container">
    <p><b>Manage: </b> Expenses Information</p>
          
      <form method="POST" action="" class="hidden form-content">
      <p class="branch">Manage Expenses</p> <br>
            
        Branch Name <br>
             <input list="branch" name="branch" placeholder="Select branch" required>
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
        Expense Name <br>
        <input type="text" name="expName" placeholder="Expense Name" id="inst-name" required> <br>
        <span class="Err"><?php echo $expNameErr ?></span><br>
         Amount <br>
        <input type="number" name="expAmount" placeholder="Item amount" id="inst-add" required> <br>
        <span class="Err"><?php echo $itemAmountErr ?></span><br>
        Item Cost <br>
        <input type="number" name="cost" placeholder="cost used per item" required> <br>
        <span class="Err"><?php echo $costErr ?></span><br>
        Date <br>
        <input type="date" name="date" placeholder="select deposit date" required> <br>
        <span class="Err"><?php echo $dateErr ?></span><br>
         <button id="close-btn" class="btn"  name="close">Close</button>
               <button id="save-btn" class="btn" name="save">Save Changes</button>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
      </form>
     
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
        <!-- <p><b>Branch Information</b></p> -->
        <button onClick ="window.print()"  class="btn"  style=" margin-bottom:1em ;" ><b><i class="fa fa-print" aria-hidden="true"></i> GENERATE REPORT</b></button> <br>

        <div class="print-container">
        <table>
            <tr>
                 <!-- <th>ID</th> -->
                 <th>ID</th>
                <th>Expense Name</th>
                <th>Amount</th>
                <th>Cost Used</th>
                <th>Date </th>
                <th></th>
                <th></th>
            </tr>
          <tbody id="list">
            <tr>
          <?php
                  if(!empty($expName) && !empty($itemAmount) && !empty($date) && !empty($cost) && !empty($branchName)){
                    // =========== fetching data from table branches 
                    if(isset($_POST['save'])){
                      $select_id_query = "SELECT branches.branch_id, branches.branch_name FROM branches 
                      LEFT JOIN expenses ON branches.branch_id = expenses.branch_id WHERE branch_name = '$branchName'";
                       
                      $branch_details = mysqli_query($conn, $select_id_query);
                      if(mysqli_num_rows($branch_details) > 0){
                         while($row = mysqli_fetch_assoc($branch_details)){
                           $branch_id = $row['branch_id'];
                          //  die($branch_id);
                         }
                      }
                      else{
                        die("Data fetch failed");
                      }
 
                     }             

                    //  ================ ISERTING DATA TO THE DATABASE  ============ 
                     $totalCost = ($itemAmount * $cost);

                       $insert_query = "INSERT INTO expenses (expense_name, item_amount,	total_cost,	branch_id)
                        VALUES ('$expName','$itemAmount', '$totalCost','$branch_id')";

                        $result = mysqli_query($conn, $insert_query);
                        if($result == TRUE){
                          $_SESSION['success'] = "New expense added succesfully";
                         header("Location: expenses.php");
                      }
                      else{
                        $_SESSION['success'] = "New expense failed to be added";
                        header("Location: expenses.php");
                      }
             

                  }
                    ?>
                  <!-- <td></td> -->
                  
                  
                </tr>

                <?php
                      
                      // ====== DISPLAYING DATA FROM THE DATABASE  ========= 
                      $fetch_query = "SELECT * FROM expenses";
                      $output = mysqli_query($conn, $fetch_query);
                      if(mysqli_num_rows($output) > 0){
                        $total_expenses = 0;
                        while($row = mysqli_fetch_assoc($output)){
                          $total_expenses += $row['total_cost'];
                          ?>
                              <tr>
                                <td> <?php echo $row['expense_id']; ?> </td>
                                <td> <?php echo $row['expense_name']; ?> </td>
                                <td> <?php echo $row['item_amount']; ?> </td>
                                <td> <?php echo $row['total_cost']; ?> </td>
                                <td> <?php echo $row['date_created']; ?> </td>
                                <td>
                                  <form action="expensesEdit.php" method="post">
                                    <input type="hidden" name="expense_edit" id="expense" value="<?php echo $row['expense_id'];?>">
                              <button id="inner-btn" name="edit"> Edit</button>
                              </form>
                              </td>
                              <td>
                                <form action="expensesEdit.php" method="post">
                                  <input type="hidden" name="delete_id" value="<?php echo $row['expense_id']; ?>">
                              <button id="inner-btn" name="delete" onClick='javascript: return confirm("Are you sure you want to delete this record?");'><i class="fa fa-trash" aria-hidden="true"></i></button>
                              </form>
                              </td>
                              </tr>
                          <?php
                        }
                        ?>
                         <tr>
                        <td></td>
                        <td>Total Expenses</td>
                        <td></td>
                        <td><?php echo $total_expenses; ?></td>
                        <td></td>
                        
                        <td></td>
                        <td></td>
                      </tr>
                      <?php
                        

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
   form.classList.add('hidden');
})
</script>
</body>
</html>
<?php
ob_flush();
 include('../../config/footer.php');
?>
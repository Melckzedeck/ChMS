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
  position: absolute;
  left: 55%;
  top : 50%;
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
.btn2 {
  padding: 0.5em 1.5em;
  background-color: rgb(10, 10, 41);
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
.cont{
  display: grid;
  grid-gap: 2em 1em;
  align-items: center;
  /* margin-left: 20%; */
  padding-left: 0.5em;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
}
.income{
padding: 2em;
font-size: 1.4em;
height: 200px;
color: white;
margin: 1em;
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




    <div class="form-container">
    <p><b>  Welcome to Admin pannel</b></p>
          
       <div class="print-container">
      <div class="cont">
        <div style="background: teal; border-radius: 8px;"; class="current income">
            <i class="fa fa-users" aria-hidden="true"></i> Registered Members 
            <?php
                  $select_query = "SELECT member_id FROM members ORDER BY member_id";
                  $result_member = mysqli_query($conn, $select_query);
                  $row = mysqli_num_rows($result_member);
                  echo         "<h3 style='text-align: center;'>".  $row."</h3>";
                  echo '<a href="addMember.php">   <button id="save-btn" class="btn" name="save">View Details</button> </a>';
            ?>
        </div>


        <div style="background: rgb(10, 10, 41); border-radius: 8px;" class="total income">
          Branches Registered   <br> <br>
          <?php
       $deposit_data = "SELECT * FROM branches ORDER BY branch_id";
        $result = mysqli_query($conn, $deposit_data);
        
        
            $row = mysqli_num_rows($result);
               echo "<h3 style='text-align: center;'>". $row. "</h3>";
               echo '<a href="branches.php">   <button id="save-btn" class="btn" name="save">View Details</button> </a>';

       ?>
          <!-- Total Expenses    <h4>600</h4> -->
        </div>



        <div style="background: orangered; border-radius: 8px;" class="total income">
          <!-- Total Payment  <h4>5600</h4> <br> -->
          Total Expenses    <br><br>
      
          <?php
               $expense_data = "SELECT total_cost FROM expenses ORDER BY total_cost";
                 $total_expense = 0;
               $result = mysqli_query($conn, $expense_data);
               if(mysqli_num_rows($result) > 0){
                 while($row = mysqli_fetch_assoc($result)){
                   $total_expense += $row['total_cost'];
                 }
               }
                $row = mysqli_num_rows($result);
                // echo "<h3>". $row. "</h3>";
                echo "<h3>". $total_expense. "</h3>";
                echo '<a href="expenses.php">   <button id="save-btn" class="btn2" name="save">View Details</button> </a>';
                
          ?>

        </div>

      
         <div style="background: rgb(10, 10, 41); border-radius: 8px;" class="total income">
          <?php
       $deposit_data = "SELECT * FROM deposit ORDER BY deposit_id";
       $total_deposit = 0;
        $result = mysqli_query($conn, $deposit_data);
        if(mysqli_num_rows ($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
             $total_deposit += $row['deposit_amount'];
          }
        }
            
        
            $row = mysqli_num_rows($result);
              //  echo "<h3>". $row. "</h3>";
              
              $current_balance = ($total_deposit - $total_expense);
              echo  " Balance <i>" .$current_balance ."</i><br>";

              echo " Deposited <i>". $total_deposit. "</i> <br>";
           echo '<a href="deposit.php">   <button id="save-btn" class="btn" name="save">View Details</button> </a>';

       ?>
</div>

        <div style="background: teal; border-radius: 8px;" class="total income">
          <!-- Total Payment  <h4>5600</h4> <br> -->
         Upcoming Events     <br><br>
      
            <h4>4 Events</h4>

        </div>
       

        
        <div style="background: orangered; border-radius: 8px;" class="total income">
          <!-- Total Payment  <h4>5600</h4> <br> -->

          Last Attendance     <br><br>
          <?php
              // FETCHING THE LAST ID FROM THE DATABASE 
              
          ?>
        <h4>Men  34</h4>  <h4>Women  42</h4>  <h4>Kids 23</h4>
          

        </div>
      </div>
      </div>
      <button onClick ="window.print()"  class="btn"  style=" margin-bottom:1em ;" ><b><i class="fa fa-print" aria-hidden="true"></i> GENERATE REPORT</b></button> <br>

          </tbody>
        </table>
    </div>
    
</div>
<!-- <script>
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
</script> -->
</body>
</html>
<?php
include('../../config/footer.php');
?>
<?php
ob_start();
// session_start();
include('../../config/security.php');
include('../../config/admin.php');
$instName = $instAdd = $instPhone = $instEmail = $instLoc = '';
$instNameErr = $instAddErr = $instEmailErr = $instPhoneErr = $instLocErr = ''; 
include('../../config/header.php');
require_once('../../config/connection.php');
// include('institutionEdit.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>institution</title>
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
  width: 55%;
  margin: auto;
  border: 1px solid grey;
  padding: 1em 2em;
  border-radius: 10px;
  position: absolute;
  left: 55%;
  top : 55%;
  transform : translate(-50%, -50%);
  /* background-image: url(../../images/church5.jpg); */
  background: white;
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
  background:teal;
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

              if(empty($_POST["instName"])){
                 $instNameErr = "institution name is required";
              }
              else{
                $instName = validate($_POST["instName"]);
                
              }

              if(empty($_POST["instAdd"])){
                $instAddErr = "institution address is required";
             }
             else{
               $instAdd = validate($_POST["instAdd"]);
               
             }

             if(empty($_POST["instPhone"])){
              $instPhoneErr = "institution Phone is required";
           }
           else{
             $instPhone = validate($_POST["instPhone"]);
            
           }
           if(empty($_POST["instEmail"])){
            $instEmailErr = "institution email is required";
         }
         else{
           $instEmail= validate($_POST["instEmail"]);
           
         }

         if(empty($_POST["instLoc"])){
          $instLocErr = "institution address is required";
       }
       else{
         $instLoc = validate($_POST["instLoc"]);
         
       }

            }
          }
      ?>


<div class="form-container">
    <p><b>Manage: </b> Institution Information</p>
          
      <form method="POST" action="" class="hidden form-content">
      <p class="branch">Manage Institution Information</p> <br>
        Institution Name <br>
        <input type="text" name="instName" placeholder="Institution name" id="inst-name" required> *<br>
        <span class="Err"><?php echo $instNameErr ?></span><br>
        Address <br>
        <input type="text" name="instAdd" placeholder="institution address" id="inst-add" required> *<br>
        <span class="Err"><?php echo $instAddErr ?></span><br>
         Telephone <br>
         <input type="tel" name="instPhone" placeholder="Phone Number" id="inst-phone" required> * <br><span class="Err"><?php echo $instPhoneErr ?></span><br>
         Email <br>
         <input type="email" name="instEmail" placeholder="Email" id="inst-email" required> * <br> <span class="Err"><?php echo $instEmailErr ?></span> <br>
         Location <br>
         <input type="text" name="instLoc" placeholder="location" id="inst-loc" required> * <span class="Err"><?php echo $instLocErr ?></span> <br>
         
         <button id="close-btn" class="btn"  name="close">Close</button>
               <button id="save-btn" class="btn" name="save">Save Data</button>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
      </form>


      

    
    <main>
 
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
          <th>Institution Name</th>
          <th>Address</th>
          <th>Email</th>
          <th>Telephone</th>
          <th>Location</th>
          <th></th>
          <th></th>
          <!-- <th>Action</th> -->
          <!-- <th>Location</th> -->
          <!-- $instName = $instAdd = $instPhone = $instEmail = $instLoc = ''; -->
        </tr>
        <tbody id="list">
            <?php
                  if(!empty($instName) && !empty($instAdd ) && !empty($instPhone)  && !empty($instEmail)  && !empty($instLoc)){

                       $insert_query = "INSERT INTO institution (inst_name,inst_address,inst_email,inst_phone,inst_loc)
                        VALUES ('$instName', '$instAdd','$instEmail', '$instPhone','$instLoc')";
                       
                        $result = mysqli_query($conn,$insert_query);   
                        if($result == TRUE){
                          // echo "<script>alert('New Institution has been submitted succesfull')</script>";
                          $_SESSION['success'] = "New institution has been added";
                          header('Location: institution.php');
                      }
                      else{
                        $_SESSION['status'] = "New institution has not been added";
                          header('Location:institution.php');
                      }
                      
                      }
                      ?>

                    <?php
                         
                         $fetch_query = "SELECT * FROM institution";
                         $output = mysqli_query($conn, $fetch_query);

                         if(mysqli_num_rows($output) > 0){
                           while($row=mysqli_fetch_assoc($output)){
                             $inst_id = $row['inst_id'];
                              $inst_name = $row['inst_name'];
                              $inst_add = $row['inst_address'];
                              $inst_email = $row['inst_email'];
                              $inst_phone = $row['inst_phone'];
                              $inst_loc = $row['inst_loc'];

                              echo "<tr>";
                                  echo "<td> $inst_id </td>";
                                  echo "<td> $inst_name </td>";
                                  echo "<td> $inst_add </td>";
                                  echo "<td> $inst_email </td>";
                                  echo "<td> $inst_phone </td>";
                                  echo "<td> $inst_loc </td>";
                                  ?>
                                      
                                        <td>
                                          <form action="institutionEdit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['inst_id']; ?>" >
                                        <button type="submit" id="inner-btn" class="edit" name="edit"> Edit</button> 
                                        </form>
                                        </td>
                                        <td>
                                          <form action="institutionEdit.php" method="post">
                                             <input type="hidden" name="delete_id" value="<?php echo $row['inst_id'];  ?>">
                                 <button id="inner-btn" name="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                 </form>
                                        </td>
                             
                                  <?php
                              echo "</tr>";
                           }
                         }
                         ob_flush();
                        ?>

                        <?php
                              //  if(isset($_POST['save'])){
                              //    $select_query = "SELECT * FROM institution";
                              //    $output = mysqli_query($conn, $select_query);
                              //    if(mysqli_num_rows($output) > 0){
                              //      while($row=mysqli_fetch_assoc($output)){
                              //        echo $row['inst_name'];
                              //      }
                              //    }
                              //  }
                        ?>

          </tbody>
        </table>
                              </div>
        <!-- ======== EDIT SECTION ===  -->
         

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
let edit = document.querySelector('.edit');

open.addEventListener('click', () => {
    form.classList.remove('hidden');
})

close.addEventListener('click', () => {
    form.classList.add('hidden');
})
edit.addEventListener('click', () => {
  // form.classList.remove('hidden');
})


</script>
</body>
</html>
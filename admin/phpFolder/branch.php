<?php
  $documentName = $document = $branchStatus= '';
  $documentNameErr = $documentErr = $branchStatusErr= '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department</title>
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
  /* position: absolute; */
  left: 50%;
  top : 60%;
  /* transform : translate(-50%, -50%); */
  background-image: url(../../images/church5.jpg);
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
    echo "melckzedeck";
    if(empty($_POST["documentName"])){
      $documentNameErr = "Error document name is required";
    }
    else{
      $documentName = validate($_POST["documentName"]);
    //  $deptName = $_POST["deptName"];
    //  //  echo $branchName;
    }
    if(empty($_FILES["document"]["name"])){
      $documentErr = "Error document code is required";
     }
     else{
      $document  = validate( $_FILES["document"]["name"]);
      //  $deptHead = $_POST["deptHead"];
       // echo $document;
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
    <p><b>Manage: </b> Institution Information</p>
          
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" class="hidden form-content">
      <p class="branch">Add Department</p> <br>
        Document Title <br>
        <input type="text" name="documentName" placeholder="Branch Name" required id="inst-name"> *<br>
        <span class="Err"><?php echo $documentNameErr ?></span><br>
        Document <br>
        <input type="file" name="document" required id="inst-add"> *<br>
        <span class="Err"><?php echo $documentErr ?></span><br>
        
       
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
        <p><b>Institution Information</b></p>
        <table>
            <tr>
                 <th>ID</th>
                <th>Department Name</th>
                <th>Department Head</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
          <tbody id="list">
            <tr>
          <?php
                  if(!empty($deptName) && !empty($deptHead)){
                      if(isset($_POST['upload'])){
                        $insert_query ="INSERT INTO report(document_title, document) 
                        VALUES ('$documentName', '$document')";
                        $insert_result = mysqli_query($conn, $insert_query);
                        if($results == TRUE){
                          move_uploaded_file($_FILES['document']['tmp_name'], "upload/".$_FILES['document']['name']);
                           $_SESSION['success'] = "New report succesfull added";
                           header('Location: branch.php');
                        }
                        else{
                          
                          $_SESSION['status'] = "New report not added";
                          header('Location: branch.php');
                        }
                      }

                      }
                    ?>
                  <!-- <td></td>
                 
                  <td>
                  <button id="inner-btn" name="edit"> Edit</button>
                  <button id="inner-btn" name="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </td>
                </tr> -->

                <?php
                        // }
                ?>
          </tbody>
        </table>
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
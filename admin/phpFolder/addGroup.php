<?php
$groupName ='';

$groupNameErr = ''; 
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
  width: 60%;
  margin: auto;
  border: 1px solid grey;
  padding: 1em 2em;
  border-radius: 10px;
  position: absolute;
  background: white;
  left: 50%;
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
              if(empty($_POST["groupName"])){
                 $groupNameErr = "institution name is required";
              }
              else{
                $groupName = validate($_POST["groupName"]);
                
              }

    //           if(empty($_POST["instAdd"])){
    //             $instAddErr = "institution address is required";
    //          }
    //          else{
    //            $instAdd = validate($_POST["instAdd"]);
               
    //          }

    //          if(empty($_POST["instPhone"])){
    //           $instPhoneErr = "institution Phone is required";
    //        }
    //        else{
    //          $instPhone = validate($_POST["instPhone"]);
            
    //        }
    //        if(empty($_POST["instEmail"])){
    //         $instEmailErr = "institution email is required";
    //      }
    //      else{
    //        $instEmail= validate($_POST["instEmail"]);
           
    //      }

    //      if(empty($_POST["instLoc"])){
    //       $instLocErr = "institution address is required";
    //    }
    //    else{
    //      $instLoc = validate($_POST["instLoc"]);
         
    //    }

            }
          }
      ?>


<div class="form-container">
    <p><b>Manage: </b> Groups Information</p>
          
      <form method="POST" action="" class="hidden form-content">
      <p class="branch">Add Group</p> <br>
        Group Name <br>
        <input type="text" name="groupName" placeholder="group name" id="inst-name"> *<br>
        <span class="Err"><?php echo $groupNameErr ?></span><br>
       
         
         <button id="close-btn" class="btn"  name="close">Close</button>
               <button id="save-btn" class="btn" name="save">Save Changes</button>
        <!-- <button name="close">close</button>
        <button name="save">save changes</button> -->
      </form>
    


<div class="table-container">
        <button id="add-data-btn" class="btn"  style="float: right; margin-bottom:1em ;" ><b><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Data</b></button> <br><br><br>

        <p id="table"><b>Group <?php echo $groupName; ?></b></p>
        <h4>PERMISSION</h4>
        <table>
          
          <tr>
          <th></th>
          <th>Create</th>
          <th>Update</th>
          <th>View</th>
          <th>Delete</th>
          <!-- <th>Location</th> -->
          <!-- <th>Location</th> -->
          <!-- $instName = $instAdd = $instPhone = $instEmail = $instLoc = ''; -->
        </tr>
        <tbody id="list">
            <?php
                  if(!empty($groupName)){
                    
                    ?>
      <tr>
        <td>Users</td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
      </tr>

      <tr>
        <td>Groups</td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
      </tr>
      <tr>
        <td>Branches</td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
      </tr>
      <tr>
        <td>Department Head</td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
      </tr>
      <tr>
        <td>Groups</td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
      </tr>
      <tr>
        <td>Accounting</td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
      </tr>
      <tr>
        <td>Attendance</td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
        <td> <input type="checkbox"></td>
      </tr>

      <?php
                  }
                  ?>
          </tbody>
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
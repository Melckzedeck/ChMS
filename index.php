<?php
ob_start();
session_start();
      include('../config/topNav.php');
      require_once('../config/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Management System</title>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="../admin/Css/all.min.css">
    <script src="../admin/Css/all.min.js"></script>

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
  /* background-image: url(../images/cback1.jpg);  */
  background-image: url(../admin/phpFolder/images/church4.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  z-index: -2;
}
.form-content{
  width: 40%;
  margin: auto;
  border: 1px solid grey;
  padding: 1em 1em;
  border-radius: 10px;
  background: white;
  position: absolute;
  top: 53%;
  left: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 3px 4px 5px grey;
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
input[type="text"],input[type="tel"], input[type="email"],input[list="country"],input[type="date"],input[list="branch"],input[list="role"],input[type="password"]  {
  width: 90%;
  padding: 0.5em;
  margin: 0.2em;
  border-radius: 5px;
  border: 1px solid grey;
  outline: none;
}
/* .alert {
  padding: 0.5em;
  margin: auto;
  border-radius: 5px;
  width: 50%;
  margin-bottom: 0.4em;
}
.success {
  background-color: green;
  color: white;
} */
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
.hidden{
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
  /* margin-right: 4em; */
}
.error{
  background: red;
  color: white;
  padding: 0.3em;
  text-align: center;
  border-radius: 5px;
  width: 40%;
  margin: auto ;
  margin-bottom: 1em;
}
    </style>
</head>
<body>
    
<?php
 if($_SERVER["REQUEST_METHOD"] === "POST"){

if(isset($_POST["login"])){
      $username = $_POST['username'];
      $password = $_POST['password'];
    
      $select_query  = "SELECT * FROM members WHERE email = '$username'  AND password = '$password'";
      $results = mysqli_query($conn, $select_query);
      if(mysqli_num_rows($results) > 0){
          while($row = mysqli_fetch_assoc($results)){
            if($row['user_role'] == 'admin'){
               $_SESSION['username'] = $username;
               header('Location: ../admin/phpFolder/index.php');
            }
            if($row['user_role'] == 'user'){
              $_SESSION['username'] = $username;
              header('Location: ../admin/pages/index.php');
            }
          }
      }
      else{
          $_SESSION['status'] = "Invalid email or password";
          // header('Location: index.php');
      }
}
 }
?>




<div id="top section" style="margin-top: 4em;"></div>

<?php
 
             if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
                    echo "<p class='error'>" .$_SESSION['status'] . "</p>";
                    unset($_SESSION['status']);
                 }
?>
<div class="form-container">
    <!-- <p><b>Welcome to Admin pannel</b> </p> -->
          
    
      <form method="POST" action="" class="form-content">
      <p class="branch" style="font-size:1.5em;">Login Here</p> <br>
        Username<br>
        <input type="text" name="username" placeholder="username or email" id="username"><br>
        <span class="Err"><?php echo $usernameErr ?></span><br>
        Password <br>
        <input type="password" name="password" placeholder="password"> <br>
        <span class="Err"><?php echo $passwordErr ?></span><br>
       
               <button id="save-btn" class="btn" name="login">Login </button>
      </form>
  

    </div>
    
 

<script>
// const open = document.getElementById('add-data-btn');
// const close = document.getElementById('close-btn');
// let save = document.getElementById('save-btn');
// let form = document.querySelector('.form-content');

// open.addEventListener('click', () => {
//     form.classList.remove('hidden');
// })

// close.addEventListener('click', () => {
//     form.classList.add('hidden');
// })



// DEALING WITH TOGGLE MENU 

const menu = document.getElementById('toggle');
let item =  document.querySelectorAll('.item');
let left_menu = document.getElementById('side-bar');

menu.addEventListener('click', function(){
    for(let i=0; i < item.length; i++){
        item[i].classList.toggle('active');
    
    }

})

function add(){
    console.log(2+4);
}
add();

</script>

</body>
</html>

<?php
ob_flush();
// include('../config/topNav.php');
?>
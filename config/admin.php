<?php
// session_start();
include('connection.php');

if($conn){
    // echo "connected";
}
else{
    die('failed to include database connection');
}
if($_SESSION['username']){
$user = $_SESSION['username'];
// die($user);
$select_user = "SELECT * FROM members WHERE email = '$user'";
$user_result = mysqli_query($conn, $select_user);
if(mysqli_num_rows($user_result) > 0){
    while($row = mysqli_fetch_assoc($user_result)){
        $user_type = $row['user_role'];
        
    }
}
    if($user_type != "admin"){
    // header('Location: index.php');
    header('Location: ../../admin/index.php');
    }

}

?>
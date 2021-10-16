<?php
session_start();
include('connection.php');

if($conn){
    // echo "connected";
}
else{
    die('failed to include database connection');
}
if(!$_SESSION['username']){
    header('Location: ../../admin/index.php');
}

?>
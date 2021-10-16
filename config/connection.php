<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname= "chms";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if(!$conn){
    echo "not yet connected";
}


?>
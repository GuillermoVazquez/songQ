<?php
session_start();
require_once("config.php");

//lets get the email of the user that forgot password
$id = $_SESSION['id'];
//now the new password they want
$password = $_GET['Password'];

   //connect to MySQL 
    //use MySQLi
    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
    if(!$con){
        die("Connection Failure".mysqli_connect_error());
    }
$sql = "UPDATE users SET password='$password' WHERE id=$id ";

if ($con->query($sql) === TRUE) {
    $_SESSION["RegState"] = 0;
    $con->close();
    header("location:../index.php");
    exit;
} else {
    echo "Error updating record: " . $con->error;
}

//the user was not found 
//send back one - notify
die("Username was not found");

?>
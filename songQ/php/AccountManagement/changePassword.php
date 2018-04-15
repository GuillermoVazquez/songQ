<?php
session_start();
require_once("../config.php");

$email = $_SESSION['Email'];
$current = md5($_GET['currentPassword']);
$new = md5($_GET['newPassword']);

   //connect to MySQL 
    //use MySQLi
    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
    if(!$con){
        die("Connection Failure".mysqli_connect_error());
    }

$sql = "UPDATE users SET password='$new' WHERE email='$email' AND password='$current' ";

if ($con->query($sql) === TRUE) {
    $_SESSION["Message"] = "Password updated succesfully";
    $_SESSION["RegState"] = 9;
        $con->close();
        header("location:../../html/chart.php");
        exit;
} else {
    echo "Error updating record: " . $con->error;
    $_SESSION["Message"] = $con->error ;
}

//the user was not found 
//send back one - notify
die("id was not found");

?>
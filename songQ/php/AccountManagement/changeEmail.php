<?php
session_start();
require_once("../config.php");

$current = $_GET['currentEmail'];
$new = $_GET['newEmail'];

   //connect to MySQL 
    //use MySQLi
    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
    if(!$con){
        die("Connection Failure".mysqli_connect_error());
    }

$sql = "UPDATE users SET email='$new' WHERE email='$current' ";

if ($con->query($sql) === TRUE) {
    $_SESSION["Message"] = "Email updated succesfully";
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
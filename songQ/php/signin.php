<?php
session_start();
require_once("config.php");

//lets get email and password
$Email = $_GET['Email'];
$Password = $_GET['Password'];

//now lets implement remeber-me
if(isset($_GET['check'])){
    $_SESSION["Email"] = "$Email";
    $_SESSION["Password"] = "$Password";
    $_SESSION["RememberFlag"] = 1;
}

   //connect to MySQL 
    //use MySQLi
    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
    if(!$con){
        die("Connection Failure".mysqli_connect_error());
    }

$request = "SELECT email, password FROM users";
$results = mysqli_query($con,$request);

if(!$results){
        die("Query Failed".mysqli_connect_error());
    }


while ($row = mysqli_fetch_assoc($results)) {
    if( ($row['email'] == "$Email") and ($row['password'] == md5($Password)) ){        
        //boom youre in
        $_SESSION["RegState"] = 9;
        $con->close();
        //set the email session variable
        $_SESSION["Email"] = $Email;
        //set the password session variable
        $_SESSION["Password"] = $Password;
        header("location:../html/chart.php");
        exit;
}
}
//the user was not found 
//send back one - notify
$con->close();
$_SESSION["RegState"] = 11;
header("location:../index.php");
exit;
?>
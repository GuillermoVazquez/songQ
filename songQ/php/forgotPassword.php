<?php
session_start();
require_once("config.php");

//lets get the email of the user that forgot password
$Email = $_GET['Email'];

   //connect to MySQL 
    //use MySQLi
    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
    if(!$con){
        die("Connection Failure".mysqli_connect_error());
    }

$request = "SELECT email FROM users";
$results = mysqli_query($con,$request);

if(!$results){
        die("Query Failed".mysqli_connect_error());
    }


while ($row = mysqli_fetch_assoc($results)) {
    if( ($row['email'] == $Email) ){
        //lets get the users password
        $_SESSION['id'] = $row['id'];
        /*$msg = "Please click on the link to set password for your account: http://cis-linux2.temple.edu/~tuf43609/lab2/php/authenticate.php?Email=$Email&Acode=$Acode";*/
        $msg = "Please click on the link to reset password for your account: http://localhost/public_html/lab2/php/resetAuth.php?Email=$Email";
    $msg = wordwrap($msg,70);
    $to = "$Email";
    $subject = "Reset Password";
    $header = "From: Guillermo Vazquez";
    $header = wordwrap($header,70);
    $what = mail($to,$subject,$msg,$header);
    $_SESSION["RegState"] = 1;
    $con->close();
    header("location:../index.php");
    exit;
    }
}
//the user was not found 
//send back one - notify
$_SESSION["RegState"] = 11;
die("Username was not found");
?>
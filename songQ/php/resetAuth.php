<?php
//the session variable should be == 1
session_start();
require_once("config.php");
//ok here we will accept some stuff from register.php
//Email
//Acode

$Email = $_GET["Email"];
    
//cool now we've got the goods
//let's authenticate the user by cross referencing the Email with the Acode

//connect to MySql
$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
//query the database for cross referencing
if($con->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//getting the info from the database to cross-reference
$request = "SELECT email, id FROM users";
$results = mysqli_query($con,$request);

if(!$results){
        die("Query Failed".mysqli_connect_error());
    }


while ($row = mysqli_fetch_assoc($results)) {
    if( ($row['email'] == "$Email") ){
        $_SESSION["id"] = $row['id'];
        $_SESSION["RegState"] = 3;
        //off to reset password!!    
        header("location:../index.php");
        $con->close();
        exit;
    }
    
}

$_SESSION["RegState"] = 11;
echo "Oh no! An error occured, please register again. Another Email will be sent!";
header("location:../index.php");
$con->close();
exit;


?>
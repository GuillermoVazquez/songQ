<?php
session_start();
require_once("config.php");

//lets get email and password
$Party = $_GET['Party'];
$Username = $_GET['Username'];

//now lets implement remeber-me
/*
if(isset($_GET['check'])){
    $_SESSION["Party"] = "$Party";
    $_SESSION["Username"] = "$$Username";
    $_SESSION["RememberFlag"] = 1;
}*/

   //connect to MySQL 
    //use MySQLi
    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
    if(!$con){
        die("Connection Failure".mysqli_connect_error());
    }

$request = "SELECT partyname FROM songQ";
$results = mysqli_query($con,$request);

if(!$results){
        die("Query Failed".mysqli_connect_error());
    }


while ($row = mysqli_fetch_assoc($results)) {
    if( ($row['partyname'] == "$Party") ){        
        //insert party member
    $query = "INSERT INTO songQ (partyname,username) VALUES ('$Party','$Username')";
    $results = mysqli_query($con,$query);
    if(!$results){
        die("Insert Failed".mysqli_connect_error());
        }
        //boom youre in
        $_SESSION["RegState"] = 9;
        $con->close();
        //set the email session variable
        $_SESSION["Party"] = $Party;
        //set the password session variable
        $_SESSION["Username"] = $Username;
        header("location:../html/main.php");
        exit;
}
}
//the user was not found 
//send back one - notify
$con->close();
$_SESSION["RegState"] = 11;
echo "nooo";
exit;
?>
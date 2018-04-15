<?php
    
    session_start(); //i need to use session variables so i call session_start
    require_once('config.php'); //get all your constants in from config.php
    //now fetch web data
    $Email = $_GET['Email'];
    $password = $_GET['password'];
    $repassword = $_GET['repassword'];
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $_SESSION["Email"] = "$Email";

    if($password == $repassword){
        $password = md5($password);
        //connect to MySQL 
    //use MySQLi
    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
    if(!$con){
        die("Connection Failure".mysqli_connect_error());
    }
    

    //create a query to insert values
    //string variables are treated as strings by single quotes
    //$query is a string variable to be passed to mysqli_query
    $query = "INSERT INTO users (email,password,firstname,lastname) VALUES ('$Email','$password','$firstname','$lastname')";
    $results = mysqli_query($con,$query);
    if(!$results){
        die("Insert Failed".mysqli_connect_error());
        }
        
    $con->close();
    $_SESSION["RegState"] = 9;
    header("location:../html/chart.php"); //header in php is called redirection, handoff
    exit;    
    }


    $con->close();
    $_SESSION["RegState"] = 1;
    header("location:../index.php"); //header in php is called redirection, handoff
    exit;
?>
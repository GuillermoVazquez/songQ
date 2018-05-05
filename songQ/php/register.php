<?php
    
    session_start(); //i need to use session variables so i call session_start
    require_once('config.php'); //get all your constants in from //config.php
    //now fetch web data

    //todo: redirect user to spotify to login 
/*
    $party = $_GET['Party'];
    $reparty = $_GET['reParty'];
    $username = $_GET['username'];
    $_SESSION["Email"] = "$party";
*/
    //for Spotify GET request
        //for login
    $client_id = "client_id=a067472b3bb24cd98495015f3a48693f&";
    $response_type = "response_type=code&";
    $redirect_uri = "redirect_uri=http://localhost/public_html/songQ/callback.php";
    $redirect_uri = "redirect_uri=http://localhost/public_html/songQ/callback.php&"; 
    $scopes = "scope=streaming%20user-read-private%20user-read-email%20user-read-birthdate";
    //$redirect_uri = "redirect_uri=http://localhost/public_html/songQ/index.php";
    //redirect_uri=http://localhost/public_html/songQ/index.php
    $url = "https://accounts.spotify.com/authorize/?".$client_id.$response_type.$redirect_uri.$scopes;
/*
    if($party == $reparty){
    //connect to MySQL 
    //use MySQLi
    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
    if(!$con){
        die("Connection Failure".mysqli_connect_error());
    }
    

    //create a query to insert values
    //string variables are treated as strings by single quotes
    //$query is a string variable to be passed to mysqli_query
    $query = "INSERT INTO songQ (partyname,username) VALUES ('$party','$username')";
    $results = mysqli_query($con,$query);
    if(!$results){
        die("Insert Failed".mysqli_connect_error());
        }
        
    $con->close();*/
    
    //Spotify login    
    $ch = curl_init();    // initialize curl handle
    curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
    curl_setopt($ch, CURLOPT_COOKIESESSION, 1);// allow redirects    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
    curl_setopt($ch, CURLOPT_TIMEOUT, 3); // times out after 4s
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, 1); //for returning some body messages
    curl_setopt($ch, CURLOPT_HEADER, 1);  //for returning header messages
        
    $result = curl_exec($ch); // run the whole process
    curl_close($ch);    
    
    $result = file_get_contents(trim("https://accounts.spotify.com/authorize/?".$client_id.$response_type.$redirect_uri.$scopes));
        
        if($result){
            $_SESSION["RegState"] = 9;        
            echo $url;
            //echo $result;
            //header("location:../html/main.php");
            exit;    
        }else{
            $_SESSION["RegState"] = 11;
            //header("location:../index.php"); //header in php is called redirection,   handoff
            //echo $url;
            echo $result;
            exit;
        }
    //}//
?>
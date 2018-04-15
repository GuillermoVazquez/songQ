<?php
//read the lab log files
require_once("config.php");

//connect to MySQL 
//use MySQLi
$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
if(!$con){
    die("Connection Failure".mysqli_connect_error());
}

//todo: open log file
//todo: wait for program to populate log file first and then read
$fd = fopen("pathTologFile","r") or die("unable to open matrix log file");
while(!feof($fd)){
    //parse the log file
    $line = fgets($fd);
    if($line != ""){
        echo $line."i</br>";
        $array = explode(' ',$line);
        $dateTime = date("Y-m-d h:i:s");
        //todo: figure out how to parse your own log file and adjust values below
        $query = "Insert into performance (timestamp, size, elapsedtime, mgflps)"
            ."values('$dateTime',$array[0],$array[1],$array[2]);";
        $results = mysqli_query($con,$request);
            
    }
}
//todo: test online!! by inserting into url
//todo: clean up database so that a second call doesnt have redundency
exit();
?>
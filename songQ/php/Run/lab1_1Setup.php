<?php
header('Access-Control-Allow-Origin: *');
session_start();

$size = $_GET["lab11Size"];
    //exec("../php/Run/part1",$size);
$descriptors = array(
    0 => array("pipe","r"),  //stdin pipe child will read from
    1 => array("pipe","w"),  //stdout pipe child will write to
    2 => array("file","../php/Run/error-output.txt","a") //stderr file 
);

$cwd = '.';
$env = array("some_option" => "aeiou");
//command line argument here
$arg = escapeshellarg($size);

//change filetobeexecuted to matrix program
//$descriptors is for your to specifiy the pipes array for the child process 
//$pipes is so that you name the pipes array for this child process
$process = proc_open('../php/Run/part1'.$arg,$descriptors,$pipes,$cwd,$env); //fork a child

if(is_resource($process)){
    
    //feed the child process input s
    //insert needed argument in place of ''
    //fwrite($pipes[0],' 10');
    fclose($pipes[0]);
    
    //get child process output
    echo stream_get_contents($pipes[1]);
    fclose($pipes[1]);
    
    
    //close process
    proc_close($process);  
}
   header("location: ../../index.php");
    exit();

?>
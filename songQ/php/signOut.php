<?php
session_start();
$_SESSION['RegState'] = 0;
$_SESSION["Message"] = " ";
header("location:../index.php");
exit;
?>
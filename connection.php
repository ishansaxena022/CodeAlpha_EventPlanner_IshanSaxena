<?php

$server = "localhost";
$username = "root";
$pass = "";
$db = "event_p"; 

$con = mysqli_connect($server,$username,$pass,$db);

if(!$con){
?>
    <script>alert("Connection unsuccessful!!");</script><?php
}
?>
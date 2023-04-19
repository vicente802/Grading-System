<?php
$host="localhost";
$user = "root";
$pass = "";
$database = "grading system";

$con = mysqli_connect($host,$user,$pass,$database);
if(!$con){
    $con.close();
}
?>
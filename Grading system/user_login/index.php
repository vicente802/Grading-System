<?php
include '../Connection/db.php';
session_start();
if(isset($_SESSION['email'])){
    $email = $_POST['email'] = $_SESSION['email'];
   
}
 $account_check = mysqli_query($con,"SELECT * FROM account WHERE Email='$email'");
 if(mysqli_num_rows($account_check)>=1){
    $row_account = mysqli_fetch_assoc($account_check);
    
 }
/* echo $_SESSION['email']; */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    <?php include 'css/user_style.css'?>
    </style>
</head>

<body>

    <?php include 'header/header.php'?>

    <div id="dashboard">
        <?php include 'body/dashboard.php'?>
    </div>
    <div id="management">
        <?php include 'body/management.php' ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="function/logout.js"></script>
    <?php include '../javascript/javascript_connection/javascript_cdn.php' ?>
    <script src="function/function.js"></script>
</body>
</html>
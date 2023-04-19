<?php
include '../Connection/db.php';
session_start();
if(!isset($_SESSION['ID'])){
header('location: ../login_form/');
}else{
    $user_ID = $_SESSION['ID'];
   
}
$account_pending = mysqli_query($con,"SELECT * FROM account WHERE Role='Student' AND Status='Pending' ORDER BY creation_time DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    <?php include 'css/registrar.css'?>
    </style>
</head>

<body>
    <?php include 'header/header.php' ?>
    <div class="container" id="dashboard">
        <?php include 'body/card.php' ?>
        <?php include 'body/table.php' ?>
    </div>
    
    <div class="container" id="pending_accounts">
        <?php include 'body/pending_accounts.php' ?>
    </div>

    <div class="container" id="manage_data">
        <?php include 'body/management.php' ?>
    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="function/logout.js"></script>

    <?php include '../javascript/javascript_connection/javascript_cdn.php' ?>
    <script src="function/function.js">

    </script>
</body>

</html>

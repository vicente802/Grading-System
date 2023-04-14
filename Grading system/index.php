<?php
include 'Connection/db.php';
session_start();
$email = $_SESSION['email'];
if(!$_SESSION['ID']){
    header('location: login_form/');
}
$account_checking = mysqli_query($con,"SELECT * FROM account WHERE Email ='$email'");
if(mysqli_num_rows($account_checking) >=1){
    $row_data_account = mysqli_fetch_assoc($account_checking);
    $role = $row_data_account['Role'];
    $Status = $row_data_account['Status'];
    if($role =="Registrar" && $Status =="Active"){
        header('location: registrar_form/index.php');
    }
    if($role =="Teacher" && $Status=="Active"){
        header('location: teacher_form/index.php');
    }
    if($role =="Student" && $Status =="Active"){
        header('location: user_login/index.php');
    }
    if($role =="Student" && $Status =="Pending"){
        session_destroy();
        header('location: login_form/');
    }

}
?>
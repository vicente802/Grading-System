<?php
session_start();
include '../../Connection/db.php';
$data  = $_POST;
$email = $data['email'];
$pass = $data['pass'];
$login_key = $data['login_key'];

if(!empty($login_key)){
$account_check = mysqli_query($con, "SELECT * FROM Account WHERE Username = '$email' AND Password = '$pass' OR Email = '$email' AND Password = '$pass'");
if(mysqli_num_rows($account_check) >= 1) {
   $checking_role = mysqli_fetch_assoc($account_check);
   $role = $checking_role['Role'];
   $ID = $checking_role['ID'];
   $Status = $checking_role['Status'];
    if($role =="Registrar" && $Status =="Active"){
       echo 'Registrar';
       $_SESSION['ID'] = $ID;
       $_SESSION['email'] = $email;
    }
    if($role == "Teacher" && $Status =="Active"){
        echo 'Teacher';
        $_SESSION['ID'] = $ID;
        $_SESSION['email'] = $email;
    }
    if($role == "Student" && $Status =="Active"){
        echo 'Student';
        $_SESSION['ID'] = $ID;
        $_SESSION['email'] = $email;
    }
    if($Status =="Pending"){
        echo "Pending";
        $_SESSION['ID'] = $ID;
        $_SESSION['email'] = $email;
    }
    if($Status ==""){
        echo "blank";
        $_SESSION['ID'] = $ID;
        $_SESSION['email'] = $email;
    }

}else{
    echo 'invalid';
}   

}

?>
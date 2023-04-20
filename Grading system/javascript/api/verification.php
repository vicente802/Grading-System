<?php 
session_start();
include '../../Connection/db.php';
$data = $_POST;
$email = $data['email'];
$code = $data['code'];
$checking_code = mysqli_query($con, "SELECT * FROM account WHERE verification_code='$code'");
if(mysqli_num_rows($checking_code)>=1){
   $_SESSION['email'] = $data['email'];
    mysqli_query($con, "UPDATE account SET Status='Pending', Role='Student' WHERE verification_code ='$code'");
    echo 'success';
 
}else{
    echo 'error';
}
?>
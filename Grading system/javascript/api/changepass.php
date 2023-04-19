<?php
session_start();
include '../../Connection/db.php';
$code = rand(100000,1000000);
$data = $_POST;
if(!empty($_POST['change_pass'])){
  $id = $data['id'];
  $pass = $data['current'];
  $new_pass = $data['new_pass'];
  $account_check = mysqli_query($con,"SELECT * FROM account WHERE ID='$id' AND Password='$pass'");
  if(mysqli_num_rows($account_check)>=1){
    mysqli_query($con,"UPDATE account SET verification_code='$code' WHERE ID='$id'");
    $_SESSION['new_pass'] = $new_pass;
    echo 'success';
  }else{
    echo 'error';
  }
}
if(!empty($_POST['verify'])){
    $id = $data['id'];
    $new_pass = $_SESSION['new_pass'];
    $account_check1 = mysqli_query($con,"SELECT * FROM account WHERE ID='$id'");
    if(mysqli_num_rows($account_check1)>=1){
        $row_account = mysqli_fetch_assoc($account_check1);
        $email = $row_account['Email'];
        $code = $row_account['verification_code'];
        $to_email = $email;
        $subject = "Verification Code";
        $body = "Code ".$code ;
        $headers = "From: sender email";
        
        if (mail($to_email, $subject, $body, $headers))
        {
            
            echo 'success sending Code';
        }
    }
}
if(!empty($_POST['change_pass_now'])){
   $email = $_SESSION['email'];
   $new_pass = $_SESSION['new_pass'];
   $code = $data['verification_code'];
  $account = mysqli_query($con,"SELECT * FROM account WHERE Email='$email' AND verification_code='$code' OR Username='$email' AND verification_code='$code'");
  if(mysqli_num_rows($account) >=1){
    mysqli_query($con, "UPDATE account SET Password='$new_pass' WHERE Email='$email' OR Username='$email'");
    echo 'success';
  }else{
    echo 'failed';
  }
  
}
if(!empty($_POST['save'])){
    $data = $_POST;
    $id = $data['id'];
    $lrn = $data['lrn'];
    $firstname = $data['firstname'];
    $middlename = $data['middlename'];
    $lastname = $data['lastname'];
    $suffix = $data['suffix'];
    $contact = $data['contact'];
    $address = $data['address'];
    $gender = $data['gender'];
    $username = $data['username'];
    $email = $data['email'];
    $birthdate = $data['birthdate'];
    $birthplace = $data['birthplace'];
    $nationality = $data['nationality'];
    $religion = $data['religion'];
    
    mysqli_query($con,"UPDATE `account` SET `LRN`='$lrn',
    `Firstname`='$firstname',`Middlename`='$middlename',`Lastname`='$lastname',
    `Suffix`='$suffix',`Username`='$username',`Address`='$address',`Place_Of_Birth`='$birthplace',
    `Nationality`='$nationality',`Religion`='$religion',`Email`='$email',
    `Phone`='$contact',`Gender`='$gender',
    `Birthdate`='$birthdate' WHERE ID='$id'");
    echo 'success';

}
?>
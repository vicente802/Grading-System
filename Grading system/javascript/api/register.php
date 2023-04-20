<?php
include '../../Connection/db.php';
session_start();
$data = $_POST;
$lrn = $data['lrn'];
$firstname = $data['firstname'];
$middlename = $data['middlename'];
$lastname = $data['lastname'];
$suffix = $data['suffix'];
$contact = $data['contact'];
$address = $data['address'];
$birthdate = $data['birthdate'];
$date = date('y-m-d',strtotime($birthdate));
$gender = $data['gender'];
$course = $data['course'];
$year_level = $data['year_level'];
$place_of_birth = $data['place_of_birth'];
$nationality = $data['nationality'];
$religion = $data['religion'];
$username = $data['username'];
$password = $data['password'];
$email = $data['email'];
$code = rand(100000,1000000);
$checking_email = mysqli_query($con, "SELECT * FROM account WHERE Email='$email'");
if(mysqli_num_rows($checking_email)==1){
    echo 'exist';
}else{
$to_email = $data['email'];
$subject = "Verification Code";
$body = "Code ".$code."";
$headers = "From: sender email";

if (mail($to_email, $subject, $body, $headers))
{
    mysqli_query($con,"INSERT INTO `account`(`LRN`, `Firstname`, `Middlename`, 
    `Lastname`, `Suffix`, `Username`, `Address`, 
    `Place_Of_Birth`, `Nationality`, `Religion`, `Email`, `Password`, 
    `Phone`, `Gender`, `Course`, `year`, `Birthdate`, `Status`, `verification_code`) VALUES 
    ('".$lrn."','".$firstname."','".$middlename."','".$lastname."','".$suffix."','".$username."','".$address."',
    '".$place_of_birth."','".$nationality."','".$religion."','".$email."','".$password."','".$contact."',
    '".$gender."','".$course."','".$year_level."','".$date."','','".$code."')");
    $_SESSION['email'] = $data['email'];
    echo 'success';
}
else{
    echo "Failed";
}
} 
?>
<?php
session_start();
include '../Connection/db.php';
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/login_form.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    <?php include 'css/login_form.php'?>
    </style>
</head>

<body>
    <center>
        <div class="container login_form">
            <div class="card" id="card-verification">
                <div class="card-header">
                    Enter Your Verification Code Here
                </div>
                <div class="card-body">
                    <div class="verification">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Verification Code</label>
                            </div>
                            <div class="col-sm">
                                <input type="hidden" id="user_id" value="<?= $email ?>">
                                <input type="text" id="code" maxlength="6" class="input-field" style="text-align:center;"
                                    placeholder="Enter Verification Code">
                            </div>
                            <div class="col-sm">
                                <div class="btn btn-primary" onclick="verify_now()" id="verify_button">Verify Now</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card " id="card-login"">
            <div class=" card-body">
                <form>

                    <div class="login">
                        <div class="title">
                            Login
                        </div>
                        <div class="alert alert-danger">Account is invalid</div>
                        <i class="fa fa-user"></i>
                        <input type="text" class="input-field" id="email" placeholder="Email or Username">
                        <br>
                        <i class="fa fa-key"></i>
                        <input type="password" class="input-field" id="pass" placeholder="Password">
                        <p>If you don't have account just simply <a href="#" onclick="register()"
                                style="text-decoration:underline;">Click Here</a></p>
                        <div class="btn btn-primary" onclick="login_now()">Login</div>
                    </div>

            </div>
        </div>
        <div class="card " id="card-register">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-1 justify-content-start">
                        <a href=""><i class="fa fa-arrow-left" id="back"></i></a>
                    </div>
                    <div class="col-sm justify-content-center">
                        <div class="title">
                            Registration
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="register">
                    <div class="row">
                        <div class="col-sm">
                            <b> Student Information</b>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <label>LRN</label>
                            <input type="number" id="lrn" class="input-field" placeholder="LRN Number">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <input type="text" id="firstname" class="input-field" placeholder="First Name">
                        </div>
                        <div class="col-sm-3">
                            <input type="text" id="middlename" class="input-field" placeholder="Middle Name">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" id="lastname" class="input-field" placeholder="Last Name">

                        </div>
                        <div class="col-sm">
                            <select class="input-field" id="suffix">
                                <option value="">Suffix</option>
                                <option value="Jr">Jr</option>
                                <option value="Sr">Sr</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-5">
                            <input type="number" id="contact" style="width:265px;" class="input-field"
                                placeholder="Contact Number">
                        </div>
                        <div class="col-sm-1">
                            <input type="Email" id="Email" style="width:265px;" class="input-field"
                                placeholder="Email Address">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-10">
                            <input type="text" id="address" placeholder="Address" class="input-field">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <label>Gender :</label> &nbsp;&nbsp;
                            <input type="radio" id="male" onclick="Male()" value="Male"> Male
                            <input type="radio" id="female" onclick="Female()" value="Female"> Female
                        </div>
                        <div class="col-sm-6">
                            <label>Birthdate: </label>
                            <input type="date" class="input-field" style="text-align:center;" id="birthdate"
                                style="width:200px;">
                        </div>
                        <br>
                        <div class="col-sm-5">
                            <label>Course : </label>
                            <select class="input-field" id="course">
                            <option value="">Select Course</option>
                                <?php $check_course = mysqli_query($con,"SELECT *FROM course"); 
                                if(mysqli_num_rows($check_course) >=1){
                                    while($row_course = mysqli_fetch_assoc($check_course)){
                                        ?>
    <option value="<?= $row_course['Course'] ?>"><?= $row_course['Course'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                              
                            
                            </select>
                        </div>
                        <br>
                        <div class="col-sm-5">
                            <label>Year Level : </label>
                            <select class="input-field" id="year_level">
                                <option value="">Select Year</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm">
                            <b>Other</b>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <input type="text" class="input-field" id="place_of_birth" placeholder="Place of Birth">
                        </div>
                        <div class="col-sm">
                            <input type="text" class="input-field" id="nationality" placeholder="Nationality">
                        </div>
                        <div class="col-sm">
                            <input type="text" class="input-field" id="religion" placeholder="Religion">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm">
                            <b> Account Information </b>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <input type="text" class="input-field" style="text-align:center;" id="username"
                                placeholder="Username">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <input type="password" class="input-field" style="text-align:center;" id="password"
                                placeholder="Password">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <input type="password" class="input-field" style="text-align:center;" id="retype-password"
                                placeholder="Re-type Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">

                            <input type="checkbox" onclick="check()" id="checkbox" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"> I have read this agreement
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm">
                            <button div class="btn btn-primary" type="button" id="btn1"
                                onclick="register_now()">Register
                                Now</button>

                        </div>
                    </div>
                    <div class="loading_screen">
                        <img id="loading"
                            src="https://media2.giphy.com/media/sSgvbe1m3n93G/giphy.gif?cid=ecf05e4757g5tzou2g0bnx4qjsl7c5he8xvijoqve4ohpctb&rid=giphy.gif&ct=g">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'body/modal.php' ?>
        </center>
    </body>

<?php include '../javascript/javascript_connection/javascript_cdn.php' ?>
<script src="../js/bootstrap.min.js"></script>

<script src="function/login_form_api.js"></script>

</html>
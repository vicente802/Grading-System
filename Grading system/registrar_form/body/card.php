<?php
include  '../Connection/db.php';
$sum_all = mysqli_query($con, "SELECT COUNT(Firstname) as first FROM account WHERE Role='Student' AND Status='Active'");
$row_count = mysqli_fetch_assoc($sum_all);
$teacher_count = mysqli_query($con, "SELECT COUNT(firstname) as teacher_name FROM account WHERE Role='Teacher' AND Status='Active'");
$row_teacher = mysqli_fetch_assoc($teacher_count);
$total_user = mysqli_query($con,"SELECT COUNT(firstname) as all_name FROM account WHERE Status='Active' AND Role='Student' OR Status='Active' AND Role='Teacher'");
$row_all_user = mysqli_fetch_assoc($total_user);
?>
<br>
<div class="container" id="card_tally">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-header">
                <p>Total of Student</p>
                </div>
                <div class="card-body">
                    <h1><?= $row_count['first'] ?></h1>
                </div>
            </div>
        </div>
        <div class="col-sm">
        <div class="card">
            <div class="card-header">
            <p>Total of Teacher</p>
            </div>
                <div class="card-body">
                 
                    <h1><?= $row_teacher['teacher_name'] ?></h1>
                </div>
            </div>
        </div>
        <div class="col-sm">
        <div class="card">
            <div class="card-header">
            <p>Total of User</p>
            </div>
                <div class="card-body">
                 
                    <h1><?= $row_all_user['all_name'] ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
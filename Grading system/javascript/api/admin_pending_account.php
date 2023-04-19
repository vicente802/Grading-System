<?php
$data = $_POST;
include '../../Connection/db.php';
if(!empty($_POST['view_pending'])){
$check_account = mysqli_query($con,"SELECT * FROM account WHERE ID='".$data['id']."'");
$row_account = mysqli_fetch_assoc($check_account);
echo ' '?> <div id="test">
    <input type="hidden" id="user_id" value="<?= $data['id'] ?>">
</div>
<label>Name</label>
<input type="text" id="fullname" class="form-control" disabled
    value="<?= $row_account['Firstname'].' '.$row_account['Middlename'].' '.$row_account['Lastname']?>">
<label>Email:</label>
<input type="text" disabled class="form-control" value="<?= $row_account['Email'] ?>">
<label>Course</label>
<select class="form-control" disabled>
    <option value=""><?= $row_account['Course'] ?></option>
</select>
<label>Section</label>
<select class="form-control" id="input_section">
    <option>Select Section</option>
    <?php
$check_section = mysqli_query($con, "SELECT * FROM section WHERE course='".$row_account['Course']."'    ");
if(mysqli_num_rows($check_section)>=1){
    while($row_section = mysqli_fetch_assoc($check_section)){
        ?>
    <option value="<?= $row_section['section'] ?>"><?= $row_section['section'] ?></option>
    <?php
    }
}
?>
</select>
<?php 
}
if(!empty($_POST['decline_account'])){
    $id = $data['id'];
    $email_account = mysqli_query($con,"SELECT * FROM account WHERE ID='$id'");
    if(mysqli_num_rows($email_account)>=1){
        $row_email_account = mysqli_fetch_assoc($email_account);
        $email = $row_email_account['Email'];
        $to_email = $email;
        $subject = "Account has been Decline";
        $body = "Your Account does not meet our requirements";
        $headers = "Administrator";
        
        if (mail($to_email, $subject, $body, $headers)){
     mysqli_query($con,"DELETE FROM account WHERE ID='$id'"); 
            echo ''
            ?>
<tbody style="font-weight:normal;" id="account_pending_list">
    <?php 
                              $account_pending = mysqli_query($con,"SELECT * FROM account WHERE Role='Student' AND Status='Pending' ORDER BY creation_time DESC");
                              if(mysqli_num_rows($account_pending) >= 1){
                                  while($row_pending = mysqli_fetch_assoc($account_pending)){
                                      $email = $row_pending['Email'];
                                      ?>
    <tr>
        <td><?= $row_pending['Firstname']. ' '. $row_pending['Middlename'] .' '. $row_pending['Lastname']?>
        </td>

        <td><?= $row_pending['Course'] ?></td>
        <td><?= $row_pending['year'] ?></td>
        <td><?= $row_pending['Section'] ?></td>
        <td class="text-white">
            <p class="bg-danger text-center"><?= $row_pending['Status'] ?></p>
        </td>
        <td><?= $row_pending['creation_time'] ?></td>
        <td>
            <div class="btn btn-danger" onclick="decline(<?= $row_pending['ID'] ?>)">Decline</div>
            <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#open_account"
                onclick="View(<?= $row_pending['ID'] ?>)">View</div>
        </td>

    </tr>
    <?php
               
                                  }
          
                               }
                              ?>
</tbody>
<?php ;
        }else{
      
        }
    }
}

if(!empty($_POST['add_account'])){
    $email = $data['email'];
    $lrn = $data['lrn'];
    $firstname = $data['firstname'];
    $middlename = $data['middlename'];
    $lastname = $data['lastname'];
    $birthdate = $data['birthdate'];
    $enc_password = $data['enc_password'];
    $suffix = $data['suffix'];
    $course = $data['course'];
    $year = $data['year'];
    $section = $data['section'];
    $role = $data['role'];
    $status = $data['status'];
    $contact = $data['contact'];
    $username = $data['username'];

    $check_email = mysqli_query($con,"SELECT * FROM account WHERE Email='$email'");
    if(mysqli_num_rows($check_email) >=1){
        echo 'exist';
    }else{
       
mysqli_query($con,"INSERT INTO `account`(`LRN`,`Firstname`, `Middlename`, `Lastname`, `Suffix`, `Username`,`Email`, `Password`, `Phone`, `Course`, `Section`, `year`, `Birthdate`, `Role`, `Status`) VALUES 
('".$lrn."','".$firstname."','".$middlename."','".$lastname."','".$suffix."','".$username."','".$email."','".$enc_password."','".$contact."','".$course."','".$section."','".$year."','".$birthdate."','".$role."','".$status."')");
 echo 'success';
   $to_email = $email;
        $subject = "Account Created Successfully";
        $body ="Your Account has created by administrator successfully, Your account password is:".$enc_password;
        $headers = "Administrator";
        
        if (mail($to_email, $subject, $body, $headers)){
           
    } 
}
}
if(!empty($data['submit_student_now'])){
    $id = $data['id'];
    $check_all_account = mysqli_query($con,"SELECT * FROM account WHERE ID='$id'");
    if(mysqli_num_rows($check_all_account) >=1){
        $row_all_account = mysqli_fetch_assoc($check_all_account);
        $email = $row_all_account['Email'];

        $input_section = $data['pending_input_section'];
     mysqli_query($con,"UPDATE account SET section='$input_section', Status='Active' WHERE ID='$id'");
       
        $to_email = $email;
        $subject = "Account Created Successfully";
        $body = "Your Account has Approved by administrator successfully";
        $headers = "Administrator";
        
        if (mail($to_email, $subject, $body, $headers)){
            $insert_all_subject = mysqli_query($con,"SELECT * FROM subject WHERE section='$input_section'");
            if(mysqli_num_rows($insert_all_subject)>=1){
                while($row_all_subject = mysqli_fetch_assoc($insert_all_subject)){
                    mysqli_query($con,"INSERT INTO `teacher_grading`(`user_id`, `subject_id`) VALUES ('".$id."','".$row_all_subject['ID']."')");
                }
            }
            echo ''?>
<tbody style="font-weight:normal;" id="account_pending_list">
    <?php 
                              $account_pending = mysqli_query($con,"SELECT * FROM account WHERE Role='Student' AND Status='Pending' ORDER BY creation_time DESC");
                              if(mysqli_num_rows($account_pending) >= 1){
                                  while($row_pending = mysqli_fetch_assoc($account_pending)){
                                      $email = $row_pending['Email'];
                                      ?>
    <tr>
        <td><?= $row_pending['Firstname']. ' '. $row_pending['Middlename'] .' '. $row_pending['Lastname']?>
        </td>

        <td><?= $row_pending['Course'] ?></td>
        <td><?= $row_pending['year'] ?></td>
        <td><?= $row_pending['Section'] ?></td>
        <td class="text-white">
            <p class="bg-danger text-center"><?= $row_pending['Status'] ?></p>
        </td>
        <td><?= $row_pending['creation_time'] ?></td>
        <td>
            <div class="btn btn-danger" onclick="decline(<?= $row_pending['ID'] ?>)">Decline</div>
            <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#open_account"
                onclick="View(<?= $row_pending['ID'] ?>)">View</div>
        </td>

    </tr>
    <?php
               
                                  }
          
                               }
                              ?>
</tbody>
<?php ;
        }
    }
   
}
?>
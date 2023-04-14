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
<select class="form-control">
    <option>Select Section</option>
    <?php
$check_section = mysqli_query($con, "SELECT * FROM section");
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
?>
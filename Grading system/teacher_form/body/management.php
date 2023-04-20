<?php
$user_id = $_SESSION['ID'];
$account = mysqli_query($con, "SELECT * FROM account WHERE ID='$user_id'");
if(mysqli_num_rows($account)>=1){
    $row_account = mysqli_fetch_assoc($account);
}
?>
<br>

<div class="container">
    <div class="card">
        <div class="card-header">
            Account Management
        </div>
        <div class="card-body">
            <label>FIrstname</label>
            <input type="text" class="form-control" id="firstname" value="<?= $row_account['Firstname'] ?>">
            <label>Middlename</label>
            <input type="text" class="form-control" id="middlename" value="<?= $row_account['Middlename'] ?>">
            <label>Lastname</label>
            <input type="text" class="form-control" id="lastname" value="<?= $row_account['Lastname'] ?>">
            <label>Suffix</label>
            <input type="text" class="form-control" id="suffix" value="<?= $row_account['Suffix'] ?>">
            <label>Gender</label>
            <input type="text" class="form-control" id="gender" value="<?= $row_account['Gender'] ?>">
            <label>Username</label>
            <input type="text" class="form-control" id="username" value="<?= $row_account['Username'] ?>">
            <label>Email</label>
            <input type="text" class="form-control" id="email" value="<?= $row_account['Email'] ?>">
            <label>Contact No.</label>
            <input type="text" class="form-control" id="contact" value="<?= $row_account['Phone'] ?>">
            <label>Birthdate</label>
            <input type="date" class="form-control" id="date" value="<?= $row_account['Birthdate'] ?>">
            <br>
            <a href="#" style="font-weight:normal;text-decoration:underline;" onclick="change_pass()">Change Password</a>
            <br>
            <div class="d-flex justify-content-end">
              <div class="btn btn-success">Save</div>
            </div>

<!-- Modal -->
<div class="modal fade" id="change_pass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="user_id" value="<?= $row_account['ID']?>">
        <input type="text" class="form-control" id="current_pass" placeholder="Enter Current Password"><br>
        <div id="new" style="display:none;">
        <input type="text" class="form-control" id="new_pass" placeholder="Enter New Password"><br>
        <input type="text" class="form-control" id="retype_pass" placeholder="Retype Password"><br>
        </div>
      </div>
      <div class="modal-footer">
        <div class="next_button">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close_all" onclick="close_now()">Close</button>
        <button type="button" class="btn btn-primary" onclick="next_verify()">Next</button>
        </div>
        <div class="verify_now" style="display:none;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="close_now()">Close</button>
        <button type="button" class="btn btn-primary" onclick="change_now()">Change Password</button>
        </div> 
    </div>
    </div>
  </div>
</div>
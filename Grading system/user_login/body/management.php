<div class="container">
    <div class="card">
        <div class="card-header">
            Account Management
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <form method="POST" id="form">
            <input type="hidden" value="<?= $row_account['ID'] ?>" id="user_id">
            <label>LRN No.</label>
            <input type="text" class="form-control" id="LRN" value="<?= $row_account['LRN'] ?>">
            <label>Firstname :</label>
            <input type="text" class="form-control" id="firstname" value="<?= $row_account['Firstname']?>">
            <label>Middlename :</label>
            <input type="text" class="form-control" id="middlename" value="<?= $row_account['Middlename']?>">
            <label>Lastname :</label>
            <input type="text" class="form-control" id="lastname" value="<?= $row_account['Lastname']?>">
            <label>Suffix :</label>
            <input type="text" class="form-control" id="suffix" value="<?= $row_account['Suffix']?>">
            <label>Address :</label>
            <input type="text" class="form-control" id="address" value="<?= $row_account['Address']?>">
            <label>Gender :</label>
            <select id="gender" class="form-control">
                <option value="<?= $row_account['Gender']?>"> <?= $row_account['Gender']?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label>Username :</label>
            <input type="text" class="form-control" id="username" value="<?= $row_account['Username']?>">
            <label>Email :</label>
            <input type="text" class="form-control" id="email" value="<?= $row_account['Email']?>">
            <label>Contact No. :</label>
            <input type="text" class="form-control" id="contact" value="<?= $row_account['Phone']?>">
            <label>Birthdate :</label>
            <input type="date" class="form-control" value="<?= $row_account['Birthdate']?>" id="birthdate">
            <label>Place Of Birth :</label>
            <input type="text" class="form-control" id="birthplace" value="<?= $row_account['Place_Of_Birth']?>">
            <label>Nationality :</label>
            <input type="text" class="form-control" id="nationality" value="<?= $row_account['Nationality']?>">
            <label>Religion :</label>
            <input type="text" class="form-control" id="religion" value="<?= $row_account['Religion']?>"><br>
            <label><a href="#" data-toggle="modal" style="font-weight:normal; text-decoration:underline;" data-target="#changepass">Change Password</a></label>
            </form>  
          </div>        </div>
           
            <div class="card-footer">
            <div class="d-flex justify-content-end">
            <div class="btn btn-success" onclick="save_all()">Save</div>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="change-form">
        <input type="text" class="form-control" id="current" placeholder="Current Password"><br>
        <input type="text" class="form-control" id="new" placeholder="New Password"><br>
        <input type="text" class="form-control" id="retype" placeholder="Retype Password">
        </div>
        <div class="verification-code">

        <label>Verification Code :</label>
        <input type="hidden" class="form-control" id="new_pass" value="<?= $_SESSION['new_pass'] ?>">
        <input type="text" class="form-control" id="verify" placeholder="Enter Code">
      </div>
      </div>
       
      <div class="modal-footer" id="save_option">
        <div class="verify_button">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="verify()">Verify</button>
        </div>
        <div class="comfirm_and_change">
        <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="verify_now()">Change Password</button>
        </div>
      </div>
    </div>
  </div>
</div>
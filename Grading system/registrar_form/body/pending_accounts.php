<br>
<?php 
$enc_password =  rand(10000000,10000000000);
?>
<div class="card" >
    <div class="d-flex justify-content-start">
        <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_account">Add Account</div>
    </div>
    <div class="card-header">
    </div>
    <div class="card-body">
        <div class="table-responsive" >
            <table class="table table-light" id="table_pending">
                <thead>
                    <th>Name</th>
                    
                    <th>Course</th>
                    <th>Year Level</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Date Applied</th>
                    <th>Action </th>
       
                </thead>
                <tbody style="font-weight:normal;" id="account_pending_list">
                    <?php 
                    if(mysqli_num_rows($account_pending) >= 1){
                        while($row_pending = mysqli_fetch_assoc($account_pending)){
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
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="open_account" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="form">
                    <input type="text" id="user_id" value="">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submit_student()">Approved</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_account" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="form">
                 <table>
                    <tr>
                        <td>LRN : </td>
                        <td><input type="text" id="lrn" placeholder="Input LRN No."></td>
                    </tr>
                    <tr>
                        <td>Firstname : </td>
                        <td><input type="text" id="firstname" placeholder="Firstname"></td>
                    </tr>
                    <tr>
                        <td>Middlename : </td>
                        <td><input type="text" id="middlename" placeholder="Middlename"></td>
                    </tr>
                    <tr>
                        <td>Lastname : </td>
                        <td><input type="text" id="lastname" placeholder="Lastname"></td>
                    </tr>
                    <tr>
                        <td>Suffix : </td>
                        <td>
                            <select id="suffix">
                                <option>Select Suffix</option>
                                <option value="Jr">Jr</option>
                                <option value="Sr">Sr</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>Contact No :</td>
                        <td><input type="number" placeholder="Contact" id="contact"></td>
                    </tr>
                    <tr>
                        <td>Username : </td>
                        <td><input type="email" id="username" placeholder="Email Address"></td>
                    </tr>
                    <tr>
                        <td>Email : </td>
                        <td><input type="email" id="email" placeholder="Email Address"></td>
                    </tr>
                    <tr>                    
                        <td>Encrypted Password :</td>
                        <td><input type="password" id="enc_password" value="<?= $enc_password ?>"></td>
                    </tr>
                     <tr>
                        <td>Birthdate : </td>
                        <td><input type="date" id="birthdate" min="1990-01-01" max="2018-01-31" placeholder="" id="datenow"></td>
                    </tr>
                    <tr>
                        <td>Course : </td>
                        <td>
                            <select id="course">
                            <option>Select Course</option>
                                <?php
                                $check_course = mysqli_query($con, "SELECT * FROM course");
                                if(mysqli_num_rows($check_course)>=1){
                                    while($row_course = mysqli_fetch_assoc($check_course)){
                                        ?>
                                     <option value="<?= $row_course['Course'] ?>"><?= $row_course['Course'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Year : </td>
                        <td>
                            <select id="year">
                                <option>Select Year</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Section : </td>
                        <td>
                            <select id="section">
                                <option>Select Section</option>
                                <?php
                                $check_section = mysqli_query($con, "SELECT * FROM section");
                                if(mysqli_num_rows($check_section)>=1){
                                    while($row_course = mysqli_fetch_assoc($check_section)){
                                        ?>
                                     <option value="<?= $row_course['section'] ?>"><?= $row_course['section'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Role : </td>
                        <td>
                            <select id="role">  
                                <option value="">Select Role</option>
                                <option value="Teacher">Teacher</option>
                                <option value="User">User</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Status : </td>
                        <td>
                            <select id="status">  
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </td>
                    </tr>
                 </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="add_account()">Submit</button>
            </div>
        </div>
    </div>
</div>
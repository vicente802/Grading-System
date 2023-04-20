<div class="container-fluid">
    <div class="container">
        <div class="table table-responsive">
            <table class="table table-light" id="example">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Year Level</th>
                        <th>Section</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
     $check_account = mysqli_query($con,"SELECT * FROM account WHERE role='Student' AND Status='Active'");
     if(mysqli_num_rows($check_account) >=1){
        while($row_account = mysqli_fetch_assoc($check_account)){
            ?>
                    <tr>
                        <td><?= $row_account['Firstname'].' '.$row_account['Middlename'].' '.$row_account['Lastname'] ?>
                        </td>
                        <td><?= $row_account['Email']?></td>
                        <td><?= $row_account['Course'] ?></td>
                        <td><?= $row_account['year'] ?></td>
                        <td><?= $row_account['Section'] ?></td>
                        <td>
                            <div class="btn btn-primary" onclick="view_student_list(<?= $row_account['ID']?>)">View
                            </div>
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
<!-- Modal -->
<div class="modal fade" id="view_student_list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="view_form">
                   <p id="test"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
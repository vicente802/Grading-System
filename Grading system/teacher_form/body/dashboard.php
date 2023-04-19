<br>
<div class="container">
    <div class="table-responsive">
      <div class="card">
        <div class="card-header" style="font-weight:normal">
            Student Record
        </div>
        <div class="card-body">
          
            <br>
            <div class="table-responsive">
                <table class="table table-light" id="table_grading">
                    <thead>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Section</th>
                        <th>Year</th>
                        <th>Action</th>
                    </thead>
                    <tbody style="font-weight:normal;">
                     <?php
                     $student_view = mysqli_query($con,"SELECT * FROM account WHERE Role='Student' AND Status='Active'");
                     if(mysqli_num_rows($student_view)>=1){
                        while($row_student = mysqli_fetch_assoc($student_view)){
                            ?>
                                <tr>
                                    <td><?= $row_student['Lastname'].', '. $row_student['Firstname'].' '.$row_student['Middlename'].'.' ?></td>
                                    <td><?= $row_student['Course'] ?></td>
                                    <td><?= $row_student['Section'] ?></td>
                                    <td><?= $row_student['year'] ?></td>
                                    <td><div class="btn btn-primary" onclick="view_grades(<?= $row_student['ID'] ?>)">View</div></td>   
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
      </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="view_setudent_grades" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="view_form">
                   <p id="grades"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save_changes()">Save changes</button>
            </div>
        </div>
    </div>
</div>
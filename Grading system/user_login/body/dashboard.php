<?php
$checking_account = mysqli_query($con,"SELECT * FROM account WHERE email='$email' OR username='$email'");
if(mysqli_num_rows($checking_account)>=1){
    $row_account = mysqli_fetch_assoc($checking_account);
}

?>
<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            Academic Grades
        </div>
        <div class="card-body">
            <div class="container" style="font-size:17px; justify-content:space-between;">
                <div class="row">
                    <div class="col-sm-5">
                        <label>Fullname: </label>
                        <input type="text" class="form-control" disabled
                            value="<?= $row_account['Lastname'].', '.$row_account['Firstname'].' '.$row_account['Middlename'].'. ' ?>">
                    </div>
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-5">
                        <label>Section: </label>
                        <input type="text" class="form-control" disabled value="<?= $row_account['Section'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <label>Course: </label>
                        <input type="text" class="form-control" disabled value="<?= $row_account['Course'] ?>">
                    </div>
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-2">
                    <label>Year: </label>
                        <input type="text" class="form-control" disabled value="<?= $row_account['year'] ?>">
                    </div>
                </div>
                <br>
                <div class="table-responsive" >
                    <table class="table table-light" id="table_grade">
                        <thead>
                            <th>Subject</th>
                            <th>Midterm</th>
                            <th>Pre-final</th>
                            <th>Final</th>
                            <th>GWA</th>
                            <th>Status</th>
                        </thead>
                        <tbody>      
                        <?php
                        $total_calculated_all_subject=0;
                        $total_of_all_gwa = 0;
                        $count_subject = mysqli_query($con,"SELECT COUNT(subject) AS count_subject FROM subject  WHERE section='".$row_account['Section']."'");
                        $row_count_subject = mysqli_fetch_assoc($count_subject);    
                        $all_grades = mysqli_query($con,"SELECT account.ID,subject.ID,subject.subject,teacher_grading.prefinal,teacher_grading.final,teacher_grading.subject_id,teacher_grading.midterm FROM subject INNER JOIN teacher_grading INNER JOIN account ON subject.ID=teacher_grading.subject_id AND account.ID=teacher_grading.user_id WHERE account.ID='".$row_account['ID']."'");
                            if(mysqli_num_rows($all_grades)){
                                while($row_grades = mysqli_fetch_assoc($all_grades)){
                                    $total_gwa = intval($row_grades['midterm']) + intval($row_grades['prefinal']) +intval($row_grades['final']);
                                    $gwa = 3;
                                    $gwa = $total_gwa / $gwa;
                                    $total_calculated_all_subject = $gwa + $total_calculated_all_subject;
                                    $total_of_all_gwa = $total_calculated_all_subject / $row_count_subject['count_subject']
                                    ?>
                                        <tr>
                                            <td><?= $row_grades['subject'] ?></td>
                                            <td><?= $row_grades['midterm'] ?></td>
                                            <td><?= $row_grades['prefinal'] ?></td>
                                            <td><?= $row_grades['final'] ?></td>
                                            <td><?php if($gwa <=75){ echo round($gwa, 2); }else{  echo round($gwa, 2); }?></td>
                                            <td><?php if($gwa >= 75){ echo'Passed'; }else{ if($row_grades['midterm']==""|| $row_grades['prefinal']==""||$row_grades['final']==""){ echo 'Incomplete'; }else{ if($gwa < 74){ echo 'Failed'; }  } } ?></td>
                                        </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                      <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><div class="d-flex justify-content-end">GWA : <?= round($total_of_all_gwa,2) ?></div></td>
                            <td></td>
                        </tr>
                      </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

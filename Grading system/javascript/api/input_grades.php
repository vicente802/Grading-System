<?php
session_start();
include '../../Connection/db.php';
$data = $_POST;
if(!empty($_POST['grading'])){
    $user_id = $data['user_id'];
    $account = mysqli_query($con,"SELECT subject.ID,subject.subject,account.Section,account.Course,account.ID,account.Lastname,account.Middlename,account.Firstname,teacher_grading.user_id FROM account INNER JOIN teacher_grading INNER JOIN subject ON account.ID=teacher_grading.user_id OR subject.subject=teacher_grading.subject_id WHERE account.ID = '$user_id'");
    if(mysqli_num_rows($account) >=1 ){
        $row_account = mysqli_fetch_assoc($account);
        echo''
        ?>
<input type="hidden" id="user_id" value="<?= $user_id ?>">
<label>Fullname</label>
<input type="text" disabled class="form-control"
    value="<?= $row_account['Lastname'].', '.$row_account['Firstname'].' '.$row_account['Middlename'].'.' ?>">
<label>Course</label>
<input type="text" disabled class="form-control" value="<?= $row_account['Course']?>">
<label>Subject</label>
<select class="form-control" id="subject">
    <option>Select Subject</option>
    <?php 
           $subject = mysqli_query($con,"SELECT * FROM subject WHERE Section='".$row_account['Section']."'");
           if(mysqli_num_rows($subject) >=1){
            while($row_subject = mysqli_fetch_assoc($subject)){
                ?>
    <option value="<?= $row_subject['subject'] ?>"><?= $row_subject['subject'] ?></option>
    <?php
            }
           }
           ?>
</select>
<label>Term</label>
<select class="form-control" id="term">
    <option>Select Term</option>
    <option value="midterm">Midterm</option>
    <option value="Pre-Final">Pre-Final</option>
    <option value="Final">Final</option>
</select>
<label>Grades</label>
<input type="text" class="form-control" id="input_grades" placeholder="Input Grades">
<?php ; 
    }
}
if(!empty($_POST['input_grades_now'])){
    echo 'test';
}
?>
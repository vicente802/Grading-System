<?php
session_start();
include '../../Connection/db.php';
$data = $_POST;
if(!empty($_POST['grading'])){
    $user_id = $data['user_id'];
    $account = mysqli_query($con,"SELECT subject.ID,subject.subject,account.Section,account.Course,account.ID,account.Lastname,account.Middlename,account.Firstname,teacher_grading.midterm,teacher_grading.prefinal,teacher_grading.final,teacher_grading.user_id FROM account INNER JOIN teacher_grading INNER JOIN subject ON account.ID=teacher_grading.user_id OR subject.subject=teacher_grading.subject_id WHERE account.ID = '$user_id'");
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
<select class="form-control" id="subject" onchange="subject(this)">
    <option>Select Subject</option>
    <?php 
           $subject = mysqli_query($con,"SELECT * FROM subject WHERE Section='".$row_account['Section']."'");
           if(mysqli_num_rows($subject) >=1){
            while($row_subject = mysqli_fetch_assoc($subject)){
                ?>
    <option value="<?= $row_subject['ID'] ?>"><?= $row_subject['subject'] ?></option>
    <?php
            }
           }
           ?>
</select>
<div id="term" style="display:none;">
<label>Term</label>
<select class="form-control" onchange="term(this)" >
    <option>Select Term</option>
    <option value="midterm">Midterm</option>
    <option value="pre-final">Pre-Final</option>
    <option value="final">Final</option>
</select>
</div>

<div id="grades_style" style="display:none;">
<label>Grades</label>
<input type="text" class="form-control" id="input_grades" placeholder="Input Grades" value="">
</div>

<?php ; 
    }
}
if(!empty($_POST['input_grades_now'])){
   $user_id = $data['user_id'];
   $subject = $data['subject'];
   $term = $data['term'];
   $input_grades = $data['input_grades'];
   $account = mysqli_query($con,"SELECT * FROM teacher_grading WHERE user_id='$user_id'");
   if(mysqli_num_rows($account) >=1){
    $row = mysqli_fetch_assoc($account);
   }
   $subject = mysqli_query($con,"SELECT * FROM subject WHERE subject='$subject'");
   if(mysqli_num_rows($subject)>=1){
    $row_subject = mysqli_fetch_assoc($subject);
    $subject_id = $row_subject['ID'];
   }
   if($term =='midterm'){
    mysqli_query($con,"UPDATE teacher_grading SET midterm='$input_grades' WHERE user_id='$user_id' AND subject_id='$subject_id'");
   echo ''
   ?>
<tbody id="table_body">
    <td><?= $row['midterm'] ?></td>
    <td><?= $row['prefinal'] ?></td>
    <td><?= $row['final'] ?></td>
</tbody>
<?php ;
    }
   if($term =="pre-final"){
    mysqli_query($con,"UPDATE teacher_grading SET prefinal='$input_grades' WHERE user_id='$user_id' AND subject_id='$subject_id'");
    echo 'success';
    }
   if($term =="final"){
    mysqli_query($con,"UPDATE teacher_grading SET final='$input_grades' WHERE user_id='$user_id' AND subject_id='$subject_id'");
    echo 'success';
    }
    
}
if(!empty($_POST['mid'])){
   $term = $data['term'];
   $subject = $data['subject'];
   $id = $data['id'];
    $account = mysqli_query($con,"SELECT * FROM teacher_grading WHERE user_id='$id' AND subject_id='$subject'");
    if(mysqli_num_rows($account)>=1){
        $row_subject_grades = mysqli_fetch_assoc($account);
        if($row_subject_grades['midterm'] ==""){
            echo' ';
           }else{
            echo $row_subject_grades['midterm'];
           }
       
    }
   }
if(!empty($_POST['prefinal'])){
    $term = $data['term'];
   $subject = $data['subject'];
   $id = $data['id'];
    $account = mysqli_query($con,"SELECT * FROM teacher_grading WHERE user_id='$id' AND subject_id='$subject'");
    if(mysqli_num_rows($account)>=1){
        $row_subject_grades = mysqli_fetch_assoc($account);
       if($row_subject_grades['prefinal'] ==""){
        echo' ';
       }else{
        echo $row_subject_grades['prefinal'];
       }
     
    }
}
if(!empty($_POST['final'])){
    $term = $data['term'];
    $subject = $data['subject'];
    $id = $data['id'];
     $account = mysqli_query($con,"SELECT * FROM teacher_grading WHERE user_id='$id' AND subject_id='$subject'");
     if(mysqli_num_rows($account)>=1){
         $row_subject_grades = mysqli_fetch_assoc($account);
        if($row_subject_grades['final'] ==""){
         echo' ';
        }else{
         echo $row_subject_grades['final'];
        }
      
     }
}
?>
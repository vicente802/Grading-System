<?php
$data = $_POST;
include '../../Connection/db.php';
if(!empty($_POST['course'])){
    $course = $data['course'];
    echo ''
   ?>
<div class="manage_list">
    <p>Course :</p><input type="text" id="input_course" class="form-control" value="">
    <br>
    <div class="d-flex justify-content-end">
        <div class="btn btn-secondary" onclick="submit_course()"><i class="fa fa-plus"> </i> Add</div>
    </div>
    <br>
    <div class="table-responsive" id="table_list" style=" height:150px">
        <table class="table table-light" style="margin-left:0px;">
            <thead>
                <th>List Course</th>
                <th>
                    <div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary"
                            type="button">Search</button></div>
                </th>
            </thead>
            <tbody>
                <?php
                $display_course_list = mysqli_query($con,"SELECT * FROM course");
                if(mysqli_num_rows($display_course_list)>=1){
                    while($row_course_list = mysqli_fetch_assoc($display_course_list)){
                        ?>
                <tr>
                    <td><?= $row_course_list['Course'] ?></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-danger" onclick="drop_course(<?= $row_course_list['ID'] ?>)">Drop</div>
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

<?php
;
}
if(!empty($data['add_course'])){
    $course = $data['input_course'];
    $check_course = mysqli_query($con,"SELECT * FROM course WHERE course='$course'");
    if(mysqli_num_rows($check_course)>=1){
        echo 'exist';
    }else{
        mysqli_query($con,"INSERT INTO `course`(`Course`) VALUES ('".$course."')");
       echo'' ?>
<div class="manage_list">
    <p>Course :</p><input type="text" id="input_course" class="form-control" value="">
    <br>
    <div class="d-flex justify-content-end">
        <div class="btn btn-secondary" onclick="submit_course()"><i class="fa fa-plus"> </i> Add</div>
    </div>
    <br>
    <div class="table-responsive" id="table_list" style=" height:150px">
        <table class="table table-light" style="margin-left:0px;">
            <thead>
                <th>List Course</th>
                <th>
                    <div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary"
                            type="button">Search</button></div>
                </th>
            </thead>
            <tbody>
                <?php
                $display_course_list = mysqli_query($con,"SELECT * FROM course");
                if(mysqli_num_rows($display_course_list)>=1){
                    while($row_course_list = mysqli_fetch_assoc($display_course_list)){
                        ?>
                <tr>
                    <td><?= $row_course_list['Course'] ?></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-danger" onclick="drop_course(<?= $row_course_list['ID'] ?>)">Drop</div>
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
<?php ;
    }
}
if(!empty($_POST['drop_course'])){
    $id = $data['id'];
    mysqli_query($con,"DELETE Course FROM course WHERE ID='$id'");
    echo''
    ?>
<div class="manage_list">
    <p>Course :</p><input type="text" id="input_course" class="form-control" value="">
    <br>
    <div class="d-flex justify-content-end">
        <div class="btn btn-secondary" onclick="submit_course()"><i class="fa fa-plus"> </i> Add</div>
    </div>
    <br>
    <div class="table-responsive" id="table_list" style=" height:150px">
        <table class="table table-light" style="margin-left:0px;">
            <thead>
                <th>List Course</th>
                <th>
                    <div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary"
                            type="button">Search</button></div>
                </th>

            </thead>
            <tbody>
                <?php
                $display_course_list = mysqli_query($con,"SELECT * FROM course");
                if(mysqli_num_rows($display_course_list)>=1){
                    while($row_course_list = mysqli_fetch_assoc($display_course_list)){
                        ?>
                <tr>
                    <td><?= $row_course_list['Course'] ?></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-danger" onclick="drop_course(<?= $row_course_list['ID'] ?>)">Drop</div>
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
<?php ;
}
if(!empty($data['section'])){
    $view_section = $data['section'];
    echo ''
    ?>
<div class="manage_list">
    <p>Section :</p><input type="text" id="input_section" class="form-control" value="">
    <p>Section Assigned</p>
    <select class="form-control" id="input_course">
        <option>Select Course</option>
        <?php    $display_course_list = mysqli_query($con,"SELECT * FROM course");
                if(mysqli_num_rows($display_course_list)>=1){
                    while($row_course_list = mysqli_fetch_assoc($display_course_list)){
                        ?>
        <option value="<?=  $row_course_list['Course'] ?>"><?= $row_course_list['Course']?></option>
        <?php
                    }
                } ?>
    </select>
    <br>
    <div class="d-flex justify-content-end">
        <div class="btn btn-secondary" onclick="submit_section()"><i class="fa fa-plus"> </i> Add</div>
    </div>
    <br>
    <div class="table-responsive" id="table_list" style=" height:150px">
        <table class="table table-light" style="margin-left:0px;">
            <thead>
                <th>List Section</th>
                <th>Assigned Course</th>
                <th>
                    <div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary"
                            type="button">Search</button></div>
                </th>

            </thead>
            <tbody>
                <?php
                  $display_section_list = mysqli_query($con,"SELECT * FROM section ORDER BY course ASC");
                 if(mysqli_num_rows($display_section_list)>=1){
                     while($row_section_list = mysqli_fetch_assoc($display_section_list)){
                         ?>
                <tr>
                    <td><?= $row_section_list['section'] ?></td>
                    <td><?= $row_section_list['course'] ?></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-danger" onclick="drop_section(<?= $row_section_list['ID'] ?>)">Drop
                            </div>
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

<?php
 ;
}
if(!empty($_POST['submit_section'])){
    $section = $data['input_section'];
    $course = $data['input_course'];
   $cheking_section = mysqli_query($con,"SELECT * FROM section WHERE section ='$section' AND course='$course'");
   if(mysqli_num_rows($cheking_section) >=1){
    echo 'exist';
   }else{
    mysqli_query($con,"INSERT INTO `section`(`section`, `course`) VALUES ('".$section."','".$course."')");
    echo ''
    ?>
<div class="manage_list">
    <p>Section :</p><input type="text" id="input_section" class="form-control" value="">
    <p>Section Assigned</p>
    <select class="form-control" id="input_course">
        <option>Select Course</option>
        <?php    $display_course_list = mysqli_query($con,"SELECT * FROM course");
                if(mysqli_num_rows($display_course_list)>=1){
                    while($row_course_list = mysqli_fetch_assoc($display_course_list)){
                        ?>
        <option value="<?=  $row_course_list['Course'] ?>"><?= $row_course_list['Course']?></option>
        <?php
                    }
                } ?>
    </select>
    <br>
    <div class="d-flex justify-content-end">
        <div class="btn btn-secondary" onclick="submit_section()"><i class="fa fa-plus"> </i> Add</div>
    </div>
    <br>
    <div class="table-responsive" id="table_list" style=" height:150px">
        <table class="table table-light" style="margin-left:0px;">
            <thead>
                <th>List Section</th>
                <th>Assigned Course</th>
                <th>
                    <div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary"
                            type="button">Search</button></div>
                </th>

            </thead>
            <tbody>
                <?php
                 $display_section_list = mysqli_query($con,"SELECT * FROM section ORDER BY course ASC");
                 if(mysqli_num_rows($display_section_list)>=1){
                     while($row_section_list = mysqli_fetch_assoc($display_section_list)){
                         ?>
                <tr>
                    <td><?= $row_section_list['section'] ?></td>
                    <td><?= $row_section_list['course'] ?></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-danger" onclick="drop_section(<?= $row_section_list['ID'] ?>)">Drop
                            </div>
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

<?php
 ;
   }
}
if(!empty($_POST['drop_section'])){
    $id = $data['id'];
    mysqli_query($con,"DELETE section FROM section WHERE ID='$id'");
    echo ''
    ?>
<div class="manage_list">
    <p>Section :</p><input type="text" id="input_section" class="form-control" value="">
    <p>Section Assigned</p>
    <select class="form-control" id="input_course">
        <option>Select Course</option>
        <?php    $display_course_list = mysqli_query($con,"SELECT * FROM course");
                if(mysqli_num_rows($display_course_list)>=1){
                    while($row_course_list = mysqli_fetch_assoc($display_course_list)){
                        ?>
        <option value="<?=  $row_course_list['Course'] ?>"><?= $row_course_list['Course']?></option>
        <?php
                    }
                } ?>
    </select>
    <br>
    <div class="d-flex justify-content-end">
        <div class="btn btn-secondary" onclick="submit_section()"><i class="fa fa-plus"> </i> Add</div>
    </div>
    <br>
    <div class="table-responsive" id="table_list" style=" height:150px">
        <table class="table table-light" style="margin-left:0px;">
            <thead>
                <th>List Section</th>
                <th>Assigned Course</th>
                <th>
                    <div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary"
                            type="button">Search</button></div>
                </th>

            </thead>
            <tbody>
                <?php
                 $display_section_list = mysqli_query($con,"SELECT * FROM section ORDER BY course ASC");
                 if(mysqli_num_rows($display_section_list)>=1){
                     while($row_section_list = mysqli_fetch_assoc($display_section_list)){
                         ?>
                <tr>
                    <td><?= $row_section_list['section'] ?></td>
                    <td><?= $row_section_list['course'] ?></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-danger" onclick="drop_section(<?= $row_section_list['ID'] ?>)">Drop
                            </div>
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

<?php
 ;
}

if(!empty($data['subject'])){
    $view_subject = $data['subject'];
    echo ''
    ?>
<div class="manage_list">
    <p>Subject :</p><input type="text" id="input_subject" class="form-control" value="">
    <p>Subject Assigned</p>
    <select class="form-control" id="input_section1">
        <option>Select Section</option>
        <?php    $display_section_list = mysqli_query($con,"SELECT * FROM section");
                if(mysqli_num_rows($display_section_list)>=1){
                    while($row_section_list = mysqli_fetch_assoc($display_section_list)){
                        ?>
        <option value="<?=  $row_section_list['section'] ?>"><?= $row_section_list['section']?></option>
        <?php
                    }
                } ?>
    </select>
    <br>
    <div class="d-flex justify-content-end">
        <div class="btn btn-secondary" onclick="submit_subject()"><i class="fa fa-plus"> </i> Add</div>
    </div>
    <br>
    <div class="table-responsive" id="table_list" style=" height:150px">
        <table class="table table-light" style="margin-left:0px;">
            <thead>
                <th>List Subject</th>
                <th>Assigned Section</th>
                <th>
                    <div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary"
                            type="button">Search</button></div>
                </th>

            </thead>
            <tbody>
                <?php
               $display_subject_list = mysqli_query($con,"SELECT * FROM subject ORDER BY Course ASC");
                 if(mysqli_num_rows($display_subject_list)>=1){
                     while($row_subject_list = mysqli_fetch_assoc($display_subject_list)){
                         ?>
                <tr>
                    <td><?= $row_subject_list['subject'] ?></td>
                    <td><?= $row_subject_list['section'] ?></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-danger" onclick="drop_subject(<?= $row_subject_list['ID'] ?>)">Drop
                            </div>
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

<?php
 ;
}
if(!empty($data['submit_subject_now'])){
    $subject = $data['input_subject'];
    $section = $data['input_section1'];
   
   $cheking_subject = mysqli_query($con,"SELECT * FROM subject WHERE subject ='$subject' AND section='$section'");
   if(mysqli_num_rows($cheking_subject) >=1){
    echo 'exist';
   }else{
    mysqli_query($con,"INSERT INTO `subject`(`subject`, `section`) VALUES ('".$subject."','".$section."')");
    echo ''
    ?>
<div class="manage_list">
    <p>Subject :</p><input type="text" id="input_subject" class="form-control" value="">
    <p>Subject Assigned</p>
    <select class="form-control" id="input_section1">
        <option>Select Section</option>
        <?php    $display_section_list = mysqli_query($con,"SELECT * FROM section");
                if(mysqli_num_rows($display_section_list)>=1){
                    while($row_section_list = mysqli_fetch_assoc($display_section_list)){
                        ?>
        <option value="<?=  $row_section_list['section'] ?>"><?= $row_section_list['section']?></option>
        <?php
                    }
                } ?>
    </select>
    <br>
    <div class="d-flex justify-content-end">
        <div class="btn btn-secondary" onclick="submit_subject()"><i class="fa fa-plus"> </i> Add</div>
    </div>
    <br>
    <div class="table-responsive" id="table_list" style=" height:150px">
        <table class="table table-light" style="margin-left:0px;">
            <thead>
                <th>List Subject</th>
                <th>Assigned Section</th>
                <th>
                    <div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary"
                            type="button">Search</button></div>
                </th>

            </thead>
            <tbody>
                <?php
                 $display_subject_list = mysqli_query($con,"SELECT * FROM subject ORDER BY Course ASC");
                 if(mysqli_num_rows($display_subject_list)>=1){
                     while($row_subject_list = mysqli_fetch_assoc($display_subject_list)){
                         ?>
                <tr>
                    <td><?= $row_subject_list['subject'] ?></td>
                    <td><?= $row_subject_list['section'] ?></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-danger" onclick="drop_subject(<?= $row_subject_list['ID'] ?>)">Drop
                            </div>
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
<?php
 ;
   }
}
if(!empty($data['drop_subject'])){
    $id = $data['id'];
    mysqli_query($con,"DELETE subject FROM subject WHERE ID='$id'");
    echo ''
    ?>
<div class="manage_list">
    <p>Subject :</p><input type="text" id="input_subject" class="form-control" value="">
    <p>Subject Assigned</p>
    <select class="form-control" id="input_section1">
        <option>Select Section</option>
        <?php    $display_section_list = mysqli_query($con,"SELECT * FROM section");
                if(mysqli_num_rows($display_section_list)>=1){
                    while($row_section_list = mysqli_fetch_assoc($display_section_list)){
                        ?>
        <option value="<?=  $row_section_list['section'] ?>"><?= $row_section_list['section']?></option>
        <?php
                    }
                } ?>
    </select>
    <br>
    <div class="d-flex justify-content-end">
        <div class="btn btn-secondary" onclick="submit_subject()"><i class="fa fa-plus"> </i> Add</div>
    </div>
    <br>
    <div class="table-responsive" id="table_list" style=" height:150px">
        <table class="table table-light" style="margin-left:0px;">
            <thead>
                <th>List Subject</th>
                <th>Assigned Section</th>
                <th>
                    <div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary"
                            type="button">Search</button></div>
                </th>

            </thead>
            <tbody>
                <?php
                 $display_subject_list = mysqli_query($con,"SELECT * FROM subject ORDER BY Course ASC");
                 if(mysqli_num_rows($display_subject_list)>=1){
                     while($row_subject_list = mysqli_fetch_assoc($display_subject_list)){
                         ?>
                <tr>
                    <td><?= $row_subject_list['subject'] ?></td>
                    <td><?= $row_subject_list['section'] ?></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <div class="btn btn-danger" onclick="drop_subject(<?= $row_subject_list['ID'] ?>)">Drop
                            </div>
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
<?php
 ;
}
if(!empty($_POST['view_student'])){
    $user_id = $data['id'];
    $account_check = mysqli_query($con,"SELECT * FROM account WHERE ID='$user_id'");
    if(mysqli_num_rows($account_check) >=1)
    {
        $row_account = mysqli_fetch_assoc($account_check);
    }
    echo ''
    ?>
<div class="view_form">
    <label>LRN No.</label>
    <input type="text" class="form-control" id="lrn" value="<?= $row_account['LRN'] ?>">
    <label>Firstname</label>
    <input type="text" class="form-control" value="<?= $row_account['Firstname'] ?>">
    <label>Middlename</label>
    <input type="text" class="form-control" value="<?= $row_account['Middlename'] ?>">
    <label>Lastname</label>
    <input type="text" class="form-control" value="<?= $row_account['Lastname'] ?>">
    <label>Year</label>
    <select class="form-control">
        <option value="<?= $row_account['year'] ?>"><?= $row_account['year'] ?></option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <label>Course</label>
    <select class="form-control">
        <option value="<?= $row_account['Course'] ?>"><?= $row_account['Course'] ?></option>
        <?php
                        $course = mysqli_query($con,"SELECT * FROM course");
                        if(mysqli_num_rows($course)>=1){
                            while($row_course = mysqli_fetch_assoc($course)){
                                ?>
        <option value="<?= $row_course['Course'] ?>"><?= $row_course['Course'] ?></option>
        <?php
                            }
                        }
                        ?>
    </select>
    <label>Section</label>
    <select class="form-control">
        <option value="<?= $row_account['Section'] ?>"><?= $row_account['Section'] ?></option>
        <?php
                        $section = mysqli_query($con,"SELECT * FROM section WHERE course ='".$row_account['Course']."'");
                        if(mysqli_num_rows($section)>=1){
                            while($row_section = mysqli_fetch_assoc($section)){
                                ?>
        <option value="<?= $row_section['section'] ?>"><?= $row_section['section'] ?></option>
        <?php
                            }
                        }
                        ?>
    </select>
                        <label>Account</label><br>
                        <div class="btn btn-danger">Deactivate Account</div>
</div>
</div>
<?php
}
if(!empty($_POST['verify_current_pass'])){
  $id = $data['user_id'];
  $current_pass = $data['current_password'];
 $current_check = mysqli_query($con,"SELECT * FROM account WHERE ID='$id' AND Password='$current_pass'");
 if(mysqli_num_rows($current_check)>=1){
    echo 'success';
 }else{
    echo 'incorrect';
 }
 
}
if(!empty($_POST['change_now'])){
    $pass = $data['new_pass'];
    $id = $data['user_id'];
    mysqli_query($con,"UPDATE account SET Password='$pass' WHERE ID='$id'");
    echo 'success';
}
?>
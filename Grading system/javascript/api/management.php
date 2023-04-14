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
        <table class="table table-light"style="margin-left:0px;">
            <thead>
                <th>List Course</th>
                <th><div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary" type="button">Search</button></div></th>
            </thead>
            <tbody>
                <?php
                $display_course_list = mysqli_query($con,"SELECT * FROM course");
                if(mysqli_num_rows($display_course_list)>=1){
                    while($row_course_list = mysqli_fetch_assoc($display_course_list)){
                        ?>
                        <tr>
                            <td><?= $row_course_list['Course'] ?></td>
                            <td><div class="d-flex justify-content-end"><div class="btn btn-danger" onclick="drop_course(<?= $row_course_list['ID'] ?>)">Drop</div></div></td>
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
        <table class="table table-light"style="margin-left:0px;">
            <thead>
                <th>List Course</th>
                <th><div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary" type="button">Search</button></div></th>
            </thead>
            <tbody>
                <?php
                $display_course_list = mysqli_query($con,"SELECT * FROM course");
                if(mysqli_num_rows($display_course_list)>=1){
                    while($row_course_list = mysqli_fetch_assoc($display_course_list)){
                        ?>
                        <tr>
                            <td><?= $row_course_list['Course'] ?></td>
                            <td><div class="d-flex justify-content-end"><div class="btn btn-danger" onclick="drop_course(<?= $row_course_list['ID'] ?>)">Drop</div></div></td>
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
        <table class="table table-light"style="margin-left:0px;">
            <thead>
                <th>List Course</th>
                <th><div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary" type="button">Search</button></div></th>

            </thead>
            <tbody>
                <?php
                $display_course_list = mysqli_query($con,"SELECT * FROM course");
                if(mysqli_num_rows($display_course_list)>=1){
                    while($row_course_list = mysqli_fetch_assoc($display_course_list)){
                        ?>
                        <tr>
                            <td><?= $row_course_list['Course'] ?></td>
                            <td><div class="d-flex justify-content-end"><div class="btn btn-danger" onclick="drop_course(<?= $row_course_list['ID'] ?>)">Drop</div></div></td>
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
    $view_subject = $data['section'];
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
         <table class="table table-light"style="margin-left:0px;">
             <thead>
                 <th>List Section</th>
                 <th>Assigned Course</th>
                 <th><div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary" type="button">Search</button></div></th>

             </thead>
             <tbody>
                 <?php
                 $display_section_list = mysqli_query($con,"SELECT * FROM section");
                 if(mysqli_num_rows($display_section_list)>=1){
                     while($row_section_list = mysqli_fetch_assoc($display_section_list)){
                         ?>
                         <tr>
                             <td><?= $row_section_list['section'] ?></td>
                             <td><?= $row_section_list['course'] ?></td>
                             <td><div class="d-flex justify-content-end"><div class="btn btn-danger" onclick="drop_section(<?= $row_section_list['ID'] ?>)">Drop</div></div></td>
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
         <table class="table table-light"style="margin-left:0px;">
             <thead>
                 <th>List Section</th>
                 <th>Assigned Course</th>
                 <th><div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary" type="button">Search</button></div></th>

             </thead>
             <tbody>
                 <?php
                 $display_section_list = mysqli_query($con,"SELECT * FROM section");
                 if(mysqli_num_rows($display_section_list)>=1){
                     while($row_section_list = mysqli_fetch_assoc($display_section_list)){
                         ?>
                         <tr>
                             <td><?= $row_section_list['section'] ?></td>
                             <td><?= $row_section_list['course'] ?></td>
                             <td><div class="d-flex justify-content-end"><div class="btn btn-danger" onclick="drop_section(<?= $row_section_list['ID'] ?>)">Drop</div></div></td>
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
         <table class="table table-light"style="margin-left:0px;">
             <thead>
                 <th>List Section</th>
                 <th>Assigned Course</th>
                 <th><div class="d-flex justify-content-end"><input type="search"><button class="btn btn-primary" type="button">Search</button></div></th>

             </thead>
             <tbody>
                 <?php
                 $display_section_list = mysqli_query($con,"SELECT * FROM section");
                 if(mysqli_num_rows($display_section_list)>=1){
                     while($row_section_list = mysqli_fetch_assoc($display_section_list)){
                         ?>
                         <tr>
                             <td><?= $row_section_list['section'] ?></td>
                             <td><?= $row_section_list['course'] ?></td>
                             <td><div class="d-flex justify-content-end"><div class="btn btn-danger" onclick="drop_section(<?= $row_section_list['ID'] ?>)">Drop</div></div></td>
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
?>
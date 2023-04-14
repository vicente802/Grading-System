<div class="container-fluid">
    <div class="container">
    <div class="table table-responsive">
<table class="table table-light" id="example"  >
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Year Level</th>
                <th>Section</th>

            </tr>
        </thead>
        <tbody>
      <?php
     $check_account = mysqli_query($con,"SELECT * FROM account WHERE role='Student' AND Status='Active'");
     if(mysqli_num_rows($check_account) >=1){
        while($row_account = mysqli_fetch_assoc($check_account)){
            ?>
            <tr>
                <td><?= $row_account['Firstname'].' '.$row_account['Middlename'].' '.$row_account['Lastname'] ?></td>
                <td><?= $row_account['Email']?></td>
                <td><?= $row_account['Course'] ?></td>
                <td><?= $row_account['year'] ?></td>
                <td><?= $row_account['Section'] ?></td>
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

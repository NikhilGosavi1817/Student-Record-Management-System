<?php
include "header.php";
session_start();

if (!isset($_SESSION['islogin'])) {
    header('location:loginPage.php');
}

if (isset($_GET['operation'])) {
    if ($_GET['operation'] == 'delete') {
        $id = $_GET['id'];
        $sql = mysqli_query($con, "DELETE FROM `students` WHERE id='$id'");
    }
}
?>


<div class="container ">

    <div class="row" style="margin-top:50px;">
        <div class="col-lg-6 ">

            <a href="add_students.php" class="btn btn-primary">ADD Students</a>
        </div>


        <div class="col-lg-6 ">
            <form method="post">
                <div class="input-group">
                    <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" style="margin-left:100px;height:40px;">


            </form>

        </div>
    </div>
</div>
<div class="row" style="margin-top:30px;">
    <div class=col-lg-12>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Roll no</th>
                    <th>Phone no</th>
                    <th>Email</th>
                    <th>Prn no.</th>
                    <th>Address</th>
                    <th>Fees</th>
                    <th>Fee Receipt</th>
                    <th>Past Qualifications</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>

                <?php

                if (isset($_POST['search'])) {
                    $in = $_POST['search'];
                    $sql = mysqli_query($con, "select * from students where name like '%$in%'");
                } else {
                    $sql = mysqli_query($con, "select * from students");
                }

                $data = array();
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }


                if (!empty($data)) {

                    foreach ($data as $list) {
                ?>
                        <tr>
                            <td><img src="<?php echo strip_tags($list['photo']); ?>" style="width:50px;height:50px;"></td>
                            <td><?php echo strip_tags($list['name']); ?></td>
                            <td><?php echo strip_tags($list['roll_no']); ?></td>
                            <td><?php echo strip_tags($list['phone_no']); ?></td>
                            <td><?php echo strip_tags($list['email']); ?></td>
                            <td><?php echo strip_tags($list['prn']); ?></td>
                            <td><?php echo strip_tags($list['Address']); ?></td>
                            <td><?php echo strip_tags($list['fees']); ?></td>
                         
                            <td><a href="<?php echo strip_tags($list['fee_receipt']); ?>" target="blank"><img src="pdfimage.png" style="width:50px;height:50px;"></a></td>
                            <td><a href="<?php echo strip_tags($list['past_qualifications']); ?>" target="blank"><img src="pdfimage.png" style="width:50px;height:50px;"></a></td>
                            <td><a href="edit.php?id=<?php echo $list['id']; ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="?id=<?php echo $list['id']; ?>&operation=delete"><i class="fas fa-user-times"></i></a></td>
                        </tr>


                    <?php
                    }
                } else {
                    ?>
                    <td colspan="9">
                        <h3 align="center">NO STUDENTS DATA</h3>
                    </td>
                <?php
                }
                ?>



            </tbody>
        </table>
    </div>
</div>
</div>
</body>

</html>


<!-- http://localhost/project/index.php -->
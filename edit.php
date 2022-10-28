<?php

include 'header.php';

$id = $_GET['id'];

$sql = mysqli_query($con, "Select * from students where id='$id'");

$fetch = mysqli_fetch_assoc($sql);


if (isset($_POST['submit'])) {
    $myfile = $_POST['myfile'];
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $prn = $_POST['prn'];
    $address = $_POST['address'];
    $fees = $_POST['fees'];
    $photo = "img/" . $_FILES['photo']['name'];
    $fee_receipt= "pdf/".$_FILES['fee_receipt']['name'];
    $past_qualifications= "pdf/".$_FILES['past_qualifications']['name'];

    $update = mysqli_query($con, "UPDATE `students` SET `photo`='$photo', `name`='$name',`roll_no`='$roll',`phone_no`='$phone',`email`='$email',`prn`='$prn',`address`='$address',`fees`='$fees',`fee_receipt`='$fee_receipt',`past_qualifications`='$past_qualifications' WHERE id='$id'");
    if ($sql) {
        move_uploaded_file($_FILES['photo']['tmp_name'], __DIR__ . '/img/' . $_FILES['photo']['name']);
        header('location:index.php');
    }
    if ($sql) {
        move_uploaded_file($_FILES['fee_receipt']['tmp_name'],__DIR__.'/pdf/'.$_FILES['fee_receipt']['name']);
        header('location:index.php');
    }
    if ($sql) {
        move_uploaded_file($_FILES['past_qualifications']['tmp_name'],__DIR__.'/pdf/'.$_FILES['past_qualifications']['name']);
        header('location:index.php');
    }
    if ($update) {
        header('location:index.php');
    }
}


?>


<div class="container my-5 " style="margin-top:40px;margin-left:560px;">



    <div class="row  justify-content-center">
        <div class="col-lg-4 my-5 ">

            <div class="row">
                <div class-col-lg-12>
                    <h3 align="center">Edit Students Details</h3>
                </div>
            </div>
            <div class="card">

                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="photo">Profile</label>
                            <input name="photo" type="file" class="photo" value="this is a image">
                        </div>

                        <div class="form-group">
                            <label class="control-label mb-1">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter name" value="<?php echo $fetch['name']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label mb-1">Roll No</label>
                            <input type="number" name="roll" rows="4" class="form-control " value="<?php echo $fetch['roll_no']; ?>" placeholder="Enter Rollno" required>
                        </div>

                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Phone no</label>
                            <input name="phone" type="tel" class="form-control " placeholder="Enter Phone_no" value="<?php echo $fetch['phone_no']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Email</label>
                            <input name="email" type="tel" class="form-control " placeholder="Enter Email" value="<?php echo $fetch['email']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Prn No</label>
                            <input name="prn" type="tel" class="form-control " placeholder="Enter Prn" value="<?php echo $fetch['prn']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Address</label>
                            <input name="address" type="text" class="form-control " placeholder="Enter Address" value="<?php echo $fetch['Address']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Fees Status</label>
                            <p> Paid<input type="radio" name="fees" value="Paid" >
                                Unpaid<input type="radio" name="fees" value="Unpaid" >
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="fee_receipt">Fee Receipt</label>
                            <input name="fee_receipt" type="file" class="fee_receipt" value="this is a image">
                        </div>
                        
                        <div class="form-group">
                            <label for="past_qualifications">Past Qualifications</label>
                            <input name="past_qualifications" type="file" class="past_qualifications" value="this is a image">
                        </div>
                </div>
                <div>

                    <div class="card-footer row justify-content-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-dot-circle"></i> Update
                        </button>
                        &nbsp
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
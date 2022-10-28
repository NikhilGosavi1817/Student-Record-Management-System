<?php include "header.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $prn = $_POST['prn'];
    $address = $_POST['address'];
    $fees = $_POST['fees'];
    $photo= "img/".$_FILES['photo']['name'];
    $fee_receipt= "pdf/".$_FILES['fee_receipt']['name'];
    $past_qualifications= "pdf/".$_FILES['past_qualifications']['name'];


    $sql = mysqli_query($con, "INSERT INTO `students`(`photo`, `name`, `roll_no`, `phone_no`, `email`, `prn`, `address`, `fees`, `fee_receipt`,`past_qualifications` ) VALUES ('$photo','$name','$roll','$phone','$email','$prn', '$address','$fees', '$fee_receipt', '$past_qualifications')");

    if ($sql) {
        move_uploaded_file($_FILES['photo']['tmp_name'],__DIR__.'/img/'.$_FILES['photo']['name']);
        move_uploaded_file($_FILES['fee_receipt']['tmp_name'],__DIR__.'/pdf/'.$_FILES['fee_receipt']['name']);
        move_uploaded_file($_FILES['past_qualifications']['tmp_name'],__DIR__.'/pdf/'.$_FILES['past_qualifications']['name']);

       
     header('location:index.php');
     }
  
}
?>


<div class="container my-5 " style="margin-top:40px;margin-left:560px;">


    <div class="row  justify-content-center">
        <div class="col-lg-4 my-5 ">
            <div class="row">
                <div class-col-lg-12>
                    <h3 align="center">Add Students</h3>
                </div>
            </div>
            <div class="card">



                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="photo">Profile</label>
                        <input name="photo" type="file" class="photo" value="this is a image" >
                    </div>
                    

                    <div class="form-group">
                        <label class="control-label mb-1">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name" required>

                    </div>

                    <div class="form-group">
                        <label class="control-label mb-1">Roll No</label>
                        <input type="number" name="roll" class="form-control " placeholder="Enter Roll no" required>

                    </div>

                    <div class="form-group">
                        <label class="control-label mb-1">Phone no</label>
                        <input type="number" name="phone" class="form-control " placeholder="Enter Phone no" value="" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label mb-1">Email</label>
                        <input type="email" name="email" class="form-control " placeholder="Enter Email" value="" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label mb-1">Prn No</label>
                        <input type="number" name="prn" class="form-control " placeholder="Enter Prn no" value="" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label mb-1">Address</label>
                        <textarea type="text" name="address" class="form-control " placeholder="Enter Address" value="" required></textarea>
                    </div>

                    <div class="fees">
                        <label>Fees Status</label>
                        <p>Paid<input type="radio" name="fees"  id="paid" value="Paid" required>  Unpaid<input type="radio" name="fees" id="unpaid"  value="Unpaid" required>
                    </div>

                    <div class="form-group">
                        <label for="fee_receipt">Fee Receipt</label>
                        <input name="fee_receipt" type="file" class="fee_receipt" value="this is a image" >
                    </div>
                    
                    <div class="form-group">
                        <label for="past_qualifications">Past Qualifications</label>
                        <input  name="past_qualifications" type="file" class="past_qualifications" value="this is a image" >
                    </div>


                    <div>
                    </div>

                    <div class="card-footer row justify-content-center ">
                        <button type="submit" name="submit" class="btn btn-primary btn-sm" style="margin-left:160px;">
                            <i class="fas fa-dot-circle"></i> Submit
                        </button>

                    </div>

                   
            </div>
            </form>


            
        </div>
    </div>
</div>
</div>
</div>
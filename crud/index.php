
<?php 

   session_start();

   include("db.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Form</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
         crossorigin="anonymous">
         <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="title">
                Registered Your Details
            </div>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="reg-form">
                <?php
                   if(isset($_SESSION['status']) && $_SESSION!=''){
                    
                     ?>
                     <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> Hey! </strong><?php echo $_SESSION['status']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                     <?php
                     unset($_SESSION['status']);
                   }
                ?>
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fname">Profile Img:</label><br>
                        <input type="file" name="uploadfile" style="width:200px">
                    </div>

                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="fname">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="contact">Phone Number:</label>
                        <input type="text" class="form-control" placeholder="Enter Phone No" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="pwd">
                    </div>
                    <button type="submit" class="btn btn-primary" name="register">Register</button>
                </form>
              </div>
            </div>
        </div>
      </div>
    </body>
</html>

<?php

    if(isset($_POST['register'])){

        $filename = $_FILES["uploadfile"]["name"];

        $tempname = $_FILES["uploadfile"]["tmp_name"];

        $folder = "upload/".$filename;

        move_uploaded_file($tempname,$folder);

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pwd   = $_POST['pwd'];

        
            $query = "INSERT INTO records (img,fname,lname,email,phone,password) values('$folder','$fname','$lname','$email','$phone','$pwd')";

            $data = mysqli_query($con,$query);
    
            if($data){
                echo "<script>alert('Data inserted into Database')</script>";
            }
            else{
                echo "Failed";
            }
        
    }
?>


<?php include("db.php");

   error_reporting(0);

   session_start();

   $id = $_GET['ID'];

   $userprofile = $_SESSION['username'];

   if($userprofile == true){

   }
   else{

    header("location:login.php");
 
   }

   $query = "SELECT * FROM records where id = '$id'";

   $data = mysqli_query($con,$query);

   $total = mysqli_num_rows($data);

   $result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
         crossorigin="anonymous">
         <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="title">
                Update Your Details
            </div>
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="reg-form">
                    <?php
                       $id = $_GET['ID'];

                       $query = "SELECT * FROM records WHERE id = '$id'";

                       $query_run = mysqli_query($con,$query);

                       if(mysqli_num_rows($query_run)>0){

                           foreach($query_run as $row){
                              
                        
                            ?>

                            <form action="#" method="POST">
                                <div class="form-group">
                                 <label for="fname">Profile Img:</label><br>
                                 <img src="<?php echo "upload/".$result['img']; ?>" width="100px" height="100px">
                                 <input type="file" name="upimg" class="fileup">
                                 <input type="hidden" name="updateimg" value="<?php echo $result['img']; ?>" style="width:200px">
                                </div>
                                <div class="form-group">
                                    <label for="fname">First Name:</label>
                                    <input type="text" value="<?php echo $result['fname']; ?>" class="form-control" placeholder="Enter First Name" name="fname">
                                </div>
                                <div class="form-group">
                                    <label for="lname">Last Name:</label>
                                    <input type="text" value="<?php echo $result['lname']; ?>" class="form-control" placeholder="Enter Last Name" name="lname">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" value="<?php echo $result['email']; ?>" class="form-control" placeholder="Enter email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Phone Number:</label>
                                    <input type="text" value="<?php echo $result['phone']; ?>" class="form-control" placeholder="Enter Phone No" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" value="<?php echo $result['password']; ?>" class="form-control" placeholder="Enter password" name="pwd">
                                </div>
                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                            </form>
                            <?php
                           }
                       }
                       else{
                          
                          echo "No record available";
                       }

                    ?>
               
              </div>
            </div>
        </div>
      </div>
    </body>
</html>

<?php
    if(isset($_POST['update'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pwd   = $_POST['pwd'];
       

        $query = "UPDATE records SET fname = '$fname',lname = '$lname',
        email = '$email',phone = '$phone',password = '$pwd' WHERE id = '$id'";

        $data = mysqli_query($con,$query);

        if($data){
            echo "<script>alert('Record Updated Succesfully')</script>";
            ?>

            <meta http-equiv = "refresh" content = "0; url = 
            http://localhost:8080/crud/display.php" />


            <?php
        }
        else{
            echo "<script>alert('Failed to Update!')</script>";
        }
    }
?>



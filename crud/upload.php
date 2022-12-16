<?php

   session_start();

   error_reporting(0);
?>

<!<!DOCTYPE html>
<html>
    <head>
        <title>File Upload</title>
    </head>
    <body>
        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="file" name="uploadfile"><br><br>
            <input type="submit" name="submit" value="Upload File">
        </form>
    </body>
</html>

<?php

  include("db.php");

  if(isset($_POST['register'])){

     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $pwd = $_POST['pwd'];
     $image = $_FILES['uploadfile']['name'];

     $folder = ("upload/".$_FILES['uploadfile']['name']);

    //  $phone = strlen ($_POST ["phone"]);
    //  $length = strlen ($phone);  

     $allowed_extension = array('jpg','png','jpeg','gif');
     $filename = $_FILES['uploadfile']['name'];
     $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

     if(empty($image) || empty($fname) || empty($lname) || empty($email) || empty($phone)
     || empty($pwd)){

        $_SESSION['status'] = "All fields are required!";

        header("location:index.php");
     }
     else if(!preg_match ("/^[a-zA-z]*$/", $fname)){

        $_SESSION['status'] = "Only alphabets & whitespace are allowed.";

        header("location:index.php");

     }
     else if(!preg_match ("/^[0-9]*$/", $phone)){

        
        $_SESSION['status'] = "Only numbers are allowed in contact!";

        header("location:index.php");

     }
     else if(!in_array($file_extension, $allowed_extension)){

        $_SESSION['status'] = "Only JPG, PNG, JPEG and GIF";

        header("location:index.php");
     }
    //  else if($_FILES['uploadfile']['name'] > 5000000){

    //     $_SESSION['status'] = "Img size exeeds 5MB";

    //     header("location:index.php");
    //  }
     else{

            if(file_exists("upload/".$_FILES['uploadfile']['name'])){

            $filename = $_FILES['uploadfile']['name'];

            $_SESSION['status'] = " Img already exists ".$filename;

            header("location:index.php");

            }
            else{


            $query = "INSERT INTO records (img,fname,lname,email,phone,password) values('$folder','$fname','$lname','$email','$phone','$pwd')";

            $query_run = mysqli_query($con,$query);


            if($query_run){

                move_uploaded_file($_FILES["uploadfile"]["tmp_name"],"upload/".
                $_FILES["uploadfile"]["name"]);

                $_SESSION['status'] = "Img uploaded succesfully";

                header("location:index.php");
            }
            else{

                $_SESSION['status'] = "Img not uploaded";

                header("location:index.php");
            }
       } 
       
    }
  }

  if(isset($_POST['update'])){

    $id = $_POST['id'];
    $oldimg = $_POST['updateimg'];
    $newimg = $_FILES['upimg']['name'];

    if($newimg!=''){

        $update_filename = $_FILES['upimg']['name'];
    }
    else{
 
        $update_filename = $oldimg;
    }

    if(file_exists("upload/".$_FILES['upimg']['name'])){

        $filename = $_FILES['upimg']['name'];

        $_SESSION['status'] = " Img already exists ".$filename;

        header("location:update.php");

    }
    else{

        $query = "UPDATE records SET img = '$update_filename' WHERE id = '$id'";

        $query_run = mysqli_query($con,$query);

        if($query_run){

            if($_FILES['upimg']['name']!=''){
               
                move_uploaded_file($_FILES["uploadfile"]["tmp_name"],"upload/".
                $_FILES["upimg"]["name"]);

                unlink("upload/".$oldimg);
            }

            $_SESSION['status'] = "Img Updated Succesfully";

            header("location:display.php");
        }
        else{

            $_SESSION['status'] = "Img Not Updated";

            header("location:update.php");
        }
    }


  }

   echo "<img src='$folder' height='100px' width='100px'>";
?>


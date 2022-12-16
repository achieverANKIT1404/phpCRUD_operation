<?php
   include("db.php");

   $id = $_GET['ID'];

   $query = "DELETE FROM records WHERE id = '$id'";

   $data = mysqli_query($con,$query);

   if($data){

    echo "<script>alert('Record Deleted Succesfully')</script>";

    ?>

      <meta http-equiv = "refresh" content = "0; url = 
            http://localhost:8080/crud/display.php" />

    <?php
   }
   else{
    echo "<script>alert('Failed to Delete!')</script>";

   }
?>
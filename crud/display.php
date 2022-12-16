<?php

   session_start();

?>

<html>
    <head>
        <title>Display</title>
        <style>
            body{
                background-color: rgb(223, 158, 38);
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            table{
                background-color: white ;
                border-spacing: 20px;
                border-radius: 8px;
                
            }
            h2{
                color: rgb(11, 65, 109);
                font-size: 30px;
                margin-top: 20px;
            }
            th{
                border-radius: 6px;
            }
            td{
                text-align: center;
                border-radius: 6px;
            }
            a{
                margin-right: 5pc;
            }
            input{
                
            }
            td:hover{
                /* background-color: rgb(223, 158, 38); */
                color: rgb(11, 65, 109);
                transition ease in 0.5s;
                font-size: 17px;
                font-weight: bold;
            }
            .update, .delete{
                background-color: green;
                color: whitesmoke;
                border: 0;
                outline: none;
                border-radius: 5px;
                height: 22px;
                width: 70px;
                font-weight: bold;
                cursor: pointer;
                align-items: center;
            }
            .delete{
                background-color: red;
                width: 68px;
                margin-left: -80px;
            }
            .logout{
                background-color: rgb(51, 101, 218);
                color: white;
                border: 0;
                outline: none;
                border-radius: 5px;
                height: 25px;
                width: 80px;
                font-weight: bold;
                cursor: pointer;
                margin-bottom: 10px;
                margin-left: 85%;
            }
            .new{
                background-color: rgb(51, 101, 218);
                color: white;
                border: 0;
                outline: none;
                border-radius: 5px;
                height: 40px;
                width: 100px;
                font-weight: bold;
                cursor: pointer;
                margin-top: 18px;
                margin-left: 80px;
                /* align-items: center; */
            }
        </style>
    </head>
</html>

<?php
   include("db.php");

   $userprofile = $_SESSION['username'];

   if($userprofile == true){

   }
   else{

    header('location:login.php');

   }

   $query = "SELECT * FROM records";

   $data = mysqli_query($con,$query);

   $total = mysqli_num_rows($data);

  
   if($total!=0){

    ?>

    <h2 align="center">Client Records</h2>

    <a href="logout.php"><input type="submit" name="" value="Logout" class="logout"></a>

    <center>

    <table border="1px" width="92%">
        <tr>
        <th width="3%">ID</th>
        <th width="8%">Profile</th>
        <th width="8%">First Name</th>
        <th width="8%">Last Name</th>
        <th width="20%">Email ID</th>
        <th width="15%">Phone Number</th>
        <th width="20%">Actions</th>
        </tr>

    <?php

    while($result = mysqli_fetch_assoc($data)){
        echo " <tr>
               <td>".$result['id']."</td>
               <td><img src='".$result['img']." ' height='100px' width='100px'></td>
               <td>".$result['fname']."</td>
               <td>".$result['lname']."</td>
               <td>".$result['email']."</td>
               <td>".$result['phone']."</td>

               <td><a href='update.php?ID=$result[id]'><input type='submit' 
               value='Edit' class='update'></a>

               <a href='delete.php?ID=$result[id]'><input type='submit' 
               value='Delete' class='delete' onclick='return checkdelete()'></a></td>
               </tr>
               
               ";
    }
   }
   else{
    echo "No records found";
   }
?>
</table>

 <a href="index.php"><input type="submit" name="" value="New Client" class="new"></a>

</center>

<script>
   function checkdelete(){
    return confirm('Are you sure want to delete this record?');
   }
</script>
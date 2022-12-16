<!doctype html>
<html>
  <head>
    <title>Search</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            background-color: rgb(223, 158, 38);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
         table{
                background-color: white ;
                border-spacing: 20px;
                border-radius: 8px;

            }
            th{
                border-radius: 6px;
            }
            td{
                text-align: center;
                border-radius: 6px;
            }
            .card-title{
                margin-top: 30px;
                text-align: center;
                color: rgb(11, 65, 109);
                font-size: 30px;
            }
            .form-control{
                margin-left: 21%;
                border: 0;
                outline: none;
                border-radius: 5px;
                height: 30px;
                width: 200px;
                padding-left: 5px;
                margin-bottom: 7px;

            }
            .btn{
                margin-left: 21%;
                margin-bottom: 30px;
                background-color: rgb(51, 101, 218);
                color: white;
                border: 0;
                outline: none;
                border-radius: 5px;
                height: 25px;
                width: 70px;
                font-weight: bold;
                cursor: pointer;
            }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Search Your Records</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                             <input type="text" name="filter-value" class="form-control" placeholder="Serach Records">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="search" class="btn">Search</button>
                        </div>
                     </div> 
                    </form>

                    <center>
                <table border="1px" width="59%">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email ID</th>
                    <th scope="col">Phone Number</th>
                    </tr>

                    <?php

                        include("db.php");
                        if(isset($_POST['search'])){

                            $search = $_POST['filter-value'];

                            $query = "SELECT * FROM records WHERE CONCAT(fname,lname,email,phone) LIKE '%$search%'";

                            $data = mysqli_query($con,$query);

                            if(mysqli_num_rows($data) > 0){
                                
                                while($row=mysqli_fetch_array($data)){
                                    

                                    ?>
                                    <tr>
                                    <td scope="row"><?php echo $row['id']?></td>
                                    <td scope="row"><?php echo $row['fname'];?></td>
                                    <td scope="row"><?php echo $row['lname']; ?></td>
                                    <td scope="row"><?php echo $row['email']; ?></td>
                                    <td scope="row"><?php echo $row['phone']; ?></td>
                                </tr>
                                <?php
                                }
                            }
                            else{
                                echo "No record found!";
                            }
                        }
                        else{

                            ?>

                            <tr>
                                <td colspan="5">No Record Found</td>
                            </tr>

                            <?php
                        }
                    ?>
                    

                </table>
                </center>
                </div>
            </div>
        </div>
    </div>
    
  </body>
</html>
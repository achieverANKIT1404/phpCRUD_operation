<?php

   session_start();

?>

<!DOCTYPE html>
<html>
    <head>
         <title>Login</title>
         <link rel="stylesheet" href="login-style.css">
    </head>
    <body>
      <div class="center">
        <h1>Login</h1>

        <form action="#" method="POST">
        <div class="form">
            <input type="text" name="username" class="textfield" placeholder="Username or Email">
            <input type="password" name="password" class="textfield" placeholder="Password">

          <div class="forgotpass"><a href="#" class="link" onclick="message()">
          Forgot Password ?</a></div>

          <input type="submit" name="login" value="Login" class="btn">

          <div class="signup">New User ? <a href="#" class="link">SignUp Here</a></div>
        </div>
      </div>
      </form>

      <script>
        function message(){
            alert("Are you want to change or update password ?");
        }
      </script>
</body>
</html>

<?php

  include("db.php");

  if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM records WHERE email = '$username' && password = '$password'";

    $data = mysqli_query($con,$query);

    $total = mysqli_num_rows($data);

    if($total == 1){

      echo "<script>alert('Login Succesfully')</script>";

        
        $_SESSION['username'] = $username;
        
        header('location:display.php');
    }
    else{

        echo "<script>alert('Please enter correct username or password')</script>";
    }
  }

?>

<?php
  session_start();
  include "coeDB.php";


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>COE Login</title>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="borderButton.css">



</head>
<body>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  <div class="jumbotron jumbotron-fluid bg-primary">
    <div class="container">
      <h1 class="text-center">RESULT MANAGEMENT SYSTEM</h1>

      <p></p>
    </div>
  </div>


  <div class="container ">

    <div class="border border-secondery rounded-sm p-4">
      <h2>COE Login</h2>

      <br>

      <form action="" method = "POST">
        <div class="form-group">
          <label for="userName">User Name:</label>
          <input type="text" class="form-control" id="userName" placeholder="Enter User Name" name="userName">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
        </div>
        <div class="form-group form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
          </label>
        </div>


        <br>

        <button type="submit" class="btn btn-primary" name="coeLogin" value="Login">Login</button>
        <a href="../firstPage/firstPage.php" class="btn btn-primary" style="margin-left: 20px;">Go Home</a>
        <a href="coeSignup.php" class="btn btn-primary" style="margin-left: 20px;">Sign Up First</a>
      </form>



      <?php

        if(isset($_POST["coeLogin"]))

        {


          $user_name = $_POST["userName"];
          $pass = $_POST["pswd"];



          $query = "select * from coe_signup where username= '$user_name' AND password = '$pass' ";



          $check = mysqli_query($con,$query);


          if(mysqli_num_rows($check) > 0)
          {
            $ses = mysqli_fetch_assoc($check);
            session_start();
            $_SESSION['coe_username'] = $user_name;
            $_SESSION['c_id'] = $ses['id'];


            echo "

              <script>

                alert ('You are Successfully Logged In!');

                window.location.href='coeOffice.php';

              </script>

            ";
          }

          else{

            echo "
              <script>

                alert ('Your Email or Password is not Correct !');
                window.location.href='coeLogin.php';

              </script>

              ";
          }




        }



       ?>





    </div>
</div>




</body>
</html>

<?php

  include "signUpTeachersDB.php";

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up Teachers</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="css\borderButton.css">


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

    <div class="border border-secondery rounded-sm p-5">
      <h2>Teachers Sign Up</h2>

      <br>

      <form action="" method = "POST">
        <div class="form-group">
          <label for="fullName">Full Name:</label>
          <input type="text" class="form-control" id="fullName" placeholder="Enter Full Name" name="fullName">
        </div>
        <div class="form-group">
          <label for="dept">Department:</label>
          <input type="text" class="form-control" id="dept" placeholder="Enter Department Name" name="dept">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label for="userName">User Name:</label>
          <input type="text" class="form-control" id="userName" placeholder="Enter User Name" name="userName">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="npwd" placeholder="Enter password" name="npswd">
        </div>
        <div class="form-group">
          <label for="pwd">Confirm Password:</label>
          <input type="password" class="form-control" id="cpwd" placeholder="Confirm password" name="cpswd">
        </div>


        <br>

        <button type="submit" class="btn btn-primary" name = "teachersSubmit" value="submit">Submit</button>
      </form>


      <?php

        if(isset($_POST["teachersSubmit"]))
        {
          $name = $_POST["fullName"];
          $dept = $_POST["dept"];
          $email = $_POST["email"];
          $user_name = $_POST["userName"];
          $password = $_POST["npswd"];
          $confirm_password = $_POST["cpswd"];




          if($password == $confirm_password)
          {
            $query = "select * from teachers_signup where email = '$email' ";

            $query_check = mysqli_query($con,$query);

            if($query_check){

              if(mysqli_num_rows($query_check) > 0)
              {
                echo "

                  <script>
                    alert (' Email Already In Use');
                    window.location.href= 'teachersLogin.php';
                  </script>

                ";
              }

              else{
                // echo "<pre>";
                // print_r($_POST);
                // exit();
               $insertion = "insert into teachers_signup(name,dept,email,user_name,password,confirm_password) values ('$name','$dept','$email','$user_name','$password','$confirm_password')";





                $run = mysqli_query($con,$insertion);


                if($run){

                  echo "

                    <script>
                      alert (' You Are Successfully Registered!');
                      window.location.href='teachersLogin.php';
                    </script>

                  ";
                }

                else{
                  // run else
                  echo "

                    <script>
                      alert ('Connection Failed!');
                      window.location.href='teachersSignUp.php';
                    </script>

                  ";

                }




              }
            }
            else{
              //query check
              echo "

                <script>
                  alert ('Database Error!');
                  window.location.href='teachersSignUp.php';
                </script>

              ";
            }

          }
          else{

            echo "
              <script>
                alert ('Password and Confirm-Password Does Not Match!');
                window.location.href='teachersSignUp.php';
              </script>
            ";
          }


        }



       ?>






    </div>
</div>

</body>
</html>

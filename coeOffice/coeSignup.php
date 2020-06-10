<?php

  include "coeDB.php";

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up COE</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="borderButton.css">


</head>
<body>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




  <div class="jumbotron jumbotron-fluid bg-primary">
    <div class="container">
      <h1 class="text-center">COE Sign up Page</h1>

      <p></p>
    </div>
  </div>


  <div class="container ">

    <div class="border border-secondery rounded-sm p-5">
      <h2>COE Sign Up</h2>

      <br>

      <form action="" method = "POST">

        <div class="form-group">
          <label for="fullName">Full Name:</label>
          <input type="text" class="form-control" id="fullName" placeholder="Enter Full Name" name="fullName">
        </div>
        <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="text" class="form-control" id="phone" placeholder="Enter Your Phone" name="phone">
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
        </div>
        <div class="form-group">
          <label for="userName">User Name:</label>
          <input type="text" class="form-control" id="userName" placeholder="Enter a User Name" name="userName">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="npwd" placeholder="Enter password" name="npswd">
        </div>
        <div class="form-group">
          <label for="pwd">Confirm Password:</label>
          <input type="password" class="form-control" id="cpwd" placeholder="Confirm password" name="cpswd">
        </div>
        <div class="form-group">
          <p>Select your gender</p>
          <input type="radio" name="gender" value="male"> <label for="">Male</label>
          <input type="radio" name="gender" value="female"> <label for="">Female</label>
        </div>


        <br>

        <button type="submit" class="btn btn-primary" name = "coeSubmit" value="submit">Submit</button>
        <a href="../firstPage/firstPage.php" class="btn btn-primary" style="margin-left: 20px;">Go Home</a>
        <a href="coeLogin.php" class="btn btn-primary" style="margin-left: 20px;">Login</a>
      </form>


      <?php

        if(isset($_POST["coeSubmit"]))
        {

          $name = $_POST["fullName"];
          $phone = $_POST["phone"];
          $email = $_POST["email"];
          $username = $_POST["userName"];
          $password = $_POST["npswd"];
          $confirm_password = $_POST["cpswd"];
          $gender = $_POST["gender"];


        if(!empty($name)  && !empty($phone) && !empty($email) && !empty($username)&& !empty($password) && !empty($confirm_password) && !empty($gender)) {





          if($password == $confirm_password)
          {

            $query1 = "select * from coe_signup where email = '$email'";
            $query2 = "select * from coe_signup where username = '$username'";

            $query_check1 = mysqli_query($con,$query1);
            $query_check2 = mysqli_query($con,$query2);



            if($query_check1 && $query_check2){

              if(mysqli_num_rows($query_check1) > 0)
              {
                echo "

                  <script>
                    alert (' Email Already In Use');
                    window.location.href= 'coeSignup.php';
                  </script>

                ";
              }


              if(mysqli_num_rows($query_check2) > 0)
              {
                echo "

                  <script>
                    alert (' This Username has already been taken!');
                    window.location.href= 'coeSignup.php';
                  </script>

                ";
              }

              else{
                // echo "<pre>";
                // print_r($_POST);
                // exit();
               $insertion = "insert into coe_signup(name,phone,email,username,password,gender) values ('$name','$phone','$email','$username','$password','$gender')";





                $run = mysqli_query($con,$insertion);


                if($run){

                  echo "

                    <script>
                      alert (' You Are Successfully Registered!');
                      window.location.href='coeLogin.php';
                    </script>

                  ";
                }

                else{
                  // run else
                  echo "

                    <script>
                      alert ('Connection Failed!');
                      window.location.href='coeSignup.php';
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
                  window.location.href='coeSignup.php';
                </script>

              ";
            }

          }
          else{

            echo "
              <script>
                alert ('Password and Confirm-Password Does Not Match!');
                window.location.href='coeSignup.php';
              </script>
            ";
          }

        }


        else{
          echo "
            <script>
              alert ('Information can not be Empty!');
              window.location.href='coeSignup.php';
            </script>
          ";
        }


        }



       ?>






    </div>
</div>

</body>
</html>

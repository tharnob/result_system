<?php

  session_start();


  if(!isset($_SESSION['coe_username'])){

    header('Location: coeLogin.php');
    exit();
  }

  include "coeDB.php";

  $deafault = $_SESSION['coe_username'];

  $coe_query = mysqli_query($con,"SELECT * FROM coe_signup WHERE username = '$deafault'");

  $coe_fetch = mysqli_fetch_assoc($coe_query);

  $problem = $coe_fetch['password'];






 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Password Change</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="borderButton.css">


</head>
<body>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




  <div class="jumbotron jumbotron-fluid bg-primary">
    <div class="container">
      <h1 class="text-center">Password Change</h1>

      <p></p>
    </div>
  </div>


  <div class="container ">

    <div class="border border-secondery rounded-sm p-5">
      <h2>Password Change</h2>

      <br>

      <form action="" method = "POST">
        <div class="form-group">
          <label for="cp">Current Password</label>
          <input type="text" class="form-control" id="cp" placeholder="Enter Current Password" name="cp">
        </div>
        <div class="form-group">
          <label for="np">New Password:</label>
          <input type="text" class="form-control" id="fullName" placeholder="Enter New Password" name="np">
        </div>

        <div class="form-group">
          <label for="cncp">Confirm Password:</label>
          <input type="text" class="form-control" id="cncp" placeholder="Confirm Password" name="cncp">
        </div>



        <br>

        <button type="submit" class="btn btn-primary" name = "passwordSubmit" value="submit">Submit</button>
      </form>


      <?php

        if(isset($_POST["passwordSubmit"]))
        {
          $cp = $_POST["cp"];
          $np = $_POST["np"];
          $cncp = $_POST["cncp"];



        if(!empty($cp) && !empty($np) && !empty($cncp)) {



            if($np == $cncp){






              if($cp == $problem)
              {

                $insertion = "UPDATE coe_signup SET password = '$np'  WHERE username = '$deafault' LIMIT 1";
                $run = mysqli_query($con,$insertion);

                if($run){


                  echo "

                    <script>
                      alert (' Password is Successfully UPDATED!');
                      window.location.href='logout.php';
                    </script>

                  ";
                }

                else{

                  echo "

                    <script>
                      alert (' Connection Error!!');
                      window.location.href='changePassword.php';
                    </script>

                  ";
                }


              }


              else{

                echo "

                  <script>
                    alert (' Your current Password is worng!');
                    window.location.href='changePassword.php';
                  </script>

                ";
              }






            }
            else{

              echo "

                <script>
                  alert ('Your New Passwords did not match');
                  window.location.href='changePassword.php';
                </script>

              ";
            }

        }


        else{
          echo "
            <script>
              alert ('Information can not be Empty!');
              window.location.href='changePassword.php';
            </script>
          ";
        }


        }






       ?>






    </div>
</div>

</body>
</html>

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

  $problem = $coe_fetch['id'];

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
      <h1 class="text-center">COE Update Page</h1>

      <p></p>
    </div>
  </div>


  <div class="container ">

    <div class="border border-secondery rounded-sm p-5">
      <h2>COE Update Information</h2>

      <br>

      <form action="" method = "POST">

        <div class="form-group">
          <label for="fullName">Full Name:</label>
          <input type="text" class="form-control" id="fullName" placeholder="Enter Full Name" name="fullName" value="<?php echo  $coe_fetch['name']?>">
        </div>
        <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="text" class="form-control" id="phone" placeholder="Enter Your Phone" name="phone" value="<?php echo  $coe_fetch['phone']?>">
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo  $coe_fetch['email']?>">
        </div>
        <div class="form-group">
          <label for="userName">User Name:</label>
          <input type="text" class="form-control" id="userName" placeholder="Enter a User Name" name="userName" value="<?php echo  $coe_fetch['username']?>">
        </div>

        <div class="form-group">
          <p>Select your gender</p>
          <input type="radio" name="gender" value="male"> <label for="">Male</label>
          <input type="radio" name="gender" value="female"> <label for="">Female</label>
        </div>


        <br>

        <button type="submit" class="btn btn-primary" name = "coeSubmit" value="submit">Submit</button>

      </form>


      <?php

        if(isset($_POST["coeSubmit"]))
        {

          $name = $_POST["fullName"];
          $phone = $_POST["phone"];
          $email = $_POST["email"];
          $username = $_POST["userName"];
          $gender = $_POST["gender"];


        if( !empty($name) && !empty($phone) && !empty($email) && !empty($username)&& !empty($gender)) {



            $query1 = "select * from coe_signup where email = '$email'";
            $query2 = "select * from coe_signup where username = '$username'";

            $query_check1 = mysqli_query($con,$query1);
            $query_check2 = mysqli_query($con,$query2);



            if($query_check1 && $query_check2){

              if(mysqli_num_rows($query_check1) > 1 || (mysqli_num_rows($query_check1) == 1 && $email != $coe_fetch['email']))
              {
                echo "

                  <script>
                    alert (' Email Already In Use');
                    window.location.href= 'update.php';
                  </script>

                ";
              }


              elseif(mysqli_num_rows($query_check2) > 1 || (mysqli_num_rows($query_check2) == 1 && $username != $coe_fetch['username']))
              {
                echo "

                  <script>
                    alert (' This Username has already been taken!');
                    window.location.href= 'update.php';
                  </script>

                ";
              }

              else{
                // echo "<pre>";
                // print_r($_POST);
                // exit();

               $insertion = "UPDATE coe_signup SET name = '$name',phone = '$phone',email = '$email',username = '$username',gender = '$gender' WHERE id = '$problem' LIMIT 1";




                $run = mysqli_query($con,$insertion);


                if($run){

                  $_SESSION['coe_username'] = $username;



                  echo "

                    <script>
                      alert (' Data Are Successfully UPDATED!');
                      window.location.href='coeOffice.php';
                    </script>

                  ";
                }

                else{
                  // run else
                  echo "

                    <script>
                      alert ('Connection Failed!');
                      window.location.href='update.php';
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
                  window.location.href='coeOffice.php';
                </script>

              ";
            }

        }


        else{
          echo "
            <script>
              alert ('Information can not be Empty!');
              window.location.href='update.php';
            </script>
          ";
        }


        }



       ?>






    </div>
</div>

</body>
</html>

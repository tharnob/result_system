<?php

  session_start();


  if(!isset($_SESSION['username'])){

    header('Location: teacherLogin.php');
    exit();
  }




  include "teacherDB.php";

  $deafault = $_SESSION['username'];

  $teacher_query = mysqli_query($con,"SELECT * FROM teacher_signup WHERE username = '$deafault'");

  $teacher_fetch = mysqli_fetch_assoc($teacher_query);

  $problem = $teacher_fetch['tid'];

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up Teachers</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="borderButton.css">


</head>
<body>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




  <div class="jumbotron jumbotron-fluid bg-primary">
    <div class="container">
      <h1 class="text-center">Teacher Update Page</h1>

      <p></p>
    </div>
  </div>


  <div class="container ">

    <div class="border border-secondery rounded-sm p-5">
      <h2>Teacher Update Information</h2>

      <br>

      <form action="" method = "POST">

        <div class="form-group">
          <label for="fullName">Full Name:</label>
          <input type="text" class="form-control" id="fullName" placeholder="Enter Full Name" name="fullName" value="<?php echo  $teacher_fetch['name']?>">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Department:</label>
          <select class="form-control" id="exampleFormControlSelect1" name='dept'>

            <option selected disabled>Department</option>
            <option value="CSE">CSE</option>
            <option value="CE">CE</option>
            <option value="EEE">EEE</option>
            <option value="BBA">BBA</option>
            <option value="ENGLISH">ENGLISH</option>
            <option value="LLB">LLB</option>
          </select>
        </div>
        <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="text" class="form-control" id="phone" placeholder="Enter Your Phone" name="phone" value="<?php echo  $teacher_fetch['phone']?>">
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo  $teacher_fetch['email']?>">
        </div>
        <div class="form-group">
          <label for="userName">User Name:</label>
          <input type="text" class="form-control" id="userName" placeholder="Enter a User Name" name="userName" value="<?php echo  $teacher_fetch['username']?>">
        </div>

        <div class="form-group">
          <p>Select your gender</p>
          <input type="radio" name="gender" value="male"> <label for="">Male</label>
          <input type="radio" name="gender" value="female"> <label for="">Female</label>
        </div>


        <br>

        <button type="submit" class="btn btn-primary" name = "teacherSubmit" value="submit">Submit</button>
      </form>


      <?php

        if(isset($_POST["teacherSubmit"]))
        {

          $name = $_POST["fullName"];
          $department = $_POST["dept"];
          $phone = $_POST["phone"];
          $email = $_POST["email"];
          $username = $_POST["userName"];
          $gender = $_POST["gender"];


        if( !empty($name) && !empty($department) && !empty($phone) && !empty($email) && !empty($username)&& !empty($gender)) {



            $query1 = "select * from teacher_signup where email = '$email'";
            $query2 = "select * from teacher_signup where username = '$username'";

            $query_check1 = mysqli_query($con,$query1);
            $query_check2 = mysqli_query($con,$query2);



            if($query_check1 && $query_check2){

              if(mysqli_num_rows($query_check1) > 1 || (mysqli_num_rows($query_check1) == 1 && $email != $teacher_fetch['email']))
              {
                echo "

                  <script>
                    alert (' Email Already In Use');
                    window.location.href= 'update.php';
                  </script>

                ";
              }


              elseif(mysqli_num_rows($query_check2) > 1 || (mysqli_num_rows($query_check2) == 1 && $username != $teacher_fetch['username']))
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

               $insertion = "UPDATE teacher_signup SET name = '$name',department = '$department',phone = '$phone',email = '$email',username = '$username',gender = '$gender' WHERE tid = '$problem' LIMIT 1";




                $run = mysqli_query($con,$insertion);


                if($run){

                  $_SESSION['username'] = $username;



                  echo "

                    <script>
                      alert (' Data Are Successfully UPDATED!');
                      window.location.href='teacher.php';
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
                  window.location.href='teacher.php';
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

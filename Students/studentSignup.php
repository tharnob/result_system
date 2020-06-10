<?php

  include "studentDB.php";

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up Students</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="borderButton.css">


</head>
<body>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




  <div class="jumbotron jumbotron-fluid bg-primary">
    <div class="container">
      <h1 class="text-center">Student Sign up Page</h1>

      <p></p>
    </div>
  </div>


  <div class="container ">

    <div class="border border-secondery rounded-sm p-5">
      <h2>Student Sign Up</h2>

      <br>

      <form action="" method = "POST">
        <div class="form-group">
          <label for="id">ID:</label>
          <input type="text" class="form-control" id="id" placeholder="Enter Your ID" name="id">
        </div>
        <div class="form-group">
          <label for="fullName">Full Name:</label>
          <input type="text" class="form-control" id="fullName" placeholder="Enter Full Name" name="fullName">
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
          <label for="exampleFormControlSelect2">Select Semister</label>
          <select class="form-control" id="exampleFormControlSelect2" name="semister">
            <option selected disabled>Chose Semister</option>
            <option value="Level 1, Term 1">Level 1, Term 1</option>
            <option value="Level 1, Term 2">Level 1, Term 2</option>
            <option value="Level 2, Term 1">Level 2, Term 1</option>
            <option value="Level 2, Term 2">Level 2, Term 2</option>
            <option value="Level 3, Term 1">Level 3, Term 1</option>
            <option value="Level 3, Term 2">Level 3, Term 2</option>
            <option value="Level 4, Term 1">Level 4, Term 1</option>
            <option value="Level 4, Term 2">Level 4, Term 2</option>

          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect3">Select Section</label>
          <select class="form-control" id="exampleFormControlSelect3" name="section">
            <option selected disabled>Chose Section</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>

          </select>
        </div>
        <div class="form-group">
          <label for="batch">Batch:</label>
          <input type="text" class="form-control" id="batch" placeholder="Enter Your Batch" name="batch">
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

        <button type="submit" class="btn btn-primary" name = "studentsSubmit" value="submit">Submit</button>
        <a href="../firstPage/firstPage.php" class="btn btn-primary" style="margin-left: 20px;">Go Home</a>
        <a href="studentsLogin.php" class="btn btn-primary" style="margin-left: 20px;">Login</a>
      </form>


      <?php

        if(isset($_POST["studentsSubmit"]))
        {
          $id = $_POST["id"];
          $name = $_POST["fullName"];
          $department = $_POST["dept"];
          $semister = $_POST["semister"];
          $section = $_POST["section"];
          $batch = $_POST["batch"];
          $phone = $_POST["phone"];
          $email = $_POST["email"];
          $username = $_POST["userName"];
          $password = $_POST["npswd"];
          $confirm_password = $_POST["cpswd"];
          $gender = $_POST["gender"];


        if(!empty($id) && !empty($name) && !empty($department) && !empty($semister) && !empty($section)&& !empty($batch) && !empty($phone) && !empty($email) && !empty($username)&& !empty($password) && !empty($confirm_password) && !empty($gender)) {





          if($password == $confirm_password)
          {

            $query1 = "select * from student_signup where email = '$email'";
            $query2 = "select * from student_signup where id = '$id'";
            $query3 = "select * from student_signup where username = '$username'";

            $query_check1 = mysqli_query($con,$query1);
            $query_check2 = mysqli_query($con,$query2);
            $query_check3 = mysqli_query($con,$query3);


            if($query_check1 || $query_check2 ||  $query_check3){

              if(mysqli_num_rows($query_check1) > 0)
              {
                echo "

                  <script>
                    alert (' Email Already In Use');
                    window.location.href= 'studentSignup.php';
                  </script>

                ";
              }

              if(mysqli_num_rows($query_check2) > 0)
              {
                echo "

                  <script>
                    alert (' This ID has been Registered Already!');
                    window.location.href= 'studentSignup.php';
                  </script>

                ";
              }

              if(mysqli_num_rows($query_check3) > 0)
              {
                echo "

                  <script>
                    alert (' This Username has already been taken!');
                    window.location.href= 'studentSignup.php';
                  </script>

                ";
              }

              else{
                // echo "<pre>";
                // print_r($_POST);
                // exit();
               $insertion = "insert into student_signup(id,name,department,semister,section,batch,phone,email,username,password,gender) values ('$id','$name','$department','$semister','$section','$batch','$phone','$email','$username','$password','$gender')";





                $run = mysqli_query($con,$insertion);


                if($run){

                  echo "

                    <script>
                      alert (' You Are Successfully Registered!');
                      window.location.href='studentsLogin.php';
                    </script>

                  ";
                }

                else{
                  // run else
                  echo "

                    <script>
                      alert ('Connection Failed!');
                      window.location.href='studentSignup.php';
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
                  window.location.href='studentSignup.php';
                </script>

              ";
            }

          }
          else{

            echo "
              <script>
                alert ('Password and Confirm-Password Does Not Match!');
                window.location.href='studentSignup.php';
              </script>
            ";
          }

        }


        else{
          echo "
            <script>
              alert ('Information can not be Empty!');
              window.location.href='studentSignup.php';
            </script>
          ";
        }


        }



       ?>






    </div>
</div>

</body>
</html>

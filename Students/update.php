<?php

  session_start();




  if(!isset($_SESSION['stdusername'])){

    header('Location: studentsLogin.php');
    exit();
  }



  include "studentDB.php";

  $deafault = $_SESSION['stdusername'];

  $student_query = mysqli_query($con,"SELECT * FROM student_signup WHERE username = '$deafault'");

  $student_fetch = mysqli_fetch_assoc($student_query);

  $problem = $student_fetch['std_id'];

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




  <div class="jumbotron jumbotron-fluid bg-success">
    <div class="container">
      <h1 class="text-center">Student Update Page</h1>

      <p></p>
    </div>
  </div>


  <div class="container ">

    <div class="border border-secondery rounded-sm p-5">
      <h2>Student Update Information</h2>

      <br>

      <form action="" method = "POST">
        <div class="form-group">
          <label for="id">ID:</label>
          <input type="text" class="form-control" id="id" placeholder="Enter Your ID" name="id" value="<?php echo  $student_fetch['id']?>">
        </div>
        <div class="form-group">
          <label for="fullName">Full Name:</label>
          <input type="text" class="form-control" id="fullName" placeholder="Enter Full Name" name="fullName" value="<?php echo  $student_fetch['name']?>">
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
          <input type="text" class="form-control" id="batch" placeholder="Enter Your Batch" name="batch" value="<?php echo  $student_fetch['batch']?>">
        </div>
        <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="text" class="form-control" id="phone" placeholder="Enter Your Phone" name="phone" value="<?php echo  $student_fetch['phone']?>">
        </div>

        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo  $student_fetch['email']?>">
        </div>
        <div class="form-group">
          <label for="userName">User Name:</label>
          <input type="text" class="form-control" id="userName" placeholder="Enter a User Name" name="userName" value="<?php echo  $student_fetch['username']?>">
        </div>

        <div class="form-group">
          <p>Select your gender</p>
          <input type="radio" name="gender" value="male"> <label for="">Male</label>
          <input type="radio" name="gender" value="female"> <label for="">Female</label>
        </div>


        <br>

        <button type="submit" class="btn btn-success" name = "studentsSubmit" value="submit">Submit</button>
        <a class="btn btn-success" href='../Students/students.php'>Go Back</a>
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
          $gender = $_POST["gender"];


        if(!empty($id) && !empty($name) && !empty($department) && !empty($semister) && !empty($section)&& !empty($batch) && !empty($phone) && !empty($email) && !empty($username)&& !empty($gender)) {



            $query1 = "select * from student_signup where email = '$email'";
            $query2 = "select * from student_signup where id = '$id'";
            $query3 = "select * from student_signup where username = '$username'";

            $query_check1 = mysqli_query($con,$query1);
            $query_check2 = mysqli_query($con,$query2);
            $query_check3 = mysqli_query($con,$query3);


            if($query_check1 && $query_check2 &&  $query_check3){

              if(mysqli_num_rows($query_check1) > 1 || (mysqli_num_rows($query_check1) == 1 && $email != $student_fetch['email']))
              {
                echo "

                  <script>
                    alert (' Email Already In Use');
                    window.location.href= 'update.php';
                  </script>

                ";
              }

              elseif(mysqli_num_rows($query_check2) > 1 || (mysqli_num_rows($query_check2) == 1 && $id != $student_fetch['id']))
              {


                echo "

                  <script>
                    alert (' This ID has been Registered Already!');
                    window.location.href= 'update.php';
                  </script>

                ";
              }

              elseif(mysqli_num_rows($query_check3) > 1 || (mysqli_num_rows($query_check3) == 1 && $username != $student_fetch['username']))
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

               $insertion = "UPDATE student_signup SET id = '$id',name = '$name',department = '$department',semister = '$semister',section = '$section',batch = '$batch',phone = '$phone',email = '$email',username = '$username',gender = '$gender' WHERE std_id = '$problem' LIMIT 1";




                $run = mysqli_query($con,$insertion);


                if($run){

                  $_SESSION['stdusername'] = $username;



                  echo "

                    <script>
                      alert (' Data Are Successfully UPDATED!');
                      window.location.href='students.php';
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
                  window.location.href='students.php';
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

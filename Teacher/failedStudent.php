<?php
  session_start();
  include "teacherDB.php";

  if(!isset($_SESSION['username'])){

    header('Location: teacherLogin.php');
    exit();
  }

  $username = $_SESSION['username'];

  $teacher_query = mysqli_query($con,"SELECT * FROM teacher_signup WHERE username = '$username'");

  $teacher_fetch = mysqli_fetch_assoc($teacher_query);





  $teacherId = $teacher_fetch['tid'];

  $courseCodeQuery = mysqli_query($con,"SELECT * FROM course_reg WHERE teacherid = '$teacherId'");

  //$coursecode_fetch = mysqli_fetch_assoc($courseCodeQuery);



  $coursereg = array();

  foreach ($row = mysqli_fetch_all($courseCodeQuery, MYSQLI_ASSOC) as $resultt) {

        $coursecodeReg = $resultt['coursecode'];
        $regId = $resultt['id'];
        $coursereg[$coursecodeReg]=[$regId];




  }





 ?>











<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Teachers</title>



    <link rel="stylesheet" href="../css/studentsStyle.css">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>




    <div class="navbar1">

        <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">

          <img src="baiustLogo.png" alt="Logo">
        </a>

        <!-- Links -->

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="teacher.php">Home</a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="modifyTeacher.php">Modify Result</a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="failedStudent.php">Failed Student</a>
          </li>


          <!-- Dropdown -->
          <li class="nav-item dropdown ml-auto">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Profile
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="update.php">Edit Profile</a>
              <a class="dropdown-item" href="changePassword.php">Change Password</a>
              <a class="dropdown-item" href="profileImage.php">Upload Profile Image</a>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>


        </nav>


      <br>

    </div>






    <!--PROPERTY OF SIDE NAV BAR-->




    <div class="container" >



      <br>
      <!-- Nav pills -->
      <ul class="nav flex-column nav-pills" role="tablist">




        <li class="nav-item">
          <a class="nav-link active" data-toggle="pill" href="#menu5">Update Failed Result</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu1">Semister Wise Failed</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu2">ID Wise Failed</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu3">Semister And ID Wise Failed</a>
        </li>





        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu4">Add Result</a>
        </li>







      </ul>




      <!-- Tab panes -->
      <div class="tab-content">














































































































        <div id="menu2" class="container tab-pane fade"><br>


          <h3>Students Failed</h3>

          <br>

          <style media="screen">
            h3{
              color: DodgerBlue;

              width: 1000px;
              font-size: 35px;
            }


          </style>
          <form class="form-inline" action="" method = "POST">

          <style media="screen">

            .form-inline > * {
              margin:20px 20px;
            }
          </style>

          <div class="form-group">
            <label for="id">Students ID:</label>
            <input type="text" class="form-control" id="std_id1" placeholder="Enter Students ID" name="std_id1">
          </div>


          <style media="screen">
            .form-control{
              margin-left: 10px;
            }
          </style>


          <br>

          <button type="submit" class="btn btn-success btn-md" name = "coeSearch1" value = "Submit">Search</button>
          </form>






          <?php




          if(isset($_POST['coeSearch1'])){



            $std_id1 = $_POST['std_id1'];

            if(empty($std_id1)) {

              echo "

                <script>
                  alert (' Data can not be Empty');
                  window.location.href= 'failedStudent.php';
                </script>

              ";
            }



            else{







              $querylevel = mysqli_query($con,"SELECT coursecode,batch,semister,failed FROM failed_student WHERE studentId='$std_id1'");



              if(mysqli_num_rows($querylevel) == 0){

                echo "

                  <script>
                    alert (' No data Found! ');
                    window.location.href= 'failedStudent.php';
                  </script>

                ";

              }


              else{











              echo '<br>';
              echo '<br>';
              echo '<br>';





              //print_r(mysqli_fetch_all($querylevel, MYSQLI_ASSOC));
              echo '<table border="3" style="margin-top:10px; margin-left: 50px;">
              <tr>
                <th>Course Code</th>
                <th>Batch</th>
                <th>Semister</th>
                <th>Failed</th>

              </tr>';










              foreach ($row = mysqli_fetch_all($querylevel, MYSQLI_ASSOC) as $resultt) {

                  $coursecode1 = $resultt['coursecode'];
                  $batch = $resultt['batch'];
                  $semister = $resultt['semister'];
                  $failed = $resultt['failed'];















                  echo "
                    <tr>
                    <td>$coursecode1</td>
                    <td>$batch</td>
                    <td>$semister</td>
                    <td>$failed</td>

                    </tr>
                  ";


                }


                echo "</table>";












            }












            }




            }














            else{
              echo "<br>";
              echo "<br>";
              echo "Please Enter Student ID";
            }






             ?>








        </div>




















































        <div id="menu3" class="container tab-pane fade"><br>


          <h3>Semister And ID Wise Fail</h3>

          <br>

          <style media="screen">
            h3{
              color: DodgerBlue;

              width: 1000px;
              font-size: 35px;
            }


          </style>
          <form class="form-inline" action="" method = "POST">

          <style media="screen">

            .form-inline > * {
              margin:20px 20px;
            }
          </style>

          <div class="form-group">
            <label for="id">Students ID:</label>
            <input type="text" class="form-control" id="std_id" placeholder="Enter Students ID" name="std_id">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Semister:</label>
            <select class="form-control" id="exampleFormControlSelect1" name='std_level'>

              <option selected disabled>Semister</option>
              <option value="1">Level 1, Term 1</option>
              <option value="2">Level 1, Term 2</option>
              <option value="3">Level 2, Term 1</option>
              <option value="4">Level 2, Term 2</option>
              <option value="5">Level 3, Term 1</option>
              <option value="6">Level 3, Term 2</option>
              <option value="7">Level 4, Term 1</option>
              <option value="8">Level 4, Term 2</option>
            </select>
          </div>

          <style media="screen">
            .form-control{
              margin-left: 10px;
            }
          </style>


          <br>

          <button type="submit" class="btn btn-success btn-md" name = "coeSearch" value = "Submit">Search</button>
          </form>






          <?php




          if(isset($_POST['coeSearch'])){


            $levelTerm = $_POST['std_level'];
            $std_id = $_POST['std_id'];

            if(empty($levelTerm) || empty($std_id)) {

              echo "

                <script>
                  alert (' Data can not be Empty');
                  window.location.href= 'failedStudent.php';
                </script>

              ";
            }



            else{







              $querylevel = mysqli_query($con,"SELECT coursecode,batch,failed FROM failed_student WHERE studentId='$std_id' AND semister = '$levelTerm'");



              if(mysqli_num_rows($querylevel) == 0){

                echo "

                  <script>
                    alert (' No data Found! ');
                    window.location.href= 'failedStudent.php';
                  </script>

                ";

              }


              else{











              echo '<br>';
              echo '<br>';
              echo '<br>';





              //print_r(mysqli_fetch_all($querylevel, MYSQLI_ASSOC));
              echo '<table border="3" style="margin-top:10px;">
              <tr>
                <th>Course Code</th>
                <th>Batch</th>
                <th>Failed</th>

              </tr>';






              foreach ($row = mysqli_fetch_all($querylevel, MYSQLI_ASSOC) as $resultt) {

                  $coursecode1 = $resultt['coursecode'];
                  $batch = $resultt['batch'];
                  $failed= $resultt['failed'];











                  echo "
                    <tr>
                    <td>$coursecode1</td>
                    <td>$batch</td>
                    <td>$failed</td>

                    </tr>
                  ";


                }


                echo "</table>";





















            }



            }




            }




            else{
              echo "<br>";
              echo "<br>";
              echo "Please Enter Student ID and Semister";
            }






             ?>








        </div>








































        <div id="menu1" class="container tab-pane fade"><br>


          <h3>Semister Wise Fail</h3>

          <br>

          <style media="screen">
            h3{
              color: DodgerBlue;

              width: 1000px;
              font-size: 35px;
            }


          </style>
          <form class="form-inline" action="" method = "POST">

          <style media="screen">

            .form-inline > * {
              margin:20px 20px;
            }
          </style>

          <div class="form-group">
            <label for="batch">Batch:</label>
            <input type="text" class="form-control" id="batch22" placeholder="Enter Batch" name="batch22">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Semister:</label>
            <select class="form-control" id="exampleFormControlSelect1" name='std_level'>

              <option selected disabled>Semister</option>
              <option value="1">Level 1, Term 1</option>
              <option value="2">Level 1, Term 2</option>
              <option value="3">Level 2, Term 1</option>
              <option value="4">Level 2, Term 2</option>
              <option value="5">Level 3, Term 1</option>
              <option value="6">Level 3, Term 2</option>
              <option value="7">Level 4, Term 1</option>
              <option value="8">Level 4, Term 2</option>
            </select>
          </div>

          <style media="screen">
            .form-control{
              margin-left: 10px;
            }
          </style>


          <br>

          <button type="submit" class="btn btn-success btn-md" name = "coeSearch111" value = "Submit">Search</button>
          </form>






          <?php







          if(isset($_POST['coeSearch111'])){


            $levelTerm = $_POST['std_level'];
            $batch = $_POST['batch22'];






            if(empty($levelTerm) || empty($batch)) {

              echo "

                <script>
                  alert (' Data can not be Empty');
                  window.location.href= 'failedStudent.php';
                </script>

              ";
            }



            else{







              $querylevel = mysqli_query($con,"SELECT coursecode,studentId,failed FROM failed_student WHERE batch='$batch' AND semister = '$levelTerm'");



              if(mysqli_num_rows($querylevel) == 0){

                echo "

                  <script>
                    alert (' No data Found! ');
                    window.location.href= 'failedStudent.php';
                  </script>

                ";

              }


              else{











              echo '<br>';
              echo '<br>';
              echo '<br>';





              //print_r(mysqli_fetch_all($querylevel, MYSQLI_ASSOC));
              echo '<table border="3" style="margin-top:10px; margin-left: 50px;">
              <tr>
                <th>Course Code</th>
                <th>Student ID</th>
                <th>Failed</th>

              </tr>';






              foreach ($row = mysqli_fetch_all($querylevel, MYSQLI_ASSOC) as $resultt) {

                  $coursecode1 = $resultt['coursecode'];
                  $studentId = $resultt['studentId'];
                  $failed= $resultt['failed'];











                  echo "
                    <tr>
                    <td>$coursecode1</td>
                    <td>$studentId</td>
                    <td>$failed</td>

                    </tr>
                  ";


                }


                echo "</table>";





















            }



            }




            }




            else{
              echo "<br>";
              echo "<br>";
              echo "Please Enter Batch and Semister";
            }






             ?>








        </div>




























        <div id="menu4" class="container tab-pane fade"><br>
          <h3 style="width: 1000px; color: DodgerBlue;">ADD Failed Student INFO</h3>




            <?php



            echo "<br>";
            echo "<br>";
            echo "<br>";




              echo "<form action='' method='post' enctype='multipart/form-data'>";

                echo "<input type='file' name='file' class='form-control'><br>";
                echo "<input type='submit' name='import2' value='Upload Data' class='btn btn-primary'>";

              echo "</form>";



              $con = mysqli_connect('localhost','root','','result_system');



              if(isset($_POST["import2"])){






                $fileName = $_FILES["file"]["tmp_name"];

                if($_FILES["file"]["size"] > 0){

                  $file = fopen($fileName, "r");
                  while(($column = fgetcsv($file, 10000, ",")) !== FALSE)
                  {

                    $sqlInsert = "INSERT into failed_student (coursecode,batch,semister,studentId,failed) values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "')";

                    mysqli_query($con, $sqlInsert);


                  }


                  echo "
                          <script>
                            alert ('Data Inserted Successfully!');
                            window.location.href='../Teacher/failedStudent.php';
                          </script>

                        ";


                }
              }




            ?>






        </div>





























































        <div id="menu5" class="container tab-pane active"><br>
          <h1>Update Failed Result</h1>

          <style media="screen">
            h1{
              color: DodgerBlue;
              width: 1000px;
              font-size: 35px;
            }


          </style>




          <?php

          $permission = $teacher_fetch['status'];


            include 'C:\Install\htdocs\PROJECTS\MY PROJECT\updateFailedResult\index.php';



           ?>


          <br>
          <br>




        </div>

























      </div>
    </div>

</body>
</html>

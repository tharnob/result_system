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
          <a class="nav-link active" data-toggle="pill" href="#menu9">Update Result</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu10">Update Result (Sessional)</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu3">Add Result</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu4">Add Result (Sessional)</a>
        </li>




        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu5">Courses</a>
        </li>


      </ul>




      <!-- Tab panes -->
      <div class="tab-content">















        <div id="menu9" class="container tab-pane active"><br>
          <h1>Update Result</h1>

          <style media="screen">
            h1{
              color: DodgerBlue;
              width: 1000px;
              font-size: 35px;
            }


          </style>




          <?php

          $permission = $teacher_fetch['status'];


            include 'C:\Install\htdocs\PROJECTS\MY PROJECT\updateResultNonsessional\index.php';



           ?>


          <br>
          <br>




        </div>



















        <div id="menu10" class="container tab-pane fade"><br>
          <h1>Update Result</h1>

          <style media="screen">
            h1{
              color: DodgerBlue;
              width: 1000px;
              font-size: 35px;
            }


          </style>




          <?php


            $permission = $teacher_fetch['status'];

            include 'C:\Install\htdocs\PROJECTS\MY PROJECT\updateResultSessional\index.php';



           ?>


          <br>
          <br>




        </div>



















        <div id="menu3" class="container tab-pane fade"><br>
          <h3 style="width: 1000px;">Result Management</h3>




            <?php






              echo "<br>";
              echo "<br>";
              echo "<br>";




                echo "<form action='' method='post' enctype='multipart/form-data'>";

                  echo "<input type='file' name='file' class='form-control'><br>";
                  echo "<input type='submit' name='import3' value='Upload Data' class='btn btn-primary'>";

                echo "</form>";



                $con = mysqli_connect('localhost','root','','result_system');

                // $sqlInsert = "INSERT into courses (id,semister,department,courseno,coursetitle,credits) values ('1','1','cse','1','haha','3.00')";
                //
                // mysqli_query($con, $sqlInsert);


                if(isset($_POST["import3"])){



                  // $sqlInsert = "INSERT into courses (id,semister,department,courseno,coursetitle,credits) values ('1','1','cse','1','haha','3.00')";
                  //
                  // mysqli_query($con, $sqlInsert);



                  $fileName = $_FILES["file"]["tmp_name"];

                  if($_FILES["file"]["size"] > 0){

                    $file = fopen($fileName, "r");
                    while(($column = fgetcsv($file, 10000, ",")) !== FALSE)
                    {
                      //echo'<pre>';print_r($column);
                      $sqlInsert = "INSERT into add_result (coursecode,batch,semister,id,ct1,ct2,ct3,assignment,attendance,performance,finalPart1,finalPart2,total,total100,grade) values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $column[7] . "','" . $column[8] . "','" . $column[9] . "','" . $column[10] . "','" . $column[11] . "','" . $column[12] . "','" . $column[13] . "','" . $column[14] . "')";

                      mysqli_query($con, $sqlInsert);


                    }


                    echo "
                            <script>
                              alert ('Data Inserted Successfully!');
                              window.location.href='../Teacher/modifyTeacher.php';
                            </script>

                          ";


                  }
                }


            ?>






        </div>













        <div id="menu4" class="container tab-pane fade"><br>
          <h3 style="width: 1000px;">Result Management Sessional</h3>




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

                    $sqlInsert = "INSERT into add_result_sessional (coursecode,batch,semister,id,total,total100,grade) values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "')";

                    mysqli_query($con, $sqlInsert);


                  }


                  echo "
                          <script>
                            alert ('Data Inserted Successfully!');
                            window.location.href='../Teacher/modifyTeacher.php';
                          </script>

                        ";


                }
              }




            ?>






        </div>



















        <div id="menu5" class="container tab-pane fade"><br>
          <h3 style="width: 1000px;">All Courses</h3>



            <?php


              $permission = $teacher_fetch['status'];


              include 'C:\Install\htdocs\PROJECTS\MY PROJECT\Courses\index.php';

              echo "<br>";
              echo "<br>";




              echo "<form action='' method='post' enctype='multipart/form-data'>";

                echo "<input type='file' name='file' class='form-control'><br>";
                echo "<input type='submit' name='import1' value='Upload Data' class='btn btn-primary'>";

              echo "</form>";



              $con = mysqli_connect('localhost','root','','result_system');




              if(isset($_POST["import1"])){







                $fileName = $_FILES["file"]["tmp_name"];

                if($_FILES["file"]["size"] > 0){

                  $file = fopen($fileName, "r");
                  while(($column = fgetcsv($file, 10000, ",")) !== FALSE)
                  {
                    //echo'<pre>';print_r($column);
                    $sqlInsert = "INSERT into courses (id,semister,department,courseno,coursetitle,credits) values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "')";

                    mysqli_query($con, $sqlInsert);


                  }


                  echo "
                          <script>
                            alert ('Data Inserted Successfully!');
                            window.location.href='../Teacher/modifyTeacher.php';
                          </script>

                        ";


                }
              }










            ?>



        </div>


























      </div>
    </div>

</body>
</html>

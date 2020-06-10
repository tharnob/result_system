<?php

  session_start();

  include "coeDB.php";

  if(!isset($_SESSION['coe_username'])){

    header('Location: coeLogin.php');
    exit();
  }

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
  <title>COE OFFICE</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/studentsStyle.css">

</head>
<body>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<div class="navbar1">

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">

      <img src="../img/baiustLogo.png" alt="Logo">
    </a>

    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="coeOffice.php">Home</a>
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









<div class="container">

  <br>
  <!-- Nav pills -->
  <ul class="nav flex-column nav-pills" role="tablist">






    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#menu2">ID Wise Failed</a>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu1">Semister Wise Failed</a>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu3">Semister And ID Wise Failed</a>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu4">Courses</a>
    </li>






  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
























































    <div id="menu2" class="container tab-pane active"><br>


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
        <label for="id">Batch:</label>
        <input type="text" class="form-control" id="batch" placeholder="Enter Batch" name="batch">
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Semister:</label>
        <select class="form-control" id="exampleFormControlSelect1" name='std_level1'>

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

      <button type="submit" class="btn btn-success btn-md" name = "coeSearch000" value = "Submit">Search</button>
      </form>






      <?php




      if(isset($_POST['coeSearch000'])){


        $levelTerm = $_POST['std_level1'];


        $batch = $_POST['batch'];



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
          echo '<table border="3" style="margin-top:10px;">
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
              <h3 style="width: 1000px;">All Courses</h3>



                <?php


                  $permission = 0;


                  include 'C:\Install\htdocs\PROJECTS\MY PROJECT\Courses\index.php';

                  echo "<br>";
                  echo "<br>";










                ?>



            </div>







































  </div>
</div>


</body>
</html>

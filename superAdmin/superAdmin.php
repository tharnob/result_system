<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Super Admin</title>


  <?php



  session_start();


  if(!isset($_SESSION['superUsername'])){

    header('Location: superLogin.php');
    exit();
  }

    $con = mysqli_connect('localhost','root','','result_system');

    if (isset($_GET['id'])) {
      $teacherId = $_GET['id'];
      $q  = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM teacher_signup WHERE tid = '$teacherId'"));
      $value = $q['status'] == 0 ? 1 : 0;

      if (mysqli_query($con,"UPDATE teacher_signup SET status = '$value' WHERE tid = '$teacherId'")) {
        echo "

          <script>

            alert ('Status Changed');

            window.location.href='superAdmin.php';

          </script>

        ";
      }else {
        echo "

          <script>

            alert ('Status Not Changed ');

            window.location.href='teacher.php';

          </script>

        ";
      }

    }

   ?>






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

        <img src="..\img\baiustLogo.png" alt="Logo">
      </a>

      <!-- Links -->

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>


        <!-- Dropdown -->
        <li class="nav-item dropdown ml-auto">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Profile
          </a>
          <div class="dropdown-menu">


            <a class="dropdown-item" href="changePassword.php">Change Password</a>
            <a class="dropdown-item" href="superLogout.php">Logout</a>
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
        <a class="nav-link" data-toggle="pill" href="#home">Register Subject</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu4">Teachers Access</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu1">Courses</a>
      </li>






    </ul>

    <!-- Tab panes -->
    <div class="tab-content">







      <div id="menu1" class="container tab-pane fade"><br>
        <h3 style="width: 1000px; color: DodgerBlue;">All Courses</h3>



          <?php


            $permission = 0;


            include 'C:\Install\htdocs\PROJECTS\MY PROJECT\Courses\index.php';

            echo "<br>";
            echo "<br>";










          ?>



      </div>














      <div id="home" class="container tab-pane active"><br>
        <form class="form_control1">
          <h3 style="margin-top: -20px; color: DodgerBlue;">Register Subject</h3>

          <?php
            include 'C:\Install\htdocs\PROJECTS\MY PROJECT\courseReg\index.php';

          ?>




        </form>
      </div>



      <div id="menu4" class="container tab-pane fade"><br>
        <h3 style="margin-top: 20px; color: DodgerBlue;">Give Access</h3>




        <?php

        echo '<table border="3" style="margin-top:30px; margin-left: 20px;">
        <tr>
          <th>Teacher ID</th>
          <th>Teacher Name</th>
          <th>Department</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Access</th>


        </tr>';

          $accessrun = mysqli_query($con,"SELECT tid,name,department,phone,email,gender,status FROM teacher_signup");
          if($accessrun){

            foreach ($row = mysqli_fetch_all($accessrun, MYSQLI_ASSOC) as $infor){

              $tid = $infor['tid'];
              $name = $infor['name'];
              $department = $infor['department'];
              $phone = $infor['phone'];
              $email = $infor['email'];
              $gender = $infor['gender'];
              $status = $infor['status'];
              $onoff=$status == 1 ? 'On':'Off';


              echo "
                <tr>
                <td>$tid</td>
                <td>$name</td>
                <td>$department</td>
                <td>$phone</td>
                <td>$email</td>
                <td>$gender</td>
                <td><a href='superAdmin.php?id=$tid'>$onoff</a></td>

                </tr>

              ";

            }
            echo "</table>";

          }
         ?>


      </div>






    </div>
  </div>


</body>
</html>

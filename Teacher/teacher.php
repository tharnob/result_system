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
          <a class="nav-link active" data-toggle="pill" href="#home">Teacher Profile</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu2">Student Information</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu6">Semister Wise Result</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu7">ID Wise Result</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu8">Semister and ID Wise Result</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu1">Download Result</a>
        </li>



      </ul>




      <!-- Tab panes -->
      <div class="tab-content">









        <div id="home" class="container tab-pane active"><br>
          <h1>Teacher Profile Information</h1>




          <style media="screen">
            h1{
              color: DodgerBlue;
              width: 1000px;
              font-size: 35px;
            }


          </style>





          <br>
          <br>


          <?php





              $sql = "SELECT * FROM teachers_image WHERE profile_id = $teacherId";

              $result = mysqli_query($con, $sql);
              $users = mysqli_fetch_all($result, MYSQLI_ASSOC);





           ?>






          <table  style="margin-left: 50px;">





            <?php foreach($users as $user): ?>
            <tr>
                 <td><img src="images/<?php echo $user['profile_image']; ?>" id="profileImageAccount"  width="90" height="90" alt="images/default.jpg"></td>

                 <style media="screen">
                 #profileImageAccount{

                   display: block;

                   margin: 10px auto;
                   border-radius: 50%;
                   margin-bottom: 30px;
                 }
                 </style>

            </tr>

          <?php endforeach; ?>







            <tr>
              <th style="font-size: 20px;color:Green;">Name:</th>
              <td><?php echo $teacher_fetch['name'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Department:</th>
              <td><?php echo $teacher_fetch['department'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Phone:</th>
              <td><?php echo $teacher_fetch['phone'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Email:</th>
              <td><?php echo $teacher_fetch['email'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Username:</th>
              <td><?php echo $teacher_fetch['username'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Gender:</th>
              <td><?php echo $teacher_fetch['gender'] ?></td>
            </tr>
          </table>



          </style>

        </div>





























        <div id="menu2" class="container tab-pane fade"><br>
          <h3 style="width:1000px; color: DodgerBlue; font-size:35px;">Student Information</h3><br>

          <?php


          $permission = $teacher_fetch['status'];



          include 'C:\Install\htdocs\PROJECTS\MY PROJECT\Database\index.php';







          echo "<br>";
          echo "<br>";
          echo "<br>";




            echo "<form action='' method='post' enctype='multipart/form-data'>";

              echo "<input type='file' name='file' class='form-control'><br>";
              echo "<input type='submit' name='import4' value='Upload Data' class='btn btn-primary'>";

            echo "</form>";



            $con = mysqli_connect('localhost','root','','result_system');

            // $sqlInsert = "INSERT into courses (id,semister,department,courseno,coursetitle,credits) values ('1','1','cse','1','haha','3.00')";
            //
            // mysqli_query($con, $sqlInsert);


            if(isset($_POST["import4"])){



              // $sqlInsert = "INSERT into courses (id,semister,department,courseno,coursetitle,credits) values ('1','1','cse','1','haha','3.00')";
              //
              // mysqli_query($con, $sqlInsert);



              $fileName = $_FILES["file"]["tmp_name"];

              if($_FILES["file"]["size"] > 0){

                $file = fopen($fileName, "r");
                while(($column = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                  //echo'<pre>';print_r($column);
                  $sqlInsert = "INSERT into student_info (ID,name,dept,email,section,batch) values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "')";

                  mysqli_query($con, $sqlInsert);


                }


                echo "
                        <script>
                          alert ('Data Inserted Successfully!');
                          window.location.href='../Teacher/teacher.php';
                        </script>

                      ";


              }
            }



          ?>



        </div>














        <div id="menu8" class="container tab-pane fade"><br>


          <h3>Students Result</h3>

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
                  window.location.href= 'teacher.php';
                </script>

              ";
            }



            else{







              $querylevel = mysqli_query($con,"SELECT coursecode,total,total100,grade FROM add_result WHERE id='$std_id' AND semister = '$levelTerm'");
              $querylevel2 = mysqli_query($con,"SELECT coursecode,total,total100,grade FROM add_result_sessional WHERE id='$std_id' AND semister = '$levelTerm'");


              if(mysqli_num_rows($querylevel) == 0 && mysqli_num_rows($querylevel2) == 0){

                echo "

                  <script>
                    alert (' No data Found! ');
                    window.location.href= 'teacher.php';
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
                <th>Total</th>
                <th>Total(100)</th>
                <th>Grade</th>
                <th>Grade Point</th>
              </tr>';


              $gradePointRecord = array();
              $courseDetails = array();
              $gpaDetails = array();
              $creditDetails = array();

              $creditCount = 0;
              $gradePointCount = 0;



              foreach ($row = mysqli_fetch_all($querylevel, MYSQLI_ASSOC) as $resultt) {

                  $coursecode1 = $resultt['coursecode'];
                  $total1 = $resultt['total'];
                  $total100 = $resultt['total100'];
                  $grade1 = $resultt['grade'];
                  $gradePoint = '';







                  if($grade1 == 'A+'){
                    $gradePoint = 4.00;
                  }
                  elseif($grade1 == 'A'){
                    $gradePoint = 3.75;
                  }
                  elseif($grade1 == 'A-'){
                    $gradePoint = 3.50;
                  }
                  elseif($grade1 == 'B+'){
                    $gradePoint = 3.25;
                  }
                  elseif($grade1 == 'B'){
                    $gradePoint = 3.00;
                  }
                  elseif($grade1 == 'B-'){
                    $gradePoint = 2.75;
                  }
                  elseif($grade1 == 'C+'){
                    $gradePoint = 2.50;
                  }
                  elseif($grade1 == 'C'){
                    $gradePoint = 2.25;
                  }
                  elseif($grade1 == 'D'){
                    $gradePoint = 2.00;
                  }
                  elseif($grade1 == 'F'){
                    $gradePoint = 0.00;
                  }





                  $gradePointRecord[$coursecode1] = $gradePoint;



                  echo "
                    <tr>
                    <td>$coursecode1</td>
                    <td>$total1</td>
                    <td>$total100</td>
                    <td>$grade1</td>
                    <td>$gradePoint</td>
                    </tr>
                  ";


                }

                foreach ($row = mysqli_fetch_all($querylevel2, MYSQLI_ASSOC) as $resultt) {
                  $coursecode1 = $resultt['coursecode'];
                  $total1 = $resultt['total'];
                  $total100 = $resultt['total100'];
                  $grade1 = $resultt['grade'];
                  $gradePoint = '';




                  if($grade1 == 'A+'){
                    $gradePoint = 4.00;
                  }
                  elseif($grade1 == 'A'){
                    $gradePoint = 3.75;
                  }
                  elseif($grade1 == 'A-'){
                    $gradePoint = 3.50;
                  }
                  elseif($grade1 == 'B+'){
                    $gradePoint = 3.25;
                  }
                  elseif($grade1 == 'B'){
                    $gradePoint = 3.00;
                  }
                  elseif($grade1 == 'B-'){
                    $gradePoint = 2.75;
                  }
                  elseif($grade1 == 'C+'){
                    $gradePoint = 2.50;
                  }
                  elseif($grade1 == 'C'){
                    $gradePoint = 2.25;
                  }
                  elseif($grade1 == 'D'){
                    $gradePoint = 2.00;
                  }
                  elseif($grade1 == 'F'){
                    $gradePoint = 0.00;
                  }



                  $gradePointRecord[$coursecode1] = $gradePoint;


                  echo "
                    <tr>
                    <td>$coursecode1</td>
                    <td>$total1</td>
                    <td>$total100</td>
                    <td>$grade1</td>
                    <td>$gradePoint</td>
                    </tr>
                  ";







                }
                echo "</table>";




                $querylevel3 = mysqli_query($con,"SELECT credits,courseno FROM courses");

                foreach ($row = mysqli_fetch_all($querylevel3, MYSQLI_ASSOC) as $creditDetails){

                    $credit = $creditDetails['credits'];
                    $courseno = $creditDetails['courseno'];

                    $courseDetails[$courseno] = $credit;

                }


                //print_r($courseDetails);



                foreach ($gradePointRecord as $key => $value) {


                    foreach ($courseDetails as $key1 => $value1) {

                        if($key == $key1){

                            $gpaDetails[$key1] = $value1;


                        }


                    }

                }


                //result
                //print_r($gradePointRecord);



                //credit
                //print_r($gpaDetails);



              //  print_r($creditDetails);





              $total_gpa_sum = 0;
              $total_credit = 0;
              $gpa = 0;


              foreach ($gpaDetails as $key1 => $value1) {
                  foreach ($gradePointRecord as $key2 => $value2) {
                      if($key1 == $key2){
                          $total_credit = $total_credit + $value1;
                          $total_gpa_sum = $total_gpa_sum + ($value1 * $value2);
                      }
                  }
              }


              $gpa = ($total_gpa_sum/$total_credit);


              echo "<br>";

              echo "GPA: ".round($gpa,2);



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







































        <div id="menu7" class="container tab-pane fade"><br>


          <h3>Students Result</h3>

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
                  window.location.href= 'teacher.php';
                </script>

              ";
            }



            else{







              $querylevel = mysqli_query($con,"SELECT coursecode,total,total100,grade FROM add_result WHERE id='$std_id1'");
              $querylevel2 = mysqli_query($con,"SELECT coursecode,total,total100,grade FROM add_result_sessional WHERE id='$std_id1'");


              if(mysqli_num_rows($querylevel) == 0 && mysqli_num_rows($querylevel2) == 0){

                echo "

                  <script>
                    alert (' No data Found! ');
                    window.location.href= 'teacher.php';
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
                <th>Total</th>
                <th>Total(100)</th>
                <th>Grade</th>
                <th>Grade Point</th>
              </tr>';


              $gradePointRecord = array();
              $courseDetails = array();
              $gpaDetails = array();
              $creditDetails = array();

              $creditCount = 0;
              $gradePointCount = 0;



              foreach ($row = mysqli_fetch_all($querylevel, MYSQLI_ASSOC) as $resultt) {

                  $coursecode1 = $resultt['coursecode'];
                  $total1 = $resultt['total'];
                  $total100 = $resultt['total100'];
                  $grade1 = $resultt['grade'];
                  $gradePoint = '';







                  if($grade1 == 'A+'){
                    $gradePoint = 4.00;
                  }
                  elseif($grade1 == 'A'){
                    $gradePoint = 3.75;
                  }
                  elseif($grade1 == 'A-'){
                    $gradePoint = 3.50;
                  }
                  elseif($grade1 == 'B+'){
                    $gradePoint = 3.25;
                  }
                  elseif($grade1 == 'B'){
                    $gradePoint = 3.00;
                  }
                  elseif($grade1 == 'B-'){
                    $gradePoint = 2.75;
                  }
                  elseif($grade1 == 'C+'){
                    $gradePoint = 2.50;
                  }
                  elseif($grade1 == 'C'){
                    $gradePoint = 2.25;
                  }
                  elseif($grade1 == 'D'){
                    $gradePoint = 2.00;
                  }
                  elseif($grade1 == 'F'){
                    $gradePoint = 0.00;
                  }





                  $gradePointRecord[$coursecode1] = $gradePoint;



                  echo "
                    <tr>
                    <td>$coursecode1</td>
                    <td>$total1</td>
                    <td>$total100</td>
                    <td>$grade1</td>
                    <td>$gradePoint</td>
                    </tr>
                  ";


                }

                foreach ($row = mysqli_fetch_all($querylevel2, MYSQLI_ASSOC) as $resultt) {
                  $coursecode1 = $resultt['coursecode'];
                  $total1 = $resultt['total'];
                  $total100 = $resultt['total100'];
                  $grade1 = $resultt['grade'];
                  $gradePoint = '';




                  if($grade1 == 'A+'){
                    $gradePoint = 4.00;
                  }
                  elseif($grade1 == 'A'){
                    $gradePoint = 3.75;
                  }
                  elseif($grade1 == 'A-'){
                    $gradePoint = 3.50;
                  }
                  elseif($grade1 == 'B+'){
                    $gradePoint = 3.25;
                  }
                  elseif($grade1 == 'B'){
                    $gradePoint = 3.00;
                  }
                  elseif($grade1 == 'B-'){
                    $gradePoint = 2.75;
                  }
                  elseif($grade1 == 'C+'){
                    $gradePoint = 2.50;
                  }
                  elseif($grade1 == 'C'){
                    $gradePoint = 2.25;
                  }
                  elseif($grade1 == 'D'){
                    $gradePoint = 2.00;
                  }
                  elseif($grade1 == 'F'){
                    $gradePoint = 0.00;
                  }



                  $gradePointRecord[$coursecode1] = $gradePoint;


                  echo "
                    <tr>
                    <td>$coursecode1</td>
                    <td>$total1</td>
                    <td>$total100</td>
                    <td>$grade1</td>
                    <td>$gradePoint</td>
                    </tr>
                  ";







                }
                echo "</table>";




                $querylevel3 = mysqli_query($con,"SELECT credits,courseno FROM courses");

                foreach ($row = mysqli_fetch_all($querylevel3, MYSQLI_ASSOC) as $creditDetails){

                    $credit = $creditDetails['credits'];
                    $courseno = $creditDetails['courseno'];

                    $courseDetails[$courseno] = $credit;

                }


                //print_r($courseDetails);



                foreach ($gradePointRecord as $key => $value) {


                    foreach ($courseDetails as $key1 => $value1) {

                        if($key == $key1){

                            $gpaDetails[$key1] = $value1;


                        }


                    }

                }


                //result
                //print_r($gradePointRecord);



                //credit
                //print_r($gpaDetails);



              //  print_r($creditDetails);





              $total_gpa_sum = 0;
              $total_credit = 0;
              $gpa = 0;


              foreach ($gpaDetails as $key1 => $value1) {
                  foreach ($gradePointRecord as $key2 => $value2) {
                      if($key1 == $key2){
                          $total_credit = $total_credit + $value1;
                          $total_gpa_sum = $total_gpa_sum + ($value1 * $value2);
                      }
                  }
              }


              $gpa = ($total_gpa_sum/$total_credit);


              echo "<br>";

              echo "CGPA: ".round($gpa,2);



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





































        <div id="menu6" class="container tab-pane fade"><br>


          <h3>Students Result Semister</h3>

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
            <input type="text" class="form-control" id="batch" placeholder="Enter Batch" name="batch">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Semister:</label>
            <select class="form-control" id="exampleFormControlSelect1" name='std_level3'>

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

          <button type="submit" class="btn btn-success btn-md" name = "coeSearch3" value = "Submit">Search</button>
          </form>










          <?php




          if(isset($_POST['coeSearch3'])){//1


            $levelTerm3 = $_POST['std_level3'];
            $batch = $_POST['batch'];

            if(empty($levelTerm3) || empty($batch)) {//2

              echo "

                <script>
                  alert (' Data can not be Empty');
                  window.location.href= 'teacher.php';
                </script>

              ";
            }



            else{//2











              $querylevel4 = mysqli_query($con,"SELECT id,coursecode,grade FROM add_result WHERE batch='$batch' AND semister = '$levelTerm3'");
              $querylevel3 = mysqli_query($con,"SELECT id,coursecode,grade FROM add_result_sessional WHERE batch='$batch' AND semister = '$levelTerm3'");









              if(mysqli_num_rows($querylevel4) == 0 && mysqli_num_rows($querylevel3) == 0){//3

                echo "

                  <script>
                    alert (' No data Found! ');
                    window.location.href= 'teacher.php';
                  </script>

                ";

              }


              else{//3






                echo '<br>';
                echo '<br>';
                echo '<br>';

                echo "NON SESSIONAL RESULT";







                //from here the code will start tomorrow

                //non sessional result
















                $idGrade = array();
                $idCoursecode = array();
                $coursecodeDetails = array();
                $idCourseGrade = array();












                echo '<table border="3" style="margin-top:10px;">
                <tr>
                  <th>ID</th>';


                foreach ($row1 = mysqli_fetch_all($querylevel4, MYSQLI_ASSOC) as $resultt1) {


                  $id1 = $resultt1['id'];
                  $coursecode1 = $resultt1['coursecode'];
                  $grade1 = $resultt1['grade'];

                  $coursecodeDetails[$coursecode1] = $grade1;

                  $idGrade[$id1] = $grade1;

                  $idCourseGrade[$id1][$coursecode1] = $grade1;








                }


                foreach ($coursecodeDetails as $key7 => $value7) {

                  echo "
                      <th>$key7</th>
                  ";

                }


                echo "<th>GPA</th>";


                echo "</tr>";







                    foreach ($idCourseGrade as $key => $value) {

                      if($key != 0){

                        echo "
                            <td>$key</td>
                        ";


                          foreach ($value as $key1 => $value1) {

                            echo "
                                <td>$value1</td>
                            ";







                          }

                          //echo "<td>GPA</td>";





                          //GPA CALCULATION!!!!!!!!!!!!!!!!


                          $gpaQuery1 = mysqli_query($con,"SELECT coursecode,grade FROM add_result WHERE id=$key AND semister = $levelTerm3");
                          $gpaQuery2 = mysqli_query($con,"SELECT coursecode,grade FROM add_result_sessional WHERE id=$key AND semister = $levelTerm3");
                          $gpaQuery3 = mysqli_query($con,"SELECT credits,courseno FROM courses");





                          $gradePointRecord = array();
                          $courseDetails = array();
                          $gpaDetails = array();
                          $creditDetails = array();

                          $creditCount = 0;
                          $gradePointCount = 0;








                          foreach ($row = mysqli_fetch_all($gpaQuery1, MYSQLI_ASSOC) as $resultt) {

                              $coursecode1 = $resultt['coursecode'];
                              $grade1 = $resultt['grade'];
                              $gradePoint = '';







                              if($grade1 == 'A+'){
                                $gradePoint = 4.00;
                              }
                              elseif($grade1 == 'A'){
                                $gradePoint = 3.75;
                              }
                              elseif($grade1 == 'A-'){
                                $gradePoint = 3.50;
                              }
                              elseif($grade1 == 'B+'){
                                $gradePoint = 3.25;
                              }
                              elseif($grade1 == 'B'){
                                $gradePoint = 3.00;
                              }
                              elseif($grade1 == 'B-'){
                                $gradePoint = 2.75;
                              }
                              elseif($grade1 == 'C+'){
                                $gradePoint = 2.50;
                              }
                              elseif($grade1 == 'C'){
                                $gradePoint = 2.25;
                              }
                              elseif($grade1 == 'D'){
                                $gradePoint = 2.00;
                              }
                              elseif($grade1 == 'F'){
                                $gradePoint = 0.00;
                              }





                              $gradePointRecord[$coursecode1] = $gradePoint;






                            }







                            foreach ($row = mysqli_fetch_all($gpaQuery2, MYSQLI_ASSOC) as $resultt) {
                              $coursecode1 = $resultt['coursecode'];
                              $grade1 = $resultt['grade'];
                              $gradePoint = '';




                              if($grade1 == 'A+'){
                                $gradePoint = 4.00;
                              }
                              elseif($grade1 == 'A'){
                                $gradePoint = 3.75;
                              }
                              elseif($grade1 == 'A-'){
                                $gradePoint = 3.50;
                              }
                              elseif($grade1 == 'B+'){
                                $gradePoint = 3.25;
                              }
                              elseif($grade1 == 'B'){
                                $gradePoint = 3.00;
                              }
                              elseif($grade1 == 'B-'){
                                $gradePoint = 2.75;
                              }
                              elseif($grade1 == 'C+'){
                                $gradePoint = 2.50;
                              }
                              elseif($grade1 == 'C'){
                                $gradePoint = 2.25;
                              }
                              elseif($grade1 == 'D'){
                                $gradePoint = 2.00;
                              }
                              elseif($grade1 == 'F'){
                                $gradePoint = 0.00;
                              }



                              $gradePointRecord[$coursecode1] = $gradePoint;










                            }








                            foreach ($row = mysqli_fetch_all($gpaQuery3, MYSQLI_ASSOC) as $creditDetails){

                                $credit = $creditDetails['credits'];
                                $courseno = $creditDetails['courseno'];

                                $courseDetails[$courseno] = $credit;

                            }






                            foreach ($gradePointRecord as $key => $value) {


                                foreach ($courseDetails as $key1 => $value1) {

                                    if($key == $key1)

                                    {

                                        $gpaDetails[$key1] = $value1;


                                    }


                                }

                            }







                            $total_gpa_sum = 0;
                            $total_credit = 0;
                            $gpa = 0;




                            foreach ($gpaDetails as $key1 => $value1) {
                                foreach ($gradePointRecord as $key2 => $value2) {
                                    if($key1 == $key2){
                                        $total_credit = $total_credit + $value1;
                                        $total_gpa_sum = $total_gpa_sum + ($value1 * $value2);
                                    }
                                }
                            }


                            $gpa = ($total_gpa_sum/$total_credit);

                            $mgpa = round($gpa,2);
                            echo "<td>$mgpa</td>";














                            //end of gpa calculation




































                          echo "</tr>";










                      }


                    }



















                  echo "</table>";




































                //sessional result






                  echo '<br>';
                  echo '<br>';
                  echo '<br>';




                  echo "SESSIONAL RESULT";










                  $idGrade9 = array();
                  $idCoursecode9 = array();
                  $coursecodeDetails9 = array();
                  $idCourseGrade9 = array(array());







                  echo '<table border="3" style="margin-top:10px;">
                  <tr>
                    <th>ID</th>';


                  foreach ($row9 = mysqli_fetch_all($querylevel3, MYSQLI_ASSOC) as $resultt9) {


                    $id9 = $resultt9['id'];
                    $coursecode9 = $resultt9['coursecode'];
                    $grade9 = $resultt9['grade'];

                    $coursecodeDetails9[$coursecode9] = $grade9;

                    $idGrade9[$id9] = $grade9;

                    $idCourseGrade9[$id9][$coursecode9] = $grade9;








                  }


                  foreach ($coursecodeDetails9 as $key9 => $value9) {

                    echo "
                        <th>$key9</th>
                    ";

                  }

                  echo "<th>GPA</th>";


                  echo "</tr>";







                      foreach ($idCourseGrade9 as $key => $value) {

                        if($key != 0){






                          echo "
                              <td>$key</td>
                          ";


                            foreach ($value as $key1 => $value1) {

                              echo "
                                  <td>$value1</td>
                              ";
                            }


                            //echo "<td>GPA</td>";








                            //GPA CALCULATION!!!!!!!!!!!!!!!!


                            $gpaQuery1 = mysqli_query($con,"SELECT coursecode,grade FROM add_result WHERE id=$key AND semister = $levelTerm3");
                            $gpaQuery2 = mysqli_query($con,"SELECT coursecode,grade FROM add_result_sessional WHERE id=$key AND semister = $levelTerm3");
                            $gpaQuery3 = mysqli_query($con,"SELECT credits,courseno FROM courses");





                            $gradePointRecord = array();
                            $courseDetails = array();
                            $gpaDetails = array();
                            $creditDetails = array();

                            $creditCount = 0;
                            $gradePointCount = 0;








                            foreach ($row = mysqli_fetch_all($gpaQuery1, MYSQLI_ASSOC) as $resultt) {

                                $coursecode1 = $resultt['coursecode'];
                                $grade1 = $resultt['grade'];
                                $gradePoint = '';







                                if($grade1 == 'A+'){
                                  $gradePoint = 4.00;
                                }
                                elseif($grade1 == 'A'){
                                  $gradePoint = 3.75;
                                }
                                elseif($grade1 == 'A-'){
                                  $gradePoint = 3.50;
                                }
                                elseif($grade1 == 'B+'){
                                  $gradePoint = 3.25;
                                }
                                elseif($grade1 == 'B'){
                                  $gradePoint = 3.00;
                                }
                                elseif($grade1 == 'B-'){
                                  $gradePoint = 2.75;
                                }
                                elseif($grade1 == 'C+'){
                                  $gradePoint = 2.50;
                                }
                                elseif($grade1 == 'C'){
                                  $gradePoint = 2.25;
                                }
                                elseif($grade1 == 'D'){
                                  $gradePoint = 2.00;
                                }
                                elseif($grade1 == 'F'){
                                  $gradePoint = 0.00;
                                }





                                $gradePointRecord[$coursecode1] = $gradePoint;






                              }







                              foreach ($row = mysqli_fetch_all($gpaQuery2, MYSQLI_ASSOC) as $resultt) {
                                $coursecode1 = $resultt['coursecode'];
                                $grade1 = $resultt['grade'];
                                $gradePoint = '';




                                if($grade1 == 'A+'){
                                  $gradePoint = 4.00;
                                }
                                elseif($grade1 == 'A'){
                                  $gradePoint = 3.75;
                                }
                                elseif($grade1 == 'A-'){
                                  $gradePoint = 3.50;
                                }
                                elseif($grade1 == 'B+'){
                                  $gradePoint = 3.25;
                                }
                                elseif($grade1 == 'B'){
                                  $gradePoint = 3.00;
                                }
                                elseif($grade1 == 'B-'){
                                  $gradePoint = 2.75;
                                }
                                elseif($grade1 == 'C+'){
                                  $gradePoint = 2.50;
                                }
                                elseif($grade1 == 'C'){
                                  $gradePoint = 2.25;
                                }
                                elseif($grade1 == 'D'){
                                  $gradePoint = 2.00;
                                }
                                elseif($grade1 == 'F'){
                                  $gradePoint = 0.00;
                                }



                                $gradePointRecord[$coursecode1] = $gradePoint;










                              }








                              foreach ($row = mysqli_fetch_all($gpaQuery3, MYSQLI_ASSOC) as $creditDetails){

                                  $credit = $creditDetails['credits'];
                                  $courseno = $creditDetails['courseno'];

                                  $courseDetails[$courseno] = $credit;

                              }






                              foreach ($gradePointRecord as $key => $value) {


                                  foreach ($courseDetails as $key1 => $value1) {

                                      if($key == $key1)

                                      {

                                          $gpaDetails[$key1] = $value1;


                                      }


                                  }

                              }







                              $total_gpa_sum = 0;
                              $total_credit = 0;
                              $gpa = 0;




                              foreach ($gpaDetails as $key1 => $value1) {
                                  foreach ($gradePointRecord as $key2 => $value2) {
                                      if($key1 == $key2){
                                          $total_credit = $total_credit + $value1;
                                          $total_gpa_sum = $total_gpa_sum + ($value1 * $value2);
                                      }
                                  }
                              }


                              $gpa = ($total_gpa_sum/$total_credit);

                              $mgpa = round($gpa,2);
                              echo "<td>$mgpa</td>";














                              //end of gpa calculation

















                            echo "</tr>";










                        }


                      }



















                    echo "</table>";












































            }



            }




          }




            else{//1
              echo "<br>";
              echo "<br>";
              echo "Please Enter Batch and Semister";
            }






             ?>








        </div>



































































        <div id="menu1" class="container tab-pane fade"><br>


          <h3>Download Result</h3>

          <br>

          <style media="screen">
            h3{
              color: DodgerBlue;

              width: 1000px;
              font-size: 35px;
            }


          </style>
          <form class="form-inline" action="downloadResult.php" method = "POST">

          <style media="screen">

            .form-inline > * {
              margin:20px 20px;
            }
          </style>

          <div class="form-group">
            <label for="batch">Batch:</label>
            <input type="text" class="form-control" id="batch" placeholder="Enter Batch" name="batch0">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Semister:</label>
            <select class="form-control" id="exampleFormControlSelect1" name='std_level0'>

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

          <button type="submit" class="btn btn-success btn-md" name = "searchFailed" value = "Submit">Generate PDF</button>
          </form>












<?php



include 'C:\Install\htdocs\PROJECTS\MY PROJECT\Teacher\downloadResult.php';



 ?>



































































        </div>








































































































































      </div>
    </div>

</body>
</html>

<?php



  session_start();

  include "studentDB.php";

  if(!isset($_SESSION['stdusername'])){

    header('Location: studentsLogin.php');
    exit();
  }

  $username = $_SESSION['stdusername'];

  $student_query = mysqli_query($con,"SELECT * FROM student_signup WHERE username = '$username'");

  $student_fetch = mysqli_fetch_assoc($student_query);

  $studentId = $student_fetch['id'];







 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Students</title>



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
            <a class="nav-link" href="#">Home</a>
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
          <a class="nav-link active" data-toggle="pill" href="#home">Student Profile</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu2">Student Result</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu3">CGPA</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#menu4">Courses</a>
        </li>






      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
          <h3 style="width:1000px; color: DodgerBlue; font-size: 35px;">Student Profile</h3>




          <?php





              $sql = "SELECT * FROM students_image WHERE profile_id = $studentId";

              $result = mysqli_query($con, $sql);
              $users = mysqli_fetch_all($result, MYSQLI_ASSOC);





           ?>











          <br>

          <table style="margin-left: 50px;">





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
              <th style="font-size: 20px; color:Green;">Id:</th>
              <td ><?php echo $student_fetch['id'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Name:</th>
              <td ><?php echo $student_fetch['name'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Department:</th>
              <td ><?php echo $student_fetch['department'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Semister:</th>
              <td ><?php echo $student_fetch['semister'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Section:</th>
              <td ><?php echo $student_fetch['section'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Batch:</th>
              <td ><?php echo $student_fetch['batch'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Phone:</th>
              <td ><?php echo $student_fetch['phone'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Email:</th>
              <td ><?php echo $student_fetch['email'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Username:</th>
              <td ><?php echo $student_fetch['id'] ?></td>
            </tr>
            <tr>
              <th style="font-size: 20px;color:Green;">Gender:</th>
              <td ><?php echo $student_fetch['gender'] ?></td>
            </tr>
          </table>



        </div>
        <div id="menu1" class="container tab-pane fade"><br>
          <h3>Menu 1</h3>
          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>




        <div id="menu2" class="container tab-pane fade"><br>
          <h3 style="color: DodgerBlue; margin-bottom: 30px;">Search For Result</h3>


          <form class="form" action="" method="post">


                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Select Semister</label>
                          <select class="form-control" id="exampleFormControlSelect1" name="selectlevel">

                            <option value='1'>Level 1, Term 1</option>
                            <option value='2'>Level 1, Term 2</option>
                            <option value='3'>Level 2, Term 1</option>
                            <option value='4'>Level 2, Term 2</option>
                            <option value='5'>Level 3, Term 1</option>
                            <option value='6'>Level 3, Term 2</option>
                            <option value='7'>Level 4, Term 1</option>
                            <option value='8'>Level 4, Term 2</option>

                          </select>

                        </div>

                        <input type="submit" class="btn btn-success" name="studentsSubmitt" value="Submit">
                        <br>
                        <br>
                        <br>


          </form>






          <?php





                if(isset($_POST['studentsSubmitt'])){


                  $levelTerm = $_POST['selectlevel'];



                    $querylevel = mysqli_query($con,"SELECT coursecode,total,total100,grade FROM add_result WHERE id='$studentId' AND semister = '$levelTerm'");
                    $querylevel2 = mysqli_query($con,"SELECT coursecode,total,total100,grade FROM add_result_sessional WHERE id='$studentId' AND semister = '$levelTerm'");











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





           ?>







        </div>















        <div id="menu3" class="container tab-pane fade"><br>
          <h3 style="margin-left: 30px; color: DodgerBlue;">CGPA</h3><br>







































          <?php












                    $querylevel = mysqli_query($con,"SELECT coursecode,total,total100,grade FROM add_result WHERE id='$studentId' ");
                    $querylevel2 = mysqli_query($con,"SELECT coursecode,total,total100,grade FROM add_result_sessional WHERE id='$studentId' ");











                    //print_r(mysqli_fetch_all($querylevel, MYSQLI_ASSOC));
                    echo '<table border="3" style="margin-top:30px; margin-left: 50px;">
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

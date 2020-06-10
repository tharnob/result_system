<?php


    session_start();



    if(!isset($_SESSION['stdusername'])){

      header('Location: studentsLogin.php');
      exit();
    }


    
    $conn = mysqli_connect('localhost', 'root', '', 'result_system');

    $username = $_SESSION['stdusername'];

    $student_query = mysqli_query($conn,"SELECT * FROM student_signup WHERE username = '$username'");

    $student_fetch = mysqli_fetch_assoc($student_query);

    $studentId = $student_fetch['id'];

    $janu = 0;







    if(isset($_POST['save-user'])){






            $profileImageName = time() . '_' . $_FILES['profileImage']['name'];

            $target = 'images/' . $profileImageName;

            if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){


            $query_check = "SELECT profile_id FROM students_image";

            $check = mysqli_query($conn,$query_check);

            $tests = mysqli_fetch_all($check, MYSQLI_ASSOC);




            foreach ($tests as $test) {
                if($test['profile_id'] == $studentId){
                  $janu = 1;
                }
            }



              if($janu == 1){










                $sql = "UPDATE students_image SET profile_image = '$profileImageName'  WHERE profile_id = '$studentId'";

                if(mysqli_query($conn, $sql)){



                  echo "
                <script>
                  alert ('Image uploaded and saved to database');
                  window.location.href='students.php';
                </script>

              ";


                }

                else{


                  echo "

                  <script>
                    alert ('Database Error: Failed to save user');
                    window.location.href='students.php';
                  </script>
                  ";

                }


              }















              else{




                $sql = "INSERT INTO students_image (profile_image,profile_id) VALUES ('$profileImageName', '$studentId')";

                if(mysqli_query($conn, $sql)){



                  echo "
                <script>
                  alert ('Image uploaded and saved to database');
                  window.location.href='students.php';
                </script>

              ";


                }

                else{


                  echo "

                  <script>
                    alert ('Database Error: Failed to save user');
                    window.location.href='students.php';
                  </script>
                  ";

                }


              }








}










            else{

              echo "

              <script>
                alert ('Failed to upload');
                window.location.href='students.php';
              </script>
              ";
            }







        }






 ?>

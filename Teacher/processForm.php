<?php


    session_start();


    if(!isset($_SESSION['username'])){

      header('Location: teacherLogin.php');
      exit();
    }



    $conn = mysqli_connect('localhost', 'root', '', 'result_system');




    $username = $_SESSION['username'];

    $teacher_query = mysqli_query($conn,"SELECT * FROM teacher_signup WHERE username = '$username'");

    $teacher_fetch = mysqli_fetch_assoc($teacher_query);





    $teacherId = $teacher_fetch['tid'];













    $janu = 0;







    if(isset($_POST['save-user'])){






            $profileImageName = time() . '_' . $_FILES['profileImage']['name'];

            $target = 'images/' . $profileImageName;

            if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){


            $query_check = "SELECT profile_id FROM teachers_image";

            $check = mysqli_query($conn,$query_check);

            $tests = mysqli_fetch_all($check, MYSQLI_ASSOC);




            foreach ($tests as $test) {
                if($test['profile_id'] == $teacherId){
                  $janu = 1;
                }
            }



              if($janu == 1){










                $sql = "UPDATE teachers_image SET profile_image = '$profileImageName'  WHERE profile_id = '$teacherId'";

                if(mysqli_query($conn, $sql)){



                  echo "
                <script>
                  alert ('Image uploaded and saved to database');
                  window.location.href='teacher.php';
                </script>

              ";


                }

                else{


                  echo "

                  <script>
                    alert ('Database Error: Failed to save user');
                    window.location.href='teacher.php';
                  </script>
                  ";

                }


              }















              else{




                $sql = "INSERT INTO teachers_image (profile_image,profile_id) VALUES ('$profileImageName', '$teacherId')";

                if(mysqli_query($conn, $sql)){



                  echo "
                <script>
                  alert ('Image uploaded and saved to database');
                  window.location.href='teacher.php';
                </script>

              ";


                }

                else{


                  echo "

                  <script>
                    alert ('Database Error: Failed to save user');
                    window.location.href='teacher.php';
                  </script>
                  ";

                }


              }








}










            else{

              echo "

              <script>
                alert ('Failed to upload');
                window.location.href='teacher.php';
              </script>
              ";
            }







        }






 ?>

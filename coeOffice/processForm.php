<?php


    session_start();
    
    if(!isset($_SESSION['coe_username'])){

      header('Location: coeLogin.php');
      exit();
    }



    $conn = mysqli_connect('localhost', 'root', '', 'result_system');



    $deafault = $_SESSION['coe_username'];

    $coe_query = mysqli_query($conn,"SELECT * FROM coe_signup WHERE username = '$deafault'");

    $coe_fetch = mysqli_fetch_assoc($coe_query);

    $coeId = $coe_fetch['id'];










    $janu = 0;







    if(isset($_POST['save-user'])){






            $profileImageName = time() . '_' . $_FILES['profileImage']['name'];

            $target = 'images/' . $profileImageName;

            if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){


            $query_check = "SELECT profile_id FROM coe_image";

            $check = mysqli_query($conn,$query_check);

            $tests = mysqli_fetch_all($check, MYSQLI_ASSOC);




            foreach ($tests as $test) {
                if($test['profile_id'] == $coeId){
                  $janu = 1;
                }
            }



              if($janu == 1){










                $sql = "UPDATE coe_image SET profile_image = '$profileImageName'  WHERE profile_id = '$coeId'";

                if(mysqli_query($conn, $sql)){



                  echo "
                <script>
                  alert ('Image uploaded and saved to database');
                  window.location.href='coeOffice.php';
                </script>

              ";


                }

                else{


                  echo "

                  <script>
                    alert ('Database Error: Failed to save user');
                    window.location.href='coeOffice.php';
                  </script>
                  ";

                }


              }















              else{




                $sql = "INSERT INTO coe_image (profile_image,profile_id) VALUES ('$profileImageName', '$coeId')";

                if(mysqli_query($conn, $sql)){



                  echo "
                <script>
                  alert ('Image uploaded and saved to database');
                  window.location.href='coeOffice.php';
                </script>

              ";


                }

                else{


                  echo "

                  <script>
                    alert ('Database Error: Failed to save user');
                    window.location.href='coeOffice.php';
                  </script>
                  ";

                }


              }








}










            else{

              echo "

              <script>
                alert ('Failed to upload');
                window.location.href='coeOffice.php';
              </script>
              ";
            }







        }






 ?>

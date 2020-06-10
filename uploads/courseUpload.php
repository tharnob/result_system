<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>



    <form action="" method="post" enctype="multipart/form-data">

      <input type="file" name="file" class="form-control"><br>
      <input type="submit" name="import" value="Upload Data" class="btn btn-primary">

    </form>

    <?php
        $con = mysqli_connect('localhost','root','','result_system');




        if(isset($_POST["import"])){



          $sqlInsert = "INSERT into courses (id,semister,department,courseno,coursetitle,credits) values ('1','1','cse','1','haha','3.00')";

          mysqli_query($con, $sqlInsert);



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
                      window.location.href='../Teacher/teacher.php';
                    </script>

                  ";


          }
        }

     ?>




  </body>
</html>

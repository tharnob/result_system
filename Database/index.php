
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>




</head>
<body>


<?php


  include "database.php";

 ?>



<?php

  $db = new Database1();
  $query = "SELECT * FROM student_info";
  $read = $db->select($query);
 ?>

<?php

  if(isset($_GET['msg'])){
    echo "<span style = 'color:green'>".$_GET['msg']."</span>";
  }

 ?>








 <br>

 <form class="form-inline" action="" method = "POST">






 <div class="form-group">
   <label for="id">Students ID:</label>
   <input type="text" class="form-control" id="std_id" placeholder="Enter Students ID" name="std_id">
 </div>


 <style media="screen">
   .form-control{
     margin-left: 10px;
     margin-right: 10px;
   }
 </style>


 <br>

 <button type="submit" class="btn btn-success btn-md" name = "teacherSearch" value = "Submit">Search</button>
 </form>




<?php



  if(isset($_POST['teacherSearch'])){
      $std_id = $_POST['std_id'];

      if(empty($std_id)) {

        echo "

          <script>
            alert (' Data can not be Empty');
            window.location.href= 'teacher.php';
          </script>

        ";
      }

      else{


        $query1 = "SELECT * FROM student_info where ID = $std_id";
        $read1 = $db->select($query1);


        if(isset($_GET['msg'])){
          echo "<span style = 'color:green'>".$_GET['msg']."</span>";
        }







        echo "<table class='table1' border='3' style='width: 80%;text-align: center;margin-left: 60px;margin-top: 30px;padding: 2px;'>";


        echo "<tr>";

        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Department</th>";
        echo "<th>Email</th>";
        echo "<th>Section</th>";
        echo "<th>Batch</th>";


        if($permission == 1){

                    echo "<th>Action</th>";
        }





        echo "</tr>";


        if($read1){
          while($row = $read1->fetch_assoc()){

              echo "<tr>";

              echo "<td>";
              echo $row["ID"];
              echo "</td>";
              echo "<td>";
              echo $row["name"];
              echo "</td>";
              echo "<td>";
              echo $row["dept"];
              echo "</td>";
              echo "<td>";
              echo $row["email"];
              echo "</td>";
              echo "<td>";
              echo $row["section"];
              echo "</td>";
              echo "<td>";
              echo $row["batch"];
              echo "</td>";


              ?>

<?php

if($permission == 1){

    echo "<td>";

}


 ?>




                <a href="../Database/update.php?id=<?php echo urlencode($row['ID']); ?>">


<?php


if($permission == 1){

    echo "Edit";

}


 ?>





                </a>




                <?php

                if($permission == 1){

                    echo "</td>";

                }


                 ?>




              <?php





              echo "</tr>";



          }
        }


        else{
          echo "Data is not Available";
        }

      }


  }




 ?>















   <table class="table1" border="3" style="width: 80%;text-align: center;margin-left: 60px;margin-top: 30px;padding: 2px;">



     <tr>

       <th>ID</th>
       <th>Name</th>
       <th>Department</th>
       <th>Email</th>
       <th>Section</th>
       <th>Batch</th>


      <?php

      if($permission == 1){

           echo "<th>Action</th>";
      }

      ?>





     </tr>




     <?php  if($read){ ?>
     <?php while($row = $read->fetch_assoc()){ ?>
     <tr>

       <td><?php echo $row["ID"];?></td>
       <td><?php echo $row["name"];?></td>
       <td><?php echo $row["dept"];?></td>
       <td><?php echo $row["email"];?></td>
       <td><?php echo $row["section"];?></td>
       <td><?php echo $row["batch"];?></td>





<?php

      if($permission == 1){

        echo "<td>";
      }

 ?>




    <a href="../Database/update.php?id=<?php echo urlencode($row['ID']); ?>">




      <?php

            if($permission == 1){

              echo "Edit";
            }

       ?>










    </a>



    <?php

          if($permission == 1){

            echo "</td>";
          }

     ?>



     </tr>

     <?php } ?>
     <?php } else{?>

       <p>Data is not available! </p>
     <?php } ?>
   </table>

   <br>

   <a  href="../Database/create.php" style="margin-left: 450px;">





     <?php

           if($permission == 1){

             echo "Create";
           }

      ?>





   </a>

   </body>
</html>

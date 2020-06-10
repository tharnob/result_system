
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Courses</title>




</head>
<body>


<?php


  include "database.php";

 ?>



<?php

  $db = new Database33();
  $query = "SELECT * FROM courses";
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
   <label for="id">Course No:</label>
   <input type="text" class="form-control" id="course_no" placeholder="Enter Course Code" name="course_no">
 </div>


 <style media="screen">
   .form-control{
     margin-left: 10px;
     margin-right: 10px;
   }
 </style>


 <br>

 <button type="submit" class="btn btn-success btn-md" name = "courseSearch" value = "Submit">Search</button>
 </form>




<?php



  if(isset($_POST['courseSearch'])){
      $course_no = $_POST['course_no'];



      if(empty($course_no)) {

        echo "

          <script>
            alert (' Data can not be Empty');

          </script>

        ";
      }

      else{


        $query1 = "SELECT * FROM courses where courseno = '$course_no'";
        $read1 = $db->select($query1);


        if(isset($_GET['msg'])){
          echo "<span style = 'color:green'>".$_GET['msg']."</span>";
        }







        echo "<table class='table1' border='3' style='width: 80%;text-align: center;margin-left: 60px;margin-top: 30px;padding: 2px;'>";


        echo "<tr>";

        echo "<th>ID</th>";
        echo "<th>Semister</th>";
        echo "<th>Department</th>";
        echo "<th>Course No</th>";
        echo "<th>Course Title</th>";
        echo "<th>Credits</th>";


if($permission == 1){

  echo "<th>Action</th>";
}



        echo "</tr>";


        if($read1){
          while($row = $read1->fetch_assoc()){

              echo "<tr>";

              echo "<td>";
              echo $row["id"];
              echo "</td>";
              echo "<td>";
              echo $row["semister"];
              echo "</td>";
              echo "<td>";
              echo $row["department"];
              echo "</td>";
              echo "<td>";
              echo $row["courseno"];
              echo "</td>";
              echo "<td>";
              echo $row["coursetitle"];
              echo "</td>";
              echo "<td>";
              echo $row["credits"];
              echo "</td>";


              ?>

<?php

if($permission == 1){

    echo "<td>";

}


 ?>





                <a href="../Courses/update.php?id=<?php echo urlencode($row['id']); ?>">




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
       <th>Semister</th>
       <th>Department</th>
       <th>Course NO</th>
       <th>Course Title</th>
       <th>Credits</th>


<?php

if($permission == 1){

  echo "<th>Action</th>";
}

 ?>




     </tr>

     <?php  if($read){ ?>
     <?php while($row = $read->fetch_assoc()){ ?>
     <tr>


       <td><?php echo $row["id"];?></td>
       <td><?php echo $row["semister"];?></td>
       <td><?php echo $row["department"];?></td>
       <td><?php echo $row["courseno"];?></td>
       <td><?php echo $row["coursetitle"];?></td>
       <td><?php echo $row["credits"];?></td>








       <?php

       if($permission == 1){

           echo "<td>";

       }


        ?>





                       <a href="../Courses/update.php?id=<?php echo urlencode($row['id']); ?>">




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


   <a href="../Courses/create.php" style="margin-left: 450px;">


     <?php

     if($permission == 1){

         echo "Create";

     }


      ?>




   </a>






   </body>
</html>

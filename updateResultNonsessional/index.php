
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

  $db = new Database9();


  //foreach ($coursereg as $key => $value) {




      //$query = "SELECT * FROM add_result WHERE coursecode = '$key'";

      //$read = $db->select($query);






  //}



  //$query = "SELECT * FROM add_result";
  //$read = $db->select($query);
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

 <div class="form-group">
   <label for="coursecode">Course Code:</label>
   <input type="text" class="form-control" id="course_code" placeholder="Enter Course Code" name="course_code">
 </div>


 <style media="screen">
   .form-control{
     margin-left: 10px;
     margin-right: 10px;
   }
 </style>


 <br>

 <button type="submit" class="btn btn-success btn-md" name = "resultSearch" value = "Submit">Search</button>
 </form>




<?php



  if(isset($_POST['resultSearch'])){
      $std_id = $_POST['std_id'];
      $course_code = $_POST['course_code'];



      if(empty($std_id) || empty($course_code)) {

        echo "

          <script>
            alert (' Data can not be Empty');
            window.location.href= 'modifyTeacher.php';
          </script>

        ";
      }

      else{



        $checkValue = 0;

        foreach ($coursereg as $key => $value) {


            if($key == $course_code)
            {
              $checkValue = 1;
            }





        }









if($checkValue == 1){







  $query1 = "SELECT * FROM add_result where id = $std_id AND coursecode = '$course_code' ";


  $read1 = $db->select($query1);





  if(isset($_GET['msg'])){
    echo "<span style = 'color:green'>".$_GET['msg']."</span>";
  }







  echo "<table class='table1' border='3' style='width: 80%;text-align: center;margin-left: 60px;margin-top: 30px;padding: 2px;'>";


  echo "<tr>";

  echo "<th>Serial ID</th>";
  echo "<th>Course Code</th>";
  echo "<th>Batch</th>";
  echo "<th>Semister</th>";
  echo "<th>ID</th>";
  echo "<th>CT: 1</th>";
  echo "<th>CT: 2</th>";
  echo "<th>CT: 3</th>";
  echo "<th>Assignment</th>";
  echo "<th>Attendance</th>";
  echo "<th>Performance</th>";
  echo "<th>Final Part: 1</th>";
  echo "<th>Final Part: 2</th>";
  echo "<th>Total</th>";
  echo "<th>Total(100)</th>";
  echo "<th>Grade</th>";


  if($permission == 1){

    echo "<th>Action</th>";
  }



  echo "</tr>";


  if($read1){
    while($row = $read1->fetch_assoc()){

        echo "<tr>";

        echo "<td>";
        echo $row["mainid"];
        echo "</td>";
        echo "<td>";
        echo $row["coursecode"];
        echo "</td>";
        echo "<td>";
        echo $row["batch"];
        echo "</td>";
        echo "<td>";
        echo $row["semister"];
        echo "</td>";
        echo "<td>";
        echo $row["id"];
        echo "</td>";
        echo "<td>";
        echo $row["ct1"];
        echo "</td>";
        echo "<td>";
        echo $row["ct2"];
        echo "</td>";
        echo "<td>";
        echo $row["ct3"];
        echo "</td>";
        echo "<td>";
        echo $row["assignment"];
        echo "</td>";
        echo "<td>";
        echo $row["attendance"];
        echo "</td>";
        echo "<td>";
        echo $row["performance"];
        echo "</td>";
        echo "<td>";
        echo $row["finalPart1"];
        echo "</td>";
        echo "<td>";
        echo $row["finalPart2"];
        echo "</td>";
        echo "<td>";
        echo $row["total"];
        echo "</td>";
        echo "<td>";
        echo $row["total100"];
        echo "</td>";
        echo "<td>";
        echo $row["grade"];
        echo "</td>";



        ?>

<?php

  if($permission == 1){

    echo "<td>";
  }

?>




          <a href="../updateResultNonsessional/update.php?id=<?php echo urlencode($row['mainid']); ?>">




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
    echo "Data is not Available!";
  }























}





else{

  echo "

    <script>
      alert (' You are not Registered for this Course!');
      window.location.href= 'modifyTeacher.php';
    </script>

  ";
}




















      }





















  }




 ?>















   <table class="table1" border="3" style="width: 80%;text-align: center;margin-left: 60px;margin-top: 30px;padding: 2px;">



     <tr>

       <th>Serial ID</th>
       <th>Course Code</th>
       <th>Batch</th>
       <th>Semister</th>
       <th>ID</th>
       <th>CT: 1</th>
       <th>CT: 2</th>
       <th>CT: 3</th>
       <th>Assignment</th>
       <th>Attendance</th>
       <th>Performance</th>
       <th>Final Part: 1</th>
       <th>Final Part: 2</th>
       <th>Total</th>
       <th>Total(100)</th>
       <th>Grade</th>


<?php


if($permission == 1){

  echo "<th>Action</th>";
}



 ?>






     </tr>




     <?php









     foreach ($coursereg as $key => $value) {




         $query = "SELECT * FROM add_result WHERE coursecode = '$key'";

         $read = $db->select($query);






     //}
























       if($read){ ?>
     <?php while($row = $read->fetch_assoc()){ ?>
     <tr>

       <td><?php echo $row["mainid"];?></td>
       <td><?php echo $row["coursecode"];?></td>
       <td><?php echo $row["batch"];?></td>
       <td><?php echo $row["semister"];?></td>
       <td><?php echo $row["id"];?></td>
       <td><?php echo $row["ct1"];?></td>
       <td><?php echo $row["ct2"];?></td>
       <td><?php echo $row["ct3"];?></td>
       <td><?php echo $row["assignment"];?></td>
       <td><?php echo $row["attendance"];?></td>
       <td><?php echo $row["performance"];?></td>
       <td><?php echo $row["finalPart1"];?></td>
       <td><?php echo $row["finalPart2"];?></td>
       <td><?php echo $row["total"];?></td>
       <td><?php echo $row["total100"];?></td>
       <td><?php echo $row["grade"];?></td>















       <?php

               if($permission == 1){

                 echo "<td>";
               }

        ?>




                       <a href="../updateResultNonsessional/update.php?id=<?php echo urlencode($row['mainid']); ?>">




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
     <?php }






?>



<?php } ?>


   </table>


<br>


   <a href="../updateResultNonsessional/create.php" style="margin-left: 450px;">




<?php


if($permission == 1){

  echo "Create";

}


 ?>






   </a>

   </body>
</html>

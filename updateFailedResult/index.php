
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

  $db = new Database0();


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
            window.location.href= 'failedStudent.php';
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







  $query1 = "SELECT * FROM failed_student where studentId = $std_id AND coursecode = '$course_code' ";


  $read1 = $db->select($query1);





  if(isset($_GET['msg'])){
    echo "<span style = 'color:green'>".$_GET['msg']."</span>";
  }







  echo "<table class='table1' border='3' style='width: 80%;text-align: center;margin-left: 60px;margin-top: 30px;padding: 2px;'>";


  echo "<tr>";

  echo "<th>ID</th>";
  echo "<th>Course Code</th>";
  echo "<th>Batch</th>";
  echo "<th>Semister</th>";
  echo "<th>Student ID</th>";
  echo "<th>Failed</th>";


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
        echo $row["coursecode"];
        echo "</td>";
        echo "<td>";
        echo $row["batch"];
        echo "</td>";
        echo "<td>";
        echo $row["semister"];
        echo "</td>";
        echo "<td>";
        echo $row["studentId"];
        echo "</td>";
        echo "<td>";
        echo $row["failed"];
        echo "</td>";



        ?>

<?php

  if($permission == 1){

    echo "<td>";
  }

?>




          <a href="../updateFailedResult/update.php?id=<?php echo urlencode($row['id']); ?>">




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
      window.location.href= 'failedStudent.php';
    </script>

  ";
}




















      }





















  }




 ?>















   <table class="table1" border="3" style="width: 80%;text-align: center;margin-left: 60px;margin-top: 30px;padding: 2px;">



     <tr>

       <th>ID</th>
       <th>Course Code</th>
       <th>Batch</th>
       <th>Semister</th>
       <th>Student ID</th>
       <th>Failed</th>


<?php


if($permission == 1){

  echo "<th>Action</th>";
}



 ?>






     </tr>




     <?php









     foreach ($coursereg as $key => $value) {




         $query = "SELECT * FROM failed_student WHERE coursecode = '$key'";

         $read = $db->select($query);






     //}
























       if($read){ ?>
     <?php while($row = $read->fetch_assoc()){ ?>
     <tr>

       <td><?php echo $row["id"];?></td>
       <td><?php echo $row["coursecode"];?></td>
       <td><?php echo $row["batch"];?></td>
       <td><?php echo $row["semister"];?></td>
       <td><?php echo $row["studentId"];?></td>
       <td><?php echo $row["failed"];?></td>















       <?php

               if($permission == 1){

                 echo "<td>";
               }

        ?>




                       <a href="../updateFailedResult/update.php?id=<?php echo urlencode($row['id']); ?>">




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


   <a href="../updateFailedResult/create.php" style="margin-left: 450px;">




<?php


if($permission == 1){

  echo "Create";

}


 ?>






   </a>

   </body>
</html>

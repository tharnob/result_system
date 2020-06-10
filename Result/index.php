
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ADD Result</title>




</head>
<body>


<?php


  include "database.php";

 ?>



<?php

  $db = new Database11();
  $query = "SELECT * FROM add_result";
  $read = $db->select($query);
 ?>

<?php

  if(isset($_GET['msg'])){
    echo "<span style = 'color:green'>".$_GET['msg']."</span>";
  }

 ?>
   <table class="table1" border="3" style="width: 80%;text-align: center;margin-left: 60px;margin-top: 30px;padding: 2px;">



     <tr>

       <th>Course Code</th>
       <th>Batch</th>
       <th>Semister</th>
       <th>Student ID</th>
       <th>CT-1</th>
       <th>CT-2</th>
       <th>CT-3</th>
       <th>Assignment</th>
       <th>Attendence</th>
       <th>Performance</th>
       <th>Final Part-1</th>
       <th>Final Part-2</th>
       <th>Total</th>
       <th>Total in 100</th>
       <th>Grade</th>
       <th>Action</th>



     </tr>

     <?php  if($read){ ?>
     <?php while($row = $read->fetch_assoc()){ ?>
     <tr>

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

       <td><a href="../Result/update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>



     </tr>

     <?php } ?>
     <?php } else{?>

       <p>Data is not available! </p>
     <?php } ?>
   </table>

   <a href="../Result/create.php" style="margin-left: 450px;">Create</a>

   </body>
</html>

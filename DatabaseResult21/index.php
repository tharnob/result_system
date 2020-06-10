<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="DatabaseResult21\index.css">
</head>
<body>


<?php


  include "database.php";

 ?>



<?php

  $db = new Database3();
  $query = "SELECT * FROM level_two_term_one";
  $read = $db->select($query);
 ?>

<?php

  if(isset($_GET['msg'])){
    echo "<span style = 'color:green'>".$_GET['msg']."</span>";
  }


 ?>


   <table class="tableOne" border="1">

     <tr>

       <th>Student ID</th>
       <th>CSE-201</th>
       <th>CSE-202</th>
       <th>CSE-203</th>
       <th>CSE-204</th>
       <th>CSE-205</th>
       <th>CSE-206</th>
       <th>EEE-269</th>
       <th>EEE-270</th>
       <th>MATH-245</th>
       <th>GPA</th>
       <th>Action</th>

     </tr>

     <?php  if($read){ ?>
     <?php while($row = $read->fetch_assoc()){ ?>
     <tr>

       <td><?php echo $row["student_id"];?></td>
       <td><?php echo $row["cse_201"];?></td>
       <td><?php echo $row["cse_202"];?></td>
       <td><?php echo $row["cse_203"];?></td>
       <td><?php echo $row["cse_204"];?></td>
       <td><?php echo $row["cse_205"];?></td>
       <td><?php echo $row["cse_206"];?></td>
       <td><?php echo $row["eee_269"];?></td>
       <td><?php echo $row["eee_270"];?></td>
       <td><?php echo $row["math_245"];?></td>
       <td><?php echo $row["gpa"];?></td>

       <td><a href="DatabaseResult21/update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a> </td>

     </tr>

     <?php } ?>
     <?php } else{?>

       <p>Data is not available! </p>
     <?php } ?>
   </table>

   <a href="DatabaseResult21/create.php">Create</a>

   </body>
</html>

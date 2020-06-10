<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="DatabaseResult32/index.css">
</head>
<body>


<?php


  include "database.php";

 ?>



<?php

  $db = new Database6();
  $query = "SELECT * FROM level_three_term_two";
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
       <th>CSE-101</th>
       <th>CSE-102</th>
       <th>EEE-163</th>
       <th>EEE-164</th>
       <th>MATH-141</th>
       <th>CHEM-101</th>
       <th>HUM-101</th>
       <th>HUM-102</th>
       <th>CE-150</th>
       <th>GPA</th>
       <th>Action</th>

     </tr>

     <?php  if($read){ ?>
     <?php while($row = $read->fetch_assoc()){ ?>
     <tr>

       <td><?php echo $row["student_id"];?></td>
       <td><?php echo $row["cse_101"];?></td>
       <td><?php echo $row["cse_102"];?></td>
       <td><?php echo $row["eee_163"];?></td>
       <td><?php echo $row["eee_164"];?></td>
       <td><?php echo $row["math_141"];?></td>
       <td><?php echo $row["chem_101"];?></td>
       <td><?php echo $row["hum_101"];?></td>
       <td><?php echo $row["hum_102"];?></td>
       <td><?php echo $row["ce_150"];?></td>
       <td><?php echo $row["gpa"];?></td>

       <td><a href="DatabaseResult32/update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>

     </tr>

     <?php } ?>
     <?php } else{?>

       <p>Data is not available! </p>
     <?php } ?>
   </table>

   <a href="DatabaseResult32/create.php">Create</a>

   </body>
</html>

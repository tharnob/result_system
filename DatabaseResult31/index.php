<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="DatabaseResult31/index.css">
</head>
<body>


<?php


  include "database.php";

 ?>



<?php

  $db = new Database5();
  $query = "SELECT * FROM level_three_term_one";
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
       <th>PHY-103</th>
       <th>CSE-103</th>
       <th>CSE-105</th>
       <th>CSE-106</th>
       <th>EEE-169</th>
       <th>EEE-170</th>
       <th>MATH-143</th>
       <th>PHY-104</th>
       <th>ME-181</th>
       <th>GPA</th>
       <th>Action</th>

     </tr>

     <?php  if($read){ ?>
     <?php while($row = $read->fetch_assoc()){ ?>
     <tr>

       <td><?php echo $row["student_id"];?></td>
       <td><?php echo $row["phy_103"];?></td>
       <td><?php echo $row["cse_103"];?></td>
       <td><?php echo $row["cse_105"];?></td>
       <td><?php echo $row["cse_106"];?></td>
       <td><?php echo $row["eee_169"];?></td>
       <td><?php echo $row["eee_170"];?></td>
       <td><?php echo $row["math_143"];?></td>
       <td><?php echo $row["phy_104"];?></td>
       <td><?php echo $row["me_181"];?></td>
       <td><?php echo $row["gpa"];?></td>

       <td><a href="DatabaseResult31/update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a> </td>

     </tr>

     <?php } ?>
     <?php } else{?>

       <p>Data is not available! </p>
     <?php } ?>
   </table>

   <a href="DatabaseResult31/create.php">Create</a>

   </body>
</html>

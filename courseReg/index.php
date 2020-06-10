
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

  $db = new Database44();
  $query = "SELECT * FROM course_reg";
  $read = $db->select($query);
 ?>

<?php

  if(isset($_GET['msg'])){
    echo "<span style = 'color:green'>".$_GET['msg']."</span>";
  }

 ?>
   <table class="table1" border="3" style="width: 80%;text-align: center;margin-left: 60px;margin-top: 30px;padding: 2px;">



     <tr>

       <th>ID</th>
       <th>Teachers ID</th>
       <th>Course Code</th>
       <th>Action</th>




     </tr>

     <?php  if($read){ ?>
     <?php while($row = $read->fetch_assoc()){ ?>
     <tr>

       <td><?php echo $row["id"];?></td>
       <td><?php echo $row["teacherid"];?></td>
       <td><?php echo $row["coursecode"];?></td>


       <td><a href="../courseReg/update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>



     </tr>

     <?php } ?>
     <?php } else{?>

       <p>Data is not available! </p>
     <?php } ?>
   </table>

   <a href="../courseReg/create.php" style="margin-left: 130px;">Create</a>

   </body>
</html>

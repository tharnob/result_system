<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>createResultSessional</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>


<?php


  include "database.php";

  $db = new Database22();

  if(isset($_POST['submit'])){

    $cc = mysqli_real_escape_string($db->link, $_POST['cc']);
    $batch = mysqli_real_escape_string($db->link, $_POST['batch']);
    $semister = mysqli_real_escape_string($db->link, $_POST['semister']);
    $id = mysqli_real_escape_string($db->link, $_POST['id']);
    $total = mysqli_real_escape_string($db->link, $_POST['total']);
    $total100 = mysqli_real_escape_string($db->link, $_POST['total100']);
    $grade = mysqli_real_escape_string($db->link, $_POST['grade']);



    if($cc == '' || $batch == '' || $semister == '' || $id == '' || $total == '' || $total100 == '' || $grade == '')
    {
      $error = "Field must not be Empty !!";
    }

    else {
      $query = "INSERT INTO add_result_sessional(coursecode,batch,semister,id,total,total100,grade)VALUES('$cc','$batch','$semister','$id','$total','$total100','$grade')";

      $create = $db->insert($query);
    }
  }

  ?>
  <?php

    if(isset($error)){
      echo '<span style="color:red">'.$error.'</span>';
    }

   ?>

   <form action='create.php' method='post'>
   <table>


     <tr>

       <td>Course Code</td>
       <td><input type='text' name='cc' placeholder='Enter Course Code'/></td>

     </tr>


       <tr>

         <td>Batch</td>
         <td><input type='text' name='batch' placeholder='Enter Batch'/></td>

       </tr>

       <tr>

         <td>Semister</td>
         <td><input type='text' name='semister' placeholder='Enter Semister'/></td>

       </tr>

       <tr>

         <td>Student ID</td>
         <td><input type='text' name='id' placeholder='Enter ID'/></td>

       </tr>

       <tr>

         <td>Total</td>
         <td><input type='text' name='total' placeholder='Enter Total Number'/></td>

       </tr>
       <tr>

         <td>Total(100)</td>
         <td><input type='text' name='total100' placeholder='Enter Total Number in 100'/></td>

       </tr>
       <tr>

         <td>Grade</td>
         <td><input type='text' name='grade' placeholder='Enter Grade'/></td>

       </tr>


       <tr>

         <td></td>
         <td>
           <input type='submit' name='submit' value='Submit'/>
           <input type='reset' value='Cancel'/>
         </td>

     </tr>

   </table>
 </form>
 <a href='../Teacher/teacher.php'>Go Back</a>



   </body>
   </html>

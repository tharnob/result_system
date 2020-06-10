<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>createResult</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>


<?php


  include "database.php";

  $db = new Database11();

  if(isset($_POST['submit'])){

    $cc = mysqli_real_escape_string($db->link, $_POST['cc']);
    $batch = mysqli_real_escape_string($db->link, $_POST['batch']);
    $semister = mysqli_real_escape_string($db->link, $_POST['semister']);
    $id = mysqli_real_escape_string($db->link, $_POST['id']);
    $ct1 = mysqli_real_escape_string($db->link, $_POST['ct1']);
    $ct2 = mysqli_real_escape_string($db->link, $_POST['ct2']);
    $ct3 = mysqli_real_escape_string($db->link, $_POST['ct3']);
    $assignment = mysqli_real_escape_string($db->link, $_POST['assignment']);
    $attendence = mysqli_real_escape_string($db->link, $_POST['attendance']);
    $performance = mysqli_real_escape_string($db->link, $_POST['performance']);
    $finalPart1 = mysqli_real_escape_string($db->link, $_POST['finalPart1']);
    $finalPart2 = mysqli_real_escape_string($db->link, $_POST['finalPart2']);
    $total = mysqli_real_escape_string($db->link, $_POST['total']);
    $total100 = mysqli_real_escape_string($db->link, $_POST['total100']);
    $grade = mysqli_real_escape_string($db->link, $_POST['grade']);



    if($cc == '' || $batch == '' || $semister == '' || $id == '' || $ct1 == '' || $ct2 == '' || $ct3 == '' || $assignment == '' || $attendence == '' || $performance == '' || $finalPart1 == '' || $finalPart2 == '' || $total == '' || $total100 == '' || $grade == '')
    {
      $error = "Field must not be Empty !!";
    }

    else {
      $query = "INSERT INTO add_result(coursecode,batch,semister,id,ct1,ct2,ct3,assignment,attendance,performance,finalPart1,finalPart2,total,total100,grade)VALUES('$cc','$batch','$semister','$id','$ct1','$ct2','$ct3','$assignment','$attendence','$performance','$finalPart1','$finalPart2','$total','$total100','$grade')";

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

         <td>CT-1</td>
         <td><input type='text' name='ct1' placeholder='Enter CT-1 Number'/></td>

       </tr>
       <tr>

         <td>CT-2</td>
         <td><input type='text' name='ct2' placeholder='Enter CT-2 Number'/></td>

       </tr>
       <tr>

         <td>CT-3</td>
         <td><input type='text' name='ct3' placeholder='Enter CT-3 Number'/></td>

       </tr>

       <tr>

         <td>Assignment</td>
         <td><input type='text' name='assignment' placeholder='Enter Assignment Number'/></td>

       </tr>
       <tr>

         <td>Attendance</td>
         <td><input type='text' name='attendance' placeholder='Enter Attendance Number'/></td>

       </tr>
       <tr>

         <td>Performance</td>
         <td><input type='text' name='performance' placeholder='Enter Performance Number'/></td>

       </tr>
       <tr>

         <td>Final Part-1</td>
         <td><input type='text' name='finalPart1' placeholder='Enter Part-1 Final Result'/></td>

       </tr>
       <tr>

         <td>Final Part-2</td>
         <td><input type='text' name='finalPart2' placeholder='Enter Part-2 Final Result'/></td>

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
 <a href='../Teacher/modifyTeacher.php'>Go Back</a>



   </body>
   </html>

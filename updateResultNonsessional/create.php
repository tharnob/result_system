<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  

</head>
<body>


<?php


  include "database.php";

  $db = new Database9();

  if(isset($_POST['submit'])){

    $coursecode = mysqli_real_escape_string($db->link, $_POST['coursecode']);
    $batch = mysqli_real_escape_string($db->link, $_POST['batch']);
    $semister = mysqli_real_escape_string($db->link, $_POST['semister']);
    $id = mysqli_real_escape_string($db->link, $_POST['id']);
    $ct1 = mysqli_real_escape_string($db->link, $_POST['ct1']);
    $ct2 = mysqli_real_escape_string($db->link, $_POST['ct2']);
    $ct3 = mysqli_real_escape_string($db->link, $_POST['ct3']);
    $assignment = mysqli_real_escape_string($db->link, $_POST['assignment']);
    $attendance = mysqli_real_escape_string($db->link, $_POST['attendance']);
    $performance = mysqli_real_escape_string($db->link, $_POST['performance']);
    $finalPart1 = mysqli_real_escape_string($db->link, $_POST['finalPart1']);
    $finalPart2 = mysqli_real_escape_string($db->link, $_POST['finalPart2']);
    $total = mysqli_real_escape_string($db->link, $_POST['total']);
    $total100 = mysqli_real_escape_string($db->link, $_POST['total100']);
    $grade = mysqli_real_escape_string($db->link, $_POST['grade']);



    if($coursecode == '' || $batch == '' || $semister == '' || $id == '' || $ct1 == '' || $ct2 == '' || $ct3 == '' || $assignment == '' || $attendance == '' || $performance == '' || $finalPart1 == '' || $finalPart2 == '' || $total == '' || $total100 == '' || $grade == '')
    {
      $error = "Field must not be Empty !!";
    }

    else {
      $query = "INSERT INTO add_result(coursecode,batch,semister,id,ct1,ct2,ct3,assignment,attendance,performance,finalPart1,finalPart2,total,total100,grade) VALUES('$coursecode','$batch','$semister','$id','$ct1','$ct2','$ct3','$assignment','$attendance','$performance','$finalPart1','$finalPart2','$total','$total100','$grade')";

      $create = $db->insert($query);
    }
  }

  ?>
  <?php

    if(isset($error)){
      echo '<span style="color:red">'.$error.'</span>';
    }

   ?>









   <div class="container rounded-sm mt-5">


     <style media="screen">
       .container{
         border: 2px solid black;
         width: 400px;
         padding: 30px;
       }
     </style>



<h2 style="margin-left: 80px; margin-bottom: 30px; color: blue;">ADD INFO</h2>









   <form action='create.php' method='post'>
   <table>


     <tr>

       <td>Course Code</td>
       <td><input type='text' name='coursecode' placeholder='Please enter Course Code'/></td>

     </tr>


       <tr>

         <td>Batch</td>
         <td><input type='text' name='batch' placeholder='Please enter Batch'/></td>

       </tr>

       <tr>

         <td>Semister</td>
         <td><input type='text' name='semister' placeholder='Please enter Semister'/></td>

       </tr>

       <tr>

         <td>ID</td>
         <td><input type='text' name='id' placeholder='Please enter ID'/></td>

       </tr>

       <tr>

         <td>CT: 1</td>
         <td><input type='text' name='ct1' placeholder='Please enter CT: 1 Result'/></td>

       </tr>

       <tr>

         <td>CT: 2</td>
         <td><input type='text' name='ct2' placeholder='Please enter CT: 2 Result'/></td>

       </tr>

       <tr>

         <td>CT: 3</td>
         <td><input type='text' name='ct3' placeholder='Please enter CT: 3 Result'/></td>

       </tr>
       <tr>

         <td>Assignment</td>
         <td><input type='text' name='assignment' placeholder='Please enter assignment Number'/></td>

       </tr>

       <tr>

         <td>Attendance</td>
         <td><input type='text' name='attendance' placeholder='Please enter Attendance Number'/></td>

       </tr>
       <tr>

         <td>Performance</td>
         <td><input type='text' name='performance' placeholder='Please enter Performance Number'/></td>

       </tr>

       <tr>

         <td>Final Result of Part: 1</td>
         <td><input type='text' name='finalPart1' placeholder='Please enter Result'/></td>

       </tr>
       <tr>

         <td>Final Result of Part: 2</td>
         <td><input type='text' name='finalPart2' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>Total</td>
         <td><input type='text' name='total' placeholder='Please enter Result'/></td>

       </tr>
       <tr>

         <td>Total in 100</td>
         <td><input type='text' name='total100' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>Grade</td>
         <td><input type='text' name='grade' placeholder='Please enter Result'/></td>

       </tr>


       <tr>

         <td></td>
         <td>
           <br>

           <input class="btn btn-primary" type='submit' name='submit' value='Submit'/>
           <input class="btn btn-primary" type='reset' value='Cancel'/>
         </td>

     </tr>

   </table>
 </form>



 <br>
 <br>
 <a class="btn btn-primary" href='../Teacher/modifyTeacher.php'>Go Back</a>


</div>

   </body>
   </html>

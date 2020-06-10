<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="Database\index.css">

</head>
<body>


<?php


  include "database.php";


  $ID = $_GET['id'];
  $cc = $_GET['course_code'];
  $db = new Database11();
  $query = "SELECT * FROM add_result WHERE id=$ID AND coursecode='$cc'";
  $getData = $db->select($query)->fetch_assoc();


  if(isset($_POST['submit'])){

    $cc = mysqli_real_escape_string($db->link, $_POST['cc']);
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


    if($cc == '' || $batch == '' || $semister == '' || $id == '' || $ct1 == '' || $ct2 == '' || $ct3 == '' || $assignment == '' || $attendance == '' || $performance == '' || $finalPart1 == '' || $finalPart2 == '' ||  $total == '' || $total100 == '' || $grade == '')
    {
      $error = "Field must not be Empty !!";
    }

    else {
      $query = "UPDATE add_result SET coursecode='$cc',batch='$batch',semister='$semister',id='$id',ct1='$ct1',ct2='$ct2',ct3='$ct3',assignment='$assignment',attendance='$attendance',performance='$performance',finalPart1='$finalPart1',finalPart2='$finalPart2',total='$total',total100='$total100',grade='$grade' WHERE id='$id' AND coursecode = '$cc'";

      $create = $db->update($query);
    }
  }

  ?>


  <?php

    if(isset($_POST['delete']))
    {

      $query = "DELETE FROM add_result WHERE id='$ID' AND coursecode = '$cc'";
      $deleteData = $db->delete($query);

    }

   ?>


  <?php

    if(isset($error)){
      echo "<span style='color:red'>".$error."</span>";
    }

   ?>

   <form action='' method='post'>
   <table id="update_student_result">



     <tr>

       <td>Course Code</td>
       <td><input type='text' name='cc' value='<?php echo $getData['coursecode']?>'/></td>

     </tr>

       <tr>

         <td>Batch</td>
         <td><input type='text' name='batch' value='<?php echo $getData['batch']?>'/></td>

       </tr>

       <tr>

         <td>Semister</td>
         <td><input type='text' name='semister' value='<?php echo $getData['semister']?>'/></td>

       </tr>

       <tr>

         <td>ID</td>
         <td><input type='text' name='id' value='<?php echo $getData['id']?>'/></td>

       </tr>

       <tr>

         <td>CT-1</td>
         <td><input type='text' name='ct1' value='<?php echo $getData['ct1']?>'/></td>

       </tr>


       <tr>

         <td>CT-2</td>
         <td><input type='text' name='ct2' value='<?php echo $getData['ct2']?>'/></td>

       </tr>


       <tr>

         <td>CT-3</td>
         <td><input type='text' name='ct3' value='<?php echo $getData['ct3']?>'/></td>

       </tr>

         <tr>

           <td>Assignment</td>
           <td><input type='text' name='assignment' value='<?php echo $getData['assignment']?>'/></td>

         </tr>

         <tr>

           <td>Attendance</td>
           <td><input type='text' name='attendance' value='<?php echo $getData['attendance']?>'/></td>

         </tr>

         <tr>

           <td>Performance</td>
           <td><input type='text' name='performance' value='<?php echo $getData['performance']?>'/></td>

         </tr>

         <tr>

           <td>Final Result Part-1</td>
           <td><input type='text' name='finalPart1' value='<?php echo $getData['finalPart1']?>'/></td>

         </tr>

         <tr>

           <td>Final Result Part-2</td>
           <td><input type='text' name='finalPart2' value='<?php echo $getData['finalPart2']?>'/></td>

         </tr>

         <tr>

           <td>Total</td>
           <td><input type='text' name='total' value='<?php echo $getData['total']?>'/></td>

         </tr>


         <tr>

           <td>Total(100)</td>
           <td><input type='text' name='total100' value='<?php echo $getData['total100']?>'/></td>

         </tr>

         <tr>

           <td>Grade</td>
           <td><input type='text' name='grade' value='<?php echo $getData['grade']?>'/></td>

         </tr>


       <tr>

         <td></td>
         <td>
           <input type='submit' name='submit' value='Update'/>

           <input type='submit' name='delete' value='Delete'/>
         </td>

     </tr>

   </table>
 </form>
 <a href='../Teacher/modifyTeacher.php'>Go Back</a>



   </body>
   </html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="DatabaseResult41\index.css">
</head>
<body>


<?php


  include "database.php";

  $db = new Database7();

  if(isset($_POST['submit'])){


    $student_id = mysqli_real_escape_string($db->link, $_POST['student_id']);
    $cse_201 = mysqli_real_escape_string($db->link, $_POST['cse_201']);
    $cse_202 = mysqli_real_escape_string($db->link, $_POST['cse_202']);
    $cse_203 = mysqli_real_escape_string($db->link, $_POST['cse_203']);
    $cse_204 = mysqli_real_escape_string($db->link, $_POST['cse_204']);
    $cse_205 = mysqli_real_escape_string($db->link, $_POST['cse_205']);
    $cse_206 = mysqli_real_escape_string($db->link, $_POST['cse_206']);
    $eee_269 = mysqli_real_escape_string($db->link, $_POST['eee_269']);
    $eee_270 = mysqli_real_escape_string($db->link, $_POST['eee_270']);
    $math_245 = mysqli_real_escape_string($db->link, $_POST['math_245']);
    $gpa = mysqli_real_escape_string($db->link, $_POST['gpa']);



    if($student_id == '' || $cse_201 == '' || $cse_202 == '' || $cse_203 == '' || $cse_204 == '' || $cse_205 == '' || $cse_206 == '' || $eee_269 == '' || $eee_270 == '' || $math_245 == '' || $gpa == '')
    {
      $error = "Field must not be Empty !!";
    }

    else {
      $query = "INSERT INTO level_four_term_one(student_id,cse_201,cse_202,cse_203,cse_204,cse_205,cse_206,eee_269,eee_270,math_245,gpa)VALUES('$student_id','$cse_201','$cse_202','$cse_203','$cse_204','$cse_205','$cse_206','$eee_269','$eee_270','$math_245','$gpa')";

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

       <td>Student ID</td>
       <td><input type='text' name='student_id' placeholder='Please enter ID'/></td>

     </tr>


       <tr>

         <td>CSE-201</td>
         <td><input type='text' name='cse_201' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>CSE-202</td>
         <td><input type='text' name='cse_202' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>CSE-203</td>
         <td><input type='text' name='cse_203' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>CSE-204</td>
         <td><input type='text' name='cse_204' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>CSE-205</td>
         <td><input type='text' name='cse_205' placeholder='Please enter Result'/></td>

       </tr>


       <tr>

         <td>CSE-206</td>
         <td><input type='text' name='cse_206' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>EEE-269</td>
         <td><input type='text' name='eee_269' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>EEE-270</td>
         <td><input type='text' name='eee_270' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>MATH-245</td>
         <td><input type='text' name='math_245' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>GPA</td>
         <td><input type='text' name='gpa' placeholder='Please enter Result'/></td>

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
 <a href='../teachersMain.php'>Go Back</a>



   </body>
   </html>

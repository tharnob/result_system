<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="DatabaseResult32\index.css">
</head>
<body>


<?php


  include "database.php";

  $db = new Database6();

  if(isset($_POST['submit'])){


    $student_id = mysqli_real_escape_string($db->link, $_POST['student_id']);
    $cse_101 = mysqli_real_escape_string($db->link, $_POST['cse_101']);
    $cse_102 = mysqli_real_escape_string($db->link, $_POST['cse_102']);
    $eee_163 = mysqli_real_escape_string($db->link, $_POST['eee_163']);
    $eee_164 = mysqli_real_escape_string($db->link, $_POST['eee_164']);
    $math_141 = mysqli_real_escape_string($db->link, $_POST['math_141']);
    $chem_101 = mysqli_real_escape_string($db->link, $_POST['chem_101']);
    $hum_101 = mysqli_real_escape_string($db->link, $_POST['hum_101']);
    $hum_102 = mysqli_real_escape_string($db->link, $_POST['hum_102']);
    $ce_150 = mysqli_real_escape_string($db->link, $_POST['ce_150']);
    $gpa = mysqli_real_escape_string($db->link, $_POST['gpa']);



    if($student_id == '' || $cse_101 == '' || $cse_102 == '' || $eee_163 == '' || $eee_164 == '' || $math_141 == '' || $chem_101 == '' || $hum_101 == '' || $hum_102 == '' || $ce_150 == '' || $gpa == '')
    {
      $error = "Field must not be Empty !!";
    }

    else {
      $query = "INSERT INTO level_three_term_two(student_id,cse_101,cse_102,eee_163,eee_164,math_141,chem_101,hum_101,hum_102,ce_150,gpa)VALUES('$student_id','$cse_101','$cse_102','$eee_163','$eee_164','$math_141','$chem_101','$hum_101','$hum_102','$ce_150','$gpa')";

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

         <td>CSE-101</td>
         <td><input type='text' name='cse_101' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>CSE-102</td>
         <td><input type='text' name='cse_102' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>EEE-163</td>
         <td><input type='text' name='eee_163' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>EEE-164</td>
         <td><input type='text' name='eee_164' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>MATH-141</td>
         <td><input type='text' name='math_141' placeholder='Please enter Result'/></td>

       </tr>


       <tr>

         <td>CHEM-101</td>
         <td><input type='text' name='chem_101' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>HUM-101</td>
         <td><input type='text' name='hum_101' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>HUM-102</td>
         <td><input type='text' name='hum_102' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>CE-150</td>
         <td><input type='text' name='ce_150' placeholder='Please enter Result'/></td>

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

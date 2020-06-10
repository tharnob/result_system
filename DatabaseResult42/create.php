<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="DatabaseResult42\index.css">
</head>
<body>


<?php


  include "database.php";

  $db = new Database8();

  if(isset($_POST['submit'])){


    $student_id = mysqli_real_escape_string($db->link, $_POST['student_id']);
    $phy_103 = mysqli_real_escape_string($db->link, $_POST['phy_103']);
    $cse_103 = mysqli_real_escape_string($db->link, $_POST['cse_103']);
    $cse_105 = mysqli_real_escape_string($db->link, $_POST['cse_105']);
    $cse_106 = mysqli_real_escape_string($db->link, $_POST['cse_106']);
    $eee_169 = mysqli_real_escape_string($db->link, $_POST['eee_169']);
    $eee_170 = mysqli_real_escape_string($db->link, $_POST['eee_170']);
    $math_143 = mysqli_real_escape_string($db->link, $_POST['math_143']);
    $phy_104 = mysqli_real_escape_string($db->link, $_POST['phy_104']);
    $me_181 = mysqli_real_escape_string($db->link, $_POST['me_181']);
    $gpa = mysqli_real_escape_string($db->link, $_POST['gpa']);



    if($student_id == '' || $phy_103 == '' || $cse_103 == '' || $cse_105 == '' || $cse_106 == '' || $eee_169 == '' || $eee_170 == '' || $math_143 == '' || $phy_104 == '' || $me_181 == '' || $gpa == '')
    {
      $error = "Field must not be Empty !!";
    }

    else {
      $query = "INSERT INTO level_four_term_two(student_id,phy_103,cse_103,cse_105,cse_106,eee_169,eee_170,math_143,phy_104,me_181,gpa)VALUES('$student_id','$phy_103','$cse_103','$$cse_105','$cse_106','$eee_169','$eee_170','$math_143','$phy_104','$me_181','gpa')";

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

         <td>PHY-103</td>
         <td><input type='text' name='phy_103' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>CSE-103</td>
         <td><input type='text' name='cse_103' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>CSE-105</td>
         <td><input type='text' name='cse_105' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>CSE-106</td>
         <td><input type='text' name='cse_106' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>EEE-169</td>
         <td><input type='text' name='eee_169' placeholder='Please enter Result'/></td>

       </tr>


       <tr>

         <td>EEE-170</td>
         <td><input type='text' name='eee_170' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>MATH-143</td>
         <td><input type='text' name='math_143' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>PHY-104</td>
         <td><input type='text' name='phy_104' placeholder='Please enter Result'/></td>

       </tr>

       <tr>

         <td>ME-181</td>
         <td><input type='text' name='me_181' placeholder='Please enter Result'/></td>

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

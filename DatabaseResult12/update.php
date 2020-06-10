<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="DatabaseResult12\index.css">
</head>
<body>


<?php


  include "database.php";


  $id = $_GET['id'];
  $db = new Database2();
  $query = "SELECT * FROM level_one_term_two WHERE id=$id";
  $getData = $db->select($query)->fetch_assoc();


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


    if($student_id == '' || $phy_103 == '' || $cse_103 == '' || $cse_105 == '' || $cse_106 == '' || $eee_169 == '' || $eee_170 == '' || $math_143 == '' || $phy_104 == '' || $me_181 == '' || $me_181 == '')
    {
      $error = "Field must not be Empty !!";
    }

    else {
      $query = "UPDATE level_one_term_two SET student_id='$student_id',phy_103='$phy_103',cse_103='$cse_103',cse_105='$$cse_105',cse_106='$cse_106',eee_169='$eee_169',eee_170='$eee_170',math_143='$math_143',phy_104='$phy_104',me_181='$me_181',gpa='$gpa' WHERE id='$id'";

      $create = $db->update($query);
    }
  }

  ?>


  <?php

    if(isset($_POST['delete']))
    {

      $query = "DELETE FROM level_one_term_two WHERE id='$id'";
      $deleteData = $db->delete($query);

    }

   ?>















  <?php

    if(isset($error)){
      echo "<span style='color:red'>".$error."</span>";
    }

   ?>

   <form action='' method='post'>
   <table>



     <tr>

       <td>STUDENT ID</td>
       <td><input type='text' name='student_id' value='<?php echo $getData['student_id']?>'/></td>

     </tr>

       <tr>

         <td>PHY-103</td>
         <td><input type='text' name='phy_103' value='<?php echo $getData['phy_103']?>'/></td>

       </tr>

       <tr>

         <td>CSE-103</td>
         <td><input type='text' name='cse_103' value='<?php echo $getData['cse_103']?>'/></td>

       </tr>

       <tr>

         <td>CSE-105</td>
         <td><input type='text' name='cse_105' value='<?php echo $getData['cse_105']?>'/></td>

       </tr>

       <tr>

         <td>cse_106</td>
         <td><input type='text' name='cse_106' value='<?php echo $getData['cse_106']?>'/></td>

       </tr>


       <tr>

         <td>EEE-169</td>
         <td><input type='text' name='eee_169' value='<?php echo $getData['eee_169']?>'/></td>

       </tr>

       <tr>

         <td>EEE-170</td>
         <td><input type='text' name='eee_170' value='<?php echo $getData['eee_170']?>'/></td>

       </tr>

       <tr>

         <td>MATH-143</td>
         <td><input type='text' name='math_143' value='<?php echo $getData['math_143']?>'/></td>

       </tr>

       <tr>

         <td>PHY-104</td>
         <td><input type='text' name='phy_104' value='<?php echo $getData['phy_104']?>'/></td>

       </tr>


       <tr>

         <td>ME-181</td>
         <td><input type='text' name='me_181' value='<?php echo $getData['me_181']?>'/></td>

       </tr>

       <tr>

         <td>GPA</td>
         <td><input type='text' name='gpa' value='<?php echo $getData['gpa']?>'/></td>

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
 <a href='../teachersMain.php'>Go Back</a>



   </body>
   </html>

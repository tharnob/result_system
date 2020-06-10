<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="DatabaseResult32/index.css">
</head>
<body>


<?php


  include "database.php";


  $id = $_GET['id'];
  $db = new Database6();
  $query = "SELECT * FROM level_three_term_two WHERE id=$id";
  $getData = $db->select($query)->fetch_assoc();


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
      $query = "UPDATE level_three_term_two SET student_id='$student_id',cse_101='$cse_101',cse_102='$cse_102',eee_163='$eee_163',eee_164='$eee_164',math_141='$math_141',chem_101='$chem_101',hum_101='$hum_101',hum_102='$hum_102',ce_150='$ce_150',gpa='$gpa' WHERE id='$id'";

      $create = $db->update($query);
    }
  }

  ?>


  <?php

    if(isset($_POST['delete']))
    {

      $query = "DELETE FROM level_three_term_two WHERE id='$id'";
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

         <td>CSE-101</td>
         <td><input type='text' name='cse_101' value='<?php echo $getData['cse_101']?>'/></td>

       </tr>

       <tr>

         <td>CSE-102</td>
         <td><input type='text' name='cse_102' value='<?php echo $getData['cse_102']?>'/></td>

       </tr>

       <tr>

         <td>EEE-163</td>
         <td><input type='text' name='eee_163' value='<?php echo $getData['eee_163']?>'/></td>

       </tr>

       <tr>

         <td>EEE-164</td>
         <td><input type='text' name='eee_164' value='<?php echo $getData['eee_164']?>'/></td>

       </tr>


       <tr>

         <td>MATH-141</td>
         <td><input type='text' name='math_141' value='<?php echo $getData['math_141']?>'/></td>

       </tr>

       <tr>

         <td>CHEM-101</td>
         <td><input type='text' name='chem_101' value='<?php echo $getData['chem_101']?>'/></td>

       </tr>

       <tr>

         <td>HUM-101</td>
         <td><input type='text' name='hum_101' value='<?php echo $getData['hum_101']?>'/></td>

       </tr>

       <tr>

         <td>HUM-102</td>
         <td><input type='text' name='hum_102' value='<?php echo $getData['hum_102']?>'/></td>

       </tr>


       <tr>

         <td>CE-150</td>
         <td><input type='text' name='ce_150' value='<?php echo $getData['ce_150']?>'/></td>

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

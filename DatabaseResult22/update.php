<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="DatabaseResult22\index.css">
</head>
<body>


<?php


  include "database.php";


  $id = $_GET['id'];
  $db = new Database4();
  $query = "SELECT * FROM level_two_term_two WHERE id=$id";
  $getData = $db->select($query)->fetch_assoc();


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
      $query = "UPDATE level_two_term_two SET student_id='$student_id',cse_201='$cse_201',cse_202='$cse_202',cse_203='$cse_203',cse_204='$cse_204',cse_205='$cse_205',cse_206='$cse_206',eee_269='$eee_269',eee_270='$eee_270',math_245='$math_245',gpa='$gpa' WHERE id='$id'";

      $create = $db->update($query);
    }
  }

  ?>


  <?php

    if(isset($_POST['delete']))
    {

      $query = "DELETE FROM level_two_term_two WHERE id='$id'";
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

         <td>CSE-201</td>
         <td><input type='text' name='cse_201' value='<?php echo $getData['cse_201']?>'/></td>

       </tr>

       <tr>

         <td>CSE-202</td>
         <td><input type='text' name='cse_202' value='<?php echo $getData['cse_202']?>'/></td>

       </tr>

       <tr>

         <td>CSE-203</td>
         <td><input type='text' name='cse_203' value='<?php echo $getData['cse_203']?>'/></td>

       </tr>

       <tr>

         <td>CSE-204</td>
         <td><input type='text' name='cse_204' value='<?php echo $getData['cse_204']?>'/></td>

       </tr>


       <tr>

         <td>CSE-205</td>
         <td><input type='text' name='cse_205' value='<?php echo $getData['cse_205']?>'/></td>

       </tr>

       <tr>

         <td>CSE-206</td>
         <td><input type='text' name='cse_206' value='<?php echo $getData['cse_206']?>'/></td>

       </tr>

       <tr>

         <td>EEE-269</td>
         <td><input type='text' name='eee_269' value='<?php echo $getData['eee_269']?>'/></td>

       </tr>

       <tr>

         <td>EEE-270</td>
         <td><input type='text' name='eee_270' value='<?php echo $getData['eee_270']?>'/></td>

       </tr>


       <tr>

         <td>MATH-245</td>
         <td><input type='text' name='math_245' value='<?php echo $getData['math_245']?>'/></td>

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

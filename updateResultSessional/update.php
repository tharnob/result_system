<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="Database\index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>


<?php


  include "database.php";


  $ID = $_GET['id'];
  $db = new Database10();
  $query = "SELECT * FROM add_result_sessional WHERE sessionalid=$ID";
  $getData = $db->select($query)->fetch_assoc();


  if(isset($_POST['submit'])){

    $coursecode = mysqli_real_escape_string($db->link, $_POST['coursecode']);
    $batch = mysqli_real_escape_string($db->link, $_POST['batch']);
    $semister = mysqli_real_escape_string($db->link, $_POST['semister']);
    $id = mysqli_real_escape_string($db->link, $_POST['id']);
    $total = mysqli_real_escape_string($db->link, $_POST['total']);
    $total100 = mysqli_real_escape_string($db->link, $_POST['total100']);
    $grade = mysqli_real_escape_string($db->link, $_POST['grade']);


    if($coursecode == '' || $batch == '' || $semister == '' || $id == '' || $total == '' || $total100 == '' || $grade == '')
    {
      $error = "Field must not be Empty !!";
    }

    else {
      $query = "UPDATE add_result_sessional SET coursecode='$coursecode',batch='$batch',semister='$semister',id='$id',total='$total',total100='$total100',grade='$grade' WHERE sessionalid='$ID'";

      $create = $db->update($query);
    }
  }

  ?>


  <?php

    if(isset($_POST['delete']))
    {

      $query = "DELETE FROM add_result_sessional WHERE sessionalid='$ID'";
      $deleteData = $db->delete($query);

    }

   ?>















  <?php

    if(isset($error)){
      echo "<span style='color:red'>".$error."</span>";
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



<h2 style="margin-left: 80px; margin-bottom: 30px; color: blue;">Edit Info</h2>





   <form action='' method='post'>
   <table id="update_student_info">



     <tr>

       <td>Course Code</td>
       <td><input type='text' name='coursecode' value='<?php echo $getData['coursecode']?>'/></td>

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

         <td>Total</td>
         <td><input type='text' name='total' value='<?php echo $getData['total']?>'/></td>

       </tr>
       <tr>

         <td>Total in 100</td>
         <td><input type='text' name='total100' value='<?php echo $getData['total100']?>'/></td>

       </tr>
       <tr>

         <td>Grade</td>
         <td><input type='text' name='grade' value='<?php echo $getData['grade']?>'/></td>

       </tr>


       <tr>

         <td></td>
         <td>
           <br>
           
           <input class="btn btn-primary" type='submit' name='submit' value='Update'/>

           <input class="btn btn-primary" type='submit' name='delete' value='Delete'/>
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

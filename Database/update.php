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
  $db = new Database1();
  $query = "SELECT * FROM student_info WHERE ID=$ID";
  $getData = $db->select($query)->fetch_assoc();


  if(isset($_POST['submit'])){

    $ID = mysqli_real_escape_string($db->link, $_POST['ID']);
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $dept = mysqli_real_escape_string($db->link, $_POST['dept']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $section = mysqli_real_escape_string($db->link, $_POST['section']);
    $batch = mysqli_real_escape_string($db->link, $_POST['batch']);


    if($ID == '' || $name == '' || $dept == '' || $email == '' || $section == '' || $batch == '')
    {
      $error = "Field must not be Empty !!";
    }

    else {
      $query = "UPDATE student_info SET ID='$ID',name='$name',dept='$dept',email='$email',section='$section',batch='$batch' WHERE ID='$ID'";

      $create = $db->update($query);
    }
  }

  ?>


  <?php

    if(isset($_POST['delete']))
    {

      $query = "DELETE FROM student_info WHERE ID='$ID'";
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

       <td>ID</td>
       <td><input type='text' name='ID' value='<?php echo $getData['ID']?>'/></td>

     </tr>

       <tr>

         <td>Name</td>
         <td><input type='text' name='name' value='<?php echo $getData['name']?>'/></td>

       </tr>

       <tr>

         <td>Department</td>
         <td><input type='text' name='dept' value='<?php echo $getData['dept']?>'/></td>

       </tr>

       <tr>

         <td>Email</td>
         <td><input type='email' name='email' value='<?php echo $getData['email']?>'/></td>

       </tr>

       <tr>

         <td>Section</td>
         <td><input type='text' name='section' value='<?php echo $getData['section']?>'/></td>

       </tr>


       <tr>

         <td>Batch</td>
         <td><input type='text' name='batch' value='<?php echo $getData['batch']?>'/></td>

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


 <a class="btn btn-primary" href='../Teacher/teacher.php'>Go Back</a>



</div>





















   </body>
   </html>

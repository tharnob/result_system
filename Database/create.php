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

  $db = new Database1();

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
      $query = "INSERT INTO student_info(ID,name,dept,email,section,batch)VALUES('$ID','$name','$dept','$email','$section','$batch')";

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

       <td>ID</td>
       <td><input type='text' name='ID' placeholder='Please enter ID'/></td>

     </tr>


       <tr>

         <td>Name</td>
         <td><input type='text' name='name' placeholder='Please enter name'/></td>

       </tr>

       <tr>

         <td>Department</td>
         <td><input type='text' name='dept' placeholder='Please enter Department'/></td>

       </tr>

       <tr>

         <td>Email</td>
         <td><input type='email' name='email' placeholder='Please enter email'/></td>

       </tr>

       <tr>

         <td>Section</td>
         <td><input type='text' name='section' placeholder='Please enter Section'/></td>

       </tr>

       <tr>

         <td>Batch</td>
         <td><input type='text' name='batch' placeholder='Please enter Batch'/></td>

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


 <a class="btn btn-primary" href='../Teacher/teacher.php'>Go Back</a>




</div>





   </body>
   </html>

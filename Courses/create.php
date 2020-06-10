<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Course Code</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>


<?php


  include "database.php";

  $db = new Database33();

  if(isset($_POST['submit'])){

    $id = mysqli_real_escape_string($db->link, $_POST['id']);
    $semister = mysqli_real_escape_string($db->link, $_POST['semister']);
    $department = mysqli_real_escape_string($db->link, $_POST['department']);
    $courseno = mysqli_real_escape_string($db->link, $_POST['courseno']);
    $coursetitle = mysqli_real_escape_string($db->link, $_POST['coursetitle']);
    $credits = mysqli_real_escape_string($db->link, $_POST['credits']);




    if($id == '' || $semister == '' || $department == '' || $courseno == '' || $coursetitle == '' || $credits == '')
    {
      $error = "Field must not be Empty !!";
    }

    else {
      $query = "INSERT INTO courses(id,semister,department,courseno,coursetitle,credits)VALUES('$id','$semister','$department','$courseno','$coursetitle','$credits')";

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
         <td><input type='text' name='id' placeholder='Enter ID'/></td>

       </tr>

       <tr>

         <td>Semister</td>
         <td><input type='text' name='semister' placeholder='Enter Semister'/></td>

       </tr>

       <tr>

         <td>Department</td>
         <td><input type='text' name='department' placeholder='Enter Department'/></td>

       </tr>

       <tr>

         <td>Course NO</td>
         <td><input type='text' name='courseno' placeholder='Enter Course No'/></td>

       </tr>
       <tr>

         <td>Course Title</td>
         <td><input type='text' name='coursetitle' placeholder='Enter Course Title'/></td>

       </tr>
       <tr>

         <td>Credits</td>
         <td><input type='text' name='credits' placeholder='Enter Credits'/></td>

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
 <a class="btn btn-primary" href='../Teacher/modifyTeacher.php'>Go Back</a>



</div>

   </body>
   </html>

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
  $db = new Database44();
  $query = "SELECT * FROM course_reg WHERE id=$ID";
  $getData = $db->select($query)->fetch_assoc();


  if(isset($_POST['submit'])){

    $teacherid = mysqli_real_escape_string($db->link, $_POST['teacherid']);
    $coursecode = mysqli_real_escape_string($db->link, $_POST['coursecode']);



    if($teacherid == '' || $coursecode == '')
    {
      $error = "Field must not be Empty !!";
    }

    else {
      $query = "UPDATE course_reg SET teacherid='$teacherid',coursecode='$coursecode' WHERE id='$ID'";

      $create = $db->update($query);
    }
  }

  ?>


  <?php

    if(isset($_POST['delete']))
    {

      $query = "DELETE FROM course_reg WHERE id='$ID'";
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
   <table id="course_reg">



     <tr>

       <td>Teacher ID</td>
       <td><input type='text' name='teacherid' value='<?php echo $getData['teacherid']?>'/></td>

     </tr>

       <tr>

         <td>Course Code</td>
         <td><input type='text' name='coursecode' value='<?php echo $getData['coursecode']?>'/></td>

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
 <a class="btn btn-primary" href='../superAdmin/superAdmin.php'>Go Back</a>




</div>



   </body>
   </html>

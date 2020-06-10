<?php






include "C:\install\htdocs\PROJECTS\MY PROJECT\Students\processForm.php";





 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Image Preview and Upload PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
  </head>
  <body>







    <div class="jumbotron jumbotron-fluid bg-primary">
      <div class="container">
        <h1 class="text-center">Upload Image</h1>

        <p></p>
      </div>
    </div>










    <div class="container">
      <div class="row">
        <div class="col-4 offset-md-4 form-div">







          <form class="" action="profileImage.php" method="post" enctype="multipart/form-data">

            <h3 class="text-center">Save Profile Image</h3>





            <div class="form-group">

              <label for="profileImage">Profile Image</label>
              <input type="file" name="profileImage" class="form-control">

            </div>

            <div class="form-group">
                <button type="submit" name="save-user" class="btn btn-primary btn-block">Save Image</button>
            </div>

          </form>










        </div>
      </div>
    </div>



  </body>
</html>

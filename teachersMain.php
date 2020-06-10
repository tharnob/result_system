<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Teachers Main</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/styleTeachersMain.css">





</head>
<body>






<div class="navbar1">

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">

      <img src="img\baiustLogo.png" alt="Logo">
    </a>

    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>



    </ul>





    </nav>


  <br>

</div>






<!--PROPERTY OF SIDE NAV BAR-->




<div class="container">

  <br>

    <!-- Nav pills -->
  <ul class="nav flex-column nav-pills " role="tablist">

    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#home">Students</a>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu2">Result</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu3">Courses</a>
    </li>







  </ul>


  <!-- Tab panes -->
  <div class="tab-content">

    <div id="menu1" class="container tab-pane fade"><br>
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="container tab-pane fade">

      <br>






        <h3>Level 1, Term 1</h3>
        <?php

          include 'DatabaseResult11/index.php';
         ?>



         <br>
         <br><br><br><br>


         <h3>Level 1, Term 2</h3>
         <?php

           include 'DatabaseResult12/index.php';
         ?>

         <br>
         <br><br><br><br>

        <h3>Level 2, Term 1</h3>
        <?php

          include 'DatabaseResult21/index.php';
        ?>


        <br>
        <br><br><br><br>

        <h3>Level 2, Term 2</h3>
        <?php

          include 'DatabaseResult22/index.php';
        ?>

        <br>
        <br><br><br><br>

        <h3>Level 3, Term 1</h3>
        <?php

          include 'DatabaseResult31/index.php';
        ?>



        <br>
        <br><br><br><br>

        <h3>Level 3, Term 2</h3>
        <?php

          include 'DatabaseResult32/index.php';
        ?>


        <br>
        <br><br><br><br>

        <h3>Level 4, Term 1</h3>
        <?php

          include 'DatabaseResult41/index.php';
        ?>


        <br>
        <br><br><br><br>

        <h3>Level 4, Term 2</h3>
        <?php

          include 'DatabaseResult42/index.php';
        ?>




    </div>
    <div id="menu3" class="container tab-pane fade"><br>
      <h3>Courses</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="home" class="container tab-pane active"><br>
      <h3>Students Information</h3>
      <?php
      include 'Database/index.php';


      ?>
    </div>
  </div>
</div>


<

</body>
</html>

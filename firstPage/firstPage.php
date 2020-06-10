<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>First Page</title>

    <link rel="stylesheet" href="firstPage.css">


    <style media="screen">
      .img-jmbo{
        background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('cover.jpg');
        background-size: cover;



      }
    </style>
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



    <div class="jumbotron img-jmbo">
      <div class="container">
        <h1 class="text-center text-white">Welcome to</h1>
        <h3 class="text-center text-white">RESULT MANAGEMENT SYSTEM</h3>

        <p></p>
      </div>
    </div>






    <div class="container buttons">

      <button onclick="document.location = '../superAdmin/superLogin.php'" class = "btn btn1" type="submit" name="button1">Super Admin</button>
      <button onclick="document.location = '../Teacher/teacherLogin.php'" class = "btn btn2" type="submit" name="button2">Teacher</button>
      <button onclick="document.location = '../Students/studentsLogin.php'" class = "btn btn3" type="submit" name="button3">Student</button>
      <button onclick="document.location = '../coeOffice/coeLogin.php'" class = "btn btn4" type="submit" name="button4">COE Office</button>

    </div>





    <div class="footer">


      <h4>Developed by:</h4>
      <h6>Tafsir Haque Arnob</h6>
      <h6>Abdullah Al Momin</h6>
    </div>


    <style>
      .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: DodgerBlue;
        color: white;
        text-align: center;
        padding: 10px;
      }


    </style>



  </body>
</html>

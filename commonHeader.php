<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Super Admin</title>




  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="css\superAdminStyle.css">



</head>
<body>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>







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


        <!-- Dropdown -->
        <li class="nav-item dropdown ml-auto">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Profile
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">View Profile</a>
            <a class="dropdown-item" href="#">Edit Profile</a>
            <a class="dropdown-item" href="#">Change Password</a>
          </div>
        </li>
      </ul>


      </nav>


    <br>

  </div>






  <!--PROPERTY OF SIDE NAV BAR-->




  <div class="container">

    <br>
    <!-- Nav pills -->
    <ul class="nav flex-column nav-pills" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#home">Dashboard</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu2">Add Teacher</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu3">Remove Teachers Account</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#menu4">Access</a>
      </li>




    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active"><br>
        <h3>Dashboard</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div id="menu1" class="container tab-pane fade"><br>
        <h3>Menu 1</h3>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
      <div id="menu2" class="container tab-pane fade"><br>
        <h3>Add a Teacher</h3>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
      </div>
      <div id="menu3" class="container tab-pane fade"><br>
        <h3>Remove a Teachers Account</h3><br>




        <nav class="search_button_rm_teacher navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
          <form class="form-inline" action="/action_page.php">
            <input class="form-control mr-sm-4" type="text" placeholder="Teachers Name">
            <button class="btn btn-success" type="submit">Search</button>
          </form>
        </nav>
      </div>

      <div id="menu4" class="container tab-pane fade"><br>
        <h3>Give Access</h3>





          <form class="form_control1">

            <div class="form-group">
              <label for="exampleFormControlSelect1">Teachers Access</label>
              <select class="form-control" id="exampleFormControlSelect1">

                <option>View</option>
                <option>Edit</option>
                <option>Access Denied</option>

              </select>
            </div>

          </form>


          <form class="form_control1">

            <div class="form-group">
              <label for="exampleFormControlSelect1">COE Access</label>
              <select class="form-control" id="exampleFormControlSelect1">

                <option>View</option>
                <option>Edit</option>
                <option>Access Denied</option>

              </select>
            </div>

          </form>

      </div>
    </div>
  </div>



















</body>
</html>

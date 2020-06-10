<?php

  session_start();

  session_destroy();

  header('Location: studentsLogin.php');

 ?>

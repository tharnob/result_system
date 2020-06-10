<?php

  include "config.php";

  class Database22{

      public $host   = DB_HOST22;
      public $user   = DB_USER22;
      public $pass   = DB_PASS22;
      public $dbname = DB_NAME22;


      public $link;
      public $error;

      public function __construct(){
        $this->connectDB();
      }

      private function connectDB(){

        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if(!$this->link)
        {
          $this->error = "Connection fail".$this->link->connect_error;
          return false;
        }
      }


      //Select or Read database

      public function select($query){

        $result = $this->link->query($query) or die($this->link->error.__LINE__);

        if($result->num_rows > 0)
        {
          return $result;
        }
        else
        {
          return false;
        }

      }



      //insert data


      public function insert($query){

        $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

        if($insert_row)
        {
          header("Location: ../Teacher/teacher.php?msg=".urlencode('Data Inserted Successfully'));
          exit();
        }
        else{
          die("Error :(".$this->link->errno.")".$this->link->error);
        }

      }


      //update data

      public function update($query){

        $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

        if($insert_row)
        {
          header("Location: ../Teacher/teacher.php?msg=".urlencode('Data Updated Successfully'));
          exit();
        }
        else{
          die("Error :(".$this->link->errno.")".$this->link->error);
        }

      }








      //delete data

      public function delete($query){

        $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

        if($delete_row)
        {
          header("Location: ../Teacher/teacher.php?msg=".urlencode('Data Deleted Successfully'));
          exit();
        }
        else{
          die("Error :(".$this->link->errno.")".$this->link->error);
        }

      }




  }

 ?>

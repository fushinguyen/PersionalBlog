<?php
  require_once("membersite.php");
  $db_handle = new Membersite();
  $db_handle->DBLogin();
  // $conn = $db_handle->connectDB();
  if (!isset($_POST['submit'])) {
    //Check username
    $sql_checkname = "SELECT * FROM users WHERE username='{$_POST["username"]}'";
    $result = mysqli_num_rows(mysqli_query($db_handle->conn,$sql_checkname));
    if ($result==0) {
      //insert to Database
      $sql_query = "INSERT INTO users (username,email,password)
                VALUES ('" .$_POST["username"]. "'" . "," . "'" .$_POST["email"]. "'" . ",'" . md5($_POST["pwd"]) . "');";
      if (mysqli_query($db_handle->conn,$sql_query)) {
        echo "New record is created successfully.";
      }else {
        echo "Insert failed.";
      }
    }else {
      echo "record existed";
    }
  }
  $db_handle->closeCon();
 ?>

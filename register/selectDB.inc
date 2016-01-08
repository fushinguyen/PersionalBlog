<?php

 $servername = "localhost";
 $db_username = "root";
 $db_pass = "";
 $tlb_name = "users";
 $db_name = "testblog";
  $conn = mysqli_connect($servername, $db_username, $db_pass);
  if(!$conn){
    die("connection failed: " . mysql_error($conn));
  }else {
    echo "connection successful.";
  }
  $db_use = mysqli_select_db($conn, $db_name);
  if (!$db_use) {
    die ("<br>" . "Selection failed: " . mysql_error($conn));
  }else {
    echo "<br>" . "Database is ready to use.";
  }
  if (!isset($_POST['submit'])) {
    $usrname = mysqli_real_escape_string($_POST["username"]);
    //Check username
    $sql_checkname = "SELECT * FROM users WHERE username='{$usrname}'";
    $result = mysqli_num_rows(mysqli_query($conn,$sql_checkname));
    if ($result==0) {
      echo "<br>"."No record";
    }else {
      echo "<br>"."record existed";
    }
  }else {
    echo "<br>"."no data";
  }

  mysqli_close($conn);
  echo "connect closed";
 ?>

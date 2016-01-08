<?php
  /**
   *
   */
  class Membersite
  {
    var $hostname = "localhost";
    var $username = "root";
    var $db_pass = "";
    var $tlb_name = "users";
    var $db_name = "testblog";
    var $conn;

    var $error_message;

    function InitiDB($host,$usrname,$pwd,$database,$tablename){
      $this->hostname=$host;
      $this->username=$usrname;
      $this->db_pass=$pwd;
      $this->db_name=$database;
      $this->tlb_name=$tablename;
    }
    function DBLogin(){
      $this->conn=mysqli_connect($this->hostname, $this->username, $this->db_pass);
      if (!$this->conn) {
        $this->HandleDBError("Database Login failed! Please make sure that the DB login credentials provided are correct");
        return false;
      }
      if (!mysqli_select_db($this->conn, $this->db_name)) {
        $this->HandleDBError("Failed to select database: ".$this->db_name);
        return false;
      }
      return true;
    }
    function HandleDBError($err)
    {
        $this->HandleError($err."\r\n mysqlerror:".mysql_error());
        echo $err."\r\n mysqlerror:".mysql_error();
    }
    function HandleError($err)
    {
        $this->error_message .= $err."\r\n";
    }
    function closeCon(){
      mysqli_close($this->conn);
    }
    function SaveToDatabase(){
      $sql_checkname = "SELECT * FROM users WHERE username='fushi1'";
      $result = mysqli_num_rows(mysqli_query($this->conn,$sql_checkname));
      if ($result==0) {
        echo "<br>"."No record";
      }else {
        echo "<br>"."record existed";
      }
    }
  }

 ?>

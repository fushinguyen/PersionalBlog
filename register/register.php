<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- <?php
    require_once("../register/membersite.php");
    $dbLog=new Membersite();
    $dbLog->InitiDB("localhost","root","","testblog","users");
    $dbLog->DBLogin();
    $dbLog->SaveToDatabase();
    $dbLog->closeCon();
  ?> -->
  <script>
    function checkAvailability(){
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data: 'username='+$("#username").val(),
        type: "POST",
        success:function(data){
          $("#user-availability-status").html(data);
          $("#loaderIcon").hide();
          },
        error:function(){},

      });
    }
  </script>
</head>
<body>
<div class="container">
  <h2>REGISTER</h2>
  <form role="form" method="post" action="confirm.php">
    <div class="form-group">
      <label for="username">User name:</label>
      <input type="username" class="form-control" id="username" name="username" placeholder="Enter username" onBlur="checkAvailability()">
        <span id="user-availability-status"></span>
        <p><img src="../register/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-default">Register</button>

      </div>
    </div>
    </form>
  </div>

</body>
</html>

<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script type="text/javascript" src="js/jquery.js"></script>
  <link rel="stylesheet" href="css/bootstrap.css"/>
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/navbar.css"/>
  <title>Speak better</title>
</head>
<body class="" style="background-image:url('images/bg.jpg'); background-repeat:no-repeat; background-size:cover; height:100%;">
  <nav class="navbar navbar-dark bg-dark" style="width:100%;">
  <a class="navbar-brand" href="#"><img src="images/logo1.png" width="40px" height="40px"/> Speak better</a>
  </nav>
  <main>
    <center>
      <a href="" download="addition.zip" id="down" style="display:none;"></a>
    <div class="btn-group-vertical" >
      <button class="btn btn-primary"  type="button" name="button" onclick="window.location.replace('?use=upload');">Upload recording</button>
      <br>
      <button class="btn btn-primary" type="button" name="button" onclick="window.location.replace('?use=rate');">rate recordings</button>
      <br>
      <button class="btn btn-dark" type="button" name="button" onclick="window.location.replace('?use=results');">show a results </button>
      <br>
      <button class="btn btn-outline-success" type="button" name="button" onclick="window.location.replace('?use=rate_s');">rate students</button>
      <br>
      <button class="btn btn-outline-warning" type="button" name="button" onclick="window.location.replace('?use=tracks');">tracks</button>
      <br>
      <button class="btn btn-outline-danger" type="button" name="button" onclick="download();">additional material </button>
    </div>
    <br><br>
    <br><br>
    <?php
    if (isset($_GET['use'])) {
      $use = $_GET['use'];
      $admin = false;
      $log = false;
      if ($use == 'upload') {
        $log = true;
        $url = "incs/upload.inc.php";
      }
      elseif ($use == 'rate') {
        $log = true;
        $url = "incs/rate.inc.php";
      }
      elseif ($use == 'rate_s') {
        $log = true;
        $url = "incs/rate_s.inc.php";
      }
      elseif ($use == 'results') {
        include "incs/results.inc.php";
      }
      elseif ($use == 'tracks') {
        include "incs/tracks.inc.php";
      }
      if ($log) {
        if (isset($_COOKIE['token'])) {
          require 'reqs/login.req.php';
          $token = $_COOKIE['token'];
          if (!checktoken($token)) {
            $admin = true;
            include "incs/upload.inc.php";
          }
          else {
            setcookie('token', $_COOKIE['token'], time()-10000);
          }
        }
        elseif (isset($_COOKIE['id'])) {
          require 'reqs/check.req.php';
          $id = $_COOKIE['id'];
          if (check_student($id)) {
            include $url;
          }
          else {
            setcookie('token', $_COOKIE['id'], time()-10000);
          }
        }
        else {
          include "incs/login_s.inc.php";
        }
      }
    }
     ?>
  </center>
  </main>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript">
  "use strict"
  function download() {
    var link = document.getElementById("down");
    link.click();
  }
  </script>
</body>
</html>

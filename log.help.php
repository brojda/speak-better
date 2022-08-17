<?php
require 'reqs/login.req.php';
if (isset($_GET['token'])) {
  $check = checktoken($_GET['token']);
  if (!$check['error']) {
    $time = time()+60*60*24*360;
    setcookie('token', $token, $time);
    include "../incs/cpanel.inc.php";
  }
header("Location: admin/?msg=".$check['message']);
else {
  header("Location: ../");
} ?>

<?php
require "../reqs/login.req.php";
if (isset($_COOKIE['token'])) {
  $check = checktoken($_COOKIE['token']);
  if (!$check['error']) {
    include "../incs/cpanel.inc.php";
  }
  else {
    echo $check['message'];
    setcookie('token', $_COOKIE['token'], time()-10000);
    include "../incs/login.inc.php";
  }
}
 else {
   
 }
 ?>

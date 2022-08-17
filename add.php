<?php
require 'reqs/check.req.php';
$erorr="";
if (isset($_POST["btn"])){
    if(!empty($_POST['id']) and !empty($_POST['name'])){
    if (check_student($_POST["id"])){
        $erorr='<div class="alert alert-danger">you are already registered!!</div>';
    }
    else{
        $conn = mysqli_connect('localhost','root','','data');
        if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

      $sql = "INSERT INTO `students`(`id`, `name`) VALUES  (".$_POST['id'].",'".$_POST['name']."')";
      if (mysqli_query($conn, $sql)) {
   $erorr='<div class="alert alert-success"> Added successfully</div>';
} else {
  $erorr = "Error: " . $sql . "<br>" . mysqli_error($conn);
}
      mysqli_close($conn);

    }
    }
    else{
        $erorr='<div class="alert alert-danger"> please input valid data </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
      <br><br><br>
<div class="container">
  <div class="row">
    <div class="offset-2 col-8">
      <center class="bg-light" style="padding:30px;">
          <h1 class="text-info">Register data</h1>
          <br><br><br>
          <?php echo $erorr;?>
          <form method="post">
             <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">@</span>
          </div>
          <input type="number" class="form-control" placeholder="Student ID" aria-label="Username" aria-describedby="basic-addon1" name="id">
        </div>
        <br>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1" name="name">
        </div>
        <br>
        <br>
        <br>
        <button type="submit" class="btn btn-info" name="btn">add me </button>
          </form>
      </center>
      </div>
     </div>
    </div>
  </main>
 </body>
 </html>

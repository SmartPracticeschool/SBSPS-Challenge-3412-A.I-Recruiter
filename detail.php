<?php
session_start();
if(!isset($_SESSION['form']) || $_SESSION['form']!=true)
{
  header("location: index.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Dashboard </title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="dashboard.php">Company Name</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="detail.php">Detail <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="test.php">Test <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="status.php">Status <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout <span class="sr-only"></span></a>
      </li>
    </ul>
  </div>
</nav>


<div class="container my-4 card">
 <h1 class="card-header">Welcome to Detail <?php echo $_SESSION['email']; ?></h1>
 <div class="card-body">
 <?php
  $email = $_SESSION['email'];
$conn = mysqli_connect('localhost', 'root', '', 'ibm');
if (!$conn){
  die("Sorry we failed to connect: ". mysqli_connect_error());
}
$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  echo '<div class="row">
  <div class="col-6 col-sm-3 list-group-item"><h4>Name :</h4></div><div class="col-6 col-sm-3 list-group-item"><h4>'. $row['name'] . '</h4></div>
  <div class="w-100"></div>
  <div class="col-6 col-sm-3 list-group-item"><h4>Email :</h4></div> <div class="col-6 col-sm-3 list-group-item"><h4>'. $row['email'] . '</h4></div>';
} 
$sql = "SELECT * FROM `userdetail` WHERE `email` = '$email'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  echo '<div class="row">
  <div class="col-6 col-sm-3 list-group-item"><h4>Father Name :</h4></div><div class="col-6 col-sm-3 list-group-item"> <h4>'. $row['fathername'] . '</h4></div>
  <div class="w-100"></div>
  <div class="col-6 col-sm-3 list-group-item"><h4>Mother Name :</h4></div><div class="col-6 col-sm-3 list-group-item"><h4> '. $row['mothername'] . '</h4></div>
  <div class="w-100"></div>
  <div class="col-6 col-sm-3 list-group-item"><h4>Gender :</h4></div><div class="col-6 col-sm-3 list-group-item"><h4> '. $row['gender'] . '</h4></div>
  <div class="w-100"></div>
  <div class="col-6 col-sm-3 list-group-item"><h4>Phoneno :</h4></div><div class="col-6 col-sm-3 list-group-item"><h4> '. $row['phoneno'] . '</h4></div>
  <div class="w-100"></div>
  <div class="col-6 col-sm-3 list-group-item"><h4>Address :</h4></div><div class="col-6 col-sm-3 list-group-item"> <h4>'. $row['address'] . '</h4></div>
  <div class="w-100"></div>
  <div class="col-6 col-sm-3 list-group-item"><h4>10th Marks :</h4></div><div class="col-6 col-sm-3 list-group-item"><h4> '. $row['mark10'] . '</h4></div>
  <div class="w-100"></div>
  <div class="col-6 col-sm-3 list-group-item"><h4>12th Marks :</h4></div><div class="col-6 col-sm-3 list-group-item"><h4> '. $row['mark12'] . '</h4></div>
  <div class="w-100"></div>
  <div class="col-6 col-sm-3 list-group-item"><h4>Graduation Marks :</h4></div><div class="col-6 col-sm-3 list-group-item"><h4> '. $row['markgrad'] . '</h4></div>
  <div class="w-100"></div>
  <div class="col-6 col-sm-3 list-group-item"><h4>Studies :</h4></div><div class="col-6 col-sm-3 list-group-item"><h4> '. $row['anystudy'] . '</h4></div>
  <div class="w-100"></div>
  <div class="col-6 col-sm-3 list-group-item"><h4>certification :</h4></div><div class="col-6 col-sm-3 list-group-item"><h4> '. $row['certification'] . '</h4></div>
  <div class="w-100"></div>
  <div class="col-6 col-sm-3 list-group-item"><h4>Technology Known :</h4></div><div class="col-6 col-sm-3 list-group-item"><h4> '. $row['technology'] . '</h4></div>';
}
?>
</div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
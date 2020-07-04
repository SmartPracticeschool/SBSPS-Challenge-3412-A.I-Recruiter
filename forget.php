<?php
$showalert=false;
$showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $conn=mysqli_connect("localhost", "root", "", "ibm");
    if(!$conn)
    {
        die("Error".mysqli_connect_error());
    }
  $email =$_POST["email"];
  $mname =$_POST["mname"];
  $password=$_POST["password"];
  $sql="SELECT * FROM `userdetail` WHERE `email` = '$email' AND 'mothername'='$mname' ";
    $result=mysqli_query($conn, $sql); 
    if($result)
    { 
        $sql="UPDATE `users` SET `password` = '$password' WHERE `email` = '$email' ";
    $result=mysqli_query($conn, $sql); 
    $showalert=true;
    }
  else
  {
    
    $showerror=true;
  }
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
    <style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: black;
  color: white;
  text-align: center;
}
</style>
    <title>Forget Password</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Company Name</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Instructions <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">SignUp <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact <span class="sr-only"></span></a>
      </li>
    </ul>
  </div>
</nav>

<?php
if($showalert)
{
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your password is changed.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($showerror)
{
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Invalid Credentials.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>

      <div class="container card my-4">
    <h1 class="card-header">Forget Password</h1>
    <div class="card-body">
    <form action="/ibm/forget.php" method="post">
  <div class="form-group">
    <label for="email">Email id</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="mname">Mother Name</label>
    <input type="text" class="form-control" id="mname" name="mname">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    </div>
    <div class="footer"> <p> @copyrights 2020</p> </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
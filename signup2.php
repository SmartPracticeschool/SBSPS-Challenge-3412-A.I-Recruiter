<?php
session_start();
if(!isset($_SESSION['form']) || $_SESSION['form']!=true)
{
  header("location: index.php");
  exit;
}
$conn = mysqli_connect('localhost', 'root', '', 'ibm');
if (!$conn){
  die("Sorry we failed to connect: ". mysqli_connect_error());
}
$email = $_SESSION['email'];
$Ninsert=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $gender = $_POST["gender"];
    $phno = $_POST["phno"];
    $dob = $_POST["dob"];
    $add = $_POST["add"];
    $mark10 = $_POST["mark10"];
    $mark12 = $_POST["mark12"];
    $markgad = $_POST["markgad"];
    $description = $_POST["description"];
    $cert = $_POST["cert"];
    $tech = $_POST["tech"];
    $sql = "INSERT INTO `userdetail` (`email`, `fathername`, `mothername`, `dob`, `gender`, `phoneno`, `address`, `mark10`, `mark12`, `markgrad`, `anystudy`, `certification`, `technology`) VALUES ('$email', '$fname', '$mname', '$dob', '$gender,', '$phno', '$add', '$mark10', '$mark12', '$markgad', '$description', '$cert', '$tech')";
    $result = mysqli_query($conn, $sql);  
    if($result){ 
        $insert = true;
        $sql="INSERT INTO `status` (`email`, `s1`, `s2`, `s3`, `s4`) VALUES ('$email', 'Completed', 'Pending', 'Pending', 'Pending')";
        mysqli_query($conn,$sql);
        session_start();
                $_SESSION['form']=true;
                $_SESSION['username']=$username;
                header("location: signup3.php");
    }
    else{
        $Ninsert=true;
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
    <title>SignUP </title>
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
      <li class="nav-item active">
        <a class="nav-link" href="signup.php">SignUp <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact <span class="sr-only"></span></a>
      </li>
    </ul>
  </div>
</nav>

  <?php
  if($Ninsert){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Registration Failed
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>

<div class="container my-4 card">
 <h1 class="card-header">Details <?php echo $_SESSION['email']; ?></h1>
 <div class="card-body">
 <form action="/ibm/signup2.php" method="POST">
 <div class="form-group">
   <div class="card">
 <h3 class="card-header">Personal Details</h3>
 <div class="card-body">
    <label for="fname">Father Name</label>
    <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="mname">Mother Name</label>
    <input type="text" class="form-control" id="mname" name="mname" aria-describedby="emailHelp">
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
          <label class="form-check-label" for="gridRadios1">Male</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
          <label class="form-check-label" for="gridRadios2">Female</label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group">
    <label for="phno">Phone no</label>
    <input type="text" class="form-control" id="phno" name="phno" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="dob">Date of Birth (YYYY-MM-DD)</label>
    <input type="text" class="form-control" id="dob" name="dob" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="add">Address</label>
    <input type="text" class="form-control" id="add" name="add" aria-describedby="emailHelp">
  </div>
  </div>
  </div>
  <div class="card">
  <h3 class="card-header">Education Details</h3>
  <div class="card-body"></div>
  <div class="form-group">
    <label for="mark10">10 th</label>
    <input type="text" class="form-control" id="mark10" name="mark10" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="mark12">12 th</label>
    <input type="text" class="form-control" id="mark12" name="mark12" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="markgad">Graduation </label>
    <input type="text" class="form-control" id="markgad" name="markgad" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="description">Any other Education</label>
    <input type="text" class="form-control" id="description" name="description" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="cert">Certification</label>
    <input type="text" class="form-control" id="cert" name="cert" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="tech">Technical Languages Known</label>
    <input type="text" class="form-control" id="tech" name="tech" aria-describedby="emailHelp">
  </div>
  </div>
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
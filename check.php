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
    <title>Check Result</title>
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
      <li class="nav-item">
        <a class="nav-link" href="detail.php">Detail <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="test.php">Test <span class="sr-only">(current)</span></a>
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

<div class="container card">
<div class="card-header">
<h2>Result of <?php echo $_SESSION['email'];?> </h2>
</div>
<div class="card-body">
<?php
$conn=mysqli_connect("localhost", "root", "", "ibm");
if(!$conn)
{
    die("Error".mysqli_connect_error());
}
$email=$_SESSION['email'];
$sql="SELECT * FROM user_ans WHERE email='$email'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
  echo "<h4> You have successfully completed the test</h4><br>";
  echo "<h4>Out of 10, you attempt ".$row['attemptqu']." Question<h4><br>";
  echo "<h4>You corrected ".$row['anscorrect']." Question<h4><br>";
}
?>
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
<?php
session_start();
if(!isset($_SESSION['exam']) || $_SESSION['exam']!=true)
{
  header("location: test.php");
  exit;
}
$conn=mysqli_connect("localhost", "root", "", "ibm");
  if(!$conn)
  {
      die("Error".mysqli_connect_error());
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $count=count($_POST['as']);
    $selected=$_POST['as'];

    $sql = "SELECT * FROM question";
    $result = mysqli_query($conn, $sql); 
    $correct=0;
    $i=1;
    $email=$_SESSION['email'];
    while($rows=mysqli_fetch_array($result))
    {
      $check=$rows['ans']==$selected[$i];
      if($check)
      {
        $correct++;
      }
      $i++;
    }
    $sql="INSERT INTO `user_ans` (`user_id`, `email`, `totalques`, `attemptqu`, `anscorrect`) VALUES (NULL, '$email', '10', '$count', '$correct')";
    $result=mysqli_query($conn,$sql);
      if($result){ 
        $sql="UPDATE `status` SET `s3` = 'Completed' WHERE `status`.`email` = '$email'";
        $result=mysqli_query($conn,$sql);
        $email=$_SESSION['email'];
        session_start();
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['form']=true;
        $_SESSION['email']=$email;
        header("location: check.php");
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
    <link rel="stylesheet" href="style/TimeCircles.css" />
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
    <script src="style/TimeCircles.js"></script>

    <title>Test </title>
    <style>
 #demo{
  color: white;
  font-size: 30px;
  margin-right: 60px;
}
</style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" >Company Name</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" >Test <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    
  </div>
</nav>

    <div class="container my-4 col-lg-8 m-auto d-block">
     <h2 class="text-center text-primary">Welcome <?php echo $_SESSION['email'];?> </h2>
     <div class="container my-4">
       <div class="col-lg-8 m-auto d-block">
     <div class="card">
       <h3 class="text-center card-header">You have to select only one out of four. Best of luck.</h3>
     </div>
     <form action="/ibm/exam.php" method="POST">
     <?php
      $sql="SELECT * FROM question";
      $result=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result))
      {
        echo "<div class='card'> ";
        echo "<h5 class='card-header'>Qno". $row['no'].".&nbsp&nbsp". $row['qu'] ." </h5>";
        echo "<div class='card-body'>";
        echo "<div class='form-check'>
        <input class='form-check-input' type='radio' name='as[". $row['no'] ."]' id='[as". $row['no'] ."]' value='1'>
        <label class='form-check-label' for='gridRadios1'>". $row['op1'] ."</label><br>";
        echo "</div>
        <div class='form-check'>
          <input class='form-check-input' type='radio' name='as[".$row['no']."]' id='[as".$row['no']."]' value='2'>
          <label class='form-check-label' for='gridRadios2'>". $row['op2'] ."</label><br>";
        echo "</div>
          <div class='form-check'>
            <input class='form-check-input' type='radio' name='as[".$row['no']."]' id='as[".$row['no']."]' value='3'>
            <label class='form-check-label' for='gridRadios2'>". $row['op3'] ."</label><br>";
        echo "</div>
            <div class='form-check'>
              <input class='form-check-input' type='radio' name='as[".$row['no']."]' id='as[".$row['no']."]' value='4'>
              <label class='form-check-label' for='gridRadios2'>". $row['op4'] ."</label><br></div>";
        
        echo "</div>";
        echo "</div>";
      }
     ?>
     <br><br>
     <button type="submit" class="btn btn-primary">Submit</button>
     </form>
    </div>
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
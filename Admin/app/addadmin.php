<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ctform";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
 
if(isset($_POST['submit'])){
    
  $fullname =  mysqli_real_escape_string($con,$_POST['fullname']);
  $address =  mysqli_real_escape_string($con,$_POST['address']);
  $emailadd =  mysqli_real_escape_string($con,$_POST['emailadd']);
  $number =  mysqli_real_escape_string($con,$_POST['number']);
  $jobInfo =  mysqli_real_escape_string($con,$_POST['jobInfo']);

  $sqlInfo = "INSERT INTO admindata (fullname, address,emailadd, number,jobInfo)
  VALUES ('$fullname', '$address','$emailadd', '$number', '$jobInfo')";

  if ($con->query($sqlInfo) === TRUE) {
      echo '<script>alert("Entered data successfully.")</script>';
  } else {
      echo '<script>alert("No data was added.")</script>';
  }


}

$con->close();
?>

<!DOCTYPE html>
<html>
<title>New Admin</title>
<head>
    <link rel="stylesheet" href="addEmpstyles.css">
</head>

<body>   
<div class="container">  
    <form id="contact" action="" method="post">
    <h1>Add Admin</h1>
    <br>
    <fieldset>
        <input placeholder="Full Name" type="text" required autofocus name="fullname" id="fullname">
    </fieldset>
    <fieldset>
        <input placeholder="Address" type="text" required autofocus name="address" id="address">
    </fieldset>
    <fieldset>
        <input placeholder="Email Address" type="email" required name="emailadd" id="emailadd">
    </fieldset>
    <fieldset>
        <input placeholder="Phone Number" type="tel" required name="number" id="number">
    </fieldset>
    <fieldset>
        <input placeholder="Job" type="text" required name="job" id="job">
    </fieldset>
    </fieldset>
          <br>
        <button name="submit" type="submit" id="submit" data-submit="...Sending">Submit</button>
    </fieldset>
    <a href="admintable.php">
        <br>
        <button type="button">Back</button>
    </a>
    </form>
  </div>
  </body>
</html>
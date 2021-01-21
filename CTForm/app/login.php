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
  $number =  mysqli_real_escape_string($con,$_POST['number']);
  $temperature =  mysqli_real_escape_string($con,$_POST['temperature']);
  $datevisit =  mysqli_real_escape_string($con,$_POST['datevisit']);

  $sqlInfo = "INSERT INTO tblcustomers (fullname, address, number,temperature,datevisit)
  VALUES ('$fullname', '$address', '$number', '$temperature', '$datevisit')";

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
<title>Contact Tracing Form</title>
<head>
    <link rel="stylesheet" href="styles.css">
</head>

<body>   
<div class="container">  
    <form id="contact" action="" method="post">
    <h1>Contact Tracing Form</h1>
    <br>
      <fieldset>
        <input placeholder="Full Name" type="text" required autofocus name="fullname" id="fullname">
      </fieldset>
      <fieldset>
        <input placeholder="Address" type="text" required name="address" id="address">
      </fieldset>
      <fieldset>
        <input placeholder="Phone Number" type="tel" required name="number" id="number">
      </fieldset>
      <fieldset>
        <input placeholder="Temperature" type="text" required name="temperature" id="temperature">
      </fieldset>
      <fieldset>
        <input placeholder="Date" type="date" required name="datevisit" id="datevisit">
      </fieldset>
          <br>
        <button name="submit" type="submit" id="submit" data-submit="...Sending">Submit</button>
      </fieldset>
    </form>
  </div>
  </body>
</html>
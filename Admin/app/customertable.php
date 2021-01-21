<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Customers' Records</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="cust_styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Customer <b>Records</b></h2></div>
                    <div class="col-sm-4">
                        <form method="POST" action="cust_or_emp.html">
                            <button type="submit" class="btn add-new">
                                Back
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fullname</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Temperature</th>
                        <th>Date Visited</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $con = mysqli_connect("localhost","root","","ctform");
                    if ($con-> connect_error){
                        die("Connection failed:". $con-> connect_error);
                    }

                    $sql = "SELECT id, fullname, address, number, temperature, datevisit from tblcustomers";
                    $result = $con->query($sql);

                    if ($result-> num_rows > 0){
                        while ($row = $result-> fetch_assoc()){
                            echo "<tr><td>".$row["id"] ."</td><td>". $row["fullname"] ."</td><td>". $row["address"]
                            ."</td><td>". $row["number"] ."</td><td>". $row["temperature"] ."</td><td>". $row["datevisit"]."</td></tr>"
                            ;
                        }
                        echo "</table>";
                    }
                    else{
                        echo "0 result";
                    }

                    $con-> close();
                ?>
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>


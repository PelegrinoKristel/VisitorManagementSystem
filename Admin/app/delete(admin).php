<?php
$adminID = $_GET['adminID'];

include_once 'connection.php';

// sql to delete a record
$sql = "DELETE FROM admindata WHERE adminID = $adminID"; 

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: admintable.php'); 
    exit;
} else {
    echo "Error deleting record";
}
?>
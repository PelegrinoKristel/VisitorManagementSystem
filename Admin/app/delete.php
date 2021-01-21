<?php
$id = $_GET['id'];

include_once 'connection.php';

// sql to delete a record
$sql = "DELETE FROM tblemployees WHERE id = $id"; 

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: employeestable.php'); 
    exit;
} else {
    echo "Error deleting record";
}
?>
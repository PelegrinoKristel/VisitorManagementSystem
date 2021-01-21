<?php

include_once 'connection.php';

// sql to update a record
if(count($_POST)>0) {
    mysqli_query($con,"UPDATE tblemployees set id='" . $_POST['id'] . "', 
    fullname='" . $_POST['fullname'] . "', address='" . $_POST['address'] . "', 
    emailadd='" . $_POST['emailadd'] . "' ,number='" . $_POST['number'] . "' 
    ,number='" . $_POST['number'] . "' WHERE id='" . $_POST['id'] . "'");
    
}

if (mysqli_query($con)) {
    mysqli_close($con);
    header('Location: employeestable.php'); 
    exit;
} else {
    echo "Error updating record";
}
?>
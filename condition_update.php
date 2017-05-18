<?php
session_start();
include 'dbconnect.php';
$prof_eko_id = $_SESSION['userSession'];
$gelen1 = $_POST['situation'];

$sql = "UPDATE professors SET prof_con='$gelen1' WHERE prof_eko_id= '$prof_eko_id'";

if ($DBcon->query($sql) === TRUE) {
   // echo "Record updated successfully";
} else {
    echo "Error updating record: " . $DBcon->error;
}

$DBcon->close();
?>
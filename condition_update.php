<?php

include 'dbconnect.php';

$gelen1 = $_POST['situation'];

$sql = "UPDATE prof_condition SET prof_con='$gelen1' WHERE prof_condition_id=1";

if ($DBcon->query($sql) === TRUE) {
   // echo "Record updated successfully";
} else {
    echo "Error updating record: " . $DBcon->error;
}

$DBcon->close();
?>
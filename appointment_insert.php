<!DOCTYPE html>
<html>
<head>
	<title>Appointment Insert</title>
	<script src="jquery.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>

</body>
</html>

<body>

<?php
session_start();
include 'dbconnect.php';

$appointment_time =$_POST["time"];
$appointment_subject =$_POST["subject"];
$prof_name = $_POST["p_name"];
$student_eko_id = $_SESSION['userSession'];
$prof_eko_id = $_POST["prof_eko_id"];

echo $prof_name;

$student_name_sql = "SELECT student_name, student_lastname FROM students WHERE student_eko_id='$student_eko_id'";

$result = $DBcon->query($student_name_sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $student_name = $row['student_name'].' '.$row['student_lastname'];
    }
} else {
    echo "0 results";
}

$appointment_sql = "INSERT INTO appointment (student_name, prof_name, appointment_date, subject, prof_eko_id, student_eko_id)
VALUES ('$student_name', '$prof_name', '$appointment_time','$appointment_subject', '$prof_eko_id', '$student_eko_id')";

if ($DBcon->query($appointment_sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . "This time is already been scheduled";
}

include("showUser.php");

?>
 

</script>

</body>
</html>

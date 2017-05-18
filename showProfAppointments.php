<?php


session_start();
include 'dbconnect.php';
$query = $DBcon->query("SELECT * FROM registered_users WHERE eko_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();

?>


<html>
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>

	<!-- Nav Bar -->
	<nav>
		<div style="background-color:#ef7f2d" class="nav-wrapper">
			<a class="brand-logo"><img height="66" src="img/navbarlogo.png"></a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="profhome2.php">&nbsp; <?php echo $userRow['first_name']. " " .$userRow['last_name']; ?></a></li>
				<li><a href="logout.php?logout"><i class="material-icons">power_settings_new</i></a></li>
			</ul>
		</div>
	</nav>

	<br>

	<?php
	session_start();
	include 'dbconnect.php';

	$prof_sql = "SELECT * FROM appointment WHERE prof_eko_id=".$_SESSION['userSession'];
	$result1 = $DBcon->query($prof_sql);

	if ($result1->num_rows > 0) {
    // output data of each row
		?>
		<table class="striped">
			<thead>
				<tr>
					<th>Student name</th>
					<th>Appointment Date</th>
					<th>subject </th>
					
				</tr>
			</thead>

			<?php
			while($row = $result1->fetch_assoc()) {
				?>

				
				

				<tbody>	
					<tr>
						<td > <?php echo  $row["student_name"];?> </td>
						<td ><?php echo $row["appointment_date"];?> </td>
						<td ><?php echo $row["subject"]; ?> </td>
						

					</tr>
				</tbody>

				<?php
			}

		} else {
			echo "There is no currently scheduled appointments";
		}
		?>
	</table>

</body>
</html>
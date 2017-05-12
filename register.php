<?php
session_start();
if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
}
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])) {
	
	$first_name = strip_tags($_POST['first_name']);
	$last_name = strip_tags($_POST['last_name']);
	$eko_id = strip_tags($_POST['eko_id']);
	$password = strip_tags($_POST['password']);
	
	$first_name = $DBcon->real_escape_string($first_name);
	$last_name = $DBcon->real_escape_string($last_name);
	$eko_id = $DBcon->real_escape_string($eko_id);
	$password = $DBcon->real_escape_string($password);
	
	$hashed_password = password_hash($password, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
	
	$check_prof_ekoid = $DBcon->query("SELECT prof_eko_id FROM professors WHERE prof_eko_id='$eko_id'");

	$check_student_ekoid = $DBcon->query("SELECT student_eko_id FROM students WHERE student_eko_id='$eko_id'");

	$count_prof=$check_prof_ekoid->num_rows;

	$count_student=$check_student_ekoid->num_rows;

	
	if ($count_prof==1) {
		
		$query = "INSERT INTO registered_users(first_name,last_name,eko_id,password,role) VALUES('$first_name','$last_name','$eko_id','$hashed_password', 'P')";

		if ($DBcon->query($query)) {
			$msg = "<div class='alert alert-success'>
			<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully Activated as Professor !
			</div>";
		}else {
			$msg = "<div class='alert alert-danger'>
			<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while activation !
			</div>";
		}
		
	} else if ($count_student==1) {
		
		$query = "INSERT INTO registered_users(first_name,last_name,eko_id,password,role) VALUES('$first_name','$last_name','$eko_id','$hashed_password', 'S')";

		if ($DBcon->query($query)) {
			$msg = "<div class='alert alert-success'>
			<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully Activated as Student !
			</div>";
		}else {
			$msg = "<div class='alert alert-danger'>
			<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while activation !
			</div>";
		}

	}

	else {
		
		
		$msg = "<div class='alert alert-danger'>
		<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry, there is no match for this eko id in database !
		</div>";

	}
	
	$DBcon->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Where is My Professor</title>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

	<div style="text-align:center"><img src="img/logo.png"></div>

	<br>

	<!-- navbar -->
	<nav>
		<div style="background-color:#ef7f2d" class="nav-wrapper">
		</div>
	</nav>

	<div class="signin-form">

		<div class="container">


			<form class="form-signin" method="post" id="register-form">

				<h2 style="text-align:center" class="form-signin-heading">Activate Your Account</h2><hr />

				<?php
				if (isset($msg)) {
					echo $msg;
				}
				?>

				<div class="form-group">
					<input type="text" class="form-control" placeholder="Name" name="first_name" required  />
				</div>

				<div class="form-group">
					<input type="text" class="form-control" placeholder="Surname" name="last_name" required  />
				</div>

				<div class="form-group">
					<input type="text" class="form-control" placeholder="Eko ID" name="eko_id" required  />
				</div>

				<div class="form-group">
					<input type="password" class="form-control" placeholder="Password" name="password" required  />
				</div>

				<hr />

				<div class="form-group">
					<table>
						<tr>
							<td style="text-align:left">
								<button style="background-color:#ef7f2d" type="submit" class="btn btn-default" name="btn-signup">
									<span class="glyphicon glyphicon-log-in"></span> &nbsp; Activate Now
								</button> 
							</td>
							<td style="text-align:right">
								<a style="background-color:#ef7f2d" href="index.php" class="btn btn-default" style="float:right;">Login Here</a>
							</td>
						</tr>
					</table>
				</div> 

			</form>

		</div>

	</div>

</body>
</html>
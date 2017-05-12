<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
	exit;
}

if (isset($_POST['btn-login'])) {
	
	$eko_id = strip_tags($_POST['eko_id']);
	$password = strip_tags($_POST['password']);
	
	$eko_id = $DBcon->real_escape_string($eko_id);
	$password = $DBcon->real_escape_string($password);
	
	$query_student = $DBcon->query("SELECT first_name, last_name, eko_id, password, role FROM registered_users WHERE eko_id='$eko_id' AND role='S'");
	$row=$query_student->fetch_array();
	
	$count_student = $query_student->num_rows; // if email/password are correct returns must be 1 row

	if (password_verify($password, $row['password']) && $count_student==1) {
		$_SESSION['userSession'] = $row['eko_id'];
		header("Location: studenthome.php");
	} else {
		$msg = "<div class='alert alert-danger'>
		<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Eko ID or Password, make student activation before login !
		</div>";
	}
	
	$query_prof = $DBcon->query("SELECT first_name, last_name, eko_id, password, role FROM registered_users WHERE eko_id='$eko_id' AND role='P'");
	$row=$query_prof->fetch_array();
	
	$count_prof = $query_prof->num_rows; // if email/password are correct returns must be 1 row

	if (password_verify($password, $row['password']) && $count_prof==1) {
		$_SESSION['userSession'] = $row['eko_id'];
		header("Location: profhome.php");
	} else {
		$msg = "<div class='alert alert-danger'>
		<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Eko ID or Password, make professor activation before login !
		</div>";
	}


	$DBcon->close();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Where is My Professor - Login & Activation System</title>
	
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


			<form class="form-signin" method="post" id="login-form">

				<h2 style="text-align:center" class="form-signin-heading">Login</h2><hr />

				<?php
				if(isset($msg)){
					echo $msg;
				}
				?>

				<div class="form-group">
					<input type="text" class="form-control" placeholder="Eko ID" name="eko_id" required />
				</div>

				<div class="form-group">
					<input type="password" class="form-control" placeholder="Password" name="password" required />
				</div>

				<hr />

				<div class="form-group">
					<table>
						<tr>
							<td style="text-align:left">
								<button style="background-color:#ef7f2d" type="submit" class="btn btn-default" name="btn-login" id="btn-login">
									<span class="glyphicon glyphicon-log-in"></span> &nbsp; Login
								</button> 
							</td>
							<td style="text-align:right">
								<a style="background-color:#ef7f2d" href="register.php" class="btn btn-default" style="float:right;">Activate Here</a>
							</td>
						</tr>
					</table>
				</div>  



			</form>

		</div>

	</div>

</body>
</html>
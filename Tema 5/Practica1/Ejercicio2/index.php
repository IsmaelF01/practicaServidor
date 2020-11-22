<?php
	include("lib/lib.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Check in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>
<body style="background: #596778;">
    <div style="margin: 0 auto; width: 21%;"><img src="imgs/logo1.png" alt="" width="90%"></div>
<nav class="menu">
		<input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
		<label class="menu-open-button" for="menu-open">
			<span class="lines line-1"></span>
			<span class="lines line-2"></span>
			<span class="lines line-3"></span>
		</label>

		<a href="#"></a>
		<a href="#controlador.php" class="menu-item purple" data-toggle="modal" data-target="#regis" data-whatever="@getbootstrap"><img src="imgs/regis.png" alt="" width="70px"></a>
		<a href="#"></a>
		<a href="#"><!-- <img src="imgs/update.png" alt="" width="80px"> --></a>
		<a href="#"></a>
		<a href="#controlador.php" class="menu-item green" data-toggle="modal" data-target="#login" data-whatever="@getbootstrap"> <img src="imgs/login.png" alt="" width="80px"></a>
		<a href="#"><!--<img src="imgs/cargar.png" alt="" width="80px"> --></a>
	</nav>

	<!-- Modal login -->
	<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method='POST' style="color: black;" action="controlador.php">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleModalLabel">Logeate</h4>
						<!-- <h5 style="color: gray;"><?php//$result?></h5> -->
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<label for="disabledTextInput">User: </label>
						<input type="text" class="form-control" name="user">
						<label for="disabledTextInput">Password: </label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" name='login' class="btn btn-primary" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Registrarse-->
	<div class="modal fade" id="regis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method='POST' style="color: black;" action="controlador.php">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleModalLabel">Registrarse</h4>
						<!-- <h5 style="color: gray;"><?php//$result?></h5> -->
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<label for="disabledTextInput">User: </label>
						<input type="text" class="form-control" name="user">
						<label for="disabledTextInput">Gmail: </label>
						<input type="text" class="form-control" name="gmail">
						<label for="disabledTextInput">Password: </label>
						<input type="password" class="form-control" name="password">
						<label for="disabledTextInput">Repeat Password: </label>
						<input type="password" class="form-control" name="repeat">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" name='regis' class="btn btn-primary" value="Registrarse">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
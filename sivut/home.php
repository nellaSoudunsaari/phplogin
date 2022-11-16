<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Kotisivu</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Sisäänkirjautuminen</h1>

			</div>
		</nav>
		<div class="content">
			<h2>Kotisivu</h2>
			<p>Tervetuloa, <?=$_SESSION['name']?>!			
			<a href="profile.php"><i class="fas fa-user-circle"></i>Profiili</a>
			<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Kirjaudu ulos</a>
			<a href="kala.html" style="color: #ececec73;">kala?</a>
			</p>               

		</div>
	</body>
</html>
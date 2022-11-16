<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'root';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profiili</title>
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
			<h2>Profiili</h2>
			<div>
				<p>Tietoa tilistäsi:</p>
				<table>
					<tr>
						<td>Käyttäjätunnus:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Salasana:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Sähköposti:</td>
						<td><?=$email?></td>
					</tr>
					<tr>
						<td style="text-decoration:underline;"><a href="yhteydenottolomake/index.html">Poista käyttäjä? Ota yhteyttä!</a></td>
					</tr>

				</table>				
				<a href="profile.php"><i class="fas fa-user-circle" style="padding-top:20px;"></i>Profiili</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Kirjaudu ulos</a>
			</div>
		</div>
	</body>
</html>
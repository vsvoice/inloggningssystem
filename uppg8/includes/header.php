<?php
	require_once 'includes/class.user.php';
	require_once 'includes/config.php';
	$user = new User($pdo);

	if(isset($_GET['logout'])) {
		$user->logout();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>OOP & PDO Login System</title>
	<link rel="stylesheet" href="css/style.css">
	<!--<script defer src="js/script.js"></script>-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


<body>
<header class="container-fluid bg-dark mb-5 px-0">
	<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-dark bg-dark px-2 px-lg-5" data-bs-theme="dark">
	<div class="container-fluid px-4">
		<a class="navbar-brand" href="home.php">OOP & PDO Login System</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
		<ul class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link active" href="home.php">Home</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="register.php">Sign Up</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="#">#</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="?logout=1">Log Out</a>
			</li>
		</ul>
		</div>
	</div>
	</nav>

</header>
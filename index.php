<?php
	session_start();
	include "connect.php";
?>

<html>
	<head>
		<title>Ementa</title>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="pizza factory, a faux online pizza joint">
		<meta name="author" content="Mariana Martins, Sofia Rocha">
		<meta name="keywords" content="pizza, food, online, order, fake, false, faux">
		
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		<link href="css/ionicons.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet" media="screen">
		<link href="img/favicon.ico" rel="shortcut icon">
		
		<meta name="robots" content="index, follow">
		<meta name="googlebot" content="index, follow">
	</head>

	<body>
		<div class="container">
			
			<nav>
				<div class="nav-wrapper">
					<a href="#" class="brand-logo">The <i class="icon ion-pizza"></i> Factory</a>
					<ul id="nav-mobile" class="right side-nav">
						<li><a href="ementa.html">Ementa</a></li>
						<li><a href="encomendaPizza.html">Encomendar</a></li>
						<li><a href="registar.php">Registar</a></li>
						<li><a href="login.php">Log In</a></li>
					</ul>
				</div>
			</nav>
			
			<div class="row">
				<div class="row">
				<div class="col s6 m6 l6">
					<ul class="collection with-header">
						<li class="collection-header"><h4>Bases</h4></li>
						<a href="#!" class="collection-item">Fina</a>
						<a href="#!" class="collection-item">Alta</a>
						<a href="#!" class="collection-item">Sem glúten</a>
						<a href="#!" class="collection-item">Rolling</a>
					  </ul>
				</div>
				
				<div class="col s6 m6 l6">
					<ul class="collection with-header">
						<li class="collection-header"><h4>Toppings</h4></li>
						<a href="#!" class="collection-item">Salsichas</a>
						<a href="#!" class="collection-item">Cogumelos</a>
						<a href="#!" class="collection-item">Milho</a>
						<a href="#!" class="collection-item">Cebola</a>
					  </ul>
				</div>
			</div>
			
			<div class="row">
				<form class="col s12">
				  <div class="row">
					<div class="input-field col s6">
					  <input id="first_name" type="text" required>
					  <label for="first_name">First Name</label>
					</div>
					<div class="input-field col s6">
					  <input id="last_name" type="text" required>
					  <label for="last_name">Last Name</label>
					</div>
				  </div>
				  <div class="row">
					<div class="input-field col s12">
					  <input id="username" type="text" required>
					  <label for="username">Username</label>
					</div>
				  </div>
				  <div class="row">
					<div class="input-field col s12">
					  <input id="password" type="password" required>
					  <label for="password">Password</label>
					</div>
				  </div>
				  <div class="row">
					<div class="input-field col s12">
					  <input id="email" type="email" required>
					  <label for="email">Email</label>
					</div>
				  </div>
					<a class="waves-effect waves-light btn">submit</a>
				</form>
			  </div>

			</div>
			
			<div class="collection">
			
					<a href="#!" class="collection-item"><?php echo $_SESSION['user_id'] ?></a>
					<a href="#!" class="collection-item"><?php echo $_SESSION['name'] ?></a>
					<a href="#!" class="collection-item"><?php echo $_SESSION['username'] ?></a>
					<a href="#!" class="collection-item"><?php echo $_SESSION['logged_in'] ?></a>
			</div>
			
		</div>
		
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>
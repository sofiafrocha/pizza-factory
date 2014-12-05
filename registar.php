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
		<link href="css/style.css" rel="stylesheet" media="screen">
		<link href="img/favicon.ico" rel="shortcut icon">
		
		<meta name="robots" content="index, follow">
		<meta name="googlebot" content="index, follow">
	</head>

	<body>
		<div class="container">
			
			<nav>
				<div class="nav-wrapper">
					<a href="#" class="brand-logo">Logo</a>
					<ul id="nav-mobile" class="right side-nav">
						<li><a href="#">Ementa</a></li>
						<li><a href="#">Encomendar</a></li>
						<li><a href="#">Registar</a></li>
						<li><a href="#">Log In</a></li>
					</ul>
				</div>
			</nav>
			
			<div class="row">
				<div class="input-field col s12">
					<form action="signup.php" method="POST">
						<input type="text" id=nome required>
						<label for="nome">Nome</label>
						
						<input type="text" id=morada required>
						<label for="morada">Morada</label>
						
						<input type="text" id=telefone required>
						<label for="telefone">Telefone</label>
						
						<input type="text" id=email required>
						<label for="email">E-mail</label>
						
						<input type="text" id=username required>
						<label for="username">Username</label>
						
						<input type="text" id=password required>
						<label for="password">Password</label>
					</form>
				</div>
			</div>
			
		</div>
		
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>
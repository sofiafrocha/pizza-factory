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
					<a href="index.php" class="brand-logo">The <i class="icon ion-pizza"></i> Factory</a>
					<ul id="nav-mobile" class="right side-nav">
						<li><a href="ementa.php">Ementa</a></li>
						<li><a href="encomenda.php">Encomendar</a></li>
						<li><a href="registar.php">Registar</a></li>
						<li><a href="login.php">Iniciar Sessão</a></li>
					</ul>
				</div>
			</nav>
			
			<div class="row">
				<div class="input-field col s12">
					<form action="obrigado.php" method="POST">
						<div class="input-field col s6">
							<label for="nome">Nome</label>
							<input type="text" name="nome" required>
						</div>
						
						<div class="input-field col s6">
							<label for="morada">Morada</label>
							<input type="text" name="morada" required>
						</div>
						
						<div class="input-field col s6">
							<input type="text" name="telefone" required>
							<label for="telefone">Telefone</label>
						</div>
						
						<div class="input-field col s6">
							<input type="text" name="email" required>
							<label for="email">E-mail</label>
						</div>
						
						<div class="input-field col s6">
							<input type="text" name="username" required>
							<label for="username">Username</label>
						</div>
						
						<div class="input-field col s6">
							<input type="text" name="password" required>
							<label for="password">Password</label>
						</div>
						
						<button class="btn waves-effect waves-light" type="submit" name="action">Confirmar 
                           <i class="mdi-content-send right"></i>
                        </button>
					</form>
				</div>
			</div>
			
		</div>
		
		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>
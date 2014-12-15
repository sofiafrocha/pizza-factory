<?php
	session_start();
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
				<div class="col s4 m4 l4 offset-s4 offset-m4 offset-l4">
					<?php
						include "php/connect.php";

						if (isset($_POST[action])) {
							$sql_sign_up = "INSERT INTO `CLIENTE` (NOME, MORADA, TELEFONE, EMAIL, USERNAME, PASSWORD) VALUES ('$_POST[nome]','$_POST[morada]','$_POST[telefone]','$_POST[email]', '$_POST[username]', '$_POST[password]')";

							if (!mysql_query($con,$sql_sign_up))
							{
								die('Error: ' . mysqli_error($con));
							}

							echo "Obrigado por se registar no The Pizza Factory!";

							mysqli_close($db);


							mysqli_close($con);
						}
					?>
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
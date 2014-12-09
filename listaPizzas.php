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
						<li><a href="login.php">Log In</a></li>
					</ul>
				</div>
			</nav>
			
			<div class="row">
				<div class="col s10 m10 l10 offset-s1 offset-m1 offset-l1">

					<table>
						<thead>
							<tr>
								<th data-field="id">Cliente</th>
								<th data-field="id">Pizza</th>
								<th data-field="id">Enc</th>
								<th data-field="id">Estado</th>
								<th data-field="id">Tamanho</th>
								<th data-field="id">Massa</th>
								<th data-field="id">Tomate</th>
								<th data-field="id">Queijo</th>
								<th data-field="id">Data</th>
								<th data-field="id">Preço</th>
							</tr>
						</thead>
						
						<tbody>
						<?php
							include "php/connect.php";
							
							$sql_get_encs = "SELECT ENCOMENDA.CLI_ID_CLIENTE, PIZZA.ID_PIZZA, PIZZA.ID_ENC, PIZZA.ESTADO, PIZZA.TAMANHO, PIZZA.MASSA, PIZZA.TOMATE, PIZZA.QUEIJO, PIZZA.DATA, PIZZA.PRECO FROM PIZZA, ENCOMENDA where PIZZA.ID_ENC = ENCOMENDA.ID_ENC ";

							$result = mysqli_query($con, $sql_get_encs);

							if (!$result){
								die('Error: ' . mysqli_error($con));
							}

							$row = mysqli_fetch_assoc($result);

							while ( $row != null){ 
								echo "<tr><td>" . $row['CLI_ID_CLIENTE'] . "</td><td> ". $row['ID_PIZZA'] . "</td><td> " . $row['ID_ENC'] . "</td><td>" . $row['ESTADO'] . "</td><td>" . $row['TAMANHO'] . "</td><td>" . $row['MASSA'] . "</td><td>" . $row['TOMATE'] . "</td><td>" . $row['QUEIJO'] . "</td><td>" . $row['DATA'] . "</td><td>" . $row['PRECO'] . "</td></tr>";
								$row = mysqli_fetch_assoc($result);
							}
						?>

						</tbody>
					</table>

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
<?php
	session_start();
	include "php/connect.php";

	if(isset($_POST[state_changer])){
		echo "who clicked the buttons?!" . "<br>";

		echo "the lucky number is: " . $_POST[state_changer] .  "<br>";

		//mudar o estado da pizza
		$ingrediente_id = $_POST[state_changer];
		//encontrar estado actual
		$sql_get_stock = mysqli_query($con, "SELECT QUANTIDADE from `INGREDIENTE` where `ID_INGREDIENTE` = $ingrediente_id");

		if (!$sql_get_stock)
	    {
	      die('Erro a ir encontrar o stock do ingrediente: ' . mysqli_error($con));
	    }

	    echo "encontrou o stock" .  "<br>";

		$row = mysqli_fetch_array($sql_get_stock, MYSQLI_NUM);
		$current_state = $row[0];

		$next_state = $current_state + 100;

		$sql_change_state = mysqli_query($con, "UPDATE `INGREDIENTE` SET `QUANTIDADE`= $next_state WHERE `ID_INGREDIENTE` = $ingrediente_id");

		if (!$sql_change_state)
	    {
	      die('Stock da pizza não foi actualizado: ' . mysqli_error($con));
	    } 

	    echo "Mudou a quantidade!" .  "<br>";
	}
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

			<?php if ($_SESSION[username] == 'dvader' or $_SESSION[username] == 'okenobi') { ?>
			<div class="row">
				<div class="col s10 m10 l10 offset-s1 offset-m1 offset-l1">
					<form method="POST">
							<table>
								<thead>
									<tr>
										<th data-field="id">ID</th>
										<th data-field="id">Quantidade</th>
										<th data-field="id">Preço</th>
										<th data-field="id">Encomendar</th>
									</tr>
								</thead>
								
								<tbody>
								<?php
									include "php/connect.php";
									
									$sql_get_ingredientes = "SELECT ID_INGREDIENTE, QUANTIDADE, PRECO FROM INGREDIENTE";

									$result = mysqli_query($con, $sql_get_ingredientes);

									if (!$result){
										die('Error: ' . mysqli_error($con));
									}

									$row = mysqli_fetch_assoc($result);

									while ( $row != null){ 
										echo "<tr><td>" . $row['ID_INGREDIENTE'] . "</td><td> ". $row['QUANTIDADE'] . "</td><td> " . $row['PRECO'] . "</td><td>" . "<button class='waves-effect waves-light btn' type='submit' name='state_changer' value='" . $row['ID_INGREDIENTE'] . "'>Comprar 100</button>" . "</td></tr>";
										$row = mysqli_fetch_assoc($result);
									}
								?>

							</tbody>
						</table>
					</form>
				</div>
			</div>
			<?php }
				else{
					echo "Você não tem permissões para aceder a esta área do The Pizza Factory";
				}
				?>
			
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
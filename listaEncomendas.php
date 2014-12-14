<?php
	session_start();
	include "php/connect.php";

	if(isset($_POST[state_changer])){
		echo "who clicked the buttons?!" . "<br>";

		echo "the lucky number is: " . $_POST[state_changer] .  "<br>";

		//mudar o estado da pizza
		$enc_id = $_POST[state_changer];
		//encontrar estado actual
		$sql_get_state = mysqli_query($con, "SELECT ESTADO from `ENCOMENDA` where `ID_ENC` = $enc_id");

		if (!$sql_get_state)
	    {
	      die('Erro a ir buscar o estado da pizza: ' . mysqli_error($con));
	    }

	    echo "encontrou o estado" .  "<br>";

		$row = mysqli_fetch_array($sql_get_state, MYSQLI_NUM);
		$current_state = $row[0];

		$next_state = $current_state + 1;

		$sql_change_state = mysqli_query($con, "UPDATE `ENCOMENDA` SET `ESTADO`= $next_state WHERE `ID_ENC` = $enc_id");

		if (!$sql_change_state)
	    {
	      die('Estado da encomenda não foi actualizado: ' . mysqli_error($con));
	    } 

	    echo "mudou o estado!" .  "<br>";
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
						<li><a href="login.php">Log In</a></li>
					</ul>
				</div>
			</nav>

			<?php if ($_SESSION[username] != 'dvader' or $_SESSION[username] != 'okenobi') { ?>
			
			<div class="row">
				<div class="col s10 m10 l10 offset-s1 offset-m1 offset-l1">
					<form method="POST">
						<table>
							<thead>
								<tr>
									<th data-field="id">Id Enc</th>
									<th data-field="id">Id Cliente</th>
									<th data-field="id">Data</th>
									<th data-field="id">Preço</th>
									<th data-field="id">Estado</th>
									<th data-field="id">Btn</th>
								</tr>
							</thead>
							<tbody>
							<?php
								include "php/connect.php";
								
								$sql_get_encs = " SELECT * FROM ENCOMENDA";

								$result = mysqli_query($con, $sql_get_encs);

								if (!$result){
									die('Error: ' . mysqli_error($con));
								}

								$row = mysqli_fetch_assoc($result);

								while ( $row != null){ 
									echo "<tr><td>" . $row['ID_ENC'] . "</td><td> ". $row['CLI_ID_CLIENTE'] . "</td><td>" . $row['DATA'] . "</td><td>" . $row['PRECO'] . "</td><td>" . $row['ESTADO'] . "</td><td>" . "<button class='waves-effect waves-light btn' type='submit' name='state_changer' value='" . $row['ID_ENC'] . "'>Btn!</button>" . "</td></tr>";
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
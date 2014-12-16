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

			<?php if ($_SESSION[username] != '') { ?>
					<form action="php/inserirpizza.php" method="POST">

						<div class="row">
								<div class="col s6 m4 l4">
									<label><h5> Massa: </h5></label>
									<p>
										<input type="radio" name="massa" value = "fina" id="massa1" />
										<label for="massa1"> Massa Fina </label>
									</p>
									<p>
										<input type="radio" name="massa" value = "alta" id="massa2" />
										<label for="massa2"> Massa Alta </label>
									</p>
									<p>
										<input type="radio" name="massa" value = "rolling" id="massa3" />
										<label for="massa3"> Massa Rolling </label>
									</p>
									
									<br>

									<div class="row">
										<div class="col s12 l12 m12">
											<label><h5> Molho de Tomate: </h5></label>
											<p>
												<input type="radio" name ="tomate" id="tomate1" value="1" />
												<label for="tomate1"> Sim, com molho </label>
											</p>
											<p>
												<input type="radio" name ="tomate" id="tomate2" value="0" />
												<label for="tomate2"> Não, sem molho </label>
											</p>
										</div>
									</div>
								</div>

								<div class="col s6 m4 l4">
									<label><h5> Queijo: </h5></label>
									<p>
										<input type="radio" name ="queijo" value="1" id="queijo1" />
										<label for="queijo1"> Mozarella </label>
									</p>
									<p>
										<input type="radio" name ="queijo" value="2" id="queijo2" />
										<label for="queijo2"> Queijo de Cabra </label>
									</p>
									<p>
										<input type="radio" name ="queijo" value="0" id="queijo3" />
										<label for="queijo3"> Nenhum </label>
									</p>
									<br>
									<div class="row">
										<div class="col s12 m12 l12">
											<label><h5> Tamanho da Pizza: </h5></label>
											<p>
												<input type="radio" name ="tamanho" value="individual" id="tamanho1" />
												<label for="tamanho1"> Individual </label>
											</p>
											<p>
												<input type="radio" name ="tamanho" value="media" id="tamanho2" />
												<label for="tamanho2"> Média </label>
											</p>
											<p>
												<input type="radio" name ="tamanho" value="grande" id="tamanho3" />
												<label for="tamanho3"> Grande </label>
											</p>
										</div>
									</div>
								</div>

								<div class="col s6 m4 l4">
            <label>Ingredientes:</label>
                <p>
                <input type="number" name="ingrediente1" max="3" min="0"/>
                <label for="ingrediente1"> Pimento </label>
                </p>
                <p>
                <input type="number" name="ingrediente2" max="3" min="0"/>
                <label for="ingrediente2"> Ananás </label>
                </p>
                <p>
                <input type="number" name="ingrediente3" max="3" min="0"/>
                <label for="ingrediente3"> Cogumelos </label>
                </p>
                <p>
                <input type="number" name="ingrediente4" max="3" min="0"/>
                <label for="ingrediente4"> Bacon </label>
                </p>
                <p>
                <input type="number" name="ingrediente5" max="3" min="0"/>
                <label for="ingrediente5"> Courgette </label>
                </p>
                <p>
                <input type="number" name="ingrediente6" max="3" min="0"/>
                <label for="ingrediente6"> Fiambre </label>
                </p>
            </div>
						</div>
						<br> <br> <br> 
						<div class="row">
							<div class="col s6 m4 l4">
								<button class="btn waves-effect waves-light" type="submit" name="action">Confirmar 
								<i class="mdi-content-send right"></i>
								</button>
							</div>
						</div>
					
					</form>
				<?php }
				else{
					echo "Por favor faça Iniciar Sessão para aceder à área das encomendas.";
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
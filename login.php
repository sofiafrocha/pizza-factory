<html>
   <head>
      <title>Encomenda</title>
      <meta charset="utf-8">
      <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">
      <meta name="description" content="pizza factory, a faux online pizza joint">
      <meta name="author" content="Mariana Martins, Sofia Rocha">
      <meta name="keywords" content="pizza, food, online, order, fake, false, faux">
      <link href="http://necolas.github.io/normalize.css/3.0.1/normalize.css" rel="stylesheet" media="screen">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link href="css/style.css" rel="stylesheet" media="screen">
      <link href="img/favicon.ico" rel="shortcut icon">
      <meta name="robots" content="index, follow">
      <meta name="googlebot" content="index, follow">
   </head>
   <body>
      <nav>
         <div class="nav-wrapper">
            <a href="#" class="brand-logo">Pizza Factory</a>
            <ul id="nav-mobile" class="right side-nav">
               <li><a href="ementa.html">Ementa</a></li>
               <li><a href="encomendaPizza.html">Encomendar</a></li>
               <li><a href="#">Registar</a></li>
               <li><a href="#" id="active">Log In</a></li>
            </ul>
         </div>
      </nav>
       
      <div class="container">
         <div class="row">
         	<form class="col offset-s3 s6 offset-s3" action="php/login.php" method="POST">
				<input name="password" type="text" required>
				<label for="password">password</label>
				
				<div class="input-field col s12">
					<input name="username" type="text" required autofocus>
					<label for="username">username</label>
				</div>

				<div class="input-field col s12">
					
				</div>

				<div class="row">
					<div class="col offset-s3 s6 offset-s3">
					<button class="btn waves-effect waves-light" type="submit" name="action">Confirmar 
					<i class="mdi-content-send right"></i>
					</button>
					</div>
				</div>
       		</form>
		  </div>
       </div>
       
       
    </body>
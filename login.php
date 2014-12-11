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

            <div class="col s6 m6 l6">

               <form class="col offset-s3 s6 offset-s3" action="php/login.php" method="POST">
                  <input name="username" type="text" required autofocus>
                  <label for="username">username</label>
                  
                  <input name="password" type="text" required>
                  <label for="password">password</label>

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
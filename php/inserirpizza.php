<?php
	session_start();
	include "connect.php";

	echo "Mariana is taking control" . "<br>";
	echo $_SESSION['username'] . " está a fazer uma encomenda" ."<br>";

	$user_id = $_SESSION['user_id'];

    if ($_SESSION['pizza_inicial'] == false) {
        $sql_enc = mysqli_query($con, "INSERT INTO ENCOMENDA (CLI_ID_CLIENTE, ESTADO) VALUES ($user_id, 0)");
        
        $_SESSION['pizza_inicial'] == true;
        
        if (!$sql_enc)
        {
          die('Encomenda não inserida: ' . mysqli_error($con));
        } 

        echo "encomenda inserida" . "<br>";

    }

	//ir buscar o id da encomenda que acabou de fazer -_-
	//listar todos, ordenar por data e limitar ao primeiro
	$sql_getIdEnc= "SELECT id_enc FROM ENCOMENDA ORDER BY data desc LIMIT 1";
    $result=mysqli_query($con,$sql_getIdEnc);

    if (!$result)
    {
      die('Error a encontrar a encomenda: ' . mysqli_error($con));
    } 
        
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$id_enc = $row[0];

	echo $_SESSION['username']." fez a encomenda número " . $id_enc . "<br>"; 


    //upa upa variáveis
	if (isset($_POST['action'])) {
	    echo "passou MASSA: " . $_POST['massa']. "<br>";
        $massa = $_POST['massa'];
	    echo "passou TAMANHO: " . $_POST['tamanho']." oi"."<br>";
        $tamanho = $_POST['tamanho'];
	    echo "passou TOMATE: " . $_POST['tomate'] . "<br>";
        $tomate = $_POST['tomate'];
	    echo "passou QUEIJO: " . $_POST['queijo']."<br>";
        $queijo = $_POST['queijo'];
        
		echo "passou INGREDIENTES: "."<br>";
        $ingrediente1 = $_POST['ingrediente1'];
        echo $ingrediente1;
        
        $ingrediente2 = $_POST['ingrediente2'];
        echo $ingrediente2;
        
        $ingrediente3 = $_POST['ingrediente3'];
        echo $ingrediente3;
        
        $ingrediente4 = $_POST['ingrediente4'];
        echo $ingrediente4;
        
        $ingrediente5 = $_POST['ingrediente5'];
        echo $ingrediente5;
        
        $ingrediente6 = $_POST['ingrediente6'];
        echo $ingrediente6."<br>";
        
	} else {
	    echo "no";
	}


    //preço
    $preco = 0;

    //preco massa
    if ($_POST['massa'] == "alta" || $_POST['massa'] == "fina")
    {
        $preco = $preco + 1;
        echo $preco."€"."<br>";
    } 
    elseif ($_POST['massa'] == "rolling") {
       $preco = $preco + 1.5;
       echo $preco."€"."<br>";
    } 
    else {
        echo "não selecionaste massa, pois não?"."<br>";
    } 


    //preco queijo e molhos
    if ($_POST['tomate'] == "1")
    {
        $preco = $preco + 1;
        echo $preco."€"."<br>";
    } 
    elseif ($_POST['tomate'] == "0") {
       $preco = $preco;
       echo $preco."€"."<br>";
    } 
    else {
        echo "não selecionaste tomate, pois não?"."<br>";
    } 

    if ($_POST['queijo'] == "1")
    {
        $preco = $preco + 1;
        echo $preco."€"."<br>";
    } 
    elseif ($_POST['queijo'] == "2") {
       $preco = $preco + 1.5;
       echo $preco."€"."<br>";
    } 
    elseif ($_POST['queijo'] == "0") {
       $preco = $preco;
       echo $preco."€"."<br>";
    } 
    else {
        echo "não selecionaste quejo, pois não?"."<br>";
    } 

    //preco tamanho
    if ($_POST['tamanho'] == "individual")
    {
        $preco = $preco + 4;
        echo $preco."€"."<br>";
    } 
    elseif ($_POST['tamanho'] == "media") {
       $preco = $preco + 6;
       echo $preco."€"."<br>";
    } 
    elseif ($_POST['tamanho'] == "grande") {
       $preco = $preco + 8;
       echo $preco."€"."<br>";
    } 
    else {
        echo "não selecionaste o tamanho, pois não?"."<br>";
    } 

    //preco ingredientes
    $preco = $preco + $ingrediente1*1;
    $preco = $preco + $ingrediente2*1;
    $preco = $preco + $ingrediente3*1;
    $preco = $preco + $ingrediente4*1;
    $preco = $preco + $ingrediente5*1;
    $preco = $preco + $ingrediente6*1;

    for ($i=1; $i < 7; $i++) { 
      echo("sofia taking control" . "<br>");
      $sql_get_ingrediente_info = "SELECT id_ingrediente, quantidade FROM INGREDIENTE WHERE id_ingrediente = '$i'";
      $result = mysqli_query($con, $sql_get_ingrediente_info);

      if (!$result)
      {
        die('Erro a ir buscar a quantidade e id do ingrediente: ' . mysqli_error($con));
      }
      echo 'buscar o id do ingrediente' . '<br>';

      $row = mysqli_fetch_array($result, MYSQLI_NUM);
      $id_ingrediente = $row[0];

      echo 'id do ingrediente: ' . $id_ingrediente . '<br>';
      
      $quantidade_original = $row[1];
      echo 'quantidade_original: ' . $quantidade_original . '<br>';
      $quantidade = $quantidade_original - 1;
      echo 'quantidade a ser posta: ' . $quantidade . '<br>';


      $sql_update_stock = mysqli_query($con, "UPDATE `INGREDIENTE` SET `QUANTIDADE`='$quantidade' WHERE `ID_INGREDIENTE` = '$id_ingrediente'");
      if (!$sql_update_stock)
      {
        die('Erro a ir buscar a quantidade e id do ingrediente: ' . mysqli_error($con));
      }
    }


    /*$sql_quantidade1="SELECT quantidade FROM INGREDIENTE WHERE id_ingrediente = 1"; 
    $result=mysqli_query($con, $sql_quantidade1);
    
    if (!$result)
    {
      die('Erro a ir buscar a quantidade do ingrediente 1: ' . mysqli_error($con));
    }

    $row = mysqli_fetch_array($result, MYSQLI_NUM);
	$quantidade1 = $row[0];
    $quantidade1 = $quantidade1 - $ingrediente1;
    echo 'q1'.$quantidade1.'<br>'; 

    $sql_quantidade2="SELECT quantidade FROM INGREDIENTE WHERE id_ingrediente = 2"; 
    $result=mysqli_query($con,$sql_quantidade2);

    if (!$result)
    {
      die('Erro a ir buscar a quantidade do ingrediente 2: ' . mysqli_error($con));
    }

    $row = mysqli_fetch_array($result, MYSQLI_NUM);
	  $quantidade2 = $row[0];
    $quantidade2 = $quantidade2 - $ingrediente2;
    echo 'q2'.$quantidade2.'<br>'; */


    $_SESSION['preco'] = $_SESSION['preco'] + $preco;

     //fazer uma pizza
        $sql_pizza="INSERT INTO PIZZA (id_enc, estado, tamanho, massa, tomate, queijo, preco) VALUES ('$id_enc', 0, '$tamanho', '$massa', '$tomate', '$queijo', '$preco')";

	if (!mysqli_query($con,$sql_pizza))
    {
      die('Error: ' . mysqli_error($con));
    } 

	echo "inseriu pizza" . "<br>";

    //encontrar id da pizza que acabámos de fazer -_-
	//listar todos, ordenar por data e limitar ao primeiro
	$sql_getIdPizza="SELECT id_pizza FROM PIZZA ORDER BY data desc LIMIT 1";
    $result=mysqli_query($con,$sql_getIdPizza);

    if (!$result)
    {
      die('Erro a ir buscar o id da pizza: ' . mysqli_error($con));
    }

	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$id_pizza= $row[0];
	
	echo "encontrou o id da pizza: " . $id_pizza . "<br>";


	//por ingredientes na pizza
	$sql_ingredientes="INSERT INTO PIZZA_has_INGREDIENTE (id_ingrediente, id_pizza, numero) VALUES ('1', '$id_pizza', '$ingrediente1'), ('2', '$id_pizza', '$ingrediente2'), ('3', '$id_pizza', '$ingrediente3'), ('4', '$id_pizza', '$ingrediente4'), ('5', '$id_pizza', '$ingrediente5'), ('6', '$id_pizza', '$ingrediente6') ";
    $result=mysqli_query($con,$sql_ingredientes);

	if (!$result)
    {
      die('Erro a por os ingredientes: ' . mysqli_error($con));
    }

	echo "pôs os ingredientes " . "<br>"; 

    $preco_enc =  $_SESSION['preco'];
    echo $preco_enc."preco enc"."<br>";
    $update_preco = "UPDATE `ENCOMENDA` SET `PRECO`= '$preco_enc' WHERE ID_ENC = '$id_enc'";
    $result = mysqli_query($con, $update_preco);
	
	mysqli_close($db);

	mysqli_close($con);


?>

<html>
   <head>
      <title>Ementa</title>
      <meta charset="utf-8">
      <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0">
      <meta name="description" content="pizza factory, a faux online pizza joint">
      <meta name="author" content="Mariana Martins, Sofia Rocha">
      <meta name="keywords" content="pizza, food, online, order, fake, false, faux">
      
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <link href="../css/ionicons.min.css" rel="stylesheet">
      <link href="../css/style.css" rel="stylesheet" media="screen">
      <link href="../img/favicon.ico" rel="shortcut icon">
      
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
                  <li><a href="login.php"> Iniciar Sessão </a></li>
               </ul>
            </div>
         </nav>

                  <div class="row">
                     <div class="col offset-s3 s3">
                     <form action="../done.php">
                        <button class="btn waves-effect waves-light" type="submit" name="concluir"> Concluir encomenda 
                           <i class="mdi-content-send right"></i>
                        </button>
                        </form>
                     </div>
                    <div class="col offset-s3 s3">
                        <form action="../encomenda.php">
                        <button class="btn waves-effect waves-light" type="submit" name="adicionar"> Adicionar pizza
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
<?php
	session_start();
	include "connect.php";

	echo $_SESSION['username'] . " está a fazer uma encomenda" ."<br>";

	$sql_password = mysqli_query($con, "SELECT PASSWORD FROM `CLIENTE` where USERNAME = '$_POST[username]'");


	if (!$sql_password)
	{
		die('Error: ' . mysqli_error($con));
	} 

	$user_id = $_SESSION['user_id'];
    $sql_enc = mysqli_query($con, "INSERT INTO ENCOMENDA (CLI_ID_CLIENTE, ESTADO) VALUES ($user_id, 0)");

	if (!$sql_enc)
    {
      die('Error 1: ' . mysqli_error($con));
    } 

	echo "encomenda confirmada" . "<br>"; 

	//ir buscar o id da encomenda que acabou de fazer -_-
	//listar todos, ordenar por data e limitar ao primeiro
	$sql_getIdEnc= "SELECT id_enc FROM ENCOMENDA ORDER BY data desc LIMIT 1";
    $result=mysqli_query($con,$sql_getIdEnc);
        
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$id_enc = $row[0];

	echo $_SESSION['username']." fez a encomenda número " . $id_enc . "<br>"; 

    //fazer uma pizza
	$sql_pizza="INSERT INTO PIZZA (id_enc, estado, tamanho, massa, tomate, queijo) VALUES ('$id_enc', '0', 'individual', 'alta', 'yes',         'yes')";

	if (!mysqli_query($con,$sql_pizza))
    {
      die('Error: ' . mysqli_error($con));
    } 

	echo "inseriu pizza" . "<br>";

    //encontrar id da pizza que acabámos de fazer -_-
	//listar todos, ordenar por data e limitar ao primeiro
	$sql_getIdPizza="SELECT id_pizza FROM PIZZA ORDER BY data desc LIMIT 1";
    $result=mysqli_query($con,$sql_getIdPizza);

	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$id_pizza= $row[0];
	
	echo "encontrou o id da pizza: " . $id_pizza . "<br>";

	//por ingredientes na pizza
	$sql_ingredientes="INSERT INTO PIZZA_has_INGREDIENTE (id_ingrediente, id_pizza) VALUES ('1', '$id_pizza'), ('2', '$id_pizza'), ('3',     '$id_pizza'), ('4', '$id_pizza')";
    $result=mysqli_query($con,$sql_ingredientes);
    

	if (!$result)
    {
      die('Error: ' . mysqli_error($con));
    }
	echo "pôs os ingredientes " . "<br>";
	
	mysqli_close($db);

	mysqli_close($con);


?>
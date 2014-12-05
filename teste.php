<?php
	session_start();
	include "connect.php";

	//fazer uma encomenda
	$sql_enc="INSERT INTO ENCOMENDA (id_cliente, estado) VALUES ($_SESSION['id_cliente'], 0)";

	if (!mysqli_query($con,$sql_enc))
    {
      die('Error: ' . mysqli_error($con));
    }

	//ir buscar o id da encomenda que acabou de fazer -_-
	//listar todos, ordenar por data e limitar ao primeiro
	$sql_getIdEnc="SELECT id_enc FROM ENCOMENDA ORDER BY data desc LIMIT 1";
	$row = mysqli_fetch_array($sql_getIdEnc, MYSQLI_NUM);
	
	$id_enc = $row[0];

	//fazer uma pizza
	$sql_pizza="INSERT INTO PIZZA (id_enc, estado, tamanho, massa, tomate, queijo) VALUES ('$id_enc', '0', 'alta', 'yes', 'yes')";

	if (!mysqli_query($con,$sql_pizza))
    {
      die('Error: ' . mysqli_error($con));
    }
	
	//encontrar id da pizza que acabámos de fazer -_-
	//listar todos, ordenar por data e limitar ao primeiro
	$sql_getIdPizza="SELECT id_pizza FROM PIZZA ORDER BY data desc LIMIT 1";
	$row = mysqli_fetch_array($sql_getIdPizza, MYSQLI_NUM);
	
	$id_pizza= $row[0];

	//por ingredientes na pizza
	$sql_ingredientes="INSERT INTRO PIZZA_has_INGREDIENTE (id_ingredientes, id_pizza) VALUES ('1', '$id_pizza'), ('2', '$id_pizza'), ('3', '$id_pizza'), ('4', '$id_pizza')";

	if (!mysqli_query($con,$sql_ingredientes))
    {
      die('Error: ' . mysqli_error($con));
    }
	
?>
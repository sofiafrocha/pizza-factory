<?php
	include "connect.php";

	//fazer uma encomenda
	$sql_enc="INSERT INTO ENCOMENDA (id_enc, id_cliente, data, estado) VALUES ('xxx', $_SESSION['id_cliente'], 'xxxx', 0)";

	if (!mysqli_query($con,$sql_enc))
    {
      die('Error: ' . mysqli_error($con));
    }

	//ir buscar o id da encomenda que acabou de fazer -_-
	//listar todos, ordenar por data e limitar ao primeiro
	//fazer uma pizza
	$sql_pizza="INSERT INTO PIZZA (id_pizza, id_enc, estado, tamanho, massa, tomate, queijo, data) VALUES ('xxx', 'xxxx', '0', 'alta', 'yes', 'yes', 'xxxxx')";

	if (!mysqli_query($con,$sql_pizza))
    {
      die('Error: ' . mysqli_error($con));
    }
	
	//encontrar id da pizza que acabámos de fazer -_-
	//listar todos, ordenar por data e limitar ao primeiro
	//por ingredientes na pizza
	$sql_ingredientes="INSERT INTRO PIZZA_has_INGREDIENTE (id_ingredientes, id_pizza) VALUES ('xxx', 'xxx')";

	if (!mysqli_query($con,$sql_ingredientes))
    {
      die('Error: ' . mysqli_error($con));
    }
	
?>
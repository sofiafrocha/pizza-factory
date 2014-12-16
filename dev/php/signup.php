<?php

	include "connect.php";
	
	$sql = "INSERT INTO `CLIENTE` (NOME, MORADA, TELEFONE, EMAIL, USERNAME, PASSWORD) VALUES ('$_POST[nome]','$_POST[morada]','$_POST[telefone]','$_POST[email]', '$_POST[username]', '$_POST[password]')";

	//$sql = "INSERT INTO `CLIENTE` (`NOME`, `MORADA`, `TELEFONE`, `EMAIL`, `USERNAME`, `PASSWORD`) VALUES ('$_POST[nome]','$_POST[morada]','$_POST[telefone]','$_POST[email]', '$_POST[username]', '$_POST[password]')";

	if (!mysqli_query($con,$sql))
	{
		die('Error: ' . mysqli_error($con));
	}

	//Confirmação e fechar a ligação
	echo "1 record added";
	mysqli_close($db);


	mysqli_close($con);
?>
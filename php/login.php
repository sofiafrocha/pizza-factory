<?php

	include "connect.php";

	$sql_password = "SELECT PASSWORD FROM `CLIENTE` where USERNAME = '$_POST[username]'";

	$row = mysqli_fetch_assoc($sql_password);
	$password = $row['PASSWORD'];

	if (!mysqli_query($con,$sql_password))
	{
		die('Error: ' . mysqli_error($con));
	}

	//password está certa
	if ($_POST[password] == $password]{
		
		$sql_user_id = "SELECT ID_CLIENTE FROM `CLIENTE` where USERNAME = '$_POST[username]'";
		$row = mysqli_fetch_assoc($sql_user_id);
		
		//armazena user id
		$_SESSION['user_id'] = $row['CLIENTE_ID'];
		
		echo "login successfull";
		//por redirect
	}

	//password está errada
	if ($_POST[password] != $password]{
		echo "wrong password or username";
	}

	mysqli_close($db);

	mysqli_close($con);

?>
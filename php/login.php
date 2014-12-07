<?php
	session_start();
	include "connect.php";

	echo "ele está a passar o username " . $_POST[username] . "<br>";

	$sql_password = mysqli_query($con, "SELECT PASSWORD FROM `CLIENTE` where USERNAME = '$_POST[username]'");

	if (!$sql_password)
	{
		die('Error: ' . mysqli_error($con));
	}

	$row = mysqli_fetch_assoc($sql_password);
	$password = $row['PASSWORD'];
	
	echo "sql return password " . $row['PASSWORD'] . "<br>";
	echo "var password" . $password . "<br>";

	//password está certa
	if ($_POST[password] == $password){
		
		$sql_user_id = mysqli_query($con, "SELECT ID_CLIENTE FROM `CLIENTE` where USERNAME = '$_POST[username]'");
		$row = mysqli_fetch_assoc($sql_user_id);
		
		//armazena user id
		$_SESSION['user_id'] = $row['ID_CLIENTE'];
		
		echo "session user " . $_SESSION['user_id'] . "<br>";
		echo "sql user " . $row['ID_CLIENTE'] . "<br>";
		
		echo "login successfull";
		//por redirect
	}

	//password está errada
	if ($_POST[password] != $password){
		echo "wrong password or username";
	}

	mysqli_close($db);

	mysqli_close($con);

?>
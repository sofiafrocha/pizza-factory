<?php
	//Ligação à base de dados
	$con=mysqli_connect("localhost","root","root","mydb");
  
    // Caso a ligação corra mal
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>
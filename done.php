<?php
	session_start();

	echo "Encomenda concluida";

    $preco_enc = $_SESSION['preco'];

    $preco_encomenda="UPDATE ENCOMENDA SET preco = '$preco_enc' WHERE id_enc = '$id_enc'"; 

	if (!mysqli_query($con,$sql_pizza))
    {
      die('Error: ' . mysqli_error($con));
    } 
    
	$_SESSION['id_enc'] = '';
    $_SESSION['preco'] = '0';

?>
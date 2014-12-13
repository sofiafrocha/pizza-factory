<?php
	session_start();
	include "connect.php";

	echo "Mariana is taking control" . "<br>";
	echo $_SESSION['username'] . " está a fazer uma encomenda" ."<br>";

/*
	$user_id = $_SESSION['user_id'];
    $sql_enc = mysqli_query($con, "INSERT INTO ENCOMENDA (CLI_ID_CLIENTE, ESTADO) VALUES ($user_id, 0)");

	if (!$sql_enc)
    {
      die('Encomenda não inserida: ' . mysqli_error($con));
    } */

	echo "encomenda inserida" . "<br>";

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

  /*  //fazer uma pizza
	$sql_pizza="INSERT INTO PIZZA (id_enc, estado, tamanho, massa, tomate, queijo) VALUES ('$id_enc', 0, 'individual', 'alta', 1, 1)";

	if (!mysqli_query($con,$sql_pizza))
    {
      die('Error: ' . mysqli_error($con));
    } 
*/
	echo "inseriu pizza" . "<br>";

    //upa upa variáveis
	if (isset($_POST['action'])) {
	    echo "passou MASSA: " . $_POST['massa']. "<br>";
	    echo "passou TAMANHO: " . $_POST['tamanho']." oi"."<br>";
	    echo "passou TOMATE: " . $_POST['tomate'] . "<br>";
	    echo "passou QUEIJO: " . $_POST['queijo']."<br>";
		echo "passou INGREDIENTE: " . $_POST['ingrediente']. "<br>";
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
    if ($_POST['tomate'] == "yes")
    {
        $preco = $preco + 1;
        echo $preco."€"."<br>";
    } 
    elseif ($_POST['tomate'] == "no") {
       $preco = $preco;
       echo $preco."€"."<br>";
    } 
    else {
        echo "não selecionaste tomate, pois não?"."<br>";
    } 

    if ($_POST['queijo'] == "mozarella")
    {
        $preco = $preco + 1;
        echo $preco."€"."<br>";
    } 
    elseif ($_POST['queijo'] == "cabra") {
       $preco = $preco + 1.5;
       echo $preco."€"."<br>";
    } 
    elseif ($_POST['queijo'] == "nenhum") {
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
/*
	//por ingredientes na pizza
	$sql_ingredientes="INSERT INTO PIZZA_has_INGREDIENTE (id_ingrediente, id_pizza) VALUES ('1', '$id_pizza'), ('2', '$id_pizza'), ('3','$id_pizza'), ('4', '$id_pizza')";
    $result=mysqli_query($con,$sql_ingredientes);

	if (!$result)
    {
      die('Erro a por os ingredientes: ' . mysqli_error($con));
    }

	echo "pôs os ingredientes " . "<br>"; */
	
	mysqli_close($db);

	mysqli_close($con);


?>
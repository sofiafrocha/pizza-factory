<?php
    die();
  }
 
  $sql = INSERT INTO 'CLIENTE' ('ID_CLIENTE', 'NOME', 'MORADA', 'TELEFONE', 'EMAIL', 'USERNAME', 'PASSWORD') VALUES (/*ID automatica, idk?*/, '$_POST[nome]','$_POST[morada]','$_POST[telefone]','$_POST[email]', '$_POST[username]', '$_POST[password]')";
 
  if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
 
  //Confirmação e fechar a ligação
  echo "1 record added";
  mysqli_close($db);
 
 
  mysqli_close($con);
?>
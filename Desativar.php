<?php

  $connect = mysqli_connect('localhost', 'root', '','projeto') 
  or die('Error connecting to the server: ' . mysqli_error($connect));
  
  if (isset($_POST['Desativar'])){
 
	  
  $update1 = "UPDATE USERS SET ESTADO = 'I' WHERE (USERS.USERNAME = '" . $_POST['username']."') ";
  $result = mysqli_query ($connect ,$update1) or die('The query failed: ' . mysqli_error($connect));
  
  echo "<link rel='stylesheet' href='registo_ut.css'>
				<div class='registo_utente'>
				<div class='registo_form'>
				<div class='form_utente'>
					<h3><a href='index.php?operacao=Homepage'>Desativado com sucesso!</a></h3><br/>
				</div></div></div>";

  exit();

  
  }

if (isset($_POST['Ativar'])){
 
	  
  $update1 = "UPDATE USERS SET ESTADO = 'A' WHERE (USERS.USERNAME = '" . $_POST['username']."') ";
  $result = mysqli_query ($connect ,$update1) or die('The query failed: ' . mysqli_error($connect));
  
  echo "<link rel='stylesheet' href='registo_ut.css'>
				<div class='registo_utente'>
				<div class='registo_form'>
				<div class='form_utente'>
					<h3><a href='index.php?operacao=Homepage'>Ativado com sucesso!</a></h3><br/>
				</div></div></div>";

  exit();

  
  }


?>


<html>
<head>

<title> Ativar/desativar </title>
<link rel="stylesheet" href="registo_ut.css">


</head>


<body>






<div class="registo_utente">

	<div class="registo_form">
		
	<div class="titulo_registo">
		
		Ativar/desativar utilizador


		</div>
		
		<div class="form_utente">
		
		
		<form name ="myform" action="index.php?operacao=Desativar"  method ="post" >
	
		
		<label for="name"> Username </label>
		<input type="text" id="username" name="username"  ><br/>
		<br/><br/>
		
	
		<input type="submit" name ="Desativar" value="Desativar" class="submit_button" >
		<br/><br/>
		<input type="submit" name ="Ativar" value="Ativar" class="submit_button" >



	 </form>

</div>

	</div>




</div>



</body>


</html>
<?php





  $connect = mysqli_connect('localhost', 'root', '','projeto') 
  or die('Error connecting to the server: ' . mysqli_error($connect));
 
 
 
 $queryId = "SELECT ID FROM USERS WHERE ( USERS.USERNAME = '". $_SESSION['username'] ."')";
	$resultId = mysqli_query ($connect ,$queryId) or die('The query failed: ' . mysqli_error($connect));
	$rowsId = mysqli_fetch_array($resultId);
	  
	
  $dados2 = "SELECT * FROM UTENTES  WHERE (UTENTES.ID_USER = '" .$rowsId['ID']."') ";
  $result2 = mysqli_query ($connect ,$dados2) or die('The query failed: ' . mysqli_error($connect));
  $rowsutente = mysqli_fetch_array($result2);
  $nome_distrito = "SELECT * FROM DISTRITOS  WHERE (DISTRITOS.ID = '" .$rowsutente['ID_Distrito']."') ";
  $resultdistrito = mysqli_query ($connect ,$nome_distrito) or die('The query failed: ' . mysqli_error($connect));
  $rowsdistrito = mysqli_fetch_array($resultdistrito);

  

  



?>









<html>
<head>

<title> Ver Ficha do Utente </title>
<link rel="stylesheet" href="registo_ut.css">



</head>


<body>

<div class="registo_utente">

	<div class="registo_form">
		
	<div class="titulo_registo">
		
		
		Ver a minha Ficha


		</div>
		
		<div class="form_utente">
		
		
		<form name ="myform" action="index.php?operacao=verFichaUtente"   >
	
		
		<label for="name"> Nome </label>
		<?php echo "<input type='text' id='name' name='nome' disabled value = '".$rowsutente['Nome']."' >"; ?>
		 
	
		
		<label for="morada"> Morada </label>
		<?php echo "<input type='text' id='morada' name='morada' disabled value = '".$rowsutente['Morada']."'>"; ?>
		

	    <label for="localidade"> Localidade </label>
		<?php echo "<input type='text' id='localidade' name='localidade' disabled value = '".$rowsutente['Localidade']."'>"; ?>
		
		
		<label for = "distrito"> Distrito </label>
		<?php echo "<input type = 'text' id='distrito' name = 'distrito' disabled value = '".$rowsdistrito['Nome_Distrito']."'>"; ?>
		
	
		<label for="contactos"> Contactos </label>
		<?php echo "<input type='text' id='contactos' name='contactos' disabled value = '".$rowsutente['Contactos']."'>"; ?>
		
	
		
		<label for="email"> Email </label>
		<?php echo "<input type='text' id='email' name='email' disabled value = '".$rowsutente['Email']."'>";?>
	
	
		
		<label for="email"> Data de Nascimento </label>
		<?php echo "<input type='text' disabled value = '".$rowsutente['Data_Nascimento']."'>"; ?>
		
	

    	
		<label for="email">Sexo </label>
		<?php echo "<input type='text' disabled value = '".$rowsutente['Sexo']."'>"; ?>
		
	    <label for="email"> NIF </label>
		<?php echo "<input type='text' disabled value = '".$rowsutente['NIF']."'>"; ?>
		
		<label for="email"> Cartão de saúde </label>
		<?php echo "<input type='text' disabled value = '".$rowsutente['Cartao_Saude']."'>";?>


	
	
	
	 </form>

</div>

	</div>




</div>

	 

</body>


</html>
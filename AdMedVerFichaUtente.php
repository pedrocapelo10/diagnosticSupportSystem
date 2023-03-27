<?php





  $connect = mysqli_connect('localhost', 'root', '','projeto') 
  or die('Error connecting to the server: ' . mysqli_error($connect));
 
  if (isset($_POST['Procurar'])){
 
 $queryId = "SELECT ID FROM USERS WHERE ( USERS.NOME = '". $_POST['nome'] ."')";
	$resultId = mysqli_query ($connect ,$queryId) or die('The query failed: ' . mysqli_error($connect));
	$rowsId = mysqli_fetch_array($resultId);
  
	
  $dados2 = "SELECT * FROM UTENTES  WHERE (UTENTES.ID_USER = '" .$rowsId['ID']."') ";
  $result2 = mysqli_query ($connect ,$dados2) or die('The query failed: ' . mysqli_error($connect));
  $rowsutente = mysqli_fetch_array($result2);
  $nome_distrito = "SELECT * FROM DISTRITOS  WHERE (DISTRITOS.ID = '" .$rowsutente['ID_Distrito']."') ";
  $resultdistrito = mysqli_query ($connect ,$nome_distrito) or die('The query failed: ' . mysqli_error($connect));
  $rowsdistrito = mysqli_fetch_array($resultdistrito);

  
  }
  



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
		
		
		Ver Ficha Utente


		</div>
		
		<div class="form_utente">
		
		
		<form name ="myform" action="index.php?operacao=AdMedVerFichaUtente"  method ="post"  >
	
	<?php
		
		$connect1 = mysqli_connect('localhost', 'root', '','projeto')
 		or die('Error connecting to the server: ' . mysqli_error($connect));
 	
 		$query1="SELECT ID, NOME FROM UTENTES";
    	
    	$results1 = mysqli_query($connect1, $query1) or die(mysqli_error($connect));
		
		echo "Procurar Ficha do Utente:  ";
		echo "<select name='nome' id='nome'>";
		
		while ($rows = mysqli_fetch_array($results1)) {
	
			echo " <option value= '".$rows['NOME']."' > ".$rows['NOME']." </option> ";
}

		echo "</select>";
		?>
		<br/> <br/>
	    <input type="submit" name ="Procurar" value="Procurar" class="submit_button" >
	   
		<?php if (isset($_POST['Procurar'])){ ?>
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
		<?php echo "<input type='text' disabled value = '".$rowsutente['Cartao_Saude']."'>"; }?>


	
	
	
	 </form>

</div>

	</div>




</div>

	 

</body>


</html>
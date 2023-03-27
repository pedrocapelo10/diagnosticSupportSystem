<?php





  $connect = mysqli_connect('localhost', 'root', '','projeto') 
  or die('Error connecting to the server: ' . mysqli_error($connect));
 

	
  $query = "SELECT * FROM USERS  WHERE ( USERS.USERNAME = '". $_SESSION['username'] ."') ";
  $result = mysqli_query ($connect ,$query) or die('The query failed: ' . mysqli_error($connect));
  $rows = mysqli_fetch_array($result);
 

  

  



?>









<html>
<head>

<title> Ver Ficha </title>
<link rel="stylesheet" href="registo_ut.css">



</head>


<body>

<div class="registo_utente">

	<div class="registo_form">
		
	<div class="titulo_registo">
		
		
		Ver a minha Ficha


		</div>
		
		<div class="form_utente">
		
		
		<form name ="myform" action="index.php?operacao=verFichaUser"  >
	
		
		<label for="name"> Nome </label>
		<?php echo "<input type='text' id='name' name='nome' disabled value = '".$rows['Nome']."' >"; ?>
		 
	
		
		<label for="morada"> Morada </label>
		<?php echo "<input type='text' id='morada' name='morada' disabled value = '".$rows['Morada']."'>"; ?>
		
		
	
		<label for="contactos"> Contactos </label>
		<?php echo "<input type='text' id='contactos' name='contactos' disabled value = '".$rows['Contactos']."'>"; ?>
		
	
		
	


	
	
	
	 </form>

</div>

	</div>




</div>

	 

</body>


</html>
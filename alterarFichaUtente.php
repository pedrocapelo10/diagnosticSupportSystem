
<?php





  $connect = mysqli_connect('localhost', 'root', '','projeto') 
  or die('Error connecting to the server: ' . mysqli_error($connect));
 
  if (isset($_POST['Guardar'])){
 
 $queryId = "SELECT ID FROM USERS WHERE ( USERS.NOME = '". $_POST['nome'] ."')";
	$resultId = mysqli_query ($connect ,$queryId) or die('The query failed: ' . mysqli_error($connect));
	$rowsId = mysqli_fetch_array($resultId);
	  
  $update1 = "UPDATE USERS SET  MORADA = '". $_POST['morada'] ."', CONTACTOS = '". $_POST['contactos'] ."' WHERE (USERS.NOME = '". $_POST['nome'] ."') ";
  $result = mysqli_query ($connect ,$update1) or die('The query failed: ' . mysqli_error($connect));
  

	
	
	
  $queryd = 'SELECT ID FROM DISTRITOS WHERE ("'.$_POST['distritoescolhido'].'" = DISTRITOS.NOME_DISTRITO) ';
  $resultd = mysqli_query ($connect ,$queryd) or die('The query failed: ' . mysqli_error($connect));
  $rowsd = mysqli_fetch_array($resultd);
  $update2 = "UPDATE UTENTES SET MORADA = '". $_POST['morada'] ."', LOCALIDADE = '". $_POST['localidade']."' , ID_DISTRITO = '".$rowsd['ID']."', CONTACTOS = '". $_POST['contactos']."', EMAIL = '". $_POST['email']."', DATA_NASCIMENTO = '". $_POST['data_nascimento']."', SEXO = '". $_POST['sexo']."', NIF = '". $_POST['nif']."' , CARTAO_SAUDE = '". $_POST['cartao_saude']."' WHERE (UTENTES.ID_USER = '" . $rowsId['ID']."') ";
  $result2 = mysqli_query ($connect ,$update2) or die('The query failed: ' . mysqli_error($connect));

  echo "Alterado com sucesso!";
  exit();

  
  }



?>







<html>
<head>

<title> Alterar Ficha do Utente </title>
<link rel="stylesheet" href="registo_ut.css">


<script>

  
    
  
        // Fetching values from all input fields and storing them in variables.
		
        
        //const nome = document.getElementById("nome").value;
        //const morada = document.getElementById("morada").value;
        //const contactos = document.getElementById("contactos").value;
        //const email = document.getElementById("email").value;
       
       
       
         function checkForm() {
			var username = document.form["myform"]["username"].value;
			var password = document.form["myform"]["password"].value;
			
			if(username == "" || username == null) {
			alert("Campo username não pode ser vazio");
			return false;
			}
			
			else if(password == "" || password == null) {
				alert("Campo password não pode ser vazio");
			return false;
			}
			
			
			
		 }
    
</script>





</head>


<body>






<div class="registo_utente">

	<div class="registo_form">
		
	<div class="titulo_registo">
		
		Alterar Ficha Utente


		</div>
		
		<div class="form_utente">
		
		
		<form name ="myform" action="index.php?operacao=alterarFichaUtente"  method ="post" onsubmit = "checkForm()" >
	
		
		<label for="name"> Nome </label>
		<input type="text" id="name" name="nome" value = "Insira o nome utilizado no registo utente" ><br />
		
	
		
		<label for="morada"> Morada </label>
		<input type="text" id="morada" name="morada"><br/>
		
	
		
		<label for="localidade"> Localidade </label>
		<input type="text" id="localidade" name="localidade"><br/>
		
			
		<?php
		
		$connect1 = mysqli_connect('localhost', 'root', '','projeto')
 		or die('Error connecting to the server: ' . mysqli_error($connect));
 	
 		$query1="SELECT ID, NOME_DISTRITO FROM DISTRITOS";
    	
    	$results1 = mysqli_query($connect1, $query1) or die(mysqli_error($connect));
		
		echo "Distrito:  ";
		echo "<select name='distritoescolhido' id='distrito'>";
		
		while ($rows = mysqli_fetch_array($results1)) {
	
			echo " <option value= '".$rows['NOME_DISTRITO']."' > ".$rows['NOME_DISTRITO']." </option> ";
}

		echo "</select>";
		?>
	
		<br/>
		<br/>
		<label for="contactos"> Contactos </label>
		<input type="text" id="contactos" name="contactos"><br/>
		
	
		
		<label for="email"> Email </label>
		<input type="text" id="email" name="email"><br/>
	
	
		
		<label for="data_nascimento"> Data de Nascimento </label>
		<input type="text" placeholder="MM/DD/YYYY" onfocus="(this.type='date')" id="data_nascimento" name="data_nascimento"><br/>
		<!-- The placeholder attribute does not work with the input type Date, 
		so place any value as a placeholder in the input type Date. 
		You can use the onfocus=”(this.type=’date’) inside the input filed. 
		Because you are required to have a custom placeholder value for input type “date”, 
		and you have a drop-down calendar where the user can select the date from. -->
	

    	
		<label> Sexo </label>
			<ul>
				<li>
				<label class="sexo">
				<input type="radio" name="sexo" value="feminino" class="input_radio">
				<span> Feminino </span>
				</label>
				</li>
		
				<li>
				<label class="sexo">
				<input type="radio" name="sexo" value="masculino" class="input_radio">
				<span> Masculino </span>
				</label>
				</li>
			</ul>
		



		
		<br/>
		<br/>
		<label for="nif"> NIF </label>
		<input type="text" id="nif" name="nif">
		
	
		
		
		<label for="cartao_saude"> Cartão de Saúde </label>
		<input type="text" id="cartao_saude" name="cartao_saude">
		
		
		
		<!-- <label for="fotografia">Fotografia:</label>
		<input type="file" name="myimage"> -->
		
		<?php 
	
	
	$connect = mysqli_connect('localhost', 'root', '','projeto')
 	or die('Error connecting to the server: ' . mysqli_error($connect));
 	
 	$query="SELECT NOME FROM ALERGIAS ORDER BY ID";
    $results = mysqli_query($connect, $query) or die(mysqli_error($connect));
    echo  "Que Alergias tem?";
    echo "<br/>";

	 while ($rows = mysqli_fetch_array($results)) {
	 
	  echo "<label> ". $rows['NOME']. "</label>" ;
	 echo "<input type= 'checkbox' id='alergias' name='alergias' value=".$rows['NOME'].">";
		  
 		
       }
	
	
	?>

	
		
		
				
		
		<br/> <br/>
		<input type="submit" name ="Guardar" value="Guardar" class="submit_button" >
		


	
	
	


	 </form>

</div>

	</div>




</div>



</body>


</html>


<?php





  $connect = mysqli_connect('localhost', 'root', '','projeto') 
  or die('Error connecting to the server: ' . mysqli_error($connect));
  
  if (isset($_POST['Registar'])){
  
  $sql_u = 'SELECT * FROM USERS WHERE (username = "'. $_POST['username'] .'" )'; 
  $result_u = mysqli_query ($connect ,$sql_u) or die('The query failed: ' . mysqli_error($connect));
  
  if(mysqli_num_rows($result_u) > 0) {
    $user_error = "Este username já existe, tente novamente.";
  }
  
  
  else {
	  
	  
  $insert = "INSERT INTO USERS (PERFIL, USERNAME, PASSWORD, NOME, MORADA, CONTACTOS , ESTADO) VALUES ('U',  '". $_POST['username'] ."', '" . md5($_POST['password']) . "','". $_POST['nome'] ."', '". $_POST['morada'] ."', '". $_POST['contactos'] ."', 'A')";
  $result = mysqli_query ($connect ,$insert) or die('The query failed: ' . mysqli_error($connect));
  
	
	$queryId = 'SELECT ID FROM USERS WHERE ( USERS.USERNAME = "'.$_POST['username'].'")';
	$resultId = mysqli_query ($connect ,$queryId) or die('The query failed: ' . mysqli_error($connect));
	$rowsId = mysqli_fetch_array($resultId);
	
	
  $queryd = 'SELECT ID FROM DISTRITOS WHERE ("'.$_POST['distritoescolhido'].'" = DISTRITOS.NOME_DISTRITO) ';
  $resultd = mysqli_query ($connect ,$queryd) or die('The query failed: ' . mysqli_error($connect));
  $rowsd = mysqli_fetch_array($resultd);
  
  

	$image = addslashes($_FILES['myimage']['tmp_name']);
	$image_name = addslashes($_FILES['myimage']['name']);
	/*Returns a string with backslashes added before characters that need to be escaped.*/
	$image = file_get_contents($image);
	/* This encoding is designed to make binary data survive transport through transport layers that are not 8-bit clean, such as mail bodies.*/
	$image = base64_encode($image);
  
  
  $insert2 = "INSERT INTO UTENTES (ID_USER, NOME, MORADA, LOCALIDADE, ID_DISTRITO, CONTACTOS, EMAIL, DATA_NASCIMENTO, SEXO, NIF, CARTAO_SAUDE, IMAGENAME, IMAGE ) VALUES ('".$rowsId['ID']."','". $_POST['nome'] ."', '". $_POST['morada'] ."', '". $_POST['localidade']."', '".$rowsd['ID']."', '". $_POST['contactos']."' , '". $_POST['email']."','". $_POST['data_nascimento']."', '". $_POST['sexo']."', '". $_POST['nif']."', '". $_POST['cartao_saude']."' , '".$image_name."', '".$image."')";
  $result2 = mysqli_query ($connect ,$insert2) or die('The query failed: ' . mysqli_error($connect));

  echo "Adicionado com sucesso!";
  exit();

  
  }

}


?>












<html>
<head>

<title> Registo Utente </title>
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
		
		Registo Utente


		</div>
		
		<div class="form_utente">
		
		
		<form name ="myform" action="index.php?operacao=registoUT"  method ="post"  enctype="multipart/form-data"  onsubmit="return checkForm()" >
		
		<!-- multipart/form-data	No characters are encoded. This value is required when you are using forms that have a file upload control-->
		
	
		
		<label for="username"> Username </label>
		
		<input type="text" id="username" name="username" >
		
		
		
		
		<label for="password"> Password </label>
		<input type="password" id="password" name="password"> <br /> <br/>
		
		<label for="name"> Nome </label>
		<input type="text" id="name" name="nome" ><br />
		
	
		
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
		<label for = "nif"> NIF </label>
		<input type="text" id="nif" name="nif">
		
	
		
		
		<label for = "cartao_saude"> Cartão de Saúde </label>
		<input type="text" id="cartao_saude" name="cartao_saude">
		
		
		
		<label for = "fotografia">Fotografia:</label>
		<input type="file" name="myimage"> 
		
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
		<input type="submit" name ="Registar" value="Registar" class="submit_button" >
		


	
	
	


	 </form>

</div>

	</div>




</div>



</body>


</html>
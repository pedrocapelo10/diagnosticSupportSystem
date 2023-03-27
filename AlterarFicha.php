<?php

  $connect = mysqli_connect('localhost', 'root', '','projeto') 
  or die('Error connecting to the server: ' . mysqli_error($connect));
  
  if (isset($_POST['Guardar'])){
 
	  
  $update1 = "UPDATE USERS SET MORADA = '". $_POST['morada'] ."', CONTACTOS = '". $_POST['contactos'] ."' ,PERFIL = '". $_POST['perfil'] ."' WHERE (USERS.NOME = '" . $_POST['nome']."') ";
  $result = mysqli_query ($connect ,$update1) or die('The query failed: ' . mysqli_error($connect));
  
  echo "<link rel='stylesheet' href='registo_ut.css'>
				<div class='registo_utente'>
				<div class='registo_form'>
				<div class='form_utente'>
					<h3><a href='index.php?operacao=Homepage'>Alterado com sucesso!</a></h3><br/>
				</div></div></div>";

  exit();

  
  }



?>


<html>
<head>

<title> Alterar Ficha </title>
<link rel="stylesheet" href="registo_ut.css">


<script>

         
         function checkForm() {
			var nome = document.form["myform"]["name"].value;
			
			if(nome == "" || nome == null) {
			alert("Campo Nome deve ser preenchido");
			return false;
			}
		 }
    
</script>


</head>


<body>






<div class="registo_utente">

	<div class="registo_form">
		
	<div class="titulo_registo">
		
		Alterar Ficha


		</div>
		
		<div class="form_utente">
		
		
		<form name ="myform" action="index.php?operacao=alterarFicha"  method ="post" onsubmit = "checkForm()" >
	
		
		<label for="name"> Nome </label>
		<input type="text" id="name" name="nome" value = "Insira o nome utilizado no registo"  ><br/>
		
	
		
		<label for="morada"> Morada </label>
		<input type="text" id="morada" name="morada"><br/>
		
	
		<label for="contactos"> Contactos </label>
		<input type="text" id="contactos" name="contactos"><br/>
		
		<label for="perfil">Perfil:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		<select name="perfil" id="perfil">
			<option value="A">Administrador</option>
			<option value="M">Medico</option>
			<option value="I">Investigador</option>
			
		</select>

		</br>	
		</br> 
		<input type="submit" name ="Guardar" value="Guardar" class="submit_button" >


	 </form>

</div>

	</div>




</div>



</body>


</html>
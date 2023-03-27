<?php
	$servername = "localhost";
	$usernamedb = "root";
	$passworddb = "";
	$dbname="PROJETO";

	$username="";
	$password="";
	$name="";
	$contactos="";
	$perfil="";
	$morada="";
     $con = mysqli_connect($servername,$usernamedb,$passworddb,$dbname);
    // Check connection
    if (mysqli_connect_error()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // When form submitted, insert values into the database.
    if (isset($_POST['username'])) {
        // removes backslashes
        $username = ($_POST['username']);
        //escapes special characters in a string
		$username=$_POST['username'];
		
		$name=$_POST['name'];
		$contactos=$_POST['contactos'];
		$perfil=$_POST['perfil'];
		$morada=$_POST['morada'];
        
        $query    = 'INSERT INTO USERS (Nome,Username,Password,Perfil,Morada,Contactos , ESTADO) VALUES ("'.$_POST['name'].'","'.$_POST['username'].'","'. md5($_POST['password']) .'","'.$_POST['perfil'].'","'.$_POST['morada'].'","'.$_POST['contactos'].'" , "A");';
        $result   = mysqli_query($con, $query);
        if ($result) {
				echo "
				<link rel='stylesheet' href='registo_ut.css'>
				<div class='registo_utente'>
				<div class='registo_form'>
				<div class='form_utente'>
					<h3><a href='index.php?operacao=Homepage'>O registo foi bem sucedido.</a></h3><br/>
				</div></div></div>";
                 
        } else {
            echo "
			<link rel='stylesheet' href='registo_ut.css'>
				<div class='registo_utente'>

				<div class='registo_form'>
		
				
				<div class='form_utente'>
					<h3>Erro ao Registar<br> <br> <br> <a href='index.php?operacao=registo'>Tente Outra Vez</a></h3><br/>
                 </div></div></div>";
        }
    } else {
?>

<html>
<head>

<title> Registo </title>
<link rel="stylesheet" href="registo_ut.css">

<script>
    function checkForm() {
        // Fetching values from all input fields and storing them in variables.
        var username = document.forms["formregisto"]["username"].value;
        var name = document.forms["formregisto"]["name"].value;
        var password = document.forms["formregisto"]["password"].value;
		var perfil = document.forms["formregisto"]["perfil"].value;
		var morada = document.forms["formregisto"]["morada"].value;
		var contactos = document.forms["formregisto"]["contactos"].value;
		
        //Check input Fields Should not be blanks.
        if (username == '' || user == '' || password == ''||perfil=''||morada=''||contactos='') {
            alert("Por favor preencha todos os campos.");
			return false;
			
		}else{
			return true;
		}
        
    }
</script>
</head>


<body>

<div class="registo_utente">

	<div class="registo_form">
		
	<div class="titulo_registo">
		
		Registo
		<br><br>
		<hr style="background-color: white;height: 2px; border:0">


	</div>
		
	<div class="form_utente">
		
	<form name="formregisto" method="POST" action="index.php?operacao=registo" onsubmit="return checkForm()"> 
		<?php
		echo"<label for='username'> Username: </label>
		<input type='text' name='username' id='username' value=".$username."> <br/><br/>
		
		<label for='password'> Password: &nbsp</label>
		<input type='password' name='password' id='password' value=".$password."><br /><br/>
		
		<label for='name'> Nome: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		<input type='text' name='name' id='name' value=".$name."><br/><br/>
		
		
		<label for='morada'> Morada: &nbsp&nbsp&nbsp&nbsp&nbsp</label>
		<input type='text' name='morada' id='morada' value=".$morada."><br/>
		<br/>
		<label for='contactos'> Contactos: &nbsp</label>
		<input type='text' name='contactos' id='contactos' value=".$contactos."><br/><br/>";
		?>
		<label for="perfil">Perfil:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
		<select name="perfil" id="perfil">
			<option value="A">Administrador</option>
			<option value="M">Medico</option>
			<option value="I">Investigador</option>
			
		</select>
		<br/><br/>
	
		
		<input type="submit" value="Registar" class="submit_button">&nbsp;
	</form>

	</div>

	</div>
	
</div>
<?php }?>


</body>


</html>

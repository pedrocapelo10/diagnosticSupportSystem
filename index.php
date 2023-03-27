<?php
session_start();
if(isset($_GET['operacao'])){
	if($_GET['operacao']=="checkLogin"){

		$connect = mysqli_connect('localhost', 'root', '','projeto')
			or die('Error connecting to the server: ' . mysqli_error($connect));
		$sql = 'SELECT Perfil FROM USERS WHERE (Username = "'. $_POST['username'] .'" AND
			Password = "'. md5($_POST['password']) .'" AND ESTADO = "A")';
		$result = mysqli_query ($connect ,$sql)
			or die('The query failed: ' . mysqli_error($connect));
		$number = mysqli_num_rows($result);
		
		
		

		if (($number == 1)) {
			$row=$result->fetch_assoc();

			$_SESSION['authuser']=1;
			$_SESSION['username']=$_POST['username'];
			$_SESSION['perfil']=$row['Perfil'];
			
		}
		else {
			$_SESSION['authuser']=0;
			$_SESSION['perfil']=" ";
			
		}	
	}
	else if($_GET['operacao']=="Logout"){
		session_unset();
		header("Location: index.php?operacao=Homepage");
		exit();
	}

	else if($_GET['operacao']!="Homepage" AND $_GET['operacao']!="login" AND $_GET['operacao']!="checkLogin" AND $_GET['operacao']!="about" AND $_GET['operacao']!="registoUT"){
		if(!isset($_SESSION['authuser'])||($_SESSION['authuser']==0)){
			header("Location: index.php?operacao=login");
			exit();
		}
	}
}

?>







<!DOCTYPE html>
<html>

<style>

@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');
*{
	font-family: 'Montserrat', sans-serif;
}



ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #FFFFFF;
}

li {
  float: left;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 21px 23px;
  text-decoration: none;
}

li a:hover {
  background-color: #1AE2A8;
}
.barra_final{
	
	width:100%;
	
	padding: 16px 18px;
	position:absolute;
	left:50%;
	top: 190%;
	background-color: #FFFFFF;
	transform: translate(-50%, -50%);
}


</style>
<head>
 <img src="images/covidsymlogo1.png" height ="60px" style="float: right; position: absolute; right: 0px; border:0" alt ="CovidSym" >

<ul>
  <li><a class="active" href="index.php?operacao=Homepage">Home</a></li>
  <?php
	if(isset($_SESSION['authuser']) AND $_SESSION['authuser'] == 1){
		echo "<li><a href='index.php?operacao=Logout'>Logout</a></li>";
	}
	else{
		echo "<li><a href='index.php?operacao=login'>Login</a></li>";
	}	
	if(isset($_SESSION['authuser']) AND ($_SESSION['authuser'] == 1) AND (isset($_SESSION['perfil'])) AND ($_SESSION['perfil']=="A") ){
		echo"<li><a href='index.php?operacao=registo'>Registar Utilizadores</a></li>";
		echo"<li><a href='index.php?operacao=listUsers&pageNumber=1&pageSize=10'>Lista de Utilizadores</a></li>";
		echo"<li><a href='index.php?operacao=Desativar'> Desativar Utilizador </a></li>";
		echo"<li><a href='index.php?operacao=alterarFicha'> Alterar ficha </a></li>";
		echo"<li><a href='index.php?operacao=registoUT'> Registar Utente </a></li>";
		echo"<li><a href='index.php?operacao=AdMedVerFichaUtente'> Ver ficha Utente</a></li>";
		echo"<li><a href='index.php?operacao=alterarFichaUtente'> Alterar ficha Utente</a></li>";
		echo"<li><a href='index.php?operacao=verFichaUser'> Ver a minha ficha </a></li>";
	}	
	if(isset($_SESSION['authuser']) AND ($_SESSION['authuser'] ==1) AND (isset($_SESSION['perfil'])) AND ($_SESSION['perfil'] == "U")) {
		echo"<li><a href='index.php?operacao=alterarFichaUtente'> Alterar a minha ficha</a></li>";
		echo"<li><a href='index.php?operacao=verFichaUtente'> Ver a minha ficha </a></li>";
	}
	
	if(isset($_SESSION['authuser']) AND ($_SESSION['authuser'] ==1) AND (isset($_SESSION['perfil'])) AND ($_SESSION['perfil'] == "M")) {
		
		echo"<li><a href='index.php?operacao=alterarFichaUtente'> Alterar ficha utente</a></li>";
		echo"<li><a href='index.php?operacao=AdMedverFichaUtente'> Ver ficha utente </a></li>";
		echo"<li><a href='index.php?operacao=verFichaUser'> Ver a minha ficha </a></li>";
	}
	
	if(isset($_SESSION['authuser']) AND ($_SESSION['authuser'] ==1) AND (isset($_SESSION['perfil'])) AND ($_SESSION['perfil'] == "I")) {
		echo"<li><a href='index.php?operacao=consultarDados&pageNumber=1&pageSize10'> Consultar dados</a></li>";
		echo"<li><a href='index.php?operacao=verFichaUser'> Ver a minha ficha </a></li>";
	}
	?> 
	
	<li><a href='index.php?operacao=about'>About</a></li>
  
  
 </ul>
 

 
 
 
 
 
</head>


<body>
 <?php 
		if(!isset($_GET["operacao"])){
			include("Homepage.php");}
		else{
			switch($_GET["operacao"]){
				case "Homepage": include("Homepage.php"); 
				break;
				case "login": include("login.php");
				break;
				case "checkLogin": include("checklogin.php");
				break;
				case "listUsers": include("listUsers.php");
				break;
				case "registo": include("registo.php");
				break;
				case "registoUT": include("registoUT.php");
				break;
				case "alterarFichaUtente": include("alterarFichaUtente.php");
				break;
				case "alterarFicha": include("alterarFicha.php");
				break;
				case "verFichaUtente": include("verFichaUtente.php");
				break;
				case "AdMedVerFichaUtente": include("AdMedVerFichaUtente.php");
				break;
				case "verFichaUser": include("verFichaUser.php");
				break;
				case "Desativar": include("Desativar.php");
				break;
				case "about": include("about.php");
				break;


			}
			}
			?>
<ul>
	<li align="center" class="barra_final">&copy; Trabalho Realizado por:  52511-52552-51892 </li>
</ul>
</body>
</html>
		
	
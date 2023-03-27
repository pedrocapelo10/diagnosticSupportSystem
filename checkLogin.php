<html>
<head>

<title> COVIDSYM - Login </title>
<link rel="stylesheet" href="login.css">
</head>


<?php
if (isset($_SESSION['authuser']) AND $_SESSION['authuser'] == 1){
echo "<h1 align='center'>Bem-vindo! Como poderemos ajudar hoje?</h1><br><br>";
echo "<div align ='center'><img src='images/Medico_paciente.jpg' alt='Estamos aqui para o ajudar.'  border='0'></div>";
}
else{
echo "<h3 align='center'>Por favor tente novamente ou crie uma conta de utilizador.</h3><br>";
include("login.php");
}
?>

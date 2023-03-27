<style>
	
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
  
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  
}

#customers tr:nth-child(even){background-color: #ffffff;height:15px;}

#customers tr:hover {background-color: #b3e6ff;}

#customers th {
  
  text-align: left;
  background-color: #1AE2A8	;
  height:15px;
  color: white;
}
.div_table{
	position: absolute;
	width:70%;
	left: 50%;
	top: 20%;
	transform: translate(-50%, -50%);
}
.table_number{
	position: absolute;
	
	left: 50%;
	top: 90%;
	
}

</style>
<link rel='stylesheet' href='registo_ut.css'>
				<div class='registo_utente'>
				<div class="div_table">
				
<?php 
	
	$element=$_GET["pageSize"];
	$pageNumber=$_GET["pageNumber"];
	$inc=(intval($element) * intval($pageNumber))-intval($element);
	$maxim=0;
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "PROJETO";

	// Create connection
	$connect = new mysqli($servername, $username, $password, $dbname)
		or die('Error connecting to the server: ' . mysqli_error($connect));
	$sql = 'SELECT NOME,MORADA, LOCALIDADE, ID_DISTRITO, CONTACTOS, EMAIL, DATA_NASCIMENTO, SEXO, NIF, CARTAO_SAUDE FROM UTENTES LIMIT ' .$inc.', 10;';
	$result=$connect->query($sql) or die('Error connecting to the server: ' . mysqli_error($connect));
	
	//$sql_maxim='SELECT COUNT(ID) as' .$maxim.' FROM USERS;';
	
	$maxim=$result->num_rows;
	
	if ($result) {
  echo "
			
  <table align='center' id='customers'>
  
  <tr><th>ID</th><th>Username</th><th>Nome</th><th>Morada</th><th>Contactos</th><th>Perfil</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["ID"]."</td><td>".$row["USERNAME"]."</td><td>".$row["NOME"]."</td><td>".$row["MORADA"]."</td>
		  <td>".$row["CONTACTOS"]."</td><td>".$row["PERFIL"]."</td>
	</tr>";
  }
  echo "</table>";
?>
			</div><div class="table_number">
				<?php
				$aux=0;
				$total=ceil($maxim/round($element));
				while($aux<$total){
					$aux=$aux+1;
					if($_GET["pageNumber"]!=$aux){
						echo"<a href='index.php?operacao=listUsers&pageNumber=".$aux."&pageSize=10 target='_self'> $aux&nbsp;</a>";
					}else{
						echo"<a> $aux&nbsp;</a>";
					}
				}
			$connect->close();
			
			} else {
				echo"Não há elementos Registados na Base de Dados";
				$connect->close();
			}
				
			
				?>
			</div>
			</div>
			
		
<html>
	<head>
		<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="estilo.css">
	</head>
<body>
	<div id="principal">
		<div id="fazer">
			<div class="titulo">
				A fazer
			</div>
			<div id="conteudofazer">
				oi
			</div>
		</div>
		<div id="fazendo">
			<div class="titulo">
				Fazendo
			</div>
			<div id="conteudofazendo">
				oi
			</div>
		</div>
		<div id="feito">
			<div class="titulo">
				Feito
			</div>
			<div id="conteudofeito">
				oi
			</div>
		</div>
	</div>
<?PHP
	try{ //tente
		$conexao = new PDO("mysql:host=localhost;dbname=sistema_tar","root", "");//PHP DATA OBJECT
		// echo "deu certo";
	}
	catch (PDOException $e){ //Bloco correspondente ao try
		//Testar var_dump($e);
		//teste metodo echo $e-> getCode();
		echo $e->getMessage(); //Metodo amplamente utilizado
	}
	$sql = "SELECT * FROM tarefas ";
	$tarefas = $conexao -> prepare($sql);
	$tarefas -> execute();
	
	foreach ($tarefas as $useri){
		echo "<tr>";
		echo "<td>".$useri['nome']."</td>";
		echo "<td>".$useri['idade']."</td>";
		echo "<td>".$useri['sexo']."</td>";
		echo "<th> <img src='excluir.png' value ='".$useri['id']."' width='25px' ></th>";
		echo "</tr>";
	}
	$conexao = NULL;
?>
	</table>
</body>
</html>
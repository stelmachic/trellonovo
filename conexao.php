<?php
	try{ //tente
		$conexao = new PDO("mysql:host=localhost;dbname=sistema_tar","root", "");//PHP DATA OBJECT
		// echo "deu certo";
	}
	catch (PDOException $e){ //Bloco correspondente ao try
		//Testar var_dump($e);
		//teste metodo echo $e-> getCode();
		echo $e->getMessage(); //Metodo amplamente utilizado
	}
?>
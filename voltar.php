<?PHP

session_start();

		include("conexao.php");
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
		$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
		$tipo = intval($tipo);
		$tipo = $tipo-1;
		echo $tipo;
		$sql3 = "UPDATE tarefas SET tipo = '$tipo' WHERE id_tarefa = '$id'";
		$editando = $conexao -> prepare($sql3);
		$editando -> execute();
		$conexao = NULL;

?>
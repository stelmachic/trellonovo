<?PHP

session_start();

		include("conexao.php");
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
		$sql3 = "DELETE FROM tarefas WHERE id_tarefa = '$id'";
		$apagando = $conexao -> prepare($sql3);
		$apagando -> execute();
		$conexao = NULL;

?>
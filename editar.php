<?PHP

session_start();

		include("conexao.php");
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
		$digitado = filter_input(INPUT_POST, 'digitado', FILTER_SANITIZE_STRING);
		echo $id;
		$sql2 = "UPDATE tarefas SET descricao = '$digitado' WHERE id_tarefa = '$id'";
		$editando = $conexao -> prepare($sql2);
		$editando -> execute();
		$conexao = NULL;

?>
<?PHP

session_start();

		include("conexao.php");
		$id = "";
		$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
		$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
		$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
		// $data = date('Y-m-d',strtotime($data));
		$sql2 = "INSERT INTO tarefas values (?,?,?,?)";
		$editando = $conexao -> prepare($sql2);
		$editando -> execute(array($id,$descricao,$data,$tipo));
		$conexao = NULL;

?>
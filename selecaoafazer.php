<?PHP
	$sql="SELECT * FROM tarefas WHERE tipo = '1' ";
	include ("conexao.php");
	$mostrar = $conexao -> prepare($sql);
	$mostrar->execute();
	foreach($mostrar as $mostrando){
		$descricao = $mostrando['descricao'];
		$data = $mostrando['data'];
		echo "
			<div class='mostrar'>
				<div class='descricao'>
					$descricao
				</div>
				<div class='data'>
					$data
				</div>
			</div>
		";
	}
?>
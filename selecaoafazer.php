<?PHP

	$sql="SELECT * FROM tarefas WHERE tipo = '1' ";
	include ("conexao.php");
	$mostrar = $conexao -> prepare($sql);
	$mostrar->execute();
	foreach($mostrar as $mostrando){
		$id = $mostrando['id_tarefa'];
		$descricao = $mostrando['descricao'];
		$data = $mostrando['data'];
		$tipo = $mostrando['tipo'];
		echo "
			<div class='mostrar'>
				<div class='edit'>
					<div>
						<img aria-label='Hey tooltip!' data-microtip-position='up' role='tooltip' onclick='mudar1($id,\"".$descricao."\")' src='img/edit.png'>
					</div>
				</div>
				<div class='avanco'>
					<div>
						<img onclick='avancar1($id,\"".$tipo."\")' src='img/avanco.png'>
					</div>
				</div>
				<div class='descricao'>
					$descricao
				</div>
				<div class='data'>
					$data
				</div>
				
			</div>
			<script>
				function mudar1(id,descricao){
				alertify.prompt('Edite sua tarefa.', descricao ,
			  function(evt, value ){
				alertify.success('Ok: ' + value);
				var digitado = value
				if(digitado !== ''){
					var dados = {
						digitado:digitado,
						id:id
						
					};
						$.post('editar.php', dados,function(retorna){
						})
				}
			  },
			  function(){
				alertify.error('Cancel');
			  })
			  ;
			}
			</script>
			<script>			
				function avancar1(id,tipo){
					alertify.confirm('Deseja avançar para Fazendo?',
					  function(){
						alertify.success('Sim');
						if(tipo !== ''){
							var dados = {
								tipo:tipo,
								id:id
								
							};
								$.post('avancar.php', dados,function(retorna){
									alert(retorna)
								})
						}
					  },
					  function(){
						alertify.error('Cancel');
					  });
				}
			</script>
		";
	}
?>
<link rel="stylesheet" href="css/alertify.css">
<link rel="stylesheet" href="css/themes/semantic.css">

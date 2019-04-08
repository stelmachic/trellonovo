<?PHP
	$sql="SELECT * FROM tarefas WHERE tipo = '2' ";
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
						<div aria-label='Editar!' data-microtip-position='bottom' role='tooltip'><img  onclick='mudar2($id,\"".$descricao."\")' src='img/edit.png'></div>
					</div>
				</div>
				<div class='avanco'>
					<div>
						<div aria-label='Avançar para Feito!' data-microtip-position='bottom' role='tooltip'><img onclick='avancar2($id,\"".$tipo."\")' src='img/avanco.png'></div>
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
				function mudar2(id,descricao){
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
				function avancar2(id,tipo){
					alertify.confirm('Deseja avançar para Feito?',
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
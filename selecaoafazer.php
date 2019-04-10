<?PHP

	$sql="SELECT * FROM tarefas WHERE tipo = '1' ";
	include ("conexao.php");
	$mostrar = $conexao -> prepare($sql);
	$mostrar->execute();
	foreach($mostrar as $mostrando){
		$id = $mostrando['id_tarefa'];
		$descricao = $mostrando['descricao'];
		$data = date('d/m/y',strtotime($mostrando['data']));
		$tipo = $mostrando['tipo'];
		echo "
			<div class='mostrar'>
				<div class='edit'>
					<div>
						<div aria-label='Editar!' data-microtip-position='bottom' role='tooltip'><img onclick='mudar1($id,\"".$descricao."\")' src='img/edit.png'></div>
					</div>
				</div>
				<div class='apagar'>
					<div>
						<div aria-label='Apagar $descricao!' data-microtip-position='bottom' role='tooltip'><img onclick='apagar1($id,\"".$tipo."\")' src='img/lixo.png'></div>
					</div>
				</div>
				<div class='avanco'>
					<div>
						<div aria-label='Avançar para Fazendo!' data-microtip-position='bottom' role='tooltip'><img onclick='avancar1($id,\"".$tipo."\")' src='img/avanco.png'></div>
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
				alertify.success('Editado para: ' + value);
				var digitado = value
				if(digitado !== ''){
					var dados = {
						digitado:digitado,
						id:id
						
					};
						$.post('editar.php', dados,function(retorna){
							$.ajax({
								url: 'selecaoafazer.php',
								success: function(data) {
									$('#conteudofazer').html(data);
								},
								beforeSend: function(){
								},
								complete: function(){
								}
							})
						})
				}
			  },
			  function(){
				alertify.error('Cancelado');
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
									$.ajax({
									url: 'selecaoafazer.php',
									success: function(data) {
										$('#conteudofazer').html(data);
									},
									beforeSend: function(){
									},
									complete: function(){
									}
									})
									$.ajax({
									url: 'selecaofazendo.php',
									success: function(data) {
										$('#conteudofazendo').html(data);
									},
									beforeSend: function(){
									},
									complete: function(){
									}
										})
								
								})
						}
					  },
					  function(){
						alertify.error('Cancelado');
					  });
				}
			</script>
		";
	}
?>
<link rel="stylesheet" href="css/alertify.css">
<link rel="stylesheet" href="css/themes/semantic.css">

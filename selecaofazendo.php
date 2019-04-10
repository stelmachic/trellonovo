<?PHP
	$sql="SELECT * FROM tarefas WHERE tipo = '2' ORDER BY data ";
	include ("conexao.php");
	$mostrar = $conexao -> prepare($sql);
	$mostrar->execute();
	foreach($mostrar as $mostrando){
		$id = $mostrando['id_tarefa'];
		$descricao = $mostrando['descricao'];
		$data = date('d/m/y',strtotime($mostrando['data']));
		$tipo = $mostrando['tipo'];
		$datade = $mostrando['data'];
		echo "
			<div class='mostrar'>
				<div class='edit'>
					<div>
						<div aria-label='Editar!' data-microtip-position='bottom' role='tooltip'><img  onclick='mudar2($id,\"".$descricao."\")' src='img/edit.png'></div>
					</div>
				</div>
				<div class='apagarr'>
					<div>
						<div aria-label='Apagar $descricao!' data-microtip-position='bottom' role='tooltip'><img onclick='apagar2($id,\"".$tipo."\")' src='img/lixo.png'></div>
					</div>
				</div>
				<div class='volta'>
					<div>
						<div aria-label='Voltar!' data-microtip-position='bottom' role='tooltip'><img  onclick='voltar2($id,\"".$descricao."\")' src='img/voltar.png'></div>
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
				alertify.success('Editado para: ' + value);
				var digitado = value
				if(digitado !== ''){
					var dados = {
						digitado:digitado,
						id:id
						
					};
						$.post('editar.php', dados,function(retorna){
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
			  })
			  ;
			}
			</script>
			<script>			
				function avancar2(id,tipo){
					alertify.confirm('Deseja avançar para Feito?',
					  function(){
						alertify.success('Movido para Feito');
						if(tipo !== ''){
							var dados = {
								tipo:tipo,
								id:id
								
							};
								$.post('avancar.php', dados,function(retorna){
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
									$.ajax({
									url: 'selecaofeito.php',
									success: function(data) {
										$('#conteudofeito').html(data);
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
			<script>			
				function voltar2(id,tipo){
					alertify.confirm('Deseja Voltar para a Fazer?',
					  function(){
						alertify.success('Sim');
						if(tipo !== ''){
							var dados = {
								tipo:tipo,
								id:id
								
							};
								$.post('voltar.php', dados,function(retorna){
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
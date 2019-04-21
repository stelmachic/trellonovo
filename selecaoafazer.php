<link rel="stylesheet" href="estilo.css">
<?PHP

	$sql="SELECT * FROM tarefas WHERE tipo = '1' ORDER BY data ";
	include ("conexao.php");
	$mostrar = $conexao -> prepare($sql);
	$mostrar->execute();
	foreach($mostrar as $mostrando){
		$id = $mostrando['id_tarefa'];
		$descricao = $mostrando['descricao'];
		$data = date('d/m/y',strtotime($mostrando['data']));
		$tipo = $mostrando['tipo'];
		echo "
			<div class='mostrar' >
				<div class='edit'>
					<div>
						<div aria-label='Editar!' data-microtip-position='bottom' role='tooltip'><img onclick='mudar1($id,\"".$descricao."\")' src='img/edit.png'></div>
					</div>
				</div>
				<div class='apagar'>
					<div>
						<div aria-label='Apagar $descricao!' data-microtip-position='bottom' role='tooltip'><img onclick='apagar($id,\"".$descricao."\")' src='img/lixo.png'></div>
					</div>
				</div>
				<div class='avanco'>
					<div>
						<div aria-label='Avançar para Fazendo!' data-microtip-position='bottom' role='tooltip'><img onclick='avancar1($id,\"".$tipo."\")' src='img/avanco.png'></div>
					</div>
				</div>
				<div class='descricao' onclick='dif(\"".$descricao."\",\"".$data."\",\"".$data."\")'>
					$descricao
				</div>
				<div class='data'>
					$data
				</div>
				
			</div>
			<script>
				function mudar1(id,descricao){
				alertify.prompt('Editar tarefa','Edite sua tarefa.', descricao ,
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
					alertify.confirm('Avançar para Fazendo','Deseja avançar para Fazendo?',
					  function(){
						alertify.success('Movido para Fazendo');
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
			<script>			
				function apagar(id,descricao){
					alertify.confirm('Apagar tarefa','Deseja apagar essa tarefa?',
					  function(){
						alertify.success('Tarefa apagada');
						if(id !== ''){
							var dados = {
								descricao:descricao,
								id:id
								
							};
								$.post('apagar.php', dados,function(retorna){
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
<script>
				function dif(desc,data,datacerta){
					var datacerta = "Data final: " + datacerta
					var hoje = new Date()
					var hoje = hoje.getDate()
					var data = data
					var hoje = parseInt(hoje)
					var data = parseInt(data);
					var diferenca = data - hoje
					var desc = "Descrição: " + desc
					if (diferenca < 0){
						diferenca = 'Prazo atingido';
					}else {
						diferenca = diferenca + " dias"
					}
					document.getElementById('myModal').style.display = "block";
					document.getElementById('desc').innerHTML = desc
					document.getElementById('prazo').innerHTML = diferenca;
					document.getElementById('data').innerHTML = datacerta;

					
				}
				function fechar(){
				document.getElementById('myModal').style.display = "none";
			}
			</script>
			
			 <div id="myModal" class="modal" style="display:none;">
		  <div class="modal-content" style="color:#FFF;font-family:arial;" >
			<span class="close" onclick="fechar()">&times;</span>
			<h1>Informacões sobre a tarefa</h1><br><br>
			<h2 id="desc"></h2><br>
			<h2 id="prazo"></h2><br>
			<h3 id="data"></h3>
		  </div>
		 </div>
<link rel="stylesheet" href="css/alertify.css">
<link rel="stylesheet" href="css/themes/semantic.css">

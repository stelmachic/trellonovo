<html>
	<head>
	<title></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="estilo.css">
		<link rel="stylesheet" href="css/alertify.css">
		<link rel="stylesheet" href="css/microtip.css">
		<link rel="stylesheet" href="pace/estilopace.css">
		<script src="js/alertify.js"></script>
		<script src="js/js.js"></script>
		<script src="pace/pace.js"></script>
	</head>
	<body>
		<div id="principal">
			<div id="fazer">
				<div class="titulo" onclick='mudar1'>
					A fazer
				</div>
				<div id="conteudofazer">				
				</div>
				<div id="addfazer">
					Adicionar tarefa
				</div>
			</div>
			<div id="fazendo">
				<div class="titulo">
					Fazendo
				</div>
				<div id="conteudofazendo">
				</div>
				<div id="addfazendo">
					Adicionar tarefa
				</div>
			</div>
			<div id="feito">
				<div class="titulo">
					Feito
				</div>
				<div id="conteudofeito">
				</div>
				<div id="addfeito">
					Adicionar tarefa
				</div>
			</div>
			<div class="pace"></div>
		</div>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function (){
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
			$('.').click(function(){
				var nome = $("#nome").val();
				  var idade = $("#idade").val();
				  var sexo = $("#sexo").val();
					if(nome !==''){
					var dados = {
							nome:nome,
							idade:idade,
							sexo:sexo
						}
					$.post('inserir.php', dados)}
				$.ajax({
					url: 'arquivo2.php',
					success: function(data) {
						$('div').html(data);
						$("#nome").val("");
						$("#idade").val("");
						$("#sexo").val("");
					},
					beforeSend: function(){
						alert("Carregando");
					},
					complete: function(){
					}
				});
			});
			
		</script>
	</body>
</html>
<head>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
  <script>
  </script>
</head>
  <div id="myModal" class="modal">
		  <div class="modal-content">
			<span class="close" onclick="fechar()">&times;</span>
			<form action="" method="POST">
					Descrição:<br>
					<input type="text" id="descricao"><br><br>
					Data:<br>
					<input type="text" id="datepicker"><br><br>
					Tipo:<br>
					<select name="tipo" id="tipo">
					<option value="1">A fazer</option>
					<option value="2">Fazendo</option>
					<option value="3">Feito</option>
					</select><br><br>
					<input type="button" class="salvar" onclick="salvando()" value="Salvar">
			</form>
		  </div>
		 </div>
<script>
			$(function() {
    $( "#datepicker" ).datepicker();
});
			function fechar(){
				document.getElementById('myModal').style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			  if (event.target == modal) {
				modal.style.display = "none";
			  }
			}
		function salvando(){
				$(".modal").hide();
				var descricao = $("#descricao").val();
				  var data = $("#datepicker").val();
				  var tipo = $("#tipo").val();
					if(descricao !==''){
					var dadoss = {
							descricao:descricao,
							data:data,
							tipo:tipo
						}
					$.post('adicionar.php', dadoss,function(retorna){
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
								
		}};
</script>
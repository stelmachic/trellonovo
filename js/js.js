function avancar1(){
	alertify.confirm("This is a confirm dialog.",
	  function(){
		alertify.success('Ok');
	  },
	  function(){
		alertify.error('Cancel');
	  });
}
function mudar1(){
	alertify.prompt("This is a prompt dialog.", "Default value",
  function(evt, value ){
    alertify.success('Ok: ' + value);
  },
  function(){
    alertify.error('Cancel');
  })
  ;
}
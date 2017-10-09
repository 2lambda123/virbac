$(function(){
	$('form').validate({
		rules: {
			user: {
				required: true
			}
		},
          
		messages: {
			user: {
				required: 'Este campo es requerido'
			}
		} 
	});
});
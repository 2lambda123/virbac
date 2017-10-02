$(function(){
	$('form').validate({
		rules: {
			email: {
				required: true
			},
			password: {
				required: true
			}
		},
          
		messages: {
			email: {
				required: 'Este campo es requerido'
			},
			password: {
				required: 'Este campo es requerido'
			},
		} 
	});
});
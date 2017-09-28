$(function(){
	$('form').validate({
		rules: {
			name: {
				required: true,
				maxlength: 100
			}
		},
		messages: {
			name: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 100 caracteres'
			}		                     
		} 
	});
});
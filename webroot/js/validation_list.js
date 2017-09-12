$(function(){
	$('form').validate({
		rules: {
			name: {
				required: true,
				maxlength: 100
			},
			description: {
				required: true,
				maxlength: 200
			},
			presentation: {
				required: true,
				maxlength: 200
			}
		},
		messages: {
			name: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 100 caracteres'
			},
			description: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 200 caracteres'
			},
			presentation: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 200 caracteres'
			}		                     
		} 
	});
});
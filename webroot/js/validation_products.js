$(function(){
	$('form').validate({
		rules: {
			sku: {
				required: true,
				maxlength: 11
			},
			description: {
				required: true,
				maxlength: 200
			},
			presentation: {
				required: true,
				maxlength: 200
			},
			
		},
          
		messages: {
			sku: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 11 caracteres'
			},
			description: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 50 caracteres'
			},
			presentation: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 200 caracteres'
			},

			
		} 
	});
});
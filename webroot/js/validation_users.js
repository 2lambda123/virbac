$(function(){
	$('form').validate({
		rules: {
			name: {
				required: true,
				maxlength: 100
			},
			paternal_last_name: {
				required: true,
				maxlength: 200
			},
			maternal_last_name: {
				required: true,
				maxlength: 200
			},			
			access_level: {
				required: true,
				maxlength: 200
			},		
			password: {
				required: true,
				maxlength: 200
			}
		},
		messages: {
			name: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 100 caracteres'
			},
			paternal_last_name: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 200 caracteres'
			},
			maternal_last_name: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 200 caracteres'
			},			
			access_level: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 200 caracteres'
			},			
			password: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 200 caracteres'
			}	                     
		} 
	});
});
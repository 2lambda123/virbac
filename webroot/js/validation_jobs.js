$(function(){
	$('form').validate({
		rules: {
			standar_list_id: {
				required: true,
				maxlength: 11,
			},
			sku: {
				required: true,
				maxlength: 11
			},
			job_number: {
				required: true,
				maxlength: 50
			},
			pieces: {
				required: true,
				maxlength: 11
			},
			comment: {
				required: true,
				maxlength: 200
			}
		},
          
		messages: {
			standar_list_id: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 11 caracteres'
			},
			sku: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 11 caracteres'
			},
			job_number: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 50 caracteres'
			},
			pieces: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 11 caracteres'
			},
			comment: {
				required: 'Este campo es requerido',
				maxlength: 'Por favor no ingreses mas de 200 caracteres'
			}
		} 
	});
});
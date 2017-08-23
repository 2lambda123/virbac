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
			description: {
			                 required: true,
			                 maxlength: 200
			},
			presentation: {
			                 required: true,
			                 maxlength: 200
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
			},
			listname: {
			                 required: true,
			                 maxlength: 100
			},
			stepname: {
			                 required: true,
			                 maxlength: 100
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
			description: {
			                 required: 'Este campo es requerido',
			                 maxlength: 'Por favor no ingreses mas de 50 caracteres'
			},
			presentation: {
			                 required: 'Este campo es requerido',
			                 maxlength: 'Por favor no ingreses mas de 200 caracteres'
			},
			presentation: {
			                 required: 'Este campo es requerido',
			                 maxlength: 'Por favor no ingreses mas de 200 caracteres'
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
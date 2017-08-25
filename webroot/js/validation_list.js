$(function(){

	$('form').validate({
		rules: {
			listname: {
			                 required: true,
			                 maxlength: 100
			},
			stepname: {
			                 required: true,
			                 maxlength: 100
			},
			listDescripción: {
			                 required: true,
			                 maxlength: 200
			},
			listPresentación: {
			                 required: true,
			                 maxlength: 200
			}
						
		},
          
		   

		messages: {
		   listname: {
			                 required: 'Este campo es requerido',
			                 maxlength: 'Por favor no ingreses mas de 100 caracteres'
			},
			stepname: {
			                 required: 'Este campo es requerido',
			                 maxlength: 'Por favor no ingreses mas de 100 caracteres'
			},
			listDescripción: {
			                 required: 'Este campo es requerido',
			                 maxlength: 'Por favor no ingreses mas de 200 caracteres'
			},
			listPresentación: {
			                 required: 'Este campo es requerido',
			                 maxlength: 'Por favor no ingreses mas de 200 caracteres'
			}
			
		                     
		} 
	});
});
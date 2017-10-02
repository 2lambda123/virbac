$(function(){
	$('#modalInfo').validate({
		rules: {
			user_id: {
				required: true
			},
			status: {
				required: true
			},
			comment: {
				required: function (){ return $('#status').val() == 'reassigned'; }
			}
		},
          
		messages: {
			user_id: {
				required: 'Este campo es requerido'
			},
			status: {
				required: 'Este campo es requerido'
			},
			comment: {
				required: 'Este campo es requerido'
			},
		} 
	});
});
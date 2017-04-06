function amcBindValidate(conf){
	$(conf.form).validate({
		'rules': conf.rules,
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else if ( element.parent('.input-group').length ){
				error.insertAfter( element.parent( ) );
			} else {
				error.insertAfter( element );
			}

		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-md-6" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-md-6" ).addClass( "has-success" ).removeClass( "has-error" );
		}
	});
} 

function amcMaskPhone(sel,mask){
    return $(sel).mask(mask);
}

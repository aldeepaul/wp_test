jQuery(document).ready(function($) {
	// We can also pass the url value separately from ajaxurl for front end AJAX implementations	 	
	jQuery.ajax({
		url: ajax_object.ajax_url,
		type: 'GET',
		dataType: 'json',		
		success:function(data){
		 	console.log(data);
		},
		error: function (xhr, ajaxOptions, thrownError) {
        	console.log(xhr.status);
        	console.log(thrownError);
        	console.log(xhr);
      },
	});
});
jQuery(document).ready(function($) {
	// We can also pass the url value separately from ajaxurl for front end AJAX implementations
    console.log(ajax_object.ajax_url);
	jQuery.ajax({
		url: ajax_object.ajax_url,
		type: 'GET',
		dataType: 'json',		
		success: function(data){
            $.each( data.FetchOngoingLiveEventsResult, function( key, value ) {
                $("#sb-live-events").append("<li>" + value.n + "</li>");
            });
        },
		error: function (xhr, ajaxOptions, thrownError) {
        	console.log(xhr.status);
        	console.log(thrownError);
        	console.log(xhr);
      }
	});
});